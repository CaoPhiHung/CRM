<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mailer
 *
 * @author apple
 */

namespace Vietland\AevitasBundle\Helper\Multithread;

class MailerTask extends AbstractTask{
    
    private $mailhandle;
    private $msg;
    
    public function __construct($mailhandle, $message){
        $this->mailhandle = $mailhandle;
        $this->msg = $message;
        parent::__construct();
    }
    
    public function start() {
        $this->mailhandle->send($this->msg);
        $this->thread->start();
    }
}