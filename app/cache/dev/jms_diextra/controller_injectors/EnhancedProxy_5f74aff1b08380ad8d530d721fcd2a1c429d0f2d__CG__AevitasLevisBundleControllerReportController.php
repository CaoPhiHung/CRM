<?php

namespace EnhancedProxy_5f74aff1b08380ad8d530d721fcd2a1c429d0f2d\__CG__\Aevitas\LevisBundle\Controller;

/**
 * This code has been auto-generated by the JMSDiExtraBundle.
 *
 * Manual changes to it will be lost.
 */
class ReportController__JMSInjector
{
    public static function inject($container) {
        require_once '/var/www/html/levis-crm/app/cache/dev/jms_diextra/proxies/EnhancedProxy_5f74aff1b08380ad8d530d721fcd2a1c429d0f2d-__CG__-Aevitas-LevisBundle-Controller-ReportController.php';
        $z = new \JMS\AopBundle\Aop\InterceptorLoader($container, array('Aevitas\\LevisBundle\\Controller\\ReportController' => array('userStatementAction' => array(0 => 'security.access.method_interceptor'), 'redeemptionReportAction' => array(0 => 'security.access.method_interceptor'), 'notShoppedReportAction' => array(0 => 'security.access.method_interceptor'), 'newMemberReportAction' => array(0 => 'security.access.method_interceptor'), 'indexAction' => array(0 => 'security.access.method_interceptor'), 'exportSearchAction' => array(0 => 'security.access.method_interceptor'), 'birthdayReportAction' => array(0 => 'security.access.method_interceptor'), 'anniversarydayReportAction' => array(0 => 'security.access.method_interceptor'))));
        $instance = new \EnhancedProxy_2af85ccea86b13ad5bf0d2b2dbd4dfeafa65c09c\__CG__\Aevitas\LevisBundle\Controller\ReportController();
        $instance->__CGInterception__setLoader($z);
        return $instance;
    }
}
