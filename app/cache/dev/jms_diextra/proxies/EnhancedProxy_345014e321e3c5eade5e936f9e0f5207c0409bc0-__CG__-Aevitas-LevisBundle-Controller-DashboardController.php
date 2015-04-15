<?php

namespace EnhancedProxy_1ca321c3c166b529003bdf57ea81e272d778314c\__CG__\Aevitas\LevisBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class DashboardController extends \EnhancedProxy_345014e321e3c5eade5e936f9e0f5207c0409bc0\__CG__\Aevitas\LevisBundle\Controller\DashboardController
{
    private $__CGInterception__loader;

    public function userStatementAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\DashboardController', 'userStatementAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function updateAvatarAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\DashboardController', 'updateAvatarAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function shoppingHistoryAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\DashboardController', 'shoppingHistoryAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function saveTripleDateAction($_format)
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\DashboardController', 'saveTripleDateAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($_format));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($_format), $interceptors);

        return $invocation->proceed();
    }

    public function profileExtendedAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\DashboardController', 'profileExtendedAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function profileActivityAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\DashboardController', 'profileActivityAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function profileAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\DashboardController', 'profileAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function dashboardAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\DashboardController', 'dashboardAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function cropAvatar()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\DashboardController', 'cropAvatar');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}