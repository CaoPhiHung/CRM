<?php

namespace Aevitas\LevisBundle\Import;

use Vietland\AevitasBundle\Helper\CSVReader;
use Vietland\AevitasBundle\Helper\Excel;
use Aevitas\LevisBundle\Document\Store;

class ImportStore {

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
        } else if ($ext == 'csv') {
            $obj = new CSVReader($this->filename);
        }

        $header = array(
            'BranchId' => 0,
            'BranchName' => 1,
            'BranchAlias' => 2,
            'BranchAddress' => 3,
            'BranchAddress2' => 4,
            'BranchAddress3' => 5,
            'BranchPhone' => 6,
            'BranchFax' => 7,
            'BranchEmail' => 8
        );
        for ($i = 0; $i < $obj->getNumRows(); $i++) {
            $store = new Store();
            $store->setName($obj->getCell($i, $header['BranchName']))
                    ->setOldId($obj->getCell($i, $header['BranchId']))
                    ->setAddress($obj->getCell($i, $header['BranchAddress']))
                    ->setAlias($obj->getCell($i, $header['BranchAlias']))
                    ->setAddress2($obj->getCell($i, $header['BranchAddress2']))
                    ->setAddress3($obj->getCell($i, $header['BranchAddress2']))
                    ->setPhone($obj->getCell($i, $header['BranchPhone']))
                    ->setFax($obj->getCell($i, $header['BranchFax']))
                    ->setEmail($obj->getCell($i, $header['BranchEmail']));
            try {
                $this->dm->persist($store);
                $this->dm->flush();
            } catch (\Exception $e) {
                var_dump($e);exit;
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

    public function getIdByCategoryName($name) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $categories = $dm->getRepository('AevitasLevisBundle:Categories')->findOneByName($name);
        return $categories->getId();
    }

}