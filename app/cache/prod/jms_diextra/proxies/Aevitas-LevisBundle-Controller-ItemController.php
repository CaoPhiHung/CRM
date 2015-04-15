<?php

namespace EnhancedProxy_d86bb99a77d3f9c0510cbb946f677dc68f0e3af4\__CG__\Aevitas\LevisBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class ItemController extends \Aevitas\LevisBundle\Controller\ItemController
{
    private $__CGInterception__loader;

    public function listAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\ItemController', 'listAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function importAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\ItemController', 'importAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}