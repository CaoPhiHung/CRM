<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GroupController
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
use Vietland\UserBundle\Document\User;
use Vietland\UserBundle\Form\Type\GroupFormType;
use Symfony\Component\HttpFoundation\Response;

class GroupController extends BaseController {

    /**
     * @Route("/backend/user/group/list", name="backend_group_list")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function indexAction() {        
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $groups = $dm->getRepository('VietlandUserBundle:Group')->findAll();
        return new Response($this->renderView('AevitasLevisBundle:Backend:GroupList.html.twig', array(
                            'groups' => $groups
                        )));
    }

    /**
     * @Route("/backend/user/group/info/{groupID}", name="backend_group_info")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function infoAction($groupID) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $group = $dm->getRepository('VietlandUserBundle:Group')->find($groupID);
        $useradmin = $dm->getRepository('VietlandUserBundle:User')->find($group->getAdmin()->getID());
        
        $form = $this->createFormBuilder($group)->getForm();
        $request = $this->getRequest();
        if ('POST' == $request->getMethod()) {
            $form->bind($request);
            if ($form->isValid()) {
                $dm = $this->get('database_manager');
                $user = $dm->getRepository('VietlandUserBundle:User')->find($request->get('choose_user'));
                if ($user instanceof User) {
                    if ($group->addUser($user)){
                        $dm = $this->get('doctrine_mongodb')->getManager();
                        $dm->persist($group);
                        $dm->flush();
                        $this->getRequest()->getFlashBag()->add('notice', 'the user has been added!');
                    }else{
                        $this->getRequest()->getFlashBag()->add('notice', 'the user already exists in this group');
                    }
                } else {
                    $this->getRequest()->getFlashBag()->add('notice', 'please select the an user');
                }
            } else {
                $this->getRequest()->getFlashBag()->add('notice', 'form invalid!');
            }
        }/**/
        
        return new Response($this->renderView('AevitasLevisBundle:Backend:GroupInfo.html.twig', array(
                            'form'  => $form->createview(),
                            'group' => $group,
                            'admin' => $useradmin
                        )));
    }

    /**
     * @Route("/backend/user/group/addnew", name="backend_group_addnew")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function newAction(Request $request) {
        $group = new Group(); 
        $type = new GroupFormType($this->get('translator'));
        //var_dump($type);exit;
        $form = $this->createForm($type, $group);

        $request = $this->getRequest();
        if ('POST' == $request->getMethod()) {
            $form->bind($request);
            if ($form->isValid()) {
                $dm = $this->get('database_manager');
                $user = $dm->getRepository('VietlandUserBundle:User')->find($request->get('vietland_user_group_admin'));
                if (count($dm->getRepository('VietlandUserBundle:Group')->findBy(array('name' => $group->getName()))) > 0) {
                    $this->getRequest()->getFlashBag()->add('notice', 'group name already exists!');
                } else {
                    if ($user instanceof User) {
                        $group->setAdmin($user);
                        $user->addStaff($group);

                        $dm = $this->get('doctrine_mongodb')->getManager();
                        $dm->persist($group);
                        $dm->flush();

                        $router = $this->get('router');
                        $this->getRequest()->getFlashBag()->add('notice', 'New group has been created!');
                        return new RedirectResponse($router->generate('backend_group_list'));
                    } else {
                        $this->getRequest()->getFlashBag()->add('notice', 'please select the group admin');
                    }
                }
            } else {
                $this->getRequest()->getFlashBag()->add('notice', 'form invalid!');
            }
        }

        return $this->container->get('templating')->renderResponse('AevitasLevisBundle:Backend:GroupAddnew.html.twig', array(
                    'form' => $form->createview(),
                ));
    }

    /**
     * @Route("/backend/user/group/edit/{groupID}", name="backend_group_edit")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function editAction($groupID) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $group = $dm->getRepository('VietlandUserBundle:Group')->find($groupID);

        $useradmin = $dm->getRepository('VietlandUserBundle:User')->find($group->getAdmin()->getID());

        $form = $this->createForm(new GroupFormType($this->get('translator')), $group);
        $form->setData($group);

        $request = $this->getRequest();
        if ('POST' == $request->getMethod()) {
            $form->bind($request);
            if ($form->isValid()) {
                $user = $dm->getRepository('VietlandUserBundle:User')->find($request->get('vietland_user_group_admin'));
                $existsGroup = $dm->getRepository('VietlandUserBundle:Group')->findOneBy(array('name' => $group->getName()));
                if ($existsGroup instanceof Group && $existsGroup->getId() != $group->getId()) {
                    $this->getRequest()->getFlashBag()->add('notice', 'group name already exists!');
                } else {
                    if ($user instanceof User) {
                        $group->setAdmin($user);

                        if ($user->getId() != $useradmin->getId()) {
                            $useradmin->removeStaff($group);
                            $user->addStaff($group);
                            $useradmin = $user;
                        }

                        $dm->persist($group);
                        $dm->flush();
                        $this->getRequest()->getFlashBag()->add('notice', 'This group has been edited');
                    } else {
                        $this->getRequest()->getFlashBag()->add('notice', 'please select the group admin');
                    }
                }
            }
        }

        return $this->container->get('templating')->renderResponse('AevitasLevisBundle:Backend:GroupEdit.html.twig', array(
                    'form' => $form->createview(),
                    'admin_id' => $useradmin->getID(),
                    'admin_name' => $useradmin->getUsername()
                ));
    }

    /**
     * @Route("/backend/user/group/delete/{groupID}", name="backend_group_delete")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function deleteAction($groupID) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $group = $dm->getRepository('VietlandUserBundle:Group')->find($groupID);

        if (isset($groupID)) {
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $group = $dm->getRepository('VietlandUserBundle:Group')->find($groupID);
            $dm->remove($group);
            $dm->flush();
            $router = $this->get('router');
            $this->getRequest()->getFlashBag()->add('notice', 'The group has been deleted!');
            return new RedirectResponse($router->generate('backend_group_list'));
        }

        $this->getRequest()->getFlashBag()->add('notice', 'has an error!');
        return $this->container->get('templating')->renderResponse('AevitasLevisBundle:Backend:GroupDelete.html.twig', array());
    }
}
