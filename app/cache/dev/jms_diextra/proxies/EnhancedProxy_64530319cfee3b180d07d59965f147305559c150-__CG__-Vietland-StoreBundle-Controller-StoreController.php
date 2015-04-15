<?php

namespace EnhancedProxy_83f3a94d4fb50905251acaf918e167d5b6dbe092\__CG__\Vietland\StoreBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class StoreController extends \EnhancedProxy_64530319cfee3b180d07d59965f147305559c150\__CG__\Vietland\StoreBundle\Controller\StoreController
{
    private $__CGInterception__loader;

    public function updateUserAction($ledgerid, $billno)
    {
        $ref = new \ReflectionMethod('Vietland\\StoreBundle\\Controller\\StoreController', 'updateUserAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($ledgerid, $billno));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($ledgerid, $billno), $interceptors);

        return $invocation->proceed();
    }

    public function updateformManagementNotify($cCode)
    {
        $ref = new \ReflectionMethod('Vietland\\StoreBundle\\Controller\\StoreController', 'updateformManagementNotify');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($cCode));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($cCode), $interceptors);

        return $invocation->proceed();
    }

    public function shoppingAction($ledgerid, $billno)
    {
        $ref = new \ReflectionMethod('Vietland\\StoreBundle\\Controller\\StoreController', 'shoppingAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($ledgerid, $billno));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($ledgerid, $billno), $interceptors);

        return $invocation->proceed();
    }

    public function searchUserAction()
    {
        $ref = new \ReflectionMethod('Vietland\\StoreBundle\\Controller\\StoreController', 'searchUserAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function saveShoppingAction($ledgerid, $billno)
    {
        $ref = new \ReflectionMethod('Vietland\\StoreBundle\\Controller\\StoreController', 'saveShoppingAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($ledgerid, $billno));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($ledgerid, $billno), $interceptors);

        return $invocation->proceed();
    }

    public function listJobAction()
    {
        $ref = new \ReflectionMethod('Vietland\\StoreBundle\\Controller\\StoreController', 'listJobAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function checkingEmailAction($email)
    {
        $ref = new \ReflectionMethod('Vietland\\StoreBundle\\Controller\\StoreController', 'checkingEmailAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($email));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($email), $interceptors);

        return $invocation->proceed();
    }

    public function checkingCellphoneAction($cellphone)
    {
        $ref = new \ReflectionMethod('Vietland\\StoreBundle\\Controller\\StoreController', 'checkingCellphoneAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($cellphone));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($cellphone), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}