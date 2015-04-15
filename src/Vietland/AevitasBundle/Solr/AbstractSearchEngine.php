<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AbstractSearchEngine
 *
 * @author paul.aan
 */

namespace Vietland\AevitasBundle\Solr;

abstract class AbstractSearchEngine {

    protected $controller;
    protected $client;

    /**
     * @var AbstractFilter $filter
     */
    protected $filter;
    protected $offset;
    protected $amount;
    protected $results;
    protected $count;
    protected $advanced;
    protected $expanded;
    protected $form;

    public function __construct($controller, $page = 1, $amount = 20, $advanced = false, $expanded = false) {
        $this->controller = $controller;
        $this->advanced = $advanced;
        $this->expanded = $expanded;
        $this->client = $controller->get('solarium.client');
        if(!((int)$page < 1)) $page = 1;
        if(!((int)$amount < 1)) $amount = 20;
        
        $this->offset = ($page - 1) * $amount;
        $this->amount = $amount;
    }

    protected abstract function buildFilter();

    protected abstract function bindFilterData();

    public abstract function getResults();

    protected function setResults() {
        $this->buildFilter();
        $query = $this->client->createSelect();
        $queryString = $this->filter->setQuery()->getQuery();
        $query->setQuery($queryString);
        if ($spatial = $this->filter->getSpatial()) {
            $query->addParam('d', $spatial['d']);
            $query->addParam('pt', $spatial['pt']);
            $query->addParam('sfield', 'coordinate');
            $query->addParam('fq', $spatial['fq']);
        }
        $query->setStart($this->offset)->setRows($this->amount);
        $query->addSort('score', $query::SORT_DESC);
        $this->results = $this->client->select($query);
        $this->count = $this->results->getNumFound();
    }

    public function getAmount() {
        return $this->amount;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
        return $this;
    }

    public function setPage($p) {
        $this->offset = ((int) $p - 1) * $this->amount;
        return $this;
    }

    public function getCount() {
        return $this->count;
    }

    public function getForm() {
        return $this->form;
    }

    public function setAdvanced($advanced) {
        $this->advanced = $advanced;
        return $this;
    }

    public function setExpanded($expanded) {
        $this->expanded = $expanded;
        return $this;
    }

}
