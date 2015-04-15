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
use Aevitas\LevisBundle\Document\GiftMeta;

class FormGiftMetaType extends AbstractType {

    public $trans;
    public $cat;

    public function __construct($trans) {
        $this->trans = $trans;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('id', 'hidden')
                ->add('gid', 'hidden')
                ->add('name', 'hidden')
                ->add('count', 'number', array('required' => true, 'label' => $this->trans->trans('Quantity')))
                ->add('ship', 'choice', array(
                    'choices' => GiftMeta::getShippingMethod($this->trans),
                    'label' => $this->trans->trans('Shipping Method')
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Aevitas\LevisBundle\Document\GiftMeta'
        ));
    }

    public function getName() {
        return 'aevitas_giftmeta';
    }

}

