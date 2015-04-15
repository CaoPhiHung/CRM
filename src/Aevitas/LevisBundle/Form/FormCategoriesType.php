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

class FormCategoriesType extends AbstractType{
    public $trans;
    public function __construct($trans) {
        $this->trans = $trans;       
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name', 'text')
                ->add('id', 'hidden')
                ->add('description', 'textarea', array('attr' => array('class' => 'wysihtml5')))
                ->add('parent', 'document', array('class'=>'Aevitas\LevisBundle\Document\Categories', 'property'=>'name', 'required' => false, 'label' => 'Category Parent'));
    }

     public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Aevitas\LevisBundle\Document\Categories'
        ));
    }

    public function getName() {
        return 'aevitas_categories';
    }
  //put your code here
}