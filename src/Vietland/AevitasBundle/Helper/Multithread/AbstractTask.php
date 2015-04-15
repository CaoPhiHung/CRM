<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AbstractTask
 *
 * @author paulaan
 */

namespace Vietland\AevitasBundle\Helper\Multithread;

abstract class AbstractTask {

    /**
     * @var $thread
     */
    protected $thread;

    public function __construct() {
        $this->thread = new Thread(array($this, 'start'));
    }

    public abstract function start();
}