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
use Aevitas\LevisBundle\Form\FormRegistrationStep2;
use Aevitas\LevisBundle\Form\FormRegistrationStep3;
use Vietland\AevitasBundle\Document\Anniversary;
use Vietland\AevitasBundle\Form\AnniversaryFormType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Vietland\AevitasBundle\Controller\AevitasController;
use Vietland\UserBundle\Form\Type\DashboardProfileFormType;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use Vietland\AevitasBundle\Helper\Pagination;
use Vietland\UserBundle\Document\UserLog;

class DashboardController extends AevitasController {

    /**
     * @Route("/cpanel", name="levis_user_dashboard")
     * @Template()
     * @Secure(roles="ROLE_USER")
     */
    public function dashboardAction() {
        $user = $this->get('security.context')->getToken()->getUser();
        if ($user->hasRole('ROLE_STAFF'))
            return new RedirectResponse('/');
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $wishlist = $user->getWishlist($dm);
        $clocks = array();
        $already = false;
        $userWishlistIds = $user->getWishlistIds();
        if (!empty($userWishlistIds))
            $giftover = $dm->createQueryBuilder('AevitasLevisBundle:GiftArticle')
                            ->field('id')->notIn($user->getWishlistIds())
                            ->field('point')->gt($user->getPoint())
                            ->sort('point', 'asc')->limit(3)->skip(0)
                            ->getQuery()->execute();
        else
            $giftover = $dm->createQueryBuilder('AevitasLevisBundle:GiftArticle')
                            ->field('point')->gt($user->getPoint())
                            ->sort('point', 'asc')->limit(3)->skip(0)
                            ->getQuery()->execute();
        if (!$giftover->count()) {
            $giftover = $dm->createQueryBuilder('AevitasLevisBundle:GiftArticle')
                            ->field('point')->lt($user->getPoint())
                            ->sort('point', 'asc')->limit(3)->skip(0)
                            ->getQuery()->execute();
        }
        $nextPoint = $this->get('point.rule')->getPointForNextLevel($user->getQualifyPoint());
        if (count($giftover->toArray())) {
            foreach ($wishlist as $w) {
                if ($user->getPoint() < $w->getPoint() && count($clocks) < 2) {
                    $clocks[] = $w;
                }
            }
            if (count($wishlist) < 3) {
                foreach ($giftover as $g) {
                    if (count($clocks) < 3)
                        $clocks[] = $g;
                }
            }
        } else {
            foreach ($wishlist as $w) {
                $clocks[] = $w;
            }
        }

        return array('user' => $user, 'nextlevel' => $nextPoint, 'wishlist' => $wishlist, 'clocks' => $clocks);
    }

    /**
     * @Route("/cpanel/extended/profile", name="levis_user_extended_profile")
     * @Template("AevitasLevisBundle:DashBoard:extendprofile.html.twig")
     * @Secure(roles="ROLE_USER")
     */
    public function profileExtendedAction() {
        $user = $this->get('security.context')->getToken()->getUser();
        if ($user->hasRole('ROLE_STAFF'))
            return new RedirectResponse('/');
        $form = $this->createForm(new FormRegistrationStep3($this->get('translator')), $user);
        $request = $this->getRequest();
        $dm = $this->get('database_manager');
        if ('POST' == $request->getMethod()) {
            $form->bind($request);
            if ($form->isValid()) {
                $points = $user->getUpdatedPoints($this->get('point.rule')->getPointConfig());
                $dm->persist($user);
                $dm->flush();
                if ('json' == $_format) {
                    exit(json_encode(array('points' => $points, 'points' => $points)));
                }
            } else {
                $this->get('session')->getFlashBag()->add('notice', $this->get('translator')->trans($form->getErrorsAsString()));
            }
        }
        $anniForms = '';
        foreach ($user->getAnniversary() as $anni) {
            $forms = $this->createForm(new AnniversaryFormType($this->get('translator')), $anni);
            $anniForms .= $this->renderView('AevitasLevisBundle:Front:registerAddAnniversary.html.twig', array('form' => $forms->createView()));
        }
        return new Response($this->renderView("AevitasLevisBundle:Dashboard:extendprofile.html.twig", array('form' => $form->createView(), 'user' => $user, 'anniversaries' => $anniForms)));
    }

    /**
     * @Route("/cpanel/profile", name="levis_user_profile")
     * @Template()
     * @Secure(roles="ROLE_USER")
     */
    public function profileAction() {
        $user = $this->get('security.context')->getToken()->getUser();
        if ($user->hasRole('ROLE_STAFF'))
            return new RedirectResponse('/');
        $user->setEditing(true);
        $request = $this->getRequest();
        /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->container->get('fos_user.profile.form.factory');
        /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
        $userManager = $this->container->get('fos_user.user_manager');
        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->container->get('event_dispatcher');

        $form = $formFactory->createForm();
        $form->setData($user);

        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_INITIALIZE, $event);

        if ('POST' === $request->getMethod()) {
            $form->bind($request);
            if ($form->isValid()) {
                /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
                $userManager = $this->container->get('fos_user.user_manager');
                $event = new FormEvent($form, $request);
                $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_SUCCESS, $event);

                $userManager->updateUser($user);
                if (null === $response = $event->getResponse()) {
                    $url = $this->container->get('router')->generate('levis_user_profile');
                    $response = new RedirectResponse($url);
                }

                $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_COMPLETED, new FilterUserResponseEvent($user, $request, $response));

                //$dispatcher->dispatch('')

                return $response;
            } else {
            }
        }
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $cities = $dm->getRepository('VietlandAevitasBundle:City')->findAll();
        return array('user' => $user, 'form' => $form->createView(), 'cities' => $cities);
    }

    /**
     * @Route("/cpanel/activity", name="levis_user_activity")
     * @Template()
     * @Secure(roles="ROLE_USER")
     */
    public function profileActivityAction() {
        $user = $this->get('security.context')->getToken()->getUser();
        if ($user->hasRole('ROLE_STAFF'))
            return new RedirectResponse('/');
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $repo = $dm->getRepository('VietlandUserBundle:UserLog');
        $request = $this->getRequest();
        $limit = $request->get('limit');
        $page = $request->get('page');
        $logs = $repo->findPage($user->getId(), $page, $limit);
        $pagination = new Pagination($page, $repo->getCount(), $this->get('router')->generate('levis_user_activity'), $limit);
        return array('logs' => $logs, 'user' => $user, 'pagination' => $pagination->getView($this));
    }

    /**
     * @Route("/cpanel/shopping", name="levis_user_shopping")
     * @Template()
     * @Secure(roles="ROLE_USER")
     */
    public function shoppingHistoryAction() {
        $user = $this->get('security.context')->getToken()->getUser();
        if ($user->hasRole('ROLE_STAFF'))
            return new RedirectResponse('/');
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $repo = $dm->getRepository('VietlandUserBundle:UserLog');
        $request = $this->getRequest();
        $limit = $request->get('limit');
        $page = $request->get('page');
        $logs = $repo->findLastOrder($user->getId(), $page, $limit);
        $pagination = new Pagination($page, $repo->getCount(), $this->get('router')->generate('levis_user_activity'), $limit);
        return array('logs' => $logs, 'user' => $user, 'pagination' => $pagination->getView($this));
    }

    /**
     * @Route("/cpanel/update/avatar/index.{_format}", name="levis_user_update_avatar", defaults={"_format"="html"})
     * @Secure(roles="ROLE_USER")
     */
    public function updateAvatarAction() {
        $request = $this->getRequest();
        $avatar = $request->get('avatar');
        if ('POST' == $request->getMethod() && '' != $avatar) {
            $user = $this->get('security.context')->getToken()->getUser();
            $user->setAvatar($avatar);
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $dm->persist($user);
            $dm->flush();
            exit(json_encode(array('src' => '/' . $user->getAvatar())));
        }
    }

    /**
     * @Route("/crop/avatar", name="dashboard_crop_avatar")
     * @Secure(roles="ROLE_USER")
     */
    public function cropAvatar() {
        $user = $this->get('security.context')->getToken()->getUser();
        $request = $this->getRequest();
        $data = $request->request->all();
        $width = $data['img_width'];
        $height = $data['img_height'];
        $x = $data['source_x'];
        $y = $data['source_y'];
        $avatar = $user->cropAvatar($width, $height, $x, $y);
        exit(json_encode(array('src' => $avatar)));
    }

    /**
     * @Route("/survey/answerone", name="home_answer_1")
     */
    public function answerOneAction() {
        $user = $this->get('security.context')->getToken()->getUser();
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $request = $this->getRequest();
        $ans1 = array_filter($request->get('ans1'));

        if (count($ans1) == 3) {
            if (!is_string($user->getAns1())) {
                $user->earnNonQualifyPoints(40);
                $uLog = new \Vietland\UserBundle\Document\UserLog();
                $uLog->setUser($user)->setSubject('question_1')->setAction('surveyed')->setPoint(40);
                $dm->persist($uLog);
                $message = $this->get('translator')->trans('You got 40 points');
                $points = 40;
            } else {
                $points = 0;
                $message = $this->get('translator')->trans('Already got this point');
            }
            $user->setAns1(implode('|', $ans1));
            $dm->persist($user);
            $dm->flush();
            return new Response(json_encode(array('status' => true, 'message' => $message, 'points' => $points)));
        } else
            return new Response(json_encode(array('status' => false, 'message' => $this->get('translator')->trans('Make sure your data in 3 fields are valid'))));
    }

    /**
     * @Route("/survey/answertwo", name="home_answer_2")
     */
    public function answerTwoAction() {
        $user = $this->get('security.context')->getToken()->getUser();
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $request = $this->getRequest();
        $ans2 = $request->get('ans2');
        if (!empty($ans2)) {
            if (count($user->getAns2()) == 0) {
                $user->earnNonQualifyPoints(40);
                $uLog = new \Vietland\UserBundle\Document\UserLog();
                $uLog->setUser($user)->setSubject('question_2')->setAction('surveyed')->setPoint(40);
                $dm->persist($uLog);
                $message = $this->get('translator')->trans('You got 40 points');
                $points = 40;
            } else {
                $points = 0;
                $message = $this->get('translator')->trans('Already got this point');
            }
            $user->setAns2($ans2);
            $dm->persist($user);
            $dm->flush();
            return new Response(json_encode(array('status' => true, 'message' => $message, 'points' => $points)));
        } else
            return new Response(json_encode(array('status' => false, 'message' => $this->get('translator')->trans('You should refresh this page'))));
    }

    /**
     * @Route("/survey/answerthree", name="home_answer_3")
     */
    public function answerThreeAction() {

        $user = $this->get('security.context')->getToken()->getUser();
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $request = $this->getRequest();
        $ans3 = array_filter($request->get('ans3'));
        if (count($ans3) > 1) {
            if (count($user->getAns3()) == 0) {
                $user->earnNonQualifyPoints(40);
                $uLog = new \Vietland\UserBundle\Document\UserLog();
                $uLog->setUser($user)->setSubject('question_3')->setAction('surveyed')->setPoint(40);
                $dm->persist($uLog);
                $message = $this->get('translator')->trans('You got 40 points');
                $points = 40;
            } else {
                $points = 0;
                $message = $this->get('translator')->trans('Already got this point');
            }
            $user->setAns3($ans3);
            $dm->persist($user);
            $dm->flush();
            return new Response(json_encode(array('status' => true, 'message' => $message, 'points' => $points)));
        } else
            return new Response(json_encode(array('status' => false, 'message' => $this->get('translator')->trans('At least you have to enter 2 fields.'))));
    }

    /**
     * @Route("/survey/answerfour", name="home_answer_4")
     */
    public function answerFourAction() {

        $user = $this->get('security.context')->getToken()->getUser();
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $request = $this->getRequest();
        $ans4 = ($request->get('ans4'));
        if ("" != $ans4) {
            if (!is_string($user->getAns4())) {
                $user->earnNonQualifyPoints(40);
                $uLog = new \Vietland\UserBundle\Document\UserLog();
                $uLog->setUser($user)->setSubject('question_4')->setAction('surveyed')->setPoint(40);
                $dm->persist($uLog);
                $message = $this->get('translator')->trans('You got 40 points');
                $points = 40;
            } else {
                $points = 0;
                $message = $this->get('translator')->trans('Already got this point');
            }
            $user->setAns4($ans4);
            $dm->persist($user);
            $dm->flush();
            return new Response(json_encode(array('status' => true, 'message' => $message, 'points' => $points)));
        } else
            return new Response(json_encode(array('status' => false, 'message' => $this->get('translator')->trans('You should refresh this page'))));
    }

    /**
     * @Route("/survey/answerfive", name="home_answer_5")
     */
    public function answerFiveAction() {

        $user = $this->get('security.context')->getToken()->getUser();
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $request = $this->getRequest();
        $ans5 = ($request->get('ans5'));
        if ("" != $ans5) {
            if (!is_string($user->getAns5())) {
                $user->earnNonQualifyPoints(40);
                $uLog = new \Vietland\UserBundle\Document\UserLog();
                $uLog->setUser($user)->setSubject('question_5')->setAction('surveyed')->setPoint(40);
                $dm->persist($uLog);
                $this->get('translator')->trans('You got 40 points');
                $points = 40;
            } else {
                $points = 0;
                $message = $this->get('translator')->trans('Already got this point');
            }
            $user->setAns5($ans5);
            $dm->persist($user);
            $dm->flush();
            return new Response(json_encode(array('status' => true, 'message' => $message, 'points' => $points)));
        } else
            return new Response(json_encode(array('status' => false, 'message' => $this->get('translator')->trans('You should refresh this page'))));
    }

    /**
     * @Route("/survey/answersix", name="home_answer_6")
     */
    public function answerSixAction() {

        $user = $this->get('security.context')->getToken()->getUser();
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $request = $this->getRequest();
        $ans6 = array_filter($request->get('ans6'));
        if (count($ans6) > 2) {
            if (!is_string($user->getAns6())) {
                $user->earnNonQualifyPoints(40);
                $uLog = new \Vietland\UserBundle\Document\UserLog();
                $uLog->setUser($user)->setSubject('question_6')->setAction('surveyed')->setPoint(40);
                $dm->persist($uLog);
                $message = $this->get('translator')->trans('You got 40 points');
                $points = 40;
            } else {
                $points = 0;
                $message = $this->get('translator')->trans('Already got this point');
            }
            $user->setAns6(implode('|', $ans6));
            $dm->persist($user);
            $dm->flush();
            return new Response(json_encode(array('status' => true, 'message' => $message, 'points' => $points)));
        } else
            return new Response(json_encode(array('status' => false, 'message' => $this->get('translator')->trans('At least 3 field for this question should be filled up'))));
    }

    /**
     * @Route("/survey/answerseven", name="home_answer_7")
     */
    public function answerSevenAction() {

        $user = $this->get('security.context')->getToken()->getUser();
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $request = $this->getRequest();
        $ans7 = array_filter($request->get('ans7'));
        if (count($ans7) >= 1) {
            if (strlen($user->getAns7()) == 0) {
                $user->earnNonQualifyPoints(60);
                $uLog = new \Vietland\UserBundle\Document\UserLog();
                $uLog->setUser($user)->setSubject('question_7')->setAction('surveyed')->setPoint(60);
                $dm->persist($uLog);
                $message = $this->get('translator')->trans('You got 60 points');
                $points = 60;
            } else {
                $points = 0;
                $message = $this->get('translator')->trans('Already got this point');
            }
            $user->setAns7(implode('|', $ans7));
            $dm->persist($user);
            $dm->flush();
            return new Response(json_encode(array('status' => true, 'message' => $message, 'points' => $points)));
        } else
            return new Response(json_encode(array('status' => false, 'message' => $this->get('translator')->trans('Data is not good enough'))));
    }

    /**
     * @Route("/savetrippledate.{_format}", name="dash_save_trippledate", defaults={"_format"="json"})
     * @Secure(roles="ROLE_USER")
     */
    public function saveTripleDateAction($_format) {
        $dm = $this->get('database_manager');
        $user = $this->get('security.context')->getToken()->getUser();
        $request = $this->getRequest();
        $date = new \Aevitas\LevisBundle\Document\TrippleDate();
        $form = $this->createFormBuilder($date)->add('date', 'text')->add('id', 'hidden')->getForm();
        $form->bind($request);
        if ($form->isValid()) {
            try {
                $success = $user->saveTripleDate($date);
                $dm->persist($user);
                $dm->flush();
                exit(json_encode(array('status' => true, 'id' => $date->getId())));
            } catch (\Exception $e) {
                exit(json_encode(array('status' => false, 'message' => $e->getMessage())));
            }
        } else
            exit(json_encode(array('message' => $form->getErrorsAsString())));
    }

    /**
     * @Route("/_proxy/render_triple_dates/{id}", name="render_triple_date")
     */
    public function renderTripleDatesAction($id) {
        $user = $this->get('security.context')->getToken()->getUser();
        if ((int) $id != $user->getId()) {
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $user = $dm->getRepository('VietlandUserBundle:User')->find((int) $id);
        }
        $tripleForm = '';
        $tripleDates = $user->getTripleDate();
        foreach ($tripleDates as $date) {
            $form = $this->createFormBuilder($date)->add('date', 'text', array('attr' => array('class' => 'unedit' . (string) $date->isEditable())))->add('id', 'hidden')->getForm();
            $tripleForm .= $this->renderView('AevitasLevisBundle:Front:trippledate.html.twig', array('form' => $form->createView()));
        }
        return new Response($tripleForm);
    }

    /**
     * @Route("/history/statement", name="cpanel_statement")
     * @Secure(roles="ROLE_USER")
     */
    public function userStatementAction() {
        $request = $this->getRequest();
        $user = $this->get('security.context')->getToken()->getUser();
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $now = new \DateTime('now');
        $end = $now->format('Y-m-d');
        $start = $user->getJoined();
        $queryBuilder = $dm->createQueryBuilder("VietlandUserBundle:UserLog")
                        ->field('uid')->equals((int) $user->getId())
                        ->field('created')->lt(new \DateTime($end . ' 23:59:59'))
                        ->field('created')->gt(new \DateTime($start))
                        ->field('created')->sort('desc');
        $logs = $queryBuilder->getQuery()->execute();
        /* foreach ($logs as $log){
          echo $log->getUid().' , '.$log->getCreated()->format('h:i:s d/m/Y').', '.$log->getAction().', '.$log->getPoint();
          echo '<br/>';
          }
          exit;/* */
        $index = 6;
        $point = $user->getPoint();
        $excelService = $this->get('xls.service_xls5');
        $excelService->excelObj->getProperties()->setCreator("Vietland JSC")
                ->setLastModifiedBy("Vietland JSC")
                ->setTitle("Vietland JSC exports report for Levis")
                ->setSubject("Customer Report")
                ->setDescription("This document helps marketing operator make decission accordingly on users statistic.")
                ->setKeywords("office 2005 openxml php")
                ->setCategory("Test result file");
        $styleArray = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => 'ff0000')
            )
        );
        $cityArr = array();
        $districtArr = array();
        $cities = $dm->getRepository('VietlandAevitasBundle:City')->findAll();
        $districts = $dm->getRepository('VietlandAevitasBundle:District')->findAll();
        foreach ($cities as $city) {
            $cityArr[$city->getMap()] = $city->getName();
        }
        foreach ($districts as $district) {
            $districtArr[$district->getId()] = $district->getName();
        }

        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A1', 'MEMBER STATEMENT')->getStyle('A1')->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A2', 'Report Date');
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B2', date('Y-m-d'))->getStyle('B2')->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A3', 'Report Period');
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B3', $start . ' / ' . $end)->getStyle('B3')->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A4', 'Customer');
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B4', $user->getName())->getStyle('B4')->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('D4', 'Joined');
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('E4', $user->getJoined())->getStyle('E4')->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('C4', $user->getSexLabel())->getStyle('C4')->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A5', 'Cellphone');
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B5', $user->getCellphone());
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A6', $user->getAddress1());
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A8', 'Card Number')->getStyle('A8')->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B8', $user->getCCode());
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('D8', 'Current Level')->getStyle('B8')->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('E8', $user->getLevel());

        if (strpos($user->getEmail(), '@') !== false) {
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B6', $user->getEmail())->getStyle('B6')->applyFromArray($styleArray);
        }
        if ($user->getDistrict()) {
            $district = $dm->getRepository('VietlandAevitasBundle:District')->find((int) $user->getDistrict());
            if (is_object($district))
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A7', $district->getName());
        }
        if ($user->getCity()) {
            $city = $dm->getRepository('VietlandAevitasBundle:City')->find((int) $user->getCity());
            if (is_object($city))
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B7', $city->getName());
        }

        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A9', 'Total of bill');
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B9', count($logs))->getStyle('B9')->applyFromArray($styleArray);

        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A' . ($index + 4), 'Store')->getStyle('A' . ($index + 4))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B' . ($index + 4), 'Bill Number')->getStyle('B' . ($index + 4))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('C' . ($index + 4), 'TransDate')->getStyle('C' . ($index + 4))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('D' . ($index + 4), 'Action')->getStyle('D' . ($index + 4))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('E' . ($index + 4), 'Cash Memo No')->getStyle('E' . ($index + 4))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('F' . ($index + 4), 'Net Purchase Amount')->getStyle('F' . ($index + 4))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('G' . ($index + 4), 'Point')->getStyle('G' . ($index + 4))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('H' . ($index + 4), 'Current Point')->getStyle('H' . ($index + 4))->applyFromArray($styleArray);
        $prevTime = '';
        $point = 0;
        foreach ($logs as $log) {
            if ($log->getPoint() == null && $log->getSubject() == 0) {
                continue;
            }
            if ($log->getAction() == UserLog::BUYITEM) {
                $schema = $log->getSchema();
                $branch = (isset($schema[0])) ? $schema[0]['BranchName'] : '';
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A' . ($index + 5), $branch);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B' . ($index + 5), isset($schema[0]['BillNo']) ? $schema[0]['BillNo'] : $schema[0]['BillIDNo']);
            } else if ($log->getAction() == UserLog::REDEEM_POINTS) {
                $schema = $log->getSchema();
                if (isset($schema) && isset($schema[0]['BillNo'])) {
                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B' . ($index + 5), $schema[0]['BillNo']);
                } else {
                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B' . ($index + 5), '');
                }
            } else {
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A' . ($index + 5), '');
            }
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('C' . ($index + 5), $log->getCreated()->format('Y-m-d'));
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('C' . ($index + 5), $log->getCreated()->format('Y-m-d'));
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('D' . ($index + 5), $log->getAction());
            if ($log->getAction() == UserLog::BUYITEM) {
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('E' . ($index + 5), $log->getMd5());
            } else {
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('E' . ($index + 5), '');
            }

            if ($log->getAction() == UserLog::BUYITEM) {
                $net = (isset($schema[0])) ? $schema[0]['Amount'] : '';
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('F' . ($index + 5), $net);
            } else {
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('F' . ($index + 5), '');
            }

            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('G' . ($index + 5), $log->getPoint());

            if ($log->getPoint()) {
                $point += (float) $log->getPoint();
            }
            // point
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('H' . ($index + 5), $point);
            $index++;
        }
        $excelService->excelObj->getActiveSheet()->setTitle('Member Statement');
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $excelService->excelObj->setActiveSheetIndex(0);

        //create the response
        $response = $excelService->getResponse();
        $response->headers->set('Content-type', 'application/ms-excel; charset=utf-8');
        $response->headers->set('Content-Disposition', 'attachment; filename="member-statement-report.xls"');

        // If you are using a https connection, you have to set those two headers and use sendHeaders() for compatibility with IE <9
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');
        $response->sendHeaders();
        return $response;
    }

}
