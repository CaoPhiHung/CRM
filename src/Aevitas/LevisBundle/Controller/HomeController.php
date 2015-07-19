<?php

namespace Aevitas\LevisBundle\Controller;

/**
 * Description of StoreController
 *
 * @author RYANTRAN
 */
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Aevitas\LevisBundle\Form\FormGiftArticleType;
use Aevitas\LevisBundle\Document\GiftArticle;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Vietland\UserBundle\Import\ImportGift;
use Vietland\UserBundle\Document\User;
use Vietland\UserBundle\Document\UserLog;
use Aevitas\PointBundle\EventListener\EarnPointEvent;
use Symfony\Component\Security\Core\SecurityContext;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Event\UserEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use Vietland\AevitasBundle\Document\Anniversary;
use Vietland\AevitasBundle\Form\AnniversaryFormType;
use Aevitas\LevisBundle\Form\FormRegistrationStep2;
use Aevitas\LevisBundle\Form\FormRegistrationStep3;
use Vietland\AevitasBundle\Document\City;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Vietland\AevitasBundle\Helper\Multithread\MailerTask;

class HomeController extends Controller {

    /**
     * @Route("/index.html", name="levis_homepage_index")
     */
    public function indexAction() {
        $user = $this->get('security.context')->getToken()->getUser();
        $form = $this->createFormBuilder()->add('registration')->getForm();
        $response = new Response($this->renderView('AevitasLevisBundle:Front:root.html.twig', array('form' => $form->createView())));
        //$this->getRequest()->setLocale('vi');
        //$this->get('session')->set('_locale', 'vi');

        if (is_object($user))
            $response->setPrivate();
        return $response;
    }

    /**
     * @Route("/_proxy/renderLogin", name="render_login")
     */
    public function renderLoginPanelAction() {
        $request = $this->getRequest();

        /* @var $request \Symfony\Component\HttpFoundation\Request */
        $session = $this->get('session');
        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContext::LAST_USERNAME);

        $csrfToken = $this->get('form.csrf_provider')->generateCsrfToken('authenticate');
        return new Response($this->renderView('AevitasConfigBundle:Localize:toppanel.html.twig', array(
                    'last_username' => $lastUsername,
                    'csrf_token' => $csrfToken,
                    'routing' => $request->get('_route'),
                    'params' => $request->get('_route_params')
        )));
    }

    /**
     * @Route("/loyalty-login", name="levis_homepage_login")
     */
    public function homeLoginAction() {
        $request = $this->getRequest();

        /* @var $request \Symfony\Component\HttpFoundation\Request */
        $session = $this->get('session');
        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContext::LAST_USERNAME);

        $csrfToken = $this->get('form.csrf_provider')->generateCsrfToken('authenticate');
        return new Response($this->renderView('AevitasLevisBundle:Front:login.html.twig', array(
                    'last_username' => $lastUsername,
                    'csrf_token' => $csrfToken,
                    'routing' => $request->get('_route'),
                    'params' => $request->get('_route_params')
        )));
    }

    /**
     * @Route("/facebook/integrate.{_format}", name="registration_facebook_integrate", defaults={"_format"="json"})
     * @Secure(roles="ROLE_USER")
     */
    public function facebookLoginAction($_format) {
        $user = $this->get('security.context')->getToken()->getUser();
        $fbprovider = $this->get('my.facebook.user');
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $fb = $fbprovider->getFacebook();
        $userData = $fb->api('/me');
        if (isset($userData['id'])) {
            $checkedUser = $fbprovider->findUserByFbId($userData['id']);
            if (is_object($checkedUser))
                exit(json_encode(array('status' => false, 'error' => $this->get('translator')->trans('This Facebook account is already associate to another account'))));

            $user->setFbid($userData['id'])->setFirstname($userData['first_name'])->setLastname($userData['last_name'])
                    ->setDob(new \DateTime($userData['birthday']))
                    ->setSex($userData['gender'] == 'male' ? User::MALE : User::FEMALE);
            $userLog = new UserLog();
            $userLog->setUser($user)->setAction(UserLog::FB_INTEGRATE)->setPoint($this->get('point.rule')->getPrfb());
            $dm->persist($userLog);
            $dm->flush();
            $fbprovider->getUserManager()->updateUser($user, true);
            return new Response(json_encode(array('status' => true, 'id' => $userData['id'], 'firstname' => $userData['first_name'], 'lastname' => $userData['last_name'], 'dob' => $userData['birthday'], 'sex' => $userData['gender'] == 'male' ? User::MALE : User::FEMALE)));
        }

        exit(json_encode(array('status' => false, 'error' => $this->get('translator')->trans('Can not load your facebook account'))));
    }

    /**
     * @Route("/_proxy/render/login", name="render_login")
     */
    public function renderLoginAction($routing = '/', $params = array(), $locale = 'en_US') {
        $request = $this->get('request');
        /* @var $request \Symfony\Component\HttpFoundation\Request */
        $session = $request->getSession();
        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContext::LAST_USERNAME);

        $csrfToken = $this->get('form.csrf_provider')->generateCsrfToken('authenticate');

        return new Response($this->renderView('AevitasLevisBundle:Front:toppanel.html.twig', array(
                    'last_username' => $lastUsername,
                    'csrf_token' => $csrfToken,
                    'routing' => $routing,
                    'params' => $params,
                    'locale' => $locale
        )));
    }

    /**
     * @Route("/searchdistrict/{map}", name="home_search_district", defaults={"map"="3"})
     * @Cache(expires="+2 days")
     */
    public function homeSearchDistrictAction($map) {
        $request = $this->getRequest();
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $user = $this->get('security.context')->getToken()->getUser();
        $districts = $dm->getRepository('VietlandAevitasBundle:District')->findBy(array('cityId' => (int) $map));
        if (!$districts->count()) {
            $city = $dm->getRepository('VietlandAevitasBundle:City')->findOneBy(array('name' => $request->get('data')));
            $districts = $dm->getRepository('VietlandAevitasBundle:District')->findBy(array('cityId' => (int) $city->getMap()));
        }
        $string = '';
        foreach ($districts as $d) {
            if($user->getDistrict() == $d->getName())
                $selected = ' selected="true"';
            else $selected = '';
            $string .= '<option value="' . $d->getId() . '" rel="'.$d->getName().'"'.$selected.'>' . $d->getName() . '</option>';
        }
        exit(json_encode(array('html' => $string)));
    }

    /**
     * @Route("/register/online", name="levis_home_register_online")
     * @Cache(public="0")
     */
    public function registerOnlineAction() {
        $request = $this->getRequest();
        $formFactory = $this->get('fos_user.registration.form.factory');
        $userManager = $this->get('fos_user.user_manager');
        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $user = $userManager->createUser();
        $user->setEnabled(true)->setEmail($request->get('email'));
        $user->setUsername($request->get('email'));
        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, new UserEvent($user, $request));
        $session = $this->container->get('session');
        if ($session->get('ref'))
            $user->setRef((int) $session->get('ref'));
        $form = $formFactory->createForm();
        $form->setData($user);
        if ('POST' === $request->getMethod()) {
            $form->bind($request);

            if ($form->isValid()) {
                $pointrule = $this->get('point.rule');
                $points = $user->getUpdatedPoints($pointrule->getPointConfig());
                $event = new FormEvent($form, $request);
                $dispatcher->dispatch(FOSUserEvents::REGISTRATION_SUCCESS, $event);

                $userManager->updateUser($user);

                if (null === $response = $event->getResponse()) {
                    $url = $this->container->get('router')->generate('levis_home_register_online_step2');
                    $response = new RedirectResponse($url);
                }

                $dispatcher->dispatch(FOSUserEvents::REGISTRATION_COMPLETED, new FilterUserResponseEvent($user, $request, $response));
                $dispatcher->dispatch('user.earn.point', new EarnPointEvent($user, UserLog::SIGNUP_ONLINE));
                $session = $request->getSession();
                $session->set('signup', true);
                return $response;
            }
        }
        return new Response($this->renderView('AevitasLevisBundle:Front:registerOnline.html.twig', array('form' => $form->createView())));
    }

    /**
     * @Route("/register/online/step2.{_format}", name="levis_home_register_online_step2", defaults={"_format"="html"})
     * @Template("AevitasLevisBundle:Front:registerOnlineStep2.html.twig")
     * @Secure(roles="ROLE_USER")
     */
    public function registerOnlineStep2Action($_format) {
        $user = $this->get('security.context')->getToken()->getUser();
        $form = $this->createForm(new FormRegistrationStep2($this->get('translator')), $user);
        $request = $this->getRequest();
        $session = $request->getSession();
        if ($session->get('signup')) {
            $message = \Swift_Message::newInstance()
                    ->setSubject($this->get('translator')->trans('You have just signed up to our Loyalty Program'))
                    ->setFrom('crm@thanbacgroup.com', 'Thanh Bac Fashion')
                    /*                         ->setReplyTo('getsocial@atipso.com', 'Atipso Team') */
                    ->setTo($user->getEmail())
                    ->setBody($this->renderView(':mail:enableUser.html.twig', array('user' => $user)), 'text/html', 'utf8');
            $this->get('mailer')->send($message);
            $session->remove('signup');
        }
        $dm = $this->get('database_manager');
        $pointrule = $this->get('point.rule');
        if ('POST' == $request->getMethod()) {
            $form->bind($request);
            if ($form->isValid()) {
                $points = $user->getUpdatedPoints($pointrule->getPointConfig());
                $dm->persist($user);
                $dm->flush();
                if ('json' == $_format) {
                    exit(json_encode(array('points' => $points, 'fields' => $user->getUpdatedFields())));
                }
                $url = $this->get('router')->generate('levis_home_register_online_step3');
                $response = new RedirectResponse($url);
                return $response;
            }
        }
        $cities = $dm->getRepository('VietlandAevitasBundle:City')->findAll();
        $districts = $dm->getRepository('VietlandAevitasBundle:District')->findBy(array('cityId' => 3));
        $anniForms = '';
        foreach ($user->getAnniversary() as $anni) {
            $forms = $this->createForm(new AnniversaryFormType($this->get('translator')), $anni);
            $anniForms .= $this->renderView('AevitasLevisBundle:Front:registerAddAnniversary.html.twig', array('form' => $forms->createView()));
        }
        return array('form' => $form->createView(), 'cities' => $cities, 'districts' => $districts, 'anniversaries' => $anniForms, 'user' => $user, 'pointrule' => $pointrule);
    }

    /**
     * @Route("/register/online/step3.{_format}", name="levis_home_register_online_step3", defaults={"_format"="html"})
     * @Template("AevitasLevisBundle:Front:registerOnlineStep3.html.twig")
     * @Secure(roles="ROLE_USER")
     */
    public function registerOnlineStep3Action($_format) {
        $user = $this->get('security.context')->getToken()->getUser();
        $form = $this->createFormBuilder($user)->add('nlt', 'checkbox', array('required' => false, 'label' => $this->get('translator')->trans('Newsletter')))->getForm();
        if ('POST' == $this->getRequest()->getMethod()) {
            $form->bind($this->getRequest());
            $dm = $this->get('database_manager');
            $dm->persist($user);
            $dm->flush();
            $url = $this->get('router')->generate('levis_user_dashboard');
            $response = new RedirectResponse($url);
            return $response;
        }
        return new Response($this->renderView('AevitasLevisBundle:Front:registerOnlineStep3.html.twig', array('form' => $form->createView())));
    }

    /**
     * @Route("/register/online/step3/addanni.{_format}", name="home_add_anniversary", defaults={"_format"="json"})
     * @Secure(roles="ROLE_USER")
     */
    public function addAnniversaryAction($_format = 'json') {
        $dm = $this->get('database_manager');
        $user = $this->get('security.context')->getToken()->getUser();
        if ($user->addAnniversary()) {
            $dm->persist($user);
            $dm->flush();
            $anni = $user->getLastAnniversary();
            $form = $this->createForm(new AnniversaryFormType($this->get('translator')), $anni);
            exit(json_encode(array('status' => true, 'html' => $this->renderView('AevitasLevisBundle:Front:registerAddAnniversary.html.twig', array('form' => $form->createView())))));
        } else
            exit(json_encode(array('status' => false, 'html' => $this->get('translator')->trans('You got maximum anniversary date.'))));
    }

    /**
     * @Route("/register/online/step3/saveanni.{_format}", name="home_save_anniversary", defaults={"_format"="json"})
     * @Secure(roles="ROLE_USER")
     */
    public function saveAnniversaryAction($_format) {
        $dm = $this->get('database_manager');
        $user = $this->get('security.context')->getToken()->getUser();
        $request = $this->getRequest();
        $anni = new Anniversary();
        $form = $this->createForm(new AnniversaryFormType($this->get('translator')), $anni);
        $form->bind($request);
        if ($form->isValid()) {
            try {
                $user->saveAnniversary($anni);
                $points = $user->getUpdatedPoints($this->get('point.rule')->getPointConfig());
                $dm->persist($user);
                $dm->flush();
                exit(json_encode(array('status' => true, 'points' => $points, 'id' => $anni->getId())));
            } catch (\Exception $e) {
                exit(json_encode(array('status' => false, 'message' => $e->getMessage())));
            }
        } else
            exit(json_encode(array('message' => $form->getErrorsAsString())));
    }

    /**
     * @Route("/_proxy/render/anniversary", name="render_annivesary")
     */
    public function registerAnniversaryAction(Anniversary $anni) {
        $form = $this->createForm(new AnniversaryFormType($this->get('translator')), $anni);
        return new Response($this->renderView('AevitasLevisBundle:Front:registerAddAnniversary.html.twig', array('form' => $form->createView())));
    }

    /**
     * @Route("/register/online/step4.{_format}", name="levis_home_register_online_step4",defaults={"_format"="html"})
     * @Secure(roles="ROLE_USER")
     */
    public function registerStep4Action($_format) {
        $user = $this->get('security.context')->getToken()->getUser();
        $form = $this->createFormBuilder($user)->add('nlt', 'checkbox', array('required' => false, 'label' => $this->get('translator')->trans('Newsletter')))->getForm();
        if ('POST' == $this->getRequest()->getMethod()) {
            $form->bind($this->getRequest());
            $dm = $this->get('database_manager');
            $dm->persist($user);
            $dm->flush();
            $url = $this->get('router')->generate('levis_user_dashboard');
            $response = new RedirectResponse($url);
            return $response;
        }
        return new Response($this->renderView('AevitasLevisBundle:Front:registerOnlineStep3.html.twig', array('form' => $form->createView())));
    }

    /**
     * @Route("/complete/enrollment", name="levis_home_complete_enrollment")
     * @Template("AevitasLevisBundle:Front:completeEnrollmentStep0.html.twig")
     */
    public function completeEnrollmentStepOneAction() {
        $user = new User();
        $form = $this->createFormBuilder()->add('registration')->getForm();
        $request = $this->getRequest();
        if ('POST' == $request->getMethod()) {
            $form->bind($request);
            $data = $request->request->all();
            $code = $data['form']['registration'];
            $dm = $this->get('database_manager');
            $user = $dm->getRepository('VietlandUserBundle:User')->findOneBy(array('regcode' => $code));
            if (is_object($user)) {
                $token = new UsernamePasswordToken($user, $user->getPassword(), 'main', $user->getRoles());
                $request = $this->getRequest();
                $this->get("security.context")->setToken($token);

// Fire the login event
                $event = new InteractiveLoginEvent($this->getRequest(), $token);
                $this->get("event_dispatcher")->dispatch("security.interactive_login", $event);
                $form = $this->createForm(new FormRegistrationStep2($this->get('translator'), true), $user);
                return array('form' => $form->createView());
            } else {
                $this->getRequest()->getSession()->getFlashBag()->add('notice_enroll', $this->get('translator')->trans('This registration code is invalid!'));
            }
        } return new RedirectResponse('/');
    }

    /**
     * @Route("/complete/enrollment/step1", name="levis_home_complete_enrollment_step1")
     * @Template("AevitasLevisBundle:Front:completeEnrollmentStep1.html.twig")
     * @Secure(roles="ROLE_USER")
     */
    public function completeEnrollmentAction() {
        $user = $this->get('security.context')->getToken()->getUser();
        $form = $this->createForm(new FormRegistrationStep2($this->get('translator'), true), $user);
        $request = $this->getRequest();
        if ('POST' == $request->getMethod()) {
            $form->bind($request);
            $dm = $this->get('database_manager');
            $userManager = $this->get('fos_user.user_manager');
            if (is_object($user)) {
                $userManager->updateUser($user, true);
                $form = $this->createForm(new FormRegistrationStep2($this->get('translator')), $user);
                $cities = $dm->getRepository('VietlandAevitasBundle:City')->findAll();
                $districts = $dm->getRepository('VietlandAevitasBundle:District')->findBy(array('cityId' => 3));
                $anniForms = '';
                foreach ($user->getAnniversary() as $anni) {
                    $forms = $this->createForm(new AnniversaryFormType($this->get('translator')), $anni);
                    $anniForms .= $this->renderView('AevitasLevisBundle:Front:registerAddAnniversary.html.twig', array('form' => $forms->createView()));
                }
                $pointrule = $this->get('point.rule');
                return array('form' => $form->createView(), 'cities' => $cities, 'districts' => $districts, 'anniversaries' => $anniForms, 'pointrule' => $pointrule, 'user' => $user);
            }
        } return new RedirectResponse('/');
    }

    /**
     * @Route("/complete/enrollment/step2.{_format}", name="levis_home_complete_enrollment_step2", defaults={"_format"="html"})
     * @Template("AevitasLevisBundle:Front:completeEnrollmentStep2.html.twig")
     * @Secure(roles="ROLE_USER")
     */
    public function completeEnrollmentStep2Action($_format) {
        $response = $this->registerOnlineStep2Action($_format);
        $request = $this->getRequest();
        $user = $this->get('security.context')->getToken()->getUser();
        if ('GET' == $request->getMethod()) {
            $form = $this->createForm(new FormRegistrationStep2($this->get('translator')), $user);
            $dm = $this->get('database_manager');
            $cities = $dm->getRepository('VietlandAevitasBundle:City')->findAll();
            $districts = $dm->getRepository('VietlandAevitasBundle:District')->findBy(array('cityId' => 3));
            return new Response($this->renderView('AevitasLevisBundle:Front:completeEnrollmentStep1.html.twig', array('form' => $form->createView(), 'cities' => $cities, 'districts' => $districts)));
        }
        if ($response instanceof RedirectResponse) {
            $user = $this->get('security.context')->getToken()->getUser();
            $form = $this->createForm(new FormRegistrationStep3($this->get('translator')), $user);
            $anniForms = '';
            foreach ($user->getAnniversary() as $anni) {
                $forms = $this->createForm(new AnniversaryFormType($this->get('translator')), $anni);
                $anniForms .= $this->renderView('AevitasLevisBundle:Front:registerAddAnniversary.html.twig', array('form' => $forms->createView()));
            }
            return array('form' => $form->createView(), 'user' => $user, 'anniversaries' => $anniForms);
        }
        return $response;
    }

    /**
     * @Route("/complete/enrollment/step3.{_format}", name="levis_home_complete_enrollment_step3", defaults={"_format"="html"})
     * @Template("AevitasLevisBundle:Front:completeEnrollmentStep3.html.twig")
     * @Secure(roles="ROLE_USER")
     */
    public function completeEnrollmentStep3Action($_format) {
        $response = $this->registerOnlineStep3Action($_format);
        if ($response instanceof RedirectResponse) {
            $user = $this->get('security.context')->getToken()->getUser();
            $form = $this->createFormBuilder($user)->add('nlt', 'checkbox', array('required' => false, 'label' => $this->get('translator')->trans('Newsletter')))->getForm();
            return array('form' => $form->createView(), 'user' => $user);
        }
        return $response;
    }

    /**
     * @Route("/complete/enrollment/step4.{_format}", name="levis_home_complete_enrollment_step4", defaults={"_format"="html"})
     * @Secure(roles="ROLE_USER")
     */
    public function completeEnrollmentFinalStepAction() {
        $user = $this->get('security.context')->getToken()->getUser();
        $form = $this->createFormBuilder($user)->add('nlt', 'checkbox', array('required' => false, 'label' => $this->get('translator')->trans('Newsletter')))->getForm();
        if ('POST' == $this->getRequest()->getMethod()) {
            $form->bind($this->getRequest());
            $dm = $this->get('database_manager');
            $dm->persist($user);
            $dm->flush();
            $url = $this->get('router')->generate('levis_user_dashboard');
            $response = new RedirectResponse($url);
            return $response;
        }
    }

    /**
     * @Route("/forgot/password", name="levis_home_forget_password")
     * @Template("AevitasLevisBundle:Front:forgotPassword.html.twig")
     */
    public function forgotPasswordAction() {


        $request = $this->getRequest();
        $session = $this->get('session');

        $dm = $this->get('database_manager');
        $user = new User(); //temp user
        $form = $this->createFormBuilder($user)->add('email', 'email')->getForm();
        if ('POST' == $request->getMethod()) {
            $translator = $this->get('translator');
            $userManager = $this->get('fos_user.user_manager');
            $form->bind($request);
            $checkUser = $userManager->findUserByUsername($user->getEmail());
            //var_dump($user->getEmail());
            if ($form->isValid() && is_object($checkUser)) {
                //user registration code as a change password confirmation code
                $sessionid = $user->generateRegcode()->getRegcode();
                $session->set('changepass', $sessionid);
                // var_dump($sessionid);
                // die();
                // $message = \Swift_Message::newInstance()
                //         ->setSubject($translator->trans('TBF Star Club - Request Change Password'))
                //         ->setFrom('bichhang@tbfvietnam.com', 'TBF Loyalty Program')
                //                                  ->setReplyTo('getsocial@atipso.com', 'Atipso Team') 
                //         ->setTo($user->getEmail())
                //         ->setBody($this->renderView(':mail:forgotPassword.html.twig', array('sessionid' => $sessionid)), 'text/html', 'utf8');
                // $this->get('mailer')->send($message);
                $message = \Swift_Message::newInstance()
                                ->setSubject($this->get('translator')->trans('Request Change Password'))
                                ->setFrom('crm@thanbacgroup.com', 'Thanh Bac Fashion')
                                            //             ->setReplyTo('getsocial@atipso.com', 'Atipso Team') 
                                ->setTo($user->getEmail())
                                //->setTo('caophihung8392@gmail.com')
                                ->setBody($this->renderView(':mail:changePassword.html.twig', array('code' => $sessionid)), 'text/html', 'utf8');
                            $this->get('mailer')->send($message);


                $changePassword = $this->createFormBuilder($user)
                                ->add('plainPassword', 'repeated', array('required' => true,
                                    'type' => 'password',
                                    'first_options' => array('label' => $translator->trans('New password')),
                                    'second_options' => array('label' => $translator->trans('Confirm password'))
                                ))
                                ->add('CCode', 'text', array('label' => $translator->trans('Code requested from Email')))->add('email', 'email')->getForm();
                return new Response($this->renderView('AevitasLevisBundle:Front:checkEmailForgotPassword.html.twig', array('form' => $changePassword->createView())));
            } else {
                $this->getRequest()->getSession()->getFlashBag()->add('notice_enroll', $this->get('translator')->trans('This registration code is invalid!'));
            }
        }
        return array('form' => $form->createView());
    }

    /**
     * @Route("/change/password.{_format}", name="levis_home_change_password", defaults={"_format"="json"})
     */
    public function changePasswordAction() {
        $request = $this->getRequest();
        $session = $this->get('session');
        $user = new User();
        $user->setCCode('');
        $form = $this->createFormBuilder($user)->add('plainPassword', 'repeated', array('required' => true, 'type' => 'password'))
                        ->add('CCode', 'text', array('attr' => array('placeholder' => $this->get('translator')->trans('Copy your verification code over here'))))->add('email', 'email')->getForm();
        if ('POST' == $request->getMethod()) {
            $form->bind($request);
            $userManager = $this->get('fos_user.user_manager');
            if ($form->isValid() && $session->get('changepass') == $user->getCCode()) {
                $changingUser = $userManager->findUserByUsername($user->getEmail());
                $changingUser->setPlainPassword($user->getPlainPassword());
                $userManager->updateUser($changingUser);
                $session->remove('changepass');
                return new Response(json_encode(array('status' => true)));
            }
        }
        exit(json_encode(array('status' => false)));
    }

    /**
     * @Route("/_proxy/rendertopmenu/{route}", name="render_top_menu", defaults={"route"="_welcome"})
     */
    public function renderTopMenuAction($route) {
        return new Response($this->renderView('AevitasLevisBundle:Front:topmenu.html.twig', array('route' => $route)));
    }

    /**
     * @Route("/set/referral/{ref}.{_format}", name="front_set_ref", defaults={"_format"="json"})
     */
    public function setReferralAction($ref, $_format) {
        $session = $this->get('session');
        $session->set('ref', $ref);
        exit(json_encode(array('status' => 1)));
    }

}
