<?php

namespace Aevitas\ChannelBundle\Controller;

/**
 * This code has been auto-generated by the JMSDiExtraBundle.
 *
 * Manual changes to it will be lost.
 */
class DefaultController__JMSInjector
{
    public static function inject($container) {
        require_once '/var/www/html/levis-crm/app/cache/dev/jms_diextra/proxies/Aevitas-ChannelBundle-Controller-DefaultController.php';
        $c = new \JMS\AopBundle\Aop\InterceptorLoader($container, array('Aevitas\\ChannelBundle\\Controller\\DefaultController' => array('listTemplateAction' => array(0 => 'security.access.method_interceptor'), 'createTemplateAction' => array(0 => 'security.access.method_interceptor'), 'createProcessAction' => array(0 => 'security.access.method_interceptor'), 'saveProcessAction' => array(0 => 'security.access.method_interceptor'), 'deleteProcessAction' => array(0 => 'security.access.method_interceptor'), 'startProcessAction' => array(0 => 'security.access.method_interceptor'), 'stopProcessAction' => array(0 => 'security.access.method_interceptor'), 'editTemplateAction' => array(0 => 'security.access.method_interceptor'), 'deleteAction' => array(0 => 'security.access.method_interceptor'), 'editTemplateBuilderAction' => array(0 => 'security.access.method_interceptor'), 'elFinderConnectionAction' => array(0 => 'security.access.method_interceptor'), 'sendInfoAction' => array(0 => 'security.access.method_interceptor'), 'sendProcessAction' => array(0 => 'security.access.method_interceptor'), 'listTemplateRuleAction' => array(0 => 'security.access.method_interceptor'), 'createTemplateRuleAction' => array(0 => 'security.access.method_interceptor'), 'editTemplateRuleAction' => array(0 => 'security.access.method_interceptor'), 'deleteRuleAction' => array(0 => 'security.access.method_interceptor'))));
        $instance = new \EnhancedProxy_a300a2c40d0371fef795133ef52889436aee26e1\__CG__\Aevitas\ChannelBundle\Controller\DefaultController();
        $instance->__CGInterception__setLoader($c);
        return $instance;
    }
}
