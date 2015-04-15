<?php

namespace EnhancedProxy_d253a064eb61bb3ac97ba0beac66bd9dfc1f6691\__CG__\Aevitas\LevisBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class HomeController extends \EnhancedProxy_7e876b334352dbf2127797975530b2e07e6bbb18\__CG__\Aevitas\LevisBundle\Controller\HomeController
{
    private $__CGInterception__loader;

    public function saveAnniversaryAction($_format)
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\HomeController', 'saveAnniversaryAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($_format));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($_format), $interceptors);

        return $invocation->proceed();
    }

    public function registerStep4Action($_format)
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\HomeController', 'registerStep4Action');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($_format));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($_format), $interceptors);

        return $invocation->proceed();
    }

    public function registerOnlineStep3Action($_format)
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\HomeController', 'registerOnlineStep3Action');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($_format));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($_format), $interceptors);

        return $invocation->proceed();
    }

    public function registerOnlineStep2Action($_format)
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\HomeController', 'registerOnlineStep2Action');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($_format));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($_format), $interceptors);

        return $invocation->proceed();
    }

    public function facebookLoginAction($_format)
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\HomeController', 'facebookLoginAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($_format));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($_format), $interceptors);

        return $invocation->proceed();
    }

    public function completeEnrollmentStep3Action($_format)
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\HomeController', 'completeEnrollmentStep3Action');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($_format));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($_format), $interceptors);

        return $invocation->proceed();
    }

    public function completeEnrollmentStep2Action($_format)
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\HomeController', 'completeEnrollmentStep2Action');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($_format));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($_format), $interceptors);

        return $invocation->proceed();
    }

    public function completeEnrollmentFinalStepAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\HomeController', 'completeEnrollmentFinalStepAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function completeEnrollmentAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\HomeController', 'completeEnrollmentAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function addAnniversaryAction($_format = 'json')
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\HomeController', 'addAnniversaryAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($_format));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($_format), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}