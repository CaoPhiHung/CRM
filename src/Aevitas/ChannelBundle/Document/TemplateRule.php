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
 * @MongoDB\Document(collection="EmailAndSmsTemplateRule",repositoryClass="Aevitas\ChannelBundle\Document\TemplateRuleRepository")
 *
 */
class TemplateRule{

     /**
     * @MongoDB\Id(strategy="increment")
     */
    protected $id;

    /**
     * @MongoDB\EmbedMany(targetDocument="RuleOption")
     *
     */
    protected $options;

    /**
     * @MongoDB\String
     */
    protected $templateRuleName;

    /**
     * @MongoDB\Int
     */
    protected $type;

    /**
     * @MongoDB\String
     */
    protected $query;


    public function __construct() {
        // parent::__construct();
        $this->options = new ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getTemplateRuleName() {
        return $this->templateRuleName;
    }

    public function setTemplateRuleName($templateRuleName) {
        $this->templateRuleName = $templateRuleName;
        return $this;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
        return $this;
    }

    public function getOptions() {
        return $this->options;
    }

    public function setOptions($options) {
        $this->options = $options;
        return $this;
    }

    public function getQuery() {
        return $this->query;
    }

    public function setQuery($query) {
        $this->query = $query;
        return $this;
    }




}
