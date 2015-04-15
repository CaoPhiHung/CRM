<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegistrationController
 *
 * @author paulaan
 */

namespace Vietland\UserBundle\Controller;

use FOS\UserBundle\Controller\RegistrationController as BaseController;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Event\UserEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;

class RegistrationController extends BaseController {

    public function registerAction(Request $request) {
        /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->container->get('fos_user.registration.form.factory');
        /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
        $userManager = $this->container->get('fos_user.user_manager');
        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->container->get('event_dispatcher');

        $user = $userManager->createUser();
        $user->setEnabled(true);

        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, new UserEvent($user, $request));
        $session = $this->container->get('session');
        if ($session->get('ref'))
            $user->setRef((int)$session->get('ref'));
        $form = $formFactory->createForm();
        $form->setData($user);

        if ('POST' === $request->getMethod()) {
            $form->bind($request);
            
            if ($form->isValid()) {
                $event = new FormEvent($form, $request);
                $dispatcher->dispatch(FOSUserEvents::REGISTRATION_SUCCESS, $event);
                $user->setLang($request->getLocale());
                $userManager->updateUser($user);

                if (null === $response = $event->getResponse()) {
                    $url = $this->container->get('router')->generate('fos_user_registration_confirmed');
                    $response = new RedirectResponse($url);
                }

                $dispatcher->dispatch(FOSUserEvents::REGISTRATION_COMPLETED, new FilterUserResponseEvent($user, $request, $response));

                return $response;
            }
        }

        return $this->container->get('templating')->renderResponse('VietlandUserBundle:Registration:register.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    /**
     * Tell the user his account is now confirmed
     */
    public function confirmedAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $message = \Swift_Message::newInstance()
                ->setSubject($this->container->get('translator')->trans('You received an invitation to Atipso'))
                ->setFrom('crm@thanbacgroup.com', 'Thanh Bac Fashion')
                /*                         ->setReplyTo('getsocial@atipso.com', 'Atipso Team') */
                ->setTo($user->getEmail())
                ->setBody($this->container->get('templating')->renderResponse(':mail:' . 'confirmed' . '.html.twig', array('friend' => $user->getUsername())), 'text/html', 'utf8');
        $this->container->get('mailer')->send($message);
        return $this->container->get('templating')->renderResponse('VietlandUserBundle:Registration:confirmed.html.twig', array(
                    'user' => $user,
        ));
    }

}