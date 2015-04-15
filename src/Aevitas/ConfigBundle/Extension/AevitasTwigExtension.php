<?php

namespace Aevitas\ConfigBundle\Extension;

use Symfony\Component\DependencyInjection\Container;
use Twig_Extension_Debug;
#use Twig_Extensions_Extension_Text;
use Twig_Environment;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\SecurityContext;

class AevitasTwigExtension extends \Twig_Extension implements EventSubscriberInterface {

    private $defaultLocale;
    private $session;
    private $praddress1;
    private $prdob;
    private $prcity;
    private $prdistrict;
    private $prfirstname;
    private $prlastname;
    private $prsex;
    private $prkids;
    private $prmari;
    private $procpu;
    private $princo;
    private $pranni;
    private $baserate;
    private $currentLocale;
    private $request;
    private $csrf;
    private $container;
    private $categories;

    public function __construct($container, $prdob, $prc, $prd, $prf, $prl, $prs, $prk, $prm, $pro, $pri, $pra, $prad, $baserate, $categories, $defaultLocale = 'en') {
        $this->container = $container;
        $this->session = $this->container->get('session');
        $this->csrf = $this->container->get('form.csrf_provider');
        $this->defaultLocale = $defaultLocale;
        $this->prdob = $prdob;
        $this->prcity = $prc;
        $this->prdistrict = $prd;
        $this->prfirstname = $prf;
        $this->prlastname = $prl;
        $this->prkids = $prk;
        $this->prsex = $prs;
        $this->prmari = $prm;
        $this->procpu = $pro;
        $this->princo = $pri;
        $this->pranni = $pra;
        $this->praddress1 = $prad;
        $this->baserate = $baserate;
        $this->categories = $categories;
    }

    public function getFilters() {
        return array(
            new \Twig_SimpleFilter('price', array($this, 'priceFilter')),
            new \Twig_SimpleFilter('currencylist', array($this, 'currencyList')),
            new \Twig_SimpleFilter('dateconvert', array($this, 'myDateConvert')),
        );
    }

    public function priceFilter($price) {
        if ($this->session->get('currency') == 'USD')
            return (floor(((float) $price / $this->usd_rate) * 100)) / 100;
        else if ($this->session->get('currency') == 'EURO')
            return (floor(((float) $price / $this->euro_rate) * 100)) / 100;
        else
            return (float) $price;
    }

    public function myDateConvert($val) {
        $TimeY = floor($val / (31 * 12));
        $val -= $TimeY * (31 * 12);
        $TimeM = floor($val / 31);
        $TimeD = $val - $TimeM * 31;
        if ($TimeD == 0) {
            $TimeD = 31;
            $TimeM -= 1;
        }
        return ((($TimeD < 10) ? '0' : '') . $TimeD . '/' . (($TimeM < 10) ? '0' : '') . $TimeM . '/' . ($TimeY + 2013));
    }

    public function getUsdRate() {
        return $this->usd_rate;
    }

    public function currencyList() {
        return '<ul class="' . strtolower($this->current_currency) . '"><li class="vnd"><a href="' . $this->router->generate('change_currency', array('currency' => 'VND')) . '">VND</a></li><li class="usd"><a href="' . $this->router->generate('change_currency', array('currency' => 'USD')) . '">USD</a></li><li class="euro"><a href="' . $this->router->generate('change_currency', array('currency' => 'EURO')) . '">EURO</a></li></ul>';
    }

    public function currency() {
        $currencies = array('VND' => 'đ', 'USD' => '$', 'EURO' => '€');
        return $currencies[$this->current_currency];
    }

    public function getFunctions() {
        return array(
            'localize' => new \Twig_Function_Method($this, 'localize'),
            'loginpanel' => new \Twig_Function_Method($this, 'loginpanel'),
            'pointsConfig' => new \Twig_Function_Method($this, 'pointsConfig'),
            'giftmenu' => new \Twig_Function_Method($this, 'giftmenu'),
            'topmenureward' => new \Twig_Function_Method($this, 'topmenureward'),
        );
    }

    public function getCurrentLocale() {
        
    }

    public function localize() {
        return $this->container->get('templating')->render('AevitasConfigBundle:Localize:localize.html.twig', array('current' => $this->getCurrentLocale()));
    }

    public function loginpanel() {
        /* @var $request \Symfony\Component\HttpFoundation\Request */
        $session = $this->session;
        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContext::LAST_USERNAME);

        $csrfToken = $this->csrf->generateCsrfToken('authenticate');
//        exit(get_class($this->container->get('templating')));
        return $this->container->get('templating')->render('AevitasConfigBundle:Localize:toppanel.html.twig', array(
                    'last_username' => $lastUsername,
                    'csrf_token' => $csrfToken,
                    'routing' => $this->request->get('_route'),
                    'params' => $this->request->get('_route_params'),
                    'locale' => $this->currentLocale
        ));
    }

    public function giftmenu() {
        return $this->container->get('templating')->render('AevitasConfigBundle:Categories:menu.html.twig', array(
                    'categories' => $this->categories
        ));
    }

    public function topmenureward() {
        return $this->container->get('templating')->render('AevitasConfigBundle:Categories:topmenureward.html.twig', array(
                    'categories' => $this->categories
        ));
    }

    public function getPointConfig() {
        return array(
            'city' => $this->prcity,
            'dob' => $this->prdob,
            'address1' => $this->praddress1,
            'district' => $this->prdistrict,
            'firstname' => $this->prfirstname,
            'lastname' => $this->prlastname,
            'kids' => $this->prkids,
            'sex' => $this->prsex,
            'mari' => $this->prmari,
            'inco' => $this->princo,
            'ocpu' => $this->procpu,
            'anni' => $this->pranni
        );
    }

    public function pointsConfig() {
        return $this->container->get('templating')->render('AevitasConfigBundle:Config:points.html.twig', array(
                    'city' => $this->prcity,
                    'dob' => $this->prdob,
                    'address1' => $this->praddress1,
                    'district' => $this->prdistrict,
                    'firstname' => $this->prfirstname,
                    'lastname' => $this->prlastname,
                    'kids' => $this->prkids,
                    'sex' => $this->prsex,
                    'mari' => $this->prmari,
                    'inco' => $this->princo,
                    'ocpu' => $this->procpu,
                    'anni' => $this->pranni
        ));
    }

    public function getName() {
        return 'aevitas_twig';
    }

    public function onKernelRequest(GetResponseEvent $event) {
        $request = $event->getRequest();
        $this->request = $request;
        $locale = $request->query->get('_locale');
        if (is_null($locale)) {
            $locale = $this->session->get('locale');

            if (is_null($locale))
                $this->currentLocale = $this->defaultLocale;
            else
                $this->currentLocale = $locale;
        } else {
            $this->currentLocale = $locale;
        }

        $this->session->set('locale', $this->currentLocale);
        $request->setLocale($this->currentLocale);
        $token = $this->container->get('security.context')->getToken();
        if (is_object($token))
            $user = $token->getUser();
        else $user = null;
        if (is_object($user)) {
            if ($this->currentLocale != $user->getLang()) {
                $user->setLang($this->currentLocale);
                $dm = $this->container->get('doctrine.odm.mongodb.document_manager');
                $dm->persist($user);
                $dm->flush();
            }
        }
        return;
    }

    static public function getSubscribedEvents() {
        return array(
            // must be registered before the default Locale listener
            KernelEvents::REQUEST => array(array('onKernelRequest', 17)),
        );
    }

}
