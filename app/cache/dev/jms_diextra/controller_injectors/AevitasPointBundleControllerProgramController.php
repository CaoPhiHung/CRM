<?php

namespace Aevitas\PointBundle\Controller;

/**
 * This code has been auto-generated by the JMSDiExtraBundle.
 *
 * Manual changes to it will be lost.
 */
class ProgramController__JMSInjector
{
    public static function inject($container) {
        require_once '/var/www/html/levis-crm/app/cache/dev/jms_diextra/proxies/Aevitas-PointBundle-Controller-ProgramController.php';
        $e = new \JMS\AopBundle\Aop\InterceptorLoader($container, array('Aevitas\\PointBundle\\Controller\\ProgramController' => array('indexAction' => array(0 => 'security.access.method_interceptor'), 'addNewAction' => array(0 => 'security.access.method_interceptor'), 'editAction' => array(0 => 'security.access.method_interceptor'), 'deleteAction' => array(0 => 'security.access.method_interceptor'), 'cloneAction' => array(0 => 'security.access.method_interceptor'))));
        $instance = new \EnhancedProxy_909c3f0da2a242d90873dea7eda8ed2caff5069b\__CG__\Aevitas\PointBundle\Controller\ProgramController();
        $instance->__CGInterception__setLoader($e);
        return $instance;
    }
}
