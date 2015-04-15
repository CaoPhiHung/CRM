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
class EmailTemplate extends AbstractType {

    protected $trans;

    public function __construct($trans) {
        $this->trans = $trans;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('templateSource', 'textarea', array('required' => true, 'label' => $this->trans->trans('Lat')));
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Vietland\AevitasBundle\Helper\MailerTemplate'
        );
    }

    public function getName() {
        return 'emailtemplate';
    }

}
