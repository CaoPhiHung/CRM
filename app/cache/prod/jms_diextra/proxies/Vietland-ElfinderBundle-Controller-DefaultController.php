<?php

namespace EnhancedProxy_a639e67f84959ed3733c7466068a307312a95ff1\__CG__\Vietland\ElfinderBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class DefaultController extends \Vietland\ElfinderBundle\Controller\DefaultController
{
    private $__CGInterception__loader;

    public function uploadGiftAction()
    {
        $ref = new \ReflectionMethod('Vietland\\ElfinderBundle\\Controller\\DefaultController', 'uploadGiftAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function uploadAction($folder = 'users', $_format = 'json')
    {
        $ref = new \ReflectionMethod('Vietland\\ElfinderBundle\\Controller\\DefaultController', 'uploadAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($folder, $_format));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($folder, $_format), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}