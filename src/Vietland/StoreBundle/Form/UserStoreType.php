<?php

namespace Vietland\StoreBundle\Form;

/**
 * @author RYANTRAN
 */
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserStoreType extends AbstractType {

    public $trans;

    public function __construct($trans) {
        $this->trans = $trans;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('email', 'email')
                ->add('plainPassword', 'repeated', array('required' => true, 'label' => $this->trans->trans('Create password'),
                        'type' => 'password',
                        'second_options' => array('label' => $this->trans->trans('Confirm password'))))
                ->add('storeId', 'hidden')
                ->add('cellphone')
                ->add('firstname')
                ->add('lastname');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Vietland\UserBundle\Document\User'
        ));
    }

    public function getName() {
        return 'aevitas_store';
    }

}