<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormTemplateType
 *
 * @author U-matrix
 */
namespace Aevitas\LevisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Aevitas\LevisBundle\Document\EmailSmsTemplate;
use Vietland\UserBundle\Document\User;
use Vietland\AevitasBundle\Document\City;

class FormEmailTemplateType extends AbstractType {
    private $translator;
    private $tokenStorage;
    private $type;


    public function __construct($trans,$type='mail'){
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
                ->add('name', 'text', array('required' => true, 'label' => 'Temlate Name (*)'))
                // ->add('gender', 'choice', array('choices' => User::getSexOptions($this->translator),'empty_value' => 'Global', 'required' => false, 'label' => 'Gender'))
                // ->add('level', 'choice', array('choices' => User::getLevelOptions($this->translator),'empty_value' => 'Global', 'required' => false, 'label' => 'Level'))
                ->add('group', 'hidden', array('label' => 'Store'))
                // ->add('city', 'hidden', array('required' => false, 'label' => 'City'))
                // ->add('city', 'document', 
                //     array('required' => false, 
                //         'label' => 'City',
                //     'class'=>'Vietland\AevitasBundle\Document\City',
                //     'property'=>'name'
                //         ))
                // ->add('district', 'hidden', array('required' => false, 'label' => 'District'))
                
                ->add('bodymail', 'textarea', 
                    array(
                        'max_length'=>320,
                        'required' => true, 
                        'label' => 'Body Email template',
                        'attr'=>array('class'=>'wysihtml5 span12','rows'=>5,'form'=>'submit_create_template')
                        ))
        ;
        // $formModifier = function (FormInterface $form, City $city = null) {
        //     $district = null === $city ? array() : $city->getAvailableDistricts();

        //     $form->add('district', 'document', 
        //         array(
        //             'required' => false, 
        //             'label' => 'District',
        //             'property'=>'name',
        //             'class'=>'Vietland\AevitasBundle\Document\District',
        //             'choices'     => $district
        //     ));
        // };

        // $builder->addEventListener(
        //     FormEvents::PRE_SET_DATA,
        //     function (FormEvent $event) use ($formModifier) {
        //         // this would be your entity, i.e. City
        //         $data = $event->getData();

        //         $formModifier($event->getForm(), $data->getCity());
        //     }
        // );

        // $builder->get('city')->addEventListener(
        //     FormEvents::POST_SUBMIT,
        //     function (FormEvent $event) use ($formModifier) {
        //         // It's important here to fetch $event->getForm()->getData(), as
        //         // $event->getData() will get you the client data (that is, the ID)
        //         $city = $event->getForm()->getData();

        //         // since we've added the listener to the child, we'll have to pass on
        //         // the parent to the callback functions!
        //         $formModifier($event->getForm()->getParent(), $city);
        //     }
        // );
    }


    

    public function getName() {
        return 'aevitas_edit_template';
    }
}