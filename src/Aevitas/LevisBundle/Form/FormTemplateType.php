<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormTemplateType
 *
 * @author Truong LD <mr.truongld at gmail.com>
 */
namespace Aevitas\LevisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Aevitas\LevisBundle\Document\EmailSmsTemplate;
use Vietland\UserBundle\Document\User;

class FormTemplateType extends AbstractType {
    private $translator;
    private $type;


    public function __construct($trans,$type='sms'){
        $this->translator = $trans;
        $this->type=$type;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('type', 'text',
                    array(
                        'required' => true, 
                        'disabled'=>true,
                        'label' => 'Temlate Type(*)',
                        'data'=>$this->type
                        ))
                ->add('name', 'text', array('required' => true, 'label' => 'Title (*)'))
                // ->add('gender', 'choice', array('choices' => User::getSexOptions($this->translator),'empty_value' => 'Global', 'required' => false, 'label' => 'Gender'))
                // ->add('level', 'choice', array('choices' => User::getLevelOptions($this->translator),'empty_value' => 'Global', 'required' => false, 'label' => 'Level'))
                // ->add('group', 'hidden', array('label' => 'Store'))
                // ->add('city', 'hidden', array('required' => false, 'label' => 'City'))
                // ->add('district', 'hidden', array('required' => false, 'label' => 'District'))
                ->add('bodysms', 'textarea', 
                    array(
                        'max_length'=>320,
                        'required' => true, 
                        'label' => 'Body Sms template',
                        'attr'=>array('class'=>'wysihtml5 span12','rows'=>5,'form'=>'submit_create_template',)
                        ))
        ;
    }

    public function getName() {
        return 'aevitas_edit_template';
    }
}