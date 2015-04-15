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
use Aevitas\LevisBundle\Document\Cart;
use Vietland\UserBundle\Document\User;

class FormCartType extends AbstractType {

    public $trans;
    public $category;
    public $cat;
    private $mode;

    public function __construct($trans, $modeadmin = true) {
        $this->trans = $trans;
        $this->mode = $modeadmin;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('sid', 'hidden');
        if ($this->mode)
            $builder->add('status', 'choice', array('choices' => Cart::getStatusOptions($this->trans)));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Aevitas\LevisBundle\Document\Cart'
        ));
    }

    public function getName() {
        return 'cart';
    }

}

