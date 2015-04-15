<?php

namespace EnhancedProxy_a300a2c40d0371fef795133ef52889436aee26e1\__CG__\Aevitas\ChannelBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class DefaultController extends \Aevitas\ChannelBundle\Controller\DefaultController
{
    private $__CGInterception__loader;

    public function stopProcessAction($id)
    {
        $ref = new \ReflectionMethod('Aevitas\\ChannelBundle\\Controller\\DefaultController', 'stopProcessAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($id));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($id), $interceptors);

        return $invocation->proceed();
    }

    public function startProcessAction($id)
    {
        $ref = new \ReflectionMethod('Aevitas\\ChannelBundle\\Controller\\DefaultController', 'startProcessAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($id));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($id), $interceptors);

        return $invocation->proceed();
    }

    public function sendProcessAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $ref = new \ReflectionMethod('Aevitas\\ChannelBundle\\Controller\\DefaultController', 'sendProcessAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request), $interceptors);

        return $invocation->proceed();
    }

    public function sendInfoAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $ref = new \ReflectionMethod('Aevitas\\ChannelBundle\\Controller\\DefaultController', 'sendInfoAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request), $interceptors);

        return $invocation->proceed();
    }

    public function saveProcessAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\ChannelBundle\\Controller\\DefaultController', 'saveProcessAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function listTemplateRuleAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\ChannelBundle\\Controller\\DefaultController', 'listTemplateRuleAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function listTemplateAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\ChannelBundle\\Controller\\DefaultController', 'listTemplateAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function elFinderConnectionAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\ChannelBundle\\Controller\\DefaultController', 'elFinderConnectionAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function editTemplateRuleAction($id)
    {
        $ref = new \ReflectionMethod('Aevitas\\ChannelBundle\\Controller\\DefaultController', 'editTemplateRuleAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($id));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($id), $interceptors);

        return $invocation->proceed();
    }

    public function editTemplateBuilderAction($type, $action = NULL)
    {
        $ref = new \ReflectionMethod('Aevitas\\ChannelBundle\\Controller\\DefaultController', 'editTemplateBuilderAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($type, $action));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($type, $action), $interceptors);

        return $invocation->proceed();
    }

    public function editTemplateAction($id)
    {
        $ref = new \ReflectionMethod('Aevitas\\ChannelBundle\\Controller\\DefaultController', 'editTemplateAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($id));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($id), $interceptors);

        return $invocation->proceed();
    }

    public function deleteRuleAction($id)
    {
        $ref = new \ReflectionMethod('Aevitas\\ChannelBundle\\Controller\\DefaultController', 'deleteRuleAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($id));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($id), $interceptors);

        return $invocation->proceed();
    }

    public function deleteProcessAction($id)
    {
        $ref = new \ReflectionMethod('Aevitas\\ChannelBundle\\Controller\\DefaultController', 'deleteProcessAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($id));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($id), $interceptors);

        return $invocation->proceed();
    }

    public function deleteAction($id)
    {
        $ref = new \ReflectionMethod('Aevitas\\ChannelBundle\\Controller\\DefaultController', 'deleteAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($id));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($id), $interceptors);

        return $invocation->proceed();
    }

    public function createTemplateRuleAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\ChannelBundle\\Controller\\DefaultController', 'createTemplateRuleAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function createTemplateAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\ChannelBundle\\Controller\\DefaultController', 'createTemplateAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function createProcessAction()
    {
        $ref = new \ReflectionMethod('Aevitas\\ChannelBundle\\Controller\\DefaultController', 'createProcessAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}