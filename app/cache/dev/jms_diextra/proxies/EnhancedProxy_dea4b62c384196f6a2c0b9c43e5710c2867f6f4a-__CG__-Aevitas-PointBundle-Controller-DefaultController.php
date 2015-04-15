<?php

namespace EnhancedProxy_e6f4aa6f0bbec705639af4a36aa2e18c72cc8108\__CG__\Aevitas\PointBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class DefaultController extends \EnhancedProxy_dea4b62c384196f6a2c0b9c43e5710c2867f6f4a\__CG__\Aevitas\PointBundle\Controller\DefaultController
{
    private $__CGInterception__loader;

    public function testAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\PointBundle\\Controller\\DefaultController', 'testAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function indexAction($storeKw = 0)
    {
        $ref = new \ReflectionMethod('Aevitas\\PointBundle\\Controller\\DefaultController', 'indexAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($storeKw));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($storeKw), $interceptors);

        return $invocation->proceed();
    }

    public function editAction($ruleID)
    {
        $ref = new \ReflectionMethod('Aevitas\\PointBundle\\Controller\\DefaultController', 'editAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($ruleID));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($ruleID), $interceptors);

        return $invocation->proceed();
    }

    public function deleteAction($ruleID)
    {
        $ref = new \ReflectionMethod('Aevitas\\PointBundle\\Controller\\DefaultController', 'deleteAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($ruleID));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($ruleID), $interceptors);

        return $invocation->proceed();
    }

    public function addNewAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\PointBundle\\Controller\\DefaultController', 'addNewAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}