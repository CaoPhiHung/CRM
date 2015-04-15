<?php

namespace Aevitas\ConfigBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Aevitas\ConfigBundle\Config\Configuration;
use Aevitas\ConfigBundle\Config\ConfigData;
use Vietland\AevitasBundle\Controller\AevitasController;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\Process\Process;

class ConfigController extends AevitasController {

    /**
     * @Route("/configenvironment", name="config_environment")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function setEnvironmentAction() {
        $configuration = $this->get('levis.configurator');
        $configuration->setConfig(Configuration::DATABASE);
        $configuration->setContent(new ConfigData());
        $content = $configuration->getContent();
        $form = $this->get('form.factory')->create($content->getFormType(), $content);
        $request = $this->get('request');
        if ('POST' === $request->getMethod()) {
            $form->bind($request);
            if ($form->isValid()) {
                $configuration->mergeParameters($content->update($form->getData()));
                $configuration->write();
            } else {
                var_dump($form->getErrorsAsString());exit;
            }
        }

        return $this->get('templating')->renderResponse($content->getTemplate(), array(
                    'form' => $form->createView(),
                    'count' => $configuration->getStepCount()
                ));
    }
    
    /**
     * @Route("/configmailer", name="config_mailer")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function setMailerConfigAction(){
        $configuration = $this->get('levis.configurator');
        $configuration->setConfig(Configuration::MAILER);
        $configuration->setContent(new ConfigData());
        $content = $configuration->getContent();
        $form = $this->get('form.factory')->create($content->getFormType(), $content);
        $request = $this->get('request');
        if ('POST' === $request->getMethod()) {
            $form->bind($request);
            if ($form->isValid()) {
                $configuration->mergeParameters($content->update($form->getData()));
                $configuration->write();
            } else {
                exit('error');
            }
        }

        return $this->get('templating')->renderResponse($content->getTemplate(), array(
                    'form' => $form->createView(),
                    'count' => $configuration->getStepCount()
                ));
    }
    /**
     * @Route("/configloyalty", name="config_loyalty")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function setLoyaltyConfigAction(){
        $configuration = $this->get('levis.configurator');
        $configuration->setConfig(Configuration::LOYALTY);
        $configuration->setContent(new ConfigData());
        $content = $configuration->getContent();
        $form = $this->get('form.factory')->create($content->getFormType(), $content);
        $request = $this->get('request');
        if ('POST' === $request->getMethod()) {
            $form->bind($request);
            if ($form->isValid()) {
                $configuration->mergeParameters($content->update($form->getData()));
                $configuration->write();
                $this->invalidate('render_point_config');
                $this->invalidate('render_facebook_init');
                exec("rm -rf ".__DIR__.'/../../../../app/cache/prod');
                apc_clear_cache();
            } else {
                exit('error');
            }
        }

        return $this->get('templating')->renderResponse($content->getTemplate(), array(
                    'form' => $form->createView(),
                    'count' => $configuration->getStepCount()
                ));
    }
    /**
     * @Route("/_proxy/render_point_config", name="render_point_config")
     */
    public function renderPointsConfigAction(){
        $pointConfig = $this->get('aevitas.twig')->getPointConfig();
        return new Response($this->renderView('AevitasConfigBundle:Config:pointConfig.html.twig',$pointConfig));
    }
    
    /**
     * @Route("/_proxy/render_facebook_init", name="render_facebook_init")
     * @Template()
     */
    public function facebookInitAction(){
        return array();
    }

}
