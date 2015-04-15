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
class CoordinateFormType extends AbstractType {

    protected $require;

    protected $trans;
    public function __construct($trans, $require = true) {
        $this->trans = $trans;
        $this->require = $require;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('latitude', 'text', array('required' => $this->require, 'label' => $this->trans->trans('Lat')))
                ->add('longitude', 'text', array('required' => $this->require, 'label' => $this->trans->trans('Long')));
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Vietland\AevitasBundle\Document\Coordinate'
        );
    }

    public function getName() {
        return 'coordinate';
    }

}
