<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProgramFormType
 *
 * @author Truong
 */

namespace Aevitas\PointBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Aevitas\PointBundle\Document\Program;

class ProgramFormType extends AbstractType {
    
    private $translator;
    
    public function __construct($trans){
        $this->translator = $trans;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', null, array('required' => true, 'label' => 'Name (*)'))
                ->add('startDate', null, array('required' => true, 'label' => 'start date (*)'))
                ->add('endDate', null, array('required' => true, 'label' => 'end date (*)'))
                /**/
        ;
    }

    public function getName() {
        return 'aevitas_program';
    }
}

?>
