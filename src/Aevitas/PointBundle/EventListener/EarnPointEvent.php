<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EarnPointEvent
 *
 * @author apple
 */

namespace Aevitas\PointBundle\EventListener;

use Symfony\Component\EventDispatcher\Event;

class EarnPointEvent extends Event {

    /**
     *
     * @var Vietland\UserBundle\Document\User
     */
    private $user;
    private $context;
    private $action;
    private $data;
    private $md5;
    private $status;

    public function __construct($user, $action, $data = null, $md5 = null, $context = null) {
        $this->user = $user;
        $this->context = $context;
        $this->action = $action;
        $this->data = $data;
        if (is_null($md5))
            $this->md5 = time();
        else
            $this->md5 = $md5;
    }

    public function getUser() {
        return $this->user;
    }

    public function getContext() {
        return $this->context;
    }

    public function getAction() {
        return $this->action;
    }

    public function getData() {
        return $this->data;
    }

    public function getMd5() {
        return $this->md5;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

}