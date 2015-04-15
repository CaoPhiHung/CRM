<?php

namespace Aevitas\LevisBundle\Form;

/**
 * Description of FormCategoriesType
 *
 * @author RYANTRAN
 */
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FormStoreType extends AbstractType{
    public $trans;
    public function __construct($trans) {
        $this->trans = $trans;       
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name', 'text', array('label' => $this->trans->trans('Name')))
                ->add('address', 'text', array('label' => $this->trans->trans('Address')))
                ->add('visible', 'checkbox', array('label' => $this->trans->trans('Visible for Loyalty Program')))
                ->add('id', 'hidden')
                ->add('city', 'hidden')
                ->add('district', 'hidden')
                ->add('oldid', 'hidden');
    }

     public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Aevitas\LevisBundle\Document\Store'
        ));
    }

    public function getName() {
        return 'aevitas_store';
    }
  //put your code here
}