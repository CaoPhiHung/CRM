<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AevitasLogger
 *
 * @author paul.aan
 */

namespace Vietland\AevitasBundle\Logger;

use Vietland\AevitasBundle\Document\Log;

abstract class AevitasLogger {

    private static $instance;

    public static function setLog($log) {
        self::$instance = $log;
    }

    public static function getLog() {
        return self::$instance;
    }

}
