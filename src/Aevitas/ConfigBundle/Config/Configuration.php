<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Configuration
 *
 * @author apple
 */

namespace Aevitas\ConfigBundle\Config;

use Symfony\Component\Yaml\Yaml;

/**
 * Configurator.
 *
 * @author Marc Weistroff <marc.weistroff@gmail.com>
 */
class Configuration {

    protected $content;
    protected $filename;
    protected $steps;
    protected $parameters;
    protected $kernelDir;
    protected $config;

    const DATABASE = 'database';
    const LOYALTY = 'loyalty';
    const MAILER = 'mailer';

    public function __construct($kernelDir) {
        $this->kernelDir = $kernelDir;
        $this->steps = array();
    }

    public function setConfig($config = self::DATABASE) {
        $this->config = $config;
        $this->filename = $this->kernelDir . '/config/' . $config . '.yml';
        $this->parameters = $this->read();
    }

    public function isFileWritable() {
        return is_writable($this->filename);
    }

    public function clean() {
        if (file_exists($this->getCacheFilename())) {
            @unlink($this->getCacheFilename());
        }
    }

    public function setContent($content) {
        $this->content = $content;
        $this->content->setConfig($this->config);
        $this->content->setParameters($this->getParameters());
    }

    public function getContent() {
        return $this->content;
    }

    /**
     * @return array
     */
    public function getSteps() {
        return $this->steps;
    }

    /**
     * @return array
     */
    public function getParameters() {
        return $this->parameters;
    }

    /**
     * @return integer
     */
    public function getStepCount() {
        return count($this->steps);
    }

    /**
     * @param array $parameters
     */
    public function mergeParameters($parameters) {
        $this->parameters = array_merge($this->parameters, $parameters);
    }

    /**
     * @return array
     */
    public function getRequirements() {
        $majors = array();
        foreach ($this->steps as $step) {
            foreach ($step->checkRequirements() as $major) {
                $majors[] = $major;
            }
        }

        return $majors;
    }

    /**
     * @return array
     */
    public function getOptionalSettings() {
        $minors = array();
        foreach ($this->steps as $step) {
            foreach ($step->checkOptionalSettings() as $minor) {
                $minors[] = $minor;
            }
        }

        return $minors;
    }

    /**
     * Renders parameters as a string.
     *
     * @return string
     */
    public function render() {
        return Yaml::dump(array('parameters' => $this->parameters));
    }

    /**
     * Writes parameters to parameters.yml or temporary in the cache directory.
     *
     * @return boolean
     */
    public function write() {
        $filename = $this->isFileWritable() ? $this->filename : $this->getCacheFilename();
        return file_put_contents($this->filename, $this->render());
    }

    /**
     * Reads parameters from file.
     *
     * @return array
     */
    protected function read() {
        $filename = $this->filename;
//        if (!$this->isFileWritable() && file_exists($this->getCacheFilename())) {
//            $filename = $this->getCacheFilename();
//        }

        $ret = Yaml::parse($filename);
        if (false === $ret || array() === $ret) {
            throw new \InvalidArgumentException(sprintf('The %s file is not valid.', $filename));
        }

        if (isset($ret['parameters']) && is_array($ret['parameters'])) {
            return $ret['parameters'];
        } else {
            return array();
        }
    }

    /**
     * getCacheFilename
     *
     * @return string
     */
    protected function getCacheFilename() {
        return $this->kernelDir . '/cache/' . $this->config . '.yml';
    }

}
