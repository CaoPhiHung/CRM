<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FacebookAuthentication
 *
 * @author apple
 */

namespace Vietland\UserBundle\Security\User\Handler;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

class FacebookAuthenticationHandler implements AuthenticationSuccessHandlerInterface, AuthenticationFailureHandlerInterface {

    private $router;
    private $pointrule;

    public function __construct(Router $router, $pointrule) {
        $this->router = $router;
        $this->pointrule = $pointrule;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token) {
        if ($request->isXmlHttpRequest()) {
            $user = $token->getUser();
            $numberFields = count($user->getEditedFields());
            $editedFields = count(array_filter($user->getEditedFields()));
            $points = $user->getUpdatedPoints($this->pointrule->getPointConfig());
            $dm = $this->pointrule->getDm();
            $dm->persist($user);
            $dm->flush();
            if (($numberFields - $editedFields) > 4)
                $location = $this->router->generate('levis_home_register_online_step2', array('_format' => 'html'));
            else
                $location = $this->router->generate('levis_user_dashboard');
            $response = new Response(json_encode(array('username' => $user->getUsername(), 'fbid' => $user->getFbid(), 'location' => $location)));
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception) {
        if ($request->isXmlHttpRequest()) {
            // Handle XHR here
        } else {
            // Create a flash message with the authentication error message
            $request->getSession()->setFlash('error', $exception->getMessage());
            $url = $this->router->generate('user_login');

            return new RedirectResponse($url);
        }
    }

}