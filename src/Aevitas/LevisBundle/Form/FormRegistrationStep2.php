<?php

namespace Aevitas\LevisBundle\Form;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormRegistrationStep2
 *
 * @author apple
 */
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Vietland\UserBundle\Document\User;

class FormRegistrationStep2 extends AbstractType {

    public $trans;
    private $enroll;

    public function __construct($trans, $enroll = false) {
        $this->trans = $trans;
        $this->enroll = $enroll;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        if ($this->enroll)
            $builder->add('plainPassword', 'repeated', array('required' => true, 'label' => $this->trans->trans('Create password'),
                'type' => 'password',
                'first_options' => array('label' => $this->trans->trans('Password')),
                'second_options' => array('label' => $this->trans->trans('Confirm password'))));
        else {
            $builder
                    ->add('dob', 'date', array('required' => false, 'format' => 'dd-MM-yyyy', 'years' => range(1940, 2010), 'label' => $this->trans->trans('Birthday')))->add('firstname', 'text', array('required' => false, 'label' => $this->trans->trans('First Name')))
                    ->add('lastname', 'text', array('required' => false, 'label' => $this->trans->trans('Last Name')))
                    ->add('sex', 'choice', array('required' => false, 'empty_value' => $this->trans->trans('Gender'), 'choices' => User::getSexOptions($this->trans), 'label' => $this->trans->trans('Sex')))
                    ->add('cellphone', 'text', array('required' => false, 'label' => $this->trans->trans('Cellphone')))
                    ->add('email', 'text', array('required' => false, 'label' => $this->trans->trans('Email')))
                    ->add('address1', 'text', array('required' => false, 'label' => $this->trans->trans('Address')))
                    ->add('district', 'text', array('required' => false, 'label' => $this->trans->trans('District')))
                    ->add('city', 'text', array('required' => false, 'label' => $this->trans->trans('City')));

            $incomes = array(
                '5' => $this->trans->trans('1 - 5 million VND'),
                '10' => $this->trans->trans('5 - 10 million VND'),
                '20' => $this->trans->trans('10 - 20 million VND'),
                '30' => $this->trans->trans('20 - 30 million VND'),
                '40' => $this->trans->trans('30 - 40 million VND'),
                '50' => $this->trans->trans('40 - 50 million VND'),
                '60' => $this->trans->trans('50 - 60 million VND'),
                '70' => $this->trans->trans('60 - 70 million VND'),
                '80' => $this->trans->trans('70 - 80 million VND'),
                '90' => $this->trans->trans('80 - 90 million VND'),
                '100' => $this->trans->trans('90 - 100 million VND'),
                '101' => $this->trans->trans('>100 million VND'),
            );
            $occupations = array(
                '1' => $this->trans->trans('Student'),
                '2' => $this->trans->trans('Business Owner'),
                '3' => $this->trans->trans('Government Officer'),
                '4' => $this->trans->trans('Official of Multinational Company'),
                '5' => $this->trans->trans('NGO Official'),
            );
            $builder->add('mari', 'choice', array('choices' => User::getMarriageStatus($this->trans), 'empty_value' => $this->trans->trans('Marital status'), 'label' => $this->trans->trans('Married')))
                    ->add('kids', 'choice', array('choices' => array('0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '+4'), 'empty_value' => $this->trans->trans('Have kids?'), 'label' => $this->trans->trans('Child')))
                    ->add('ocpu', 'choice', array('choices' => $occupations, 'empty_value' => $this->trans->trans('Occupation'), 'label' => $this->trans->trans('Occupation')))
                    ->add('inco', 'choice', array('choices' => $incomes, 'label' => $this->trans->trans('Income'), 'empty_value' => $this->trans->trans('Income')));
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Vietland\UserBundle\Document\User'
        ));
    }

    public function getName() {
        return 'reg_step';
    }

}
