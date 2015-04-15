<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GiftLog
 *
 * @author RYANTRAN
 */
namespace Aevitas\LevisBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;
use Vietland\AevitasBundle\Document\Log;

/**
 * @MongoDB\Document
 */

class GiftLog extends Log{
  //put your code here
}

