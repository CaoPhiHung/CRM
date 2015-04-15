<?php

namespace Vietland\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vietland\UserBundle\Import\ImportUser;

class ImportUserFormType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('fileupload', 'file', array('label' => 'form.datafile'));
    }
    
    public function getName() {
        return 'vietland_import_user_type';
    }

}