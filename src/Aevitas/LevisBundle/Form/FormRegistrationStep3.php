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

class FormRegistrationStep3 extends AbstractType {

    public $trans;

    public function __construct($trans) {
        $this->trans = $trans;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
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
        $builder->add('mari', 'choice', array('choices' => User::getMarriageStatus($this->trans),'empty_value' => $this->trans->trans('Marital status'),'label' => $this->trans->trans('Maried')))
                ->add('kids', 'choice', array('choices' => array('0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '+4'),'empty_value' => $this->trans->trans('Have kids?'), 'label' => $this->trans->trans('Child')))
                ->add('ocpu','choice', array('choices' => $occupations,'empty_value' => $this->trans->trans('Occupation'), 'label' => $this->trans->trans('Occupation')))
                ->add('inco','choice', array('choices' => $incomes, 'label' => $this->trans->trans('Income'),'empty_value' => $this->trans->trans('Income')));
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
