<?php

namespace Vietland\UserBundle\Controller;

/**
 * This code has been auto-generated by the JMSDiExtraBundle.
 *
 * Manual changes to it will be lost.
 */
class ImportController__JMSInjector
{
    public static function inject($container) {
        require_once '/var/www/html/levis-crm/app/cache/dev/jms_diextra/proxies/Vietland-UserBundle-Controller-ImportController.php';
        $b = new \JMS\AopBundle\Aop\InterceptorLoader($container, array('Vietland\\UserBundle\\Controller\\ImportController' => array('importUsersAction' => array(0 => 'security.access.method_interceptor'))));
        $instance = new \EnhancedProxy_309a5dbde75b7af47e2cd97f97ef774b0c10a22c\__CG__\Vietland\UserBundle\Controller\ImportController();
        $instance->__CGInterception__setLoader($b);
        return $instance;
    }
}
