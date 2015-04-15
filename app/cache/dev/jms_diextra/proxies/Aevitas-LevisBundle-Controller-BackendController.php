<?php

namespace EnhancedProxy_e8429cda71fc5b63043e64a6c954546f4ae0f0b1\__CG__\Aevitas\LevisBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class BackendController extends \Aevitas\LevisBundle\Controller\BackendController
{
    private $__CGInterception__loader;

    public function staffManagerAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\BackendController', 'staffManagerAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function resendRegCodeAction($id, $_format)
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\BackendController', 'resendRegCodeAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($id, $_format));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($id, $_format), $interceptors);

        return $invocation->proceed();
    }

    public function listUserAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\BackendController', 'listUserAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function listSearchAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\BackendController', 'listSearchAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function listAdvancedSearchAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\BackendController', 'listAdvancedSearchAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function indexAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\BackendController', 'indexAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function editCartAction($id)
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\BackendController', 'editCartAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($id));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($id), $interceptors);

        return $invocation->proceed();
    }

    public function checkPosBillAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\BackendController', 'checkPosBillAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function checkBillAction($ledgerid, $billno)
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\BackendController', 'checkBillAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($ledgerid, $billno));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($ledgerid, $billno), $interceptors);

        return $invocation->proceed();
    }

    public function cartListStoreStaffAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\BackendController', 'cartListStoreStaffAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function cartListAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\BackendController', 'cartListAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function advancedSearchUserAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\BackendController', 'advancedSearchUserAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}