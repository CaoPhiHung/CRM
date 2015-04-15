<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mailer
 *
 * @author apple
 */

namespace Aevitas\ChannelBundle\Channel;

use Symfony\Bundle\TwigBundle\Loader\FilesystemLoader;

abstract class AbstractChannelTemplate extends \Twig_Extension {

    protected $loader;
    protected $controller;
    protected $action;
    protected $content;

    protected $path;
    public function __construct(FilesystemLoader $loader) {
        $this->loader = $loader;
        $this->content = '';
    }

    public function setController($controller) {
        $this->controller = $controller;
    }

    public function getAction() {
        return $this->action;
    }

    public function setAction($action) {
        $this->action = $action;
        return $this;
    }

    public function getTemplateSource() {
        $paths = $this->loader->getPaths();
        $this->path = $paths[0];
        $fileTeamplate = $this->path . DIRECTORY_SEPARATOR . $this->getType() . DIRECTORY_SEPARATOR . $this->action . '.html.twig';
        if (file_exists($fileTeamplate)){
            $this->content = file_get_contents($fileTeamplate);
        }else{
            $this->writeTemplateSource();
        }
        
        /*try {
            $this->content = $this->loader->getSource('::' . $this->getType() . '::' . $this->action . '.html.twig');
        } catch (\Twig_Error_Loader $e) {
            $this->writeTemplateSource();
        }/**/
        
        return $this->content;
    }

    public abstract function getType();

    public function setTemplateSource($content) {
        $this->content = $content;
        return $this;
    }

    public function writeTemplateSource() {
        $path = $this->path;
        if (file_exists($path . DIRECTORY_SEPARATOR . $this->getType() . DIRECTORY_SEPARATOR . $this->action . '.html.twig')) {
            file_put_contents($path . DIRECTORY_SEPARATOR . $this->getType() . DIRECTORY_SEPARATOR . $this->action . '.html.twig', $this->content);
        } else {
            $fp = fopen($path . DIRECTORY_SEPARATOR . $this->getType() . DIRECTORY_SEPARATOR . $this->action . '.html.twig', "w+");
            fwrite($fp, $this->content);
            fclose($fp);
        }
    }

    public function getName() {
        
    }

}
