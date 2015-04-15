<?php

namespace EnhancedProxy_67668e8a8d86c1096239fd2af3397afeb3c3e24a\__CG__\Aevitas\LevisBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class StoreController extends \Aevitas\LevisBundle\Controller\StoreController
{
    private $__CGInterception__loader;

    public function storeListAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\StoreController', 'storeListAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function StoreEditAction($id)
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\StoreController', 'StoreEditAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($id));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($id), $interceptors);

        return $invocation->proceed();
    }

    public function storeCreateAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\StoreController', 'storeCreateAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function searchAction($_format)
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\StoreController', 'searchAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($_format));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($_format), $interceptors);

        return $invocation->proceed();
    }

    public function removeUserStoreAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\StoreController', 'removeUserStoreAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function removeUserFromStoreAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\StoreController', 'removeUserFromStoreAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function RedeemptionProcessAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\StoreController', 'RedeemptionProcessAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request), $interceptors);

        return $invocation->proceed();
    }

    public function RedeemptionPrintAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\StoreController', 'RedeemptionPrintAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request), $interceptors);

        return $invocation->proceed();
    }

    public function RedeemptionInfoAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\StoreController', 'RedeemptionInfoAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request), $interceptors);

        return $invocation->proceed();
    }

    public function RedeemptionDeleteAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\StoreController', 'RedeemptionDeleteAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request), $interceptors);

        return $invocation->proceed();
    }

    public function RedeemptionAuthAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\StoreController', 'RedeemptionAuthAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request), $interceptors);

        return $invocation->proceed();
    }

    public function RedeemptionAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\StoreController', 'RedeemptionAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function Point2VndAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\StoreController', 'Point2VndAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function addUserToStore()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\StoreController', 'addUserToStore');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function addUserForStoreAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\StoreController', 'addUserForStoreAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}