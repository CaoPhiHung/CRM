<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StaticController
 *
 * @author paulaan
 */

namespace Aevitas\LevisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class StaticController extends Controller {

    /**
     * @Route("/storelocation.html", name="levis_store_location")
     * @Template()
     */
    public function storeLocationAction() {
        return array();
    }

    /**
     * @Route("/membership_tier.html", name="levis_member_tier")
     * @Template()
     */
    public function memberTierAction() {
        return array();
    }

    /**
     * @Route("/contact_us.html", name="levis_contact_us")
     * @Template()
     */
    public function contactUsAction() {
        return array();
    }

    /**
     * @Route("/faq.html", name="levis_faq")
     * @Template()
     */
    public function faqAction() {
        return array();
    }

    /**
     * @Route("/{locale}/termofuse.html", name="term_of_use")
     */
    public function termAction($locale) {
        return new Response($this->renderView('AevitasLevisBundle:Static:term.' . $locale . '.html.twig'));
    }
    
    /**
     * @Route("/{locale}/policy.html", name="privacy_policy")
     */
    public function policyAction($locale){
        return new Response($this->renderView('AevitasLevisBundle:Static:policy.' . $locale . '.html.twig'));
    }
    
    /**
     * @Route("/{locale}/aboutus.html", name="about_us")
     */
    public function aboutUsAction($locale){
        return new Response($this->renderView('AevitasLevisBundle:Static:aboutUs.'.$locale.'.html.twig'));
    }
    
    /**
     * @Route("/{locale}/brands.html", name="about_brands")
     */
    public function brandsAction($locale){
        return new Response($this->renderView('AevitasLevisBundle:Static:brands.html.twig'));
    }

    /**
     * @Route("/vipday", name="vip_day")
     */
    public function landingpageAction(){
        return new Response($this->renderView('AevitasLevisBundle:Static:landingpage.html.twig'));
    }

}