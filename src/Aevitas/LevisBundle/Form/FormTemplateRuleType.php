<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormTemplateType
 *
 * @author U-Matrix
 */
namespace Aevitas\LevisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Aevitas\ChannelBundle\Document\TemlateRule;
use Aevitas\ChannelBundle\Document\RuleOption;
use Vietland\UserBundle\Document\User;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints \Range;

class FormTemplateRuleType extends AbstractType {
    private $translator;
    private $entity;


    public function __construct($trans,$entity=null){
        $this->translator = $trans;
        $this->entity = $entity;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        
            $builder
                    ->add('templateRuleName', 'text', array('required' => true, 'label' => 'Rule Name (*)'))

                    ->add('emailtype', 'choice', 
                        array(
                            'mapped'=>false,
                            'choices' => RuleOption::getOptionTypeLabels($this->translator),
                            'empty_value' => '--Choose one--',
                            'required' => false,
                            'label' => 'Option Email Type',
                            'attr'=>array('class'=>'option-type')
                            ))
                    ->add('filter-email', 'text', array('mapped'=>false,'required' => false, 'label' => 'Filter by email'))

                    ->add('nametype', 'choice', 
                        array(
                            'mapped'=>false,
                            'choices' => RuleOption::getOptionTypeLabels($this->translator),
                            'empty_value' => '--Choose one--',
                            'required' => false,
                            'label' => 'Option UserName Type',
                            'attr'=>array('class'=>'option-type')
                            ))
                    ->add('filter-name', 'text', array('mapped'=>false,'required' => false, 'label' => 'Filter by username'))

                    ->add('gendertype', 'choice',
                        array(
                            'mapped'=>false,
                            'choices' => array(RuleOption::TYPE_EQUAL=>$this->translator->trans(RuleOption::TYPE_EQUAL_LABEL)),
                            'required' => true,
                            'read_only'=>true,   
                            'label' => 'Option Gender Type',
                            'attr'=>array('class'=>'option-type')
                            ))
                    ->add('filter-gender', 'choice', array('mapped'=>false,'choices' => RuleOption::getSexOptionType($this->translator),'empty_value' => '--Choose one--', 'required' => false, 'label' => 'Gender'))

                    ->add('leveltype','choice', 
                        array(
                            'mapped'=>false,
                            'choices' => array(RuleOption::TYPE_EQUAL=>$this->translator->trans(RuleOption::TYPE_EQUAL_LABEL)),
                            'required' => true,
                            'read_only'=>true,  
                            'label' => 'Option Level Type',
                            'attr'=>array('class'=>'option-type')
                            ))
                    ->add('filter-level', 'choice', array('mapped'=>false,'choices' => User::getLevelOptions($this->translator),'empty_value' => '--Choose one--', 'required' => false, 'label' => 'Level'))

                    ->add('pointtype', 'choice',
                        array('mapped'=>false,
                            'choices' => array(RuleOption::TYPE_BETWEEN=>$this->translator->trans(RuleOption::TYPE_BETWEEN_LABEL)),
                            'required' => true,
                            'read_only'=>true,  
                            'label' => 'Option Point Type',
                            'attr'=>array('class'=>'option-type')
                            ))

                    ->add('filter-fromPoint', 'number', array('mapped'=>false,'required' => false,'label' => 'From Point'))
                    ->add('filter-toPoint', 'number', array('mapped'=>false,'required' => false,'label' => 'To Point'))

                    ->add('filter-isbirthday', 'checkbox',
                         array(
                            'mapped'=>false,
                            'required' => false, 'label' => 'Is Birthday',
                            'attr'=>array('class'=>'check_birthday')
                            ))

                    ->add('filter-isanniversary', 'checkbox',
                         array(
                            'mapped'=>false,
                            'required' => false, 'label' => 'Is Anniversary'

                            ))

                    ->add('timertype', 'choice', 
                        array('mapped'=>false,
                            'choices' => RuleOption::getAutoTimeType($this->translator),
                            'empty_value'=>'None',
                            'required' => false, 
                            'label' => 'Option Auto Sending Type',
                            'attr'=>array('class'=>'option-type','onChange'=>'ontimertypechange($(this).val(),true)')
                            ))

                    ->add('timertype', 'choice', 
                        array('mapped'=>false,
                            'choices' => RuleOption::getAutoTimeType($this->translator),
                            'empty_value'=>'None',
                            'required' => false, 
                            'label' => 'Option Auto Sending Type',
                            'attr'=>array('class'=>'option-type','onChange'=>'ontimertypechange($(this).val(),true)')
                            ))

                    ->add('filter-timer1', 'datetime', 
                        array(
                            'widget'=>'choice',
                            'empty_value' => array('year' => 'Year', 'month' => 'Month', 'day' => 'Day','hour'=>'Hour'),
                            'with_minutes'=>false,
                            'date_format'=>'y M d H:00:00',
                            'years'=>array(date('Y')),
                            'mapped'=>false,
                            'required' => false, 
                            'disabled'=>true,
                            'label' => 'Set Time for auto',
                            'attr'=>array('class'=>'time-for-auto','style'=>'display:none;'),
                            'invalid_message'=>'Please chose correct date'
                            ))

                    ->add('filter-timer2','number',
                        array(
                            'label'=>false,
                            'attr'=>array('class'=>'time-for-auto','style'=>'display:none;'),
                            'mapped'=>false,
                            'required' => false,
                            'invalid_message'=>'Please insert number of days'
                            )
                        )

                    ->add('filter-timer3','number',
                        array(
                            'label'=>false,
                            'attr'=>array('class'=>'time-for-auto','style'=>'display:none;'),
                            'mapped'=>false,
                            'required' => false,
                            'invalid_message'=>'You must enter day between 1 - 31',
                            'constraints'=>new Range(array(
                                'min'        => 1,
                                'max'        => 31,
                                'minMessage' => 'You must enter day between 1 - 31',
                                'maxMessage' => 'You must enter day between 1 - 31'
                                ))
                            )
                        )
                    /* key of array base on cron require 1-7 | 1 for monday http://en.wikipedia.org/wiki/Cron
                    * we don't use 0 values for stub of PHP
                     */
                    ->add('filter-timer4','choice',
                        array(
                            'label'=>false,
                            'attr'=>array('class'=>'time-for-auto','style'=>'display:none;'),
                            'mapped'=>false,
                            'required' => false,
                            'invalid_message'=>'Please insert a valid date',
                            'choices' => array(
                                '7'=>'Sunday',
                                '1'=>'Monday',
                                '2'=>'Tuesday',
                                '3'=>'Wednesday',
                                '4'=>'Thursday',
                                '5'=>'Friday',
                                    '6'=>'Saturday'),
                            'empty_value'=>null
                            )
                        )

            ;

        
    }


    public function getName() {
        return 'aevitas_edit_template_rule';
    }
}