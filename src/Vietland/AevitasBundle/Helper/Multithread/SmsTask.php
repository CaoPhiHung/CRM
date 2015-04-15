<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SmsTask
 *
 * @author truongld
 */

namespace Vietland\AevitasBundle\Helper\Multithread;

class SmsTask extends AbstractTask {

    private $smshandle;

    public function __construct($smshandle) {
        $this->smshandle = $smshandle;
        parent::__construct();
    }

    public function start() {
        $this->smshandle->send();
        $this->thread->start();
    }
}