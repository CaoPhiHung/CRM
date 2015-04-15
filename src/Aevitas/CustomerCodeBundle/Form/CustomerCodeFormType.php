<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CustomerCodeFormType
 *
 * @author naygum
 */
namespace Aevitas\CustomerCodeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Aevitas\CustomerCodeBundle\Document\CustomerCode;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CustomerCodeFormType extends AbstractType {
    private $trans;
    public function __construct($trans) {
        $this->trans = $trans;       
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('store', 'document', array('class'=>'Aevitas\LevisBundle\Document\Store', 'property'=>'name', 'label' => $this->trans->trans('Store')))
                ->add('prefix', 'number', array('label' => $this->trans->trans('Prefix')))
                ->add('start', 'number', array('label' => $this->trans->trans('Start')))
                ->add('end', 'number', array('label' => $this->trans->trans('End')))
         ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Aevitas\CustomerCodeBundle\Document\CustomerCode'
        ));
    }

    public function getName() {
        return 'aevitas_customer_code';
    }
}
