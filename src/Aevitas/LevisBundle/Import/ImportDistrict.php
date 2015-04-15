<?php

namespace Aevitas\LevisBundle\Import;

use Vietland\AevitasBundle\Helper\CSVReader;
use Vietland\AevitasBundle\Helper\Excel;
use Vietland\AevitasBundle\Document\District;

class ImportDistrict {

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
            'ID' => 0,
            'name' => 1,
            'city_id' => 2,
            'range' => 3
        );
        for ($i = 0; $i < $obj->getNumRows(); $i++) {
            $store = new District();
            $store->setName($obj->getCell($i, $header['name']))
                    ->setCityId($obj->getCell($i, $header['city_id']))
                    ->setRange($obj->getCell($i, $header['range']));
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