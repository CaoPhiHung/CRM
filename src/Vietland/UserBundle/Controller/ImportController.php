<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegistrationController
 *
 * @author paulaan
 */

namespace Vietland\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Vietland\UserBundle\Import\ImportUser;
use Vietland\UserBundle\Form\Type\ImportUserFormType;
use Vietland\AevitasBundle\Controller\AevitasController;


class ImportController extends BaseController {
    
    /**
     * @Route("/backend/user/import-user", name="backend_import_user")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function importUsersAction(){
        $model = new ImportUser();
        $type = new ImportUserFormType();
        //var_dump($type);exit;
        $form = $this->createForm($type, $model);
        
        $model->setDm($this->get('doctrine_mongodb')->getManager());
        $model->setController($this);
        
        $request = $this->getRequest();
        if('POST' == $request->getMethod()){
            $form->bind($request);
            if ($form->isValid()) {
                //return $response;
            }
        }
        return $this->container->get('templating')->renderResponse(
                        'AevitasLevisBundle:Backend:ImportUser.html.twig', array(
                            'form' => $form->createView()
                        )
        );
    }
}