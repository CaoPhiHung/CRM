<?php

namespace Vietland\StoreBundle\Form;

/**
 * @author RYANTRAN
 */
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Vietland\UserBundle\Document\User;
class FormUserStoreType extends AbstractType {

    public $trans;

    public function __construct($trans) {
        $this->trans = $trans;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('AccountsName', 'text', array('label' => $this->trans->trans('Firstname')))
                ->add('Lastname','text', array('required' => false))
                ->add('Email','text', array('required' => false))
                ->add('CellNo','text', array('required' => false))
                ->add('CCode', 'text')
                ->add('LedgerID', 'hidden')
                ->add('Gender', 'choice', array('choices' => array(User::MALE => $this->trans->trans('Male'),User::FEMALE => $this->trans->trans('Female'))))
                ->add('Address1','text',array('required' => false))
                ->add('Address2','text',array('required' => false))
                ->add('Address3','text',array('required' => false))
                ->add('Store','text', array('required' => false))
                ->add('BDay','date', array('required' => false, 'years' => range(1960, 2000)))
                ->add('Anniversary','date', array('required' => false))
                ->add('AccountsType', 'hidden');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Vietland\StoreBundle\Entity\POSUser'
        ));
    }

    public function getName() {
        return 'aevitas_store';
    }

}