<?php

namespace Vietland\UserBundle\Service;

use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;

class LogoutSuccessHandler implements LogoutSuccessHandlerInterface {

    protected $router;
    protected $host;

    public function __construct(Router $router) {
        $this->router = $router;
    }

    public function onLogoutSuccess(Request $request) {
        // redirect the user to where they were before the login process begun. 
        $securityContext = $request->getSession()->get('_security_main');
        $request->getSession()->invalidate();
        if (is_object(unserialize($securityContext)))
            $username = unserialize($securityContext)->getUser()->getUsername();
        $signout = $this->router->generate('_vietland_signout', array('username' => $username));
        $response = new RedirectResponse($signout);
        
        //clear cache homepage and login panel
        $homepage = $this->router->generate('levis_homepage_index', array(), true);
        $login = $this->router->generate('render_login', array(), true);
        $topmenu = $this->router->generate('render_top_menu',array(),true);
//        preg_match('/\/\/(?<domain>[^\/]+)\//i', $login,$domain);
//        if (isset($domain['domain'])){
//                $login = str_replace($domain['domain'], '127.0.0.1', $login);
//                $homepage = str_replace($domain['domain'], '127.0.0.1', $homepage);
//                $topmenu = str_replace($domain['domain'], '127.0.0.1', $topmenu);
//        }
        $context = stream_context_create(array('http' => array('method' => 'PURGE')));
        $streamHome = fopen($homepage, 'r', false, $context);
        fclose($streamHome);
        $streamLogin = fopen($login, 'r', false, $context);
        fclose($streamLogin);
        $streamMenu = fopen($topmenu, 'r', false, $context);
        fclose($streamMenu);
        return $response;
    }

}