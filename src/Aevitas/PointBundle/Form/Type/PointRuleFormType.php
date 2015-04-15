<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PointRuleFormType
 *
 * @author truongld
 */

namespace Aevitas\PointBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Aevitas\PointBundle\Document\PointRule;
use \Vietland\UserBundle\Document\User;

class PointRuleFormType extends AbstractType{
    private $translator;
    private $actions;


    public function __construct($trans, $actions){
        $this->translator = $trans;
        $this->actions = $actions;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', null, array('required' => true, 'label' => 'Name (*)'))
                ->add('action', 'choice', array('choices' => $this->actions, 'required' => false, 'label' => 'Action'))
                ->add('gender', 'choice', array('choices' => User::getSexOptions($this->translator), 'required' => false, 'label' => 'Gender'))
                ->add('level', 'choice', array('choices' => User::getLevelOptions($this->translator),'empty_value' => 'Global', 'required' => false, 'label' => 'Level'))
                ->add('store', 'hidden', array('label' => 'Store (*)'))
                ->add('point', null, array('required' => true, 'label' => 'Point (*)'))
                ->add('operation', 'choice', array('choices' => PointRule::getOperationOptions(), 'required' => false, 'label' => 'Operation type'))
                ->add('anniversary', 'checkbox', array('required' => false, 'label' => 'Anniversary check'))
                ->add('birthday', 'checkbox', array('required' => false, 'label' => 'Birthday check'))
                ->add('bonus', 'checkbox', array('required' => false, 'label' => 'Bonus check'))
        ;
    }

    public function getName() {
        return 'aevitas_point_rule';
    }
}