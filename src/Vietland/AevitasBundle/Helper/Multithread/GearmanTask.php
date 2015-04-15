<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SchemaTask
 *
 * @author paul.aan
 */

namespace Visikard\ArmBundle\Service\Multithread;

use Visikard\UserBundle\Document\Profile;
use Visikard\UserBundle\Document\User;
use Visikard\ArmBundle\Document\Behavior;
use Visikard\ArmBundle\Document\DemoGraphic;
use Visikard\ArmBundle\Service\IpLocation;
use Visikard\ArmBundle\Document\Coordinate;
use Visikard\ArmBundle\Document\IpRecord;

class GearmanTask extends AbstractTask {

    protected $server;
    protected $port;
    private $controller;
    private $dm;
    private $gearman;

    public function __construct($server, $port = 4730, $controller, $dm = null) {
        $this->server = $server;
        $this->port = $port;
        $this->controller = $controller;
        $this->dm = $dm;
        $this->gearman = $controller->get('gearman');
        $this->gearman->setServer($server, $port);
    }

    public function getDm() {
        return $this->dm;
    }

    public function setDm($dm) {
        $this->dm = $dm;
        return $this;
    }

    public function run($task) {
        $this->gearman->addTask($task)->runTasks();
    }

}