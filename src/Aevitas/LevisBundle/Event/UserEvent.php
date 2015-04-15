<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserEvent
 *
 * @author truongld
 */

namespace Aevitas\LevisBundle\Event;

use Symfony\Component\EventDispatcher\Event;

abstract class UserEvent extends Event {
    
    protected $data;
    protected $action;
    
    public function __construct($action, $data) {
        $this->action = $action;
        $this->data = $data;
    }
    
    public function getAction(){
        return $this->action;
    }
    
    public function getData(){
        return $this->data;
    }
    
    public abstract function launch();
}