<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormGiftArticleType
 *
 * @author RYANTRAN
 */

namespace Aevitas\LevisBundle\Form;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Aevitas\LevisBundle\Document\GiftArticle;
use Vietland\UserBundle\Document\User;

class FormGiftArticleType extends AbstractType {

    public $trans;
    public $category;
    public $cat;

    public function __construct($trans, $category = array(), $cat) {
        $this->trans = $trans;
        $this->setCategories($cat);
        $this->category = $category;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name', 'text', array('required' => true, 'label' => $this->trans->trans('Name:')))
                ->add('categories', 'choice', array(
                    'choices' => $this->category,
                    'label' => 'Select category'
                ))
                ->add('cat', 'choice', array('choices' => $this->cat))
                ->add('tags', 'text',array('required' => false))
                ->add('images','hidden',array('required' => false))
                ->add('description', 'textarea', array('attr' => array('class' => 'wysihtml5 span10', 'required' => false)))
                ->add('excerpt', 'textarea', array('attr' => array('class' => 'wysihtml5 span10', 'required' => false, 'label' => $this->trans->trans('short description'))))
                ->add('point', 'integer', array('required' => true, 'label' => $this->trans->trans('Point')))
                ->add('inventory', 'integer', array('required' => true, 'label' => $this->trans->trans('Inventory')))
                ->add('isActive', 'choice', array(
                    'choices' => array(
                        1 => 'Yes',
                        0 => 'No'
                    ),
                    'data' => 1,
                    'expanded' => true,
                    'label' => $this->trans->trans('Active'),
                    'required' => false,
                    'empty_value' => false
                ))
                ->add('DeliveryType', 'choice', array(
                    'choices' => GiftArticle::getDeliveryTypeOption(),
                    'expanded' => true,
                    'label' => $this->trans->trans('Delivery Type'),
                    'required' => false,
                    'empty_value' => 'Both'
                ))
                ->add('gender', 'choice', array(
                    'choices' => User::getSexOptions($this->trans),
                    'expanded' => true,
                    'label' => $this->trans->trans('Gender'),
                    'required' => false,
                    'empty_value' => 'Both'
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Aevitas\LevisBundle\Document\GiftArticle'
        ));
    }

    public function setCategories($cat) {
        $cat = array_filter(explode(',', $cat));
        $categories = array();
        foreach ($cat as $c) {
            $categories[$c] = $c;
        }
        $this->cat = $categories;
    }

    public function getName() {
        return 'aevitas_gift';
    }

    //put your code here
}

