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
 * @MongoDB\Document(collection="process",repositoryClass="Aevitas\ChannelBundle\Document\ProcessRepository")
 */
class Process {

    /**
     * @MongoDB\Id(strategy="increment")
     */
    protected $id;

    /**
     * @MongoDB\Int
     */
    protected $time;

    /**
     * @MongoDB\String
     */
    protected $type;

    /**
     * @MongoDB\EmbedOne(targetDocument="Aevitas\LevisBundle\Document\EmailSmsTemplate")
     */
    protected $template;

    /**
     * @MongoDB\Int
     */
    protected $mode;

    /**
     * @MongoDB\String
     */
    protected $date;

    /**
     * @MongoDB\Int
     */
    protected $delay;

    /**
     * @MongoDB\Int
     */
    protected $delayType;

    /**
     * @MongoDB\EmbedOne(targetDocument="TemplateRule")
     */
    protected $rule;

    /**
     * @MongoDB\Int
     */
    protected $status;

    /**
     * @MongoDB\Int
     */
    protected $job;

    /**
     * Contructor
     * @return type
     */
    public function __construct()
    {
        // parent::__construct();
        // $this->rule = new ArrayCollection();
    }

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

    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    public function getTemplate()
    {
        return $this->template;
    }

    public function setRule($rule)
    {
        $this->rule = $rule;
        return $this;
    }

    public function getRule()
    {
        return $this->rule;
    }

    public function setMode($mode)
    {
        $this->mode = $mode;
        return $this;
    }

    public function getMode()
    {
        return $this->mode;
    }

    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDelay($delay)
    {
        $this->delay = $delay;
        return $this;
    }

    public function getDelay()
    {
        return $this->delay;
    }

    public function setDelayType($delayType)
    {
        $this->delayType = $delayType;
        return $this;
    }

    public function getDelayType()
    {
        return $this->delayType;
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

    public function setJob($job)
    {
        $this->job = $job;
        return $this;
    }

    public function getJob()
    {
        return $this->job;
    }
}
