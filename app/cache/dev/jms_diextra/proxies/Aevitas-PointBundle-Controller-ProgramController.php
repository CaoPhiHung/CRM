<?php

namespace EnhancedProxy_909c3f0da2a242d90873dea7eda8ed2caff5069b\__CG__\Aevitas\PointBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class ProgramController extends \Aevitas\PointBundle\Controller\ProgramController
{
    private $__CGInterception__loader;

    public function indexAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\PointBundle\\Controller\\ProgramController', 'indexAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function editAction($id)
    {
        $ref = new \ReflectionMethod('Aevitas\\PointBundle\\Controller\\ProgramController', 'editAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($id));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($id), $interceptors);

        return $invocation->proceed();
    }

    public function deleteAction($id)
    {
        $ref = new \ReflectionMethod('Aevitas\\PointBundle\\Controller\\ProgramController', 'deleteAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($id));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($id), $interceptors);

        return $invocation->proceed();
    }

    public function cloneAction($id)
    {
        $ref = new \ReflectionMethod('Aevitas\\PointBundle\\Controller\\ProgramController', 'cloneAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($id));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($id), $interceptors);

        return $invocation->proceed();
    }

    public function addNewAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\PointBundle\\Controller\\ProgramController', 'addNewAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}