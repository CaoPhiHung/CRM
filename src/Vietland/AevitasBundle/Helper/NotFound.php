<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NotFound
 *
 * @author paulaan
 */
namespace Vietland\AevitasBundle\Helper;

class NotFound{

    public function __call($methodName, $params = null) {
        $methodPrefix = substr($methodName, 0, 3);
        if ($methodPrefix == 'set' && count($params) == 1) {
            return $this;
        } elseif ($methodPrefix == 'get') {
            return 'not found';
        } else {
            exit('Opps! The method is not defined!');
        }
    }
    
    public function __toString() {
        return 'not found';
    }

}
