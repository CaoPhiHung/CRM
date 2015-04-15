<?php

namespace Vietland\AevitasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormMessageKard
 *
 * @author HOME
 */
class AnniversaryFormType extends AbstractType {

    protected $require;
    protected $trans;

    public function __construct($trans, $require = true) {
        $this->trans = $trans;
        $this->require = $require;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('id', 'hidden')
                ->add('name', 'text', array('attr' => array('placeholder' => $this->trans->trans('Anniversary name'),'class' => 'anniname')))
                ->add('date', 'date', array('format' => 'dd-MM-yyyy', 'widget' => 'single_text','attr' => array('class' => 'datetime')));
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Vietland\AevitasBundle\Document\Anniversary'
        );
    }

    public function getName() {
        return 'anni';
    }

}
