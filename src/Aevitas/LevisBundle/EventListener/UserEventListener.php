<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserEventListener
 *
 * @author truongld
 */

namespace Aevitas\LevisBundle\EventListener;

class UserEventListener {
    
    protected $mailer;
    protected $dm;
    protected $security_context;
    protected $templating;

    public function __construct($mailer, $dm, $security_context, $templating){
        $this->mailer = $mailer;
        $this->dm = $dm;
        $this->security_context = $security_context;
        $this->templating = $templating;
    }

    public function onMethod($event){
        
        switch ($event->getAction()){
            case 'login': $event->prelaunch($this->mailer, $this->dm, $this->security_context, $this->templating);break;
            case 'user_buy_report':$event->prelaunch();break;
            default: return;
        }
        $event->launch();
    }
}