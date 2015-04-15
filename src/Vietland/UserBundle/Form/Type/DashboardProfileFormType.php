<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DashboardProfileFormType
 *
 * @author apple
 */

namespace Vietland\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vietland\UserBundle\Document\User;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DashboardProfileFormType extends AbstractType {

    private $trans;

    public function __construct($trans) {
        $this->trans = $trans;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('firstname', 'text', array('required' => true, 'label' => $this->trans->trans('First Name')))
                ->add('lastname', 'text', array('required' => true, 'label' => $this->trans->trans('Last Name')))
                ->add('email', 'text', array('required' => true, 'label' => $this->trans->trans('Email')))
                ->add('dob', 'date', array('required' => false, 'format' => 'dd-MM-yyyy', 'widget' => 'single_text', 'label' => $this->trans->trans('Birthday')))
                ->add('sex', 'choice', array('required' => false, 'empty_value' => false, 'choices' => User::getSexOptions($this->trans), 'label' => $this->trans->trans('Sex')))
                ->add('address1', 'text', array('required' => false, 'label' => $this->trans->trans('Address')))
                ->add('address2', 'text', array('required' => false, 'label' => $this->trans->trans('Shipping Address')))
                ->add('dship', 'checkbox', array('required' => false, 'label' => $this->trans->trans('Use as default shipping')))
                ->add('district', 'text', array('required' => false, 'label' => $this->trans->trans('District')))
                ->add('city', 'text', array('required' => false, 'label' => $this->trans->trans('City')));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Vietland\UserBundle\Document\User'
        ));
    }

    public function getName() {
        return 'db_profile';
    }

}