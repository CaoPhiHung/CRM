<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GroupFormType
 *
 * @author truongld
 */

namespace Vietland\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vietland\UserBundle\Document\Group;
use Vietland\UserBundle\Document\User;

class GroupFormType extends AbstractType {
    
    private $translator;
    
    public function __construct($trans){
        $this->translator = $trans;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', null, array('label' => 'form.group.name', 'translation_domain' => 'FOSUserBundle'))
                ->add('roles', 'choice', array('choices' => User::getRoleOptions($this->translator), 'multiple' => true))
        ;
    }

    public function getName() {
        return 'vietland_user_group';
    }

}