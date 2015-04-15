<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Media
 *
 * @author RYANTRAN
 */

namespace Vietland\AevitasBundle\Model;

use Vietland\AevitasBundle\Helper\ImageHelper;

abstract class Media {

  public function getAbsolutePath($file = null) {
    return null === $file ? null : $this->getUploadRootDir() . '/' . $file;
  }

  public function getWebPath($file = null) {
    $dir = str_replace(DIRECTORY_SEPARATOR, '/', $this->getUploadDir());
    return null === $file ? '/'.$this->getUploadDir() : $dir . '/' . $file;
  }

  protected function getUploadRootDir() {
    // the absolute directory path where uploaded documents should be saved
    return getcwd() . DIRECTORY_SEPARATOR . $this->getUploadDir();
  }

  public function getMediaDir() {
    return __DIR__ . '/../../../../web';
  }

  protected function getUploadDir() {
    // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
    return 'media' . DIRECTORY_SEPARATOR . $this->getType() . DIRECTORY_SEPARATOR . $this->getId();
  }

  private function cropImage($image, $dest_image, $wsize = 64, $hsize = 64, $jpg_quality = 90) {
    $imageHelper = new ImageHelper($image);
    $imageHelper->resizeImage($dest_image, $wsize, $hsize, 'crop');
  }

  public function getThumbnail($w = 64, $h = 64, $image = null) {
    if (is_null($image)) {
      return 'nothing.jpg';
    }
    else {
      $extract = explode('.', $image);
      $image = str_replace('.' . end($extract), '', $image);
      $ext = end($extract);
    }
    if (!file_exists($this->getAbsolutePath($image . '_' . $w . 'x' . $h . '.' . $ext)))
      if (file_exists($this->getAbsolutePath($image . '.' . $ext)))
        $this->cropImage($this->getAbsolutePath($image . '.' . $ext), $this->getAbsolutePath($image . '_' . $w . 'x' . $h . '.' . $ext), $w, $h);
    return $this->getWebPath($image . '_' . $w . 'x' . $h . '.' . $ext);
  }

  protected abstract function getType();
}