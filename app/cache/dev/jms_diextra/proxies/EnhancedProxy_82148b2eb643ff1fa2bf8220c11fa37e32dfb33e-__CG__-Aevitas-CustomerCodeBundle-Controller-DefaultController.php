<?php

namespace EnhancedProxy_68bd0e3cf9a4aa3302f26f9d8b4d6880b6e2e9f7\__CG__\Aevitas\CustomerCodeBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class DefaultController extends \EnhancedProxy_82148b2eb643ff1fa2bf8220c11fa37e32dfb33e\__CG__\Aevitas\CustomerCodeBundle\Controller\DefaultController
{
    private $__CGInterception__loader;

    public function indexAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\CustomerCodeBundle\\Controller\\DefaultController', 'indexAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function editAction($id)
    {
        $ref = new \ReflectionMethod('Aevitas\\CustomerCodeBundle\\Controller\\DefaultController', 'editAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($id));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($id), $interceptors);

        return $invocation->proceed();
    }

    public function downloadAction($id)
    {
        $ref = new \ReflectionMethod('Aevitas\\CustomerCodeBundle\\Controller\\DefaultController', 'downloadAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($id));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($id), $interceptors);

        return $invocation->proceed();
    }

    public function deleteAction($id)
    {
        $ref = new \ReflectionMethod('Aevitas\\CustomerCodeBundle\\Controller\\DefaultController', 'deleteAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($id));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($id), $interceptors);

        return $invocation->proceed();
    }

    public function createAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\CustomerCodeBundle\\Controller\\DefaultController', 'createAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}