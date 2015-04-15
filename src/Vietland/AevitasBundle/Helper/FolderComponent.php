<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FolerComponent
 *
 * @author apple
 */

namespace Vietland\AevitasBundle\Helper;

use Symfony\Component\Finder\Finder;

class FolderComponent {

    public static function removeFolder($dir) {
        if (!$dh = @opendir($dir)) {
            return;
        }
        while (false !== ($obj = readdir($dh))) {
            if ($obj == '.' || $obj == '..') {
                continue;
            }

            if (!@unlink($dir . '/' . $obj)) {
                unlinkRecursive($dir . '/' . $obj, true);
            }
        }

        closedir($dh);
        @rmdir($dir);

        return;
    }

    public static function removeFileName($name, $dir) {
        $finder = new Finder();
        $iterator = $finder
                ->files()
                ->name($name)
                ->depth(0)
                ->in($dir);
        foreach ($iterator as $file) {
            @unlink($file->getRealpath());
        }
    }

}