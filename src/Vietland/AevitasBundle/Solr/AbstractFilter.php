<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AbstractFilter
 *
 * @author paul.aan
 */

namespace Vietland\AevitasBundle\Solr;

abstract class AbstractFilter {

    /**
     * @param query
     */
    protected $query = array();
    public $keywords;

    protected $spatial;

    public function getSpatial() {
        return $this->spatial;
    }
    abstract function setQuery();

    public function getQuery() {
        return implode(' AND ', $this->query);
    }

}