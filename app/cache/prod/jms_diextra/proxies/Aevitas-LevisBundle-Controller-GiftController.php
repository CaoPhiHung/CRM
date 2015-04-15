<?php

namespace EnhancedProxy_21a06583a09fc60640e6a49f1914748735e7f951\__CG__\Aevitas\LevisBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class GiftController extends \Aevitas\LevisBundle\Controller\GiftController
{
    private $__CGInterception__loader;

    public function importGiftAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\GiftController', 'importGiftAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function giftListAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\GiftController', 'giftListAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function giftCreateAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\GiftController', 'giftCreateAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function giftAddWishListAction($gid)
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\GiftController', 'giftAddWishListAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($gid));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($gid), $interceptors);

        return $invocation->proceed();
    }

    public function giftAddCategories()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\GiftController', 'giftAddCategories');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function gifEditAction($id)
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\GiftController', 'gifEditAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($id));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($id), $interceptors);

        return $invocation->proceed();
    }

    public function categoryEditAction($id)
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\GiftController', 'categoryEditAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($id));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($id), $interceptors);

        return $invocation->proceed();
    }

    public function categoriesListAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\GiftController', 'categoriesListAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}