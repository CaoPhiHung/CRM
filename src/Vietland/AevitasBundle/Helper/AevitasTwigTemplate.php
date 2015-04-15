<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AevitasTwigTemplate
 *
 * @author paulaan
 */

namespace Vietland\AevitasBundle\Helper;

use Doctrine\ODM\MongoDB\DocumentNotFoundException;

abstract class AevitasTwigTemplate extends \Twig_Template {

    protected function getAttribute($object, $item, array $arguments = array(), $type = \Twig_TemplateInterface::ANY_CALL, $isDefinedTest = false, $ignoreStrictCheck = false) {
        try {
            $ret = parent::getAttribute($object, $item, $arguments, $type, $isDefinedTest, $ignoreStrictCheck);
        } catch (DocumentNotFoundException $e) {
            $ret = new NotFound();
        }
        return $ret;
    }

}