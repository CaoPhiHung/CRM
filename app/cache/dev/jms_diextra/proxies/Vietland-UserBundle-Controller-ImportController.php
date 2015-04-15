<?php

namespace EnhancedProxy_309a5dbde75b7af47e2cd97f97ef774b0c10a22c\__CG__\Vietland\UserBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class ImportController extends \Vietland\UserBundle\Controller\ImportController
{
    private $__CGInterception__loader;

    public function importUsersAction()
    {
        $ref = new \ReflectionMethod('Vietland\\UserBundle\\Controller\\ImportController', 'importUsersAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}