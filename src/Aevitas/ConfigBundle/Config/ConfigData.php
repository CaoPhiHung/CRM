<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConfigData
 *
 * @author apple
 */

namespace Aevitas\ConfigBundle\Config;

use Aevitas\ConfigBundle\Form\ConfigDataType;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Doctrine Step.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class ConfigData {

    protected $config;
    protected $params;

    public function __construct() {
        $this->params = array(Configuration::DATABASE => array(), Configuration::LOYALTY => array(), Configuration::MAILER => array());
    }

    public function setParameters($parameters) {
        foreach ($parameters as $key => $value) {
            $this->__set($key, $value);
        }
    }

    /**
     * @see StepInterface
     */
    public function getFormType() {
        return new ConfigDataType();
    }

    /**
     * @see StepInterface
     */
    public function checkRequirements() {
        $messages = array();

        if (!class_exists('\PDO')) {
            $messages[] = 'PDO extension is mandatory.';
        } else {
            $drivers = \PDO::getAvailableDrivers();
            if (0 == count($drivers)) {
                $messages[] = 'Please install PDO drivers.';
            }
        }

        return $messages;
    }

    /**
     * @see StepInterface
     */
    public function checkOptionalSettings() {
        return array();
    }

    /**
     * @see StepInterface
     */
    public function update($data) {
        foreach ($data->getParameters() as $key => $value) {
            $this->__set($key, $value);
        }
        return $this->params[$this->config];
    }

    public function getParameters() {
        return $this->params[$this->config];
    }

    /**
     * @see StepInterface
     */
    public function getTemplate() {
        return 'AevitasConfigBundle:Config:' . $this->config . '.html.twig';
    }

    public function getConfig() {
        return $this->config;
    }

    public function __set($name, $value) {
        if ($name == 'categories' && is_string($value))
            $this->params[$this->config][$name] = array_filter(explode(',', $value));
        else
            $this->params[$this->config][$name] = $value;
    }

    public function __get($name) {
        if ($name == 'categories')
            return implode(',', $this->params[$this->config][$name]);
        return $this->params[$this->config][$name];
    }

    public function setConfig($config) {
        $this->config = $config;
        return $this;
    }

    /**
     * @return array
     */
    public static function getDriverKeys() {
        return array_keys(static::getDrivers());
    }

    /**
     * @return array
     */
    public static function getDrivers() {
        return array(
            'pdo_mysql' => 'MySQL (PDO)',
            'pdo_sqlite' => 'SQLite (PDO)',
            'pdo_pgsql' => 'PosgreSQL (PDO)',
            'oci8' => 'Oracle (native)',
            'ibm_db2' => 'IBM DB2 (native)',
            'pdo_oci' => 'Oracle (PDO)',
            'pdo_ibm' => 'IBM DB2 (PDO)',
            'pdo_sqlsrv' => 'SQLServer (PDO)',
            'pdo_dblib' => 'DB LIB - Linux (PDO)',
        );
    }

}
