<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vietland\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilder;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;
use Symfony\Component\Form\FormBuilderInterface;
use Vietland\UserBundle\Document\User;

class ProfileFormType extends BaseType {

    private $translator;
    private $context;

    public function __construct($class, $translator, $context) {
        parent::__construct($class);
        $this->translator = $translator;
        $this->context = $context;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $this->buildUserForm($builder, $options);

        //$builder->add('avatarUpload', 'file', array('required' => false, 'label' => 'form.avatar', 'translation_domain' => 'FOSUserBundle'));
    }

    /**
     * Builds the embedded form representing the user.
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    protected function buildUserForm(FormBuilderInterface $builder, array $options) {
        $currentUser = $this->context->getToken()->getUser();
        $roles = $currentUser->getRoles();
        if ($currentUser->isEditing()) {
            if ($currentUser->getCellphone())
                $builder->add('cellphone', 'text', array('required' => false, 'label' => $this->translator->trans('Cellphone'), 'extra_fields_message' => 'Contact us to change this field', 'attr' => array('placeholder' => $this->translator->trans('Cellphone'), 'class' => 'input-box disable', 'disabled' => 'disabled')));
            else
                $builder->add('cellphone', 'text', array('required' => false, 'label' => $this->translator->trans('Cellphone'), 'attr' => array('placeholder' => $this->translator->trans('Cellphone'))));

            if (preg_match('/@/',$currentUser->getEmail()))
                $builder->add('email', 'text', array('required' => true, 'label' => $this->translator->trans('Email'), 'attr' => array('class' => 'input-box disable', 'autocomplete' => 'false')));
            else
                $builder->add('email', 'text', array('required' => true, 'label' => $this->translator->trans('Email'), 'attr' => array('autocomplete' => 'false')));
            $builder->add('firstname', 'text', array('required' => true, 'label' => $this->translator->trans('First Name')))
                    ->add('lastname', 'text', array('required' => true, 'label' => $this->translator->trans('Last Name')))
                    ->add('dob', 'date', array('required' => false, 'disabled'=>true,'format' => 'dd-MM-yyyy', 'widget' => 'single_text', 'label' => $this->translator->trans('Birthday')))
                    ->add('sex', 'choice', array('required' => false, 'empty_value' => false, 'choices' => User::getSexOptions($this->translator), 'label' => $this->translator->trans('Sex')))
                    ->add('address1', 'text', array('required' => false, 'label' => $this->translator->trans('Address'), 'attr' => array('placeholder' => $this->translator->trans('Address'))))
                    ->add('address2', 'text', array('required' => false, 'label' => $this->translator->trans('Shipping Address'), 'attr' => array('placeholder' => $this->translator->trans('For shipping'))))
                    ->add('dship', 'checkbox', array('required' => false, 'label' => $this->translator->trans('Use as default shipping')))
                    ->add('district', 'text', array('required' => false, 'label' => $this->translator->trans('District')))
                    ->add('city', 'text', array('required' => false, 'label' => $this->translator->trans('City')));
        } else {
            if ($currentUser->isAddingProfile()) {
                $builder->add('storeId', 'hidden')
                        ->add('username', 'hidden')
                        ->add('email', 'email', array('label' => 'Username by Email', 'translation_domain' => 'FOSUserBundle'))
                        ->add('firstname', 'text', array('required' => false, 'label' => 'form.firstname', 'translation_domain' => 'FOSUserBundle'))
                        ->add('lastname', 'text', array('required' => false, 'label' => 'form.lastname', 'translation_domain' => 'FOSUserBundle'))
                        ->add('cellphone', 'text', array('required' => true, 'label' => 'form.cellphone', 'translation_domain' => 'FOSUserBundle'))
                        ->add('plainPassword', 'repeated', array('type' => 'password', 'first_name' => 'Password', 'second_name' => 'Repeat'))
                        ->add('sex', 'choice', array('label' => 'form.sex', 'translation_domain' => 'FOSUserBundle', 'choices' => User::getSexOptions($this->translator)));
            }
            else
                $builder
                        ->add('username', 'text', array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle'))
                        ->add('email', 'text', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
                        ->add('firstname', 'text', array('required' => false, 'label' => 'form.firstname', 'translation_domain' => 'FOSUserBundle'))
                        ->add('lastname', 'text', array('required' => false, 'label' => 'form.lastname', 'translation_domain' => 'FOSUserBundle'))
                        ->add('cellphone', 'text', array('required' => true, 'label' => 'form.cellphone', 'translation_domain' => 'FOSUserBundle'))
                        ->add('sex', 'choice', array('label' => 'form.sex', 'translation_domain' => 'FOSUserBundle', 'choices' => User::getSexOptions($this->translator)))
                        ->add('CCode', 'text', array('label' => 'form.customercode', 'translation_domain' => 'FOSUserBundle'))
                        ->add('lang', 'hidden')
                        ->add('join','date')
                        ->add('dob', 'date', array('label' => 'form.dob', 'read-only'=>true,'translation_domain' => 'FOSUserBundle', 'years' => range(1930, 2000)))
                        ->add('refcel', 'text', array('required' => false, 'label' => $this->translator->trans('Referal Friend\'s Code')))
//                    ->add('age', 'number', array('required' => false, 'label' => 'form.age', 'translation_domain' => 'FOSUserBundle'))
//                    ->add('fbid', 'text', array('required' => false, 'label' => 'form.fbid', 'translation_domain' => 'FOSUserBundle'))
//                    ->add('glid', 'text', array('required' => false, 'label' => 'form.glid', 'translation_domain' => 'FOSUserBundle'))
//                    ->add('about', 'textarea', array('required' => false, 'label' => 'form.about', 'translation_domain' => 'FOSUserBundle'))
                ;
        }
    }

    public function getName() {
        return 'vietland_user_profile';
    }

}
