<?php

namespace Aevitas\ChannelBundle\Helper;

interface elFinderILogger {

    public function log($cmd, $ok, $context, $err = '', $errorData = array());
}

/**
 * Simple example how to use logger with elFinder
 * */
class elFinderLogger implements elFinderILogger {

    public function log($cmd, $ok, $context, $err = '', $errorData = array()) {
        if (false != ($fp = fopen('./log.txt', 'a'))) {
            if ($ok) {
                $str = "cmd: $cmd; OK; context: " . str_replace("\n", '', var_export($context, true)) . "; \n";
            } else {
                $str = "cmd: $cmd; FAILED; context: " . str_replace("\n", '', var_export($context, true)) . "; error: $err; errorData: " . str_replace("\n", '', var_export($errorData, true)) . "\n";
            }
            fwrite($fp, $str);
            fclose($fp);
        }
    }

}