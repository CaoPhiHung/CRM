<?php

namespace EnhancedProxy_07572227931e8b28e4a08c40948e930d15d07953\__CG__\Aevitas\ConfigBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class ConfigController extends \EnhancedProxy_8fbb75f8a507fc7c8649f039ca4d08ed736946dc\__CG__\Aevitas\ConfigBundle\Controller\ConfigController
{
    private $__CGInterception__loader;

    public function setMailerConfigAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\ConfigBundle\\Controller\\ConfigController', 'setMailerConfigAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function setLoyaltyConfigAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\ConfigBundle\\Controller\\ConfigController', 'setLoyaltyConfigAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function setEnvironmentAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\ConfigBundle\\Controller\\ConfigController', 'setEnvironmentAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}