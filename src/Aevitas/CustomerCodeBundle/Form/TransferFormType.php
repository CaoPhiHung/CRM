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

class TransferFormType extends AbstractType {

    private $trans;

    public function __construct($trans) {
        $this->trans = $trans;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('start', 'number', array('label' => $this->trans->trans('Seri start from'), 'attr' => array('disabled' => 'disabled')))
                ->add('end', 'number', array('label' => $this->trans->trans('and end by')))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Aevitas\CustomerCodeBundle\Document\Transfer'
        ));
    }

    public function getName() {
        return 'transfer';
    }

}