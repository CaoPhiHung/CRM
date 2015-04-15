<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormItemType
 *
 * @author Truong
 */
namespace Aevitas\LevisBundle\Form;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FormItemType extends AbstractType{
    private $trans;
    public function __construct($trans) {
        $this->trans = $trans;       
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('code', null, array('label' => $this->trans->trans('Code')))
                ->add('discount', null, array('label' => $this->trans->trans('Discount')))
                ->add('description', null, array('label' => $this->trans->trans('Decription')))
         ;
    }

     public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Aevitas\LevisBundle\Document\Item'
        ));
    }

    public function getName() {
        return 'aevitas_item';
    }
}

?>
