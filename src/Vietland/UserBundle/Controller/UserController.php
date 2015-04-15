<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author truongld
 */

namespace Vietland\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Vietland\AevitasBundle\Controller\AevitasController;
use Vietland\UserBundle\Document\Group;
use Vietland\UserBundle\Form\Type\GroupFormType;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Collections\ArrayCollection;

class UserController extends BaseController {

    /**
     * @Route("/user/search.{_format}", name="backend_user_search",defaults={"_format"="json"})
     */
    public function searchAction($_format) {
        $request = $this->get('request');
        $kw = (string) $request->get('q');
        $callback = $request->get('callback');
        $return = array();
        if (isset($kw)) {
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $qb = $dm->createQueryBuilder('VietlandUserBundle:User');
            $qb->addOr($qb->expr()->field('username')->equals(new \MongoRegex("/^{$kw}/i")))->limit(10);
            $users = $qb->getQuery()->execute();
            $returnArray = array();

            foreach ($users as $u) {
                $returnArray[] = array('id' => $u->getId(), 'text' => $u->getUsername());
            }
        }
        exit($callback . '(' . json_encode($returnArray) . ')');
    }
    
    /**
     * @Route("/validate/email_cellphone", name="validate_email_cellphone")
     */
    public function validateEmailCellphoneAction(){
        $user = $this->get('security.context')->getToken()->getUser();
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $request = $this->getRequest();
        $email = $request->get('email');
        $cellphone = $request->get('cellphone');
        if($email && $cellphone){
            $checkEmail = $dm->getRepository("VietlandUserBundle:User")->findOneByEmail($email);
            if(is_object($checkEmail) && $checkEmail->getId() !== $user->getId()){
                exit(json_encode(array('status' => false, 'error' => array('input' => 'email', 'message' => 'Email already exists'))));
            }
            $checkCellphone = $dm->getRepository("VietlandUserBundle:User")->findOneByCellphone($cellphone);
            if(is_object($checkCellphone) && $checkCellphone->getId() != $user->getId()){
                exit(json_encode(array('status' => false, 'error' => array('input' => 'cellphone', 'message'=> 'Cellphone already exists'))));
            }
            else
                exit(json_encode (array('status' => true)));
        }
        exit(json_encode(array('status' => true)));
    }

    /**
     * @Route("/user/update/joined", name="update_joined")
     */
    public function updateJoinedAction() {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $users = $dm->getRepository('VietlandUserBundle:User')->findAll();
        $index = 0;
        foreach ($users as $user) {
            $user->updateJoined();
            $dm->persist($user);
            $index++;
        }
        $dm->flush();
        return new Response('Update number account: '.$index);
    }

}
