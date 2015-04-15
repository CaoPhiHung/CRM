<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cart
 *
 * @author u-Matrix
 */

namespace Aevitas\ChannelBundle\Document;

/**
 * Description of newClassWithNamespace
 *
 * @author U-Matrix
 */
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @MongoDB\Document(collection="cronjob",repositoryClass="Aevitas\ChannelBundle\Document\CronJobRepository")
 */
class CronJob {

    /**
     * @MongoDB\Id(strategy="increment")
     */
    protected $id;

    /**
     * @MongoDB\Int
     */
    protected $type;

     /**
     * @MongoDB\Int
     */
    protected $delaytype;

    /**
     * @MongoDB\String
     */
    protected $cmd;

    /**
     * @MongoDB\Int
     */
    protected $time;

    /**
     * @MongoDB\Int
     */
    protected $times;

    /**
     * @MongoDB\Int
     */
    protected $status;

    /**
     * @MongoDB\Int
     */
    protected $process;

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setDelayType($delaytype)
    {
        $this->delaytype = $delaytype;
        return $this;
    }

    public function getDelayType()
    {
        return $this->delaytype;
    }

    public function setCommand($cmd)
    {
        $this->cmd = $cmd;
        return $this;
    }

    public function getCommand()
    {
        return $this->cmd;
    }

    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function setTimes($times)
    {
        $this->times = $times;
        return $this;
    }

    public function getTimes()
    {
        return $this->times;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setProcess($process)
    {
        $this->process = $process;
        return $this;
    }

    public function getProcess()
    {
        return $this->process;
    }

}
