<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginFailureHandler
 *
 * @author paulaan
 */

namespace Vietland\UserBundle\Service;

use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;

class LoginFailureHandler implements AuthenticationFailureHandlerInterface {

    private $session;
    private $router;

    public function __construct($router, $session) {
        $this->router = $router;
        $this->session = $session;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception) {
        $locate = $request->get('locate');
        $request->getSession()->getFlashBag()->add('notice', 'Your email or password is invalid!');
        if ('homepage' == $locate) {
            return new RedirectResponse($this->router->generate('levis_homepage_login'));
        }
        else
            return new RedirectResponse('/login');
    }

}
