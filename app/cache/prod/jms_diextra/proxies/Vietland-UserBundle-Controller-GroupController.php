<?php

namespace EnhancedProxy_b2f6873d3583053739e45eb9c9646ba3f2bc9a7e\__CG__\Vietland\UserBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class GroupController extends \Vietland\UserBundle\Controller\GroupController
{
    private $__CGInterception__loader;

    public function newAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $ref = new \ReflectionMethod('Vietland\\UserBundle\\Controller\\GroupController', 'newAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request), $interceptors);

        return $invocation->proceed();
    }

    public function infoAction($groupID)
    {
        $ref = new \ReflectionMethod('Vietland\\UserBundle\\Controller\\GroupController', 'infoAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($groupID));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($groupID), $interceptors);

        return $invocation->proceed();
    }

    public function indexAction()
    {
        $ref = new \ReflectionMethod('Vietland\\UserBundle\\Controller\\GroupController', 'indexAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function editAction($groupID)
    {
        $ref = new \ReflectionMethod('Vietland\\UserBundle\\Controller\\GroupController', 'editAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($groupID));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($groupID), $interceptors);

        return $invocation->proceed();
    }

    public function deleteAction($groupID)
    {
        $ref = new \ReflectionMethod('Vietland\\UserBundle\\Controller\\GroupController', 'deleteAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($groupID));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($groupID), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}