<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExceptionController
 *
 * @author apple
 */

namespace Vietland\AevitasBundle\Controller;

use Symfony\Bundle\TwigBundle\Controller\ExceptionController as BaseController;
use Symfony\Bundle\FrameworkBundle\Templating\TemplateReference;
use Symfony\Component\HttpKernel\Exception\FlattenException;
use Symfony\Component\HttpKernel\Log\DebugLoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class ExceptionController extends BaseController {
    
    public function showAction(Request $request, FlattenException $exception, DebugLoggerInterface $logger = null, $format = 'html') {
        var_dump($exception);exit;
        parent::showAction($request, $exception, $logger, $format);
    }
}