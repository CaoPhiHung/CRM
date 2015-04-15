<?php

namespace EnhancedProxy_2af85ccea86b13ad5bf0d2b2dbd4dfeafa65c09c\__CG__\Aevitas\LevisBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class ReportController extends \EnhancedProxy_5f74aff1b08380ad8d530d721fcd2a1c429d0f2d\__CG__\Aevitas\LevisBundle\Controller\ReportController
{
    private $__CGInterception__loader;

    public function userStatementAction($id)
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\ReportController', 'userStatementAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($id));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($id), $interceptors);

        return $invocation->proceed();
    }

    public function redeemptionReportAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\ReportController', 'redeemptionReportAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function notShoppedReportAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\ReportController', 'notShoppedReportAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function newMemberReportAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\ReportController', 'newMemberReportAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function indexAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\ReportController', 'indexAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function exportSearchAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\ReportController', 'exportSearchAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function birthdayReportAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\ReportController', 'birthdayReportAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function anniversarydayReportAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\LevisBundle\\Controller\\ReportController', 'anniversarydayReportAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}