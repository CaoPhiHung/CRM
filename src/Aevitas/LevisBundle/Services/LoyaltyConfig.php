<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoyaltyConfig
 *
 * @author truongld
 */

namespace Aevitas\LevisBundle\Services;

class LoyaltyConfig {
    
    private $actions;
    private $locale;
    private $cdn;
    private $secret;
    private $smsclient;
    private $smspassword;
    private $baserate;
    private $smsactions;

    public function __construct($actions, $locale, $smsactions, $secret, $smsclient, $smspassword, $baserate){
        $this->actions = $actions;
        $this->locale = $locale;
        $this->secret = $secret;
        $this->smsclient = $smsclient;
        $this->smspassword = $smspassword;
        $this->baserate = $baserate;
        $this->smsactions = $smsactions;
    }
    
    public function getActions(){
        return $this->actions;
    }
    
    public function getLocale(){
        return $this->locale;
    }
    
    public function getSmsactions(){
        return $this->smsactions;
    }
    
    public function getSecret(){
        return $this->secret;
    }
    
    public function getSmsclient(){
        return $this->smsclient;
    }
    
    public function getSmspassword(){
        return $this->smspassword;
    }
    
    public function getBaseRate(){
        return $this->baserate;
    }
}