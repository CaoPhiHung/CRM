<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProgramController
 *
 * @author Truong
 */

namespace Aevitas\PointBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Aevitas\PointBundle\Document\Program;
use Aevitas\PointBundle\Form\Type\CloneProgramFormType;
use Aevitas\PointBundle\Form\Type\ProgramFormType;
use JMS\SecurityExtraBundle\Annotation\Secure;

class ProgramController extends Controller {

    /**
     * @Route("/backend/program", name="backend_program_list")
     * @Secure(roles="ROLE_ADMIN, ROLE_POINT")
     * @Template()
     */
    public function indexAction() {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $rules = $dm->getRepository('AevitasPointBundle:Program')->findAll();
        //var_dump($rules->getQuery());exit;

        return array('programs' => $rules);
    }

    /**
     * @Route("/backend/program/addnew", name="backend_program_addnew")
     * @Secure(roles="ROLE_ADMIN, ROLE_POINT")
     * @Template()
     */
    public function addNewAction() {
        $program = new Program();
        $type = new ProgramFormType($this->get('translator'));
        //var_dump($type);exit;
        $form = $this->createForm($type, $program);

        $request = $this->getRequest();
        if ('POST' == $request->getMethod()) {
            $dm = $this->get('database_manager');
            $form->bind($request);
            if ($form->isValid()) {
                if (count($dm->getRepository('AevitasPointBundle:Program')->findBy(array('name' => $program->getName()))) > 0) {
                    $this->getRequest()->getSession()->getFlashBag()->add('notice', 'program name already exists!');
                } else {
                    $dm = $this->get('doctrine_mongodb')->getManager();
                    $dm->persist($program);
                    $dm->flush();

                    $router = $this->get('router');
                    $this->getRequest()->getSession()->getFlashBag()->add('notice', 'New program has been created!');
                    return new RedirectResponse($router->generate('backend_program_list'));
                }
            } else {
                $this->getRequest()->getSession()->getFlashBag()->add('notice', 'form invalid!');
            }
        }

        return array('form' => $form->createview());
    }

    /**
     * @Route("/backend/program/edit/{id}", name="backend_program_edit")
     * @Secure(roles="ROLE_ADMIN, ROLE_POINT")
     * @Template()
     */
    public function editAction($id) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $program = $dm->getRepository('AevitasPointBundle:Program')->find($id);
        $type = new ProgramFormType($this->get('translator'));
        $form = $this->createForm($type, $program);
        $form->setData($program);

        $request = $this->getRequest();
        if ('POST' == $request->getMethod()) {
            $form->bind($request);
            if ($form->isValid()) {
                $dm->persist($program);
                $dm->flush();

                $router = $this->get('router');
                $this->getRequest()->getSession()->getFlashBag()->add('notice', 'The program has been edited!');
                return new RedirectResponse($router->generate('backend_program_list'));
            } else {
                $this->getRequest()->getSession()->getFlashBag()->add('notice', 'form invalid!');
            }
        }

        return array('form' => $form->createview());
    }

    /**
     * @Route("/backend/program/delete/{id}", name="backend_program_delete")
     * @Secure(roles="ROLE_ADMIN, ROLE_POINT")
     * @Template()
     */
    public function deleteAction($id) {
        if (isset($id)) {
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $rule = $dm->getRepository('AevitasPointBundle:Program')->find($id);
            $dm->remove($rule);
            $dm->flush();
            $router = $this->get('router');
            $this->getRequest()->getSession()->getFlashBag()->add('notice', 'The program has been deleted!');
            return new RedirectResponse($router->generate('backend_program_list'));
        }

        $this->getRequest()->getSession()->getFlashBag()->add('notice', 'has an error!');
        return array();
    }
    
    /**
     * @Route("/backend/program/clone/{id}", name="backend_program_clone")
     * @Secure(roles="ROLE_ADMIN, ROLE_POINT")
     * @Template()
     */
    public function cloneAction($id) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $old_program = $dm->getRepository('AevitasPointBundle:Program')->find($id);
        $new_program = new Program();
        $new_program->setName($old_program->getName().'_new')
                    ->setStartDate($old_program->getStartDate())
                    ->setEndDate($old_program->getEndDate())
                    ->setStartDate($old_program->getStartDate())
        ;
        $type = new CloneProgramFormType($this->get('translator'));
        $form = $this->createForm($type, $new_program);
        $form->setData($new_program);

        $request = $this->getRequest();
        if ('POST' == $request->getMethod()) {
            $form->bind($request);
            if ($form->isValid()) {
                
                // re compute start day and end day for new program
                $sDate = $new_program->getStartDate();
                $fDate = $new_program->getEndDate();
                $arrS = explode('/', $sDate);
                $arrF = explode('/', $fDate);
                $SDay = $arrS[0] + $arrS[1]*31 + ($arrS[2]-2013)*12*31;
                $FDay = $arrF[0] + $arrF[1]*31 + ($arrF[2]-2013)*12*31;
                
                // get list store
                $arrID = explode(',', $request->get('store-choose'));
                if (count($arrID)==0){
                    $this->getRequest()->getSession()->getFlashBag()->add('notice', 'store list much be not empty!');
                }else{
                    // get list store objects
                    $storeList = $dm->getRepository('AevitasLevisBundle:Store')->findByIDs($arrID);
                    
                    // loop in each store
                    foreach ($storeList as $store){
                        // clone new program for each store
                        $program = clone $new_program;
                        $program->setStore($store);
                        // set new program name, sytax: old_program_name + "_new" + store_name
                        $program->setName($new_program->getName().'_'.$store->getName());
                        
                        $dm->persist($program);
                        $dm->flush();
                        
                        // get all rules from the old program and clone theme to new program
                        $rules = $dm->getRepository('AevitasPointBundle:PointRule')->findByProgram($old_program->getId());
                        foreach($rules as $rule){
                            $new_rule = new \Aevitas\PointBundle\Document\PointRule();
                            $new_rule = clone $rule;
                            $new_rule->setId(null);
                            $new_rule->setProgram($program);
                            $new_rule->setStore($store->getId());
                            // new rule name, sytax: old_rule_name + new_store_name
                            $new_rule->setName($rule->getName().'_'.$store->getName());
                            // new interval time
                            $new_rule->setSDay($SDay);
                            $new_rule->setFDay($FDay);
                            $dm->persist($new_rule);
                        }
                        $dm->flush();
                    }

                    $router = $this->get('router');
                    $this->getRequest()->getSession()->getFlashBag()->add('notice', 'new program has been cloned!');
                    return new RedirectResponse($router->generate('backend_program_list'));
                }                
            } else {
                $this->getRequest()->getSession()->getFlashBag()->add('notice', 'form invalid!');
            }
        }

        return array(
            'form' => $form->createview()
        );
    }

}