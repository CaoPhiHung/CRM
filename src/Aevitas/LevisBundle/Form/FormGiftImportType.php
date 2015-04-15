<?php

namespace Aevitas\LevisBundle\Form;

/**
 * Description of FormGiftImportType
 *
 * @author RYANTRAN
 */

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class FormGiftImportType extends AbstractType {
  
  //put your code here
   public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder->add('fileupload', 'file', array('label' => 'File'));
  }
  
  public function getName() {
    return 'giftimport';
  }
}

