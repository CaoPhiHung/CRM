<?php

namespace EnhancedProxy_d86bb99a77d3f9c0510cbb946f677dc68f0e3af4\__CG__\Aevitas\LevisBundle\Controller;

/**
 * This code has been auto-generated by the JMSDiExtraBundle.
 *
 * Manual changes to it will be lost.
 */
class ItemController__JMSInjector
{
    public static function inject($container) {
        require_once '/var/www/html/levis-crm/app/cache/dev/jms_diextra/proxies/EnhancedProxy_d86bb99a77d3f9c0510cbb946f677dc68f0e3af4-__CG__-Aevitas-LevisBundle-Controller-ItemController.php';
        $y = new \JMS\AopBundle\Aop\InterceptorLoader($container, array('Aevitas\\LevisBundle\\Controller\\ItemController' => array('listAction' => array(0 => 'security.access.method_interceptor'), 'importAction' => array(0 => 'security.access.method_interceptor'))));
        $instance = new \EnhancedProxy_a8a7092b1081ce5e12cb9659a06980e084811372\__CG__\Aevitas\LevisBundle\Controller\ItemController();
        $instance->__CGInterception__setLoader($y);
        return $instance;
    }
}
