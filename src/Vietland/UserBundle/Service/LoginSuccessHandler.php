<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Vietland\UserBundle\Service;

use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;
use Aevitas\LevisBundle\Event\UserLoginEvent;
use Symfony\Component\Stopwatch\Stopwatch;
use Aevitas\ChannelBundle\Controller\BaseController;

class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface {

    protected $router;
    protected $security;
    protected $dispatcher;
    protected $pointrule;
    protected $usermanager;
    protected $locale;

    public function __construct(Router $router, SecurityContext $security, $dispatcher, $pointrule, $usermanager, $locale) {
        $this->pointrule = $pointrule;
        $this->usermanager = $usermanager;
        $this->router = $router;
        $this->security = $security;
        $this->dispatcher = $dispatcher;
        $this->locale = $locale;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token) {
        $stopwatch = new Stopwatch();
        $stopwatch->start('loginSuccess');
        $logFile="Login_".date('d-m-Y',time());
        $logMessage = "";
        $logFolder= BaseController::LOG_FOLDER;
        ini_set ('user_agent', $_SERVER['HTTP_USER_AGENT']); 
        $context = stream_context_create(array('http' => array('method' => 'PURGE')));
        //$this->dispatcher->dispatch('levis_bundle.user.event', new UserLoginEvent('login', null));
        $user = $this->security->getToken()->getUser();
        if (is_object($user) && $user->getLang())
            $locale = $user->getLang();
        else
            $locale = $this->locale;
        if ($this->pointrule->checkLoyaltyStatusExpired($user)) {
            $this->usermanager->updateUser($user);
        }
        if ($this->security->isGranted('ROLE_SUPER_ADMIN')) {
            $response = new RedirectResponse($this->router->generate('backend_index', array('_locale' => $locale)));
        } elseif ($this->security->isGranted('ROLE_ADMIN')) {
            $response = new RedirectResponse($this->router->generate('backend_index', array('_locale' => $locale)));
            $topsidebar = $this->router->generate('backend_render_topsidebar', array('_locale' => $locale), true);
           //$streamSidebar = fopen($topsidebar, 'r', false, $context);
            //fclose($streamSidebar);
        } elseif ($this->security->isGranted('ROLE_STAFF')) {
            $url = $this->router->generate('store_search_user', array('_locale' => $locale));
            $topsidebar = $this->router->generate('backend_render_topsidebar', array('_locale' => $locale), true);
            $streamSidebar = fopen($topsidebar, 'r', false, $context);
            fclose($streamSidebar);
            $response = new RedirectResponse($url);
        } elseif ($this->security->isGranted('ROLE_USER')) {
            // redirect the user to where they were before the login process begun.
            if (!$user->isPassedBasic()) {
                $url = $this->router->generate('levis_home_register_online_step2', array('_locale' => $locale));
                return new RedirectResponse($url);
            }
            $url = $request->getSession()->get('referrer');
            if ('' == $url)
                $url = $this->router->generate('levis_user_dashboard', array('_locale' => $locale));
            $response = new RedirectResponse($url);
        }
        //clear cache homepage and login panel
        $homepage = $this->router->generate('levis_homepage_index', array('_locale' => $locale), true);
        $login = $this->router->generate('render_login', array('_locale' => $locale), true);
        $topmenu = $this->router->generate('render_top_menu', array('_locale' => $locale), true);
//        preg_match('/\/\/(?<domain>[^\/]+)\//i', $login,$domain);
//        if (isset($domain['domain'])){
//                $login = str_replace($domain['domain'], '127.0.0.1', $login);
//                $homepage = str_replace($domain['domain'], '127.0.0.1', $homepage);
//                $topmenu = str_replace($domain['domain'], '127.0.0.1', $topmenu);
//        }
        $streamHome = fopen($homepage, 'r', false, $context);
        fclose($streamHome);
        $streamLogin = fopen($login, 'r', false, $context);
        fclose($streamLogin);
        $streamMenu = fopen($topmenu, 'r', false, $context);
        fclose($streamMenu);
        $event=$stopwatch->stop('loginSuccess');

        $logMessage.="Login Time -> ".$event->getDuration()." ms";
        $this->logHelper($logFile,$logMessage,$logFolder);

        return $response;
    }

    protected function logHelper($filename, $message, $type = "service")
    {
        echo "$filename : $message \n";
        $message = $message . PHP_EOL;
        $folder = __DIR__ . "/../../../../app/logs/$type";
        $file = "$folder/$filename.txt";

        system("mkdir -p $folder");

        if (!file_exists($file)) {
            system("sudo touch $file");
            system("sudo chmod a+w $file");
        }

        file_put_contents($file, $message, FILE_APPEND);
    }

}