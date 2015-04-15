<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DatabaseManager
 *
 * @author paul.aan
 */

namespace Vietland\AevitasBundle\Services;

use Vietland\AevitasBundle\Logger\AevitasLogger;
use Vietland\AevitasBundle\Logger\LoggerInterface;

class DatabaseManager {

    private $dm;
    private $securitycontext;
    private $user;

    public function __construct($document_manager, $securitycontext) {
        $this->dm = $document_manager;
        $this->securitycontext = $securitycontext;
        if (is_object($this->securitycontext->getToken()))
            $this->user = $this->securitycontext->getToken()->getUser();
    }

    public function persist($object) {
        $this->dm->persist($object);
        $this->dm->flush();
        if ($object instanceof LoggerInterface && is_object($log = AevitasLogger::getLog())) {
            if (!is_object($log->getUser()))
                $log->setUser($this->user);
            $this->dm->persist($log);
            $this->dm->flush();
        }
        $this->dm->flush();
        return $this->dm;
    }

    function __call($method, $args) {
        return call_user_func_array(array($this->dm, $method), $args);
    }

}
