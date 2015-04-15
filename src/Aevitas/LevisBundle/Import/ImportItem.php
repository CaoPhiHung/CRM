<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImportItem
 *
 * @author Truong
 */

namespace Aevitas\LevisBundle\Import;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\ODM\MongoDB\MongoDBException;
use Vietland\AevitasBundle\Helper\CSVReader;
use Vietland\AevitasBundle\Helper\Excel;
use Aevitas\LevisBundle\Document\Item;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

class ImportItem {
    private $fileupload;
    private $filename;
    private $dm;

    public function setDm($dm) {
      $this->dm = $dm;
    }

    private $controller;

    public function setController($cm) {
      $this->controller = $cm;
    }

    /**
     * get the User's home directory
     *
     * @return string
     */
    public function getHomeDirectory() {
      $physicalWebDir = getcwd();

      return $physicalWebDir . 'data';
    }

    public function getHomeDirectoryUrl() {
      $physicalWebDir = getcwd();

      return str_replace(
                      $physicalWebDir, '', $this->getHomeDirectory()
      );
    }

    public function setFileupload($file) {
      $this->fileupload = $file;

      if (is_object($this->fileupload)) {
        $this->filename = getcwd() . DIRECTORY_SEPARATOR . $this->getHomeDirectoryUrl() . DIRECTORY_SEPARATOR . $this->fileupload->getClientOriginalName();
        $this->fileupload->move($this->getHomeDirectoryUrl(), $this->fileupload->getClientOriginalName());
        unset($this->fileupload);
      }

      $ext = substr($this->filename, strlen($this->filename) - 3, 3);
    //doing
      if ($ext == 'xls') {
        $obj = new Excel($this->filename);
      }
      else if ($ext == 'csv') {
        $obj = new CSVReader($this->filename);
      }
      //exit('1');
      $header = array(
          'code' => 0,
          'description' => 1,
          'saleoff' => 7
      );
      //var_dump($obj->getRow(2));exit;
      for ($i = 0; $i < $obj->getNumRows(); $i++) {
        $item = new Item();
        $saleoff = $obj->getCell($i, $header['saleoff']);
        switch ($saleoff){
            case 'FULL Price': $saleoff='100';break;
            default: $saleoff = str_replace('%', '', $saleoff);break;
        }
        $item->setCode(($obj->getCell($i, $header['code'])));
        $item->setDescription($obj->getCell($i, $header['description']));
        $item->setDiscount($saleoff);
        try {
          $this->dm->persist($item);
          $this->dm->flush();
        } catch (\Exception $e) {

        }
      }
    }

    public function getFileupload() {
      return $this->fileupload;
    }

    public function setFilename($fname) {
      $this->filename = $fname;
      return $this;
    }

    public function getFilename($file) {
      return $this->filename;
    }
}
