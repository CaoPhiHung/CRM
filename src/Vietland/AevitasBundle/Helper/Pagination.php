<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pagination
 *
 * @author paul.aan
 */
namespace Vietland\AevitasBundle\Helper;
class Pagination {
    private $currentPage;
    private $totalPage;
    private $totalItems;
    private $controller;
    private $min;
    private $max;
    private $router;
    private $amount;
    private $offset;


    public function __construct($current = null, $totalItems, $router, $amount = 9) {
        if(!(int)$amount || is_null($amount)) $this->amount = 9;
        else $this->amount = (int)$amount;
        if(is_null($current)) $this->currentPage = 1;
        else $this->currentPage = $current;
        $this->offset = ($current - 1) * $amount;
        $this->setTotalPage($totalItems);
        $this->totalItems = (int)$totalItems;
        if($this->currentPage < 3) $this->min = 1;
        else $this->min = $this->currentPage - 2;
        if(!strpos($router, '?')) $this->router = $router.'?';
        else $this->router = $router.'&';
        if($this->currentPage + 2 <= $this->totalPage) {
            $this->max = $this->currentPage + 2 + (2 - ($this->currentPage - $this->min));
            if($this->max > $this->totalPage) $this->max = $this->totalPage;
        }
        else $this->max = $this->totalPage;
    }
    public function setCurrentPage($currentPage) {
        $this->currentPage = $currentPage;
    }
    
    public function setTotalPage($totalItems) {
        $this->totalPage = ($totalItems%$this->amount) ? (floor($totalItems/$this->amount) + 1) : $totalItems/$this->amount;
    }

    public function setController($controller) {
        $this->controller = $controller;
    }
    
    public function getLimit(){
        return $this->amount;
    }
    
    public function getOffset(){
        return $this->offset;
    }

    public function getView($controller){
        return $controller->renderView('VietlandAevitasBundle:Pagination:view.html.twig', 
                array('current' => $this->currentPage, 'total' => $this->totalPage, 
                    'min' => $this->min, 'max' => $this->max, 'router' => $this->router,
                    'amount' => $this->amount, 'count' => $this->totalItems, 'from' => $this->offset + 1, 'to' => $this->offset + 1 + $this->totalItems));
    }

}