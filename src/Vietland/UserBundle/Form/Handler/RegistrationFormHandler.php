<?php

namespace Vietland\UserBundle\Form\Handler;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use FOS\UserBundle\Model\UserManagerInterface;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Mailer\MailerInterface;
use Vietland\AdsBundle\Document\SmsConfirm;
use FOS\UserBundle\Form\Handler\RegistrationFormHandler as BaseHandler;
use Doctrine\ODM\MongoDB\DocumentManager;

class RegistrationFormHandler extends BaseHandler {

    protected $dm;
    protected $trans;
    public function __construct(Form $form, Request $request, UserManagerInterface $userManager, MailerInterface $mailer, $documentManager, $translator) {
        $this->form = $form;
        $this->request = $request;
        $this->userManager = $userManager;
        $this->mailer = $mailer;
        $this->dm = $documentManager;
        $this->trans = $translator;
    }

    public function process($confirmation = false) {
        $user = $this->userManager->createUser();
        $this->form->setData($user);

        if ('POST' == $this->request->getMethod()) {
            $this->form->bindRequest($this->request);
            $cellphone = $user->getCellphone();
            $smsConfirm = $user->getSmsconfirm();
            
            $smsChecked = $this->dm->getRepository('VietlandAdsBundle:SmsConfirm')->findOneBy(array('cellphone' => $cellphone, 'smsConfirmKey' => $smsConfirm));
            if(!($smsChecked instanceof SmsConfirm)){
                echo json_encode(array('status' => false, 'error' => $this->trans->trans('Check your SMS Confirm code')));
                exit;
            }
            if ($this->form->isValid()) {
                $this->onSuccess($user, $confirmation);
                return true;
            } else {
                $message = "";
                foreach($this->form->getErrors() as $error){
                    $message .= $this->trans->trans($error->getMessageTemplate()). '. ';
                };
                echo json_encode(array('status' => false, 'error' => $message));
                exit;
            }
        }

        return false;
    }

}