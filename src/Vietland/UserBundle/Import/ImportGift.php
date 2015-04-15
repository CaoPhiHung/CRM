<?php

namespace Vietland\UserBundle\Import;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Vietland\AdsBundle\Document\Coordinates;
use Doctrine\ODM\MongoDB\MongoDBException;
use Vietland\UserBundle\Form\Type\ImportUserType;
use Vietland\AevitasBundle\Helper\CSVReader;
use Vietland\AevitasBundle\Helper\Excel;
use Vietland\AevitasBundle\Helper\Multithread\MailerTask;
use Vietland\AevitasBundle\Helper\Multithread\SmsTask;
use Aevitas\LevisBundle\Document\GiftArticle;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

class ImportGift {

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
//$user = $this->container->get('security.context')->getToken()->getUser();
//$userId = $user->getId();
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
    $header = array(
        'name' => 0,
        'description' => 1,
        'point' => 2,
        'image' => 3
    );
    for ($i = 0; $i < $obj->getNumRows(); $i++) {
      $GiftArticle = new GiftArticle();
// $accname = $obj->getCell($i, 0);
// die(print_r($obj->getCell($i, $header['name'])));
//$pos = strlen($accname)-1;
//while ($accname[$pos] != ' ' && $pos>=0) $pos--;
      $GiftArticle->setName(($obj->getCell($i, $header['name'])));
      $GiftArticle->setDescription($obj->getCell($i, $header['description']));
      $GiftArticle->setCreated(time());
// $GiftArticle->setIsActive(($obj->getCell($i, $header['isActive'])));
      $GiftArticle->setPoint(($obj->getCell($i, $header['point'])));
      $GiftArticle->setPath(($obj->getCell($i, $header['image'])));
      try {
        $this->dm->persist($GiftArticle);
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

  public function getIdByCategoryName($name) {
    $dm = $this->get('doctrine.odm.mongodb.document_manager');
    $categories = $dm->getRepository('AevitasLevisBundle:Categories')->findOneByName($name);
    return $categories->getId();
  }

}