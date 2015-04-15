<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ItemController
 *
 * @author Truong
 */

namespace Aevitas\LevisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Aevitas\LevisBundle\Document\Item;
use Aevitas\LevisBundle\Import\ImportItem;
use Aevitas\LevisBundle\Form\FormItemImportType;
use Vietland\AevitasBundle\Helper\Pagination;

class ItemController extends Controller {

    /**
     * @Route("/backend/item/list", name="backend_item_list")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function listAction() {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $repo = $dm->getRepository('AevitasLevisBundle:Item');
        $request = $this->getRequest();
        $limit = $request->get('limit');
        $page = $request->get('page');
        $items = $repo->getItems($page, $limit);
        $pagination = new Pagination($page, $repo->getCount(), $this->get('router')->generate('backend_item_list'), $limit);
        return new Response($this->renderView('AevitasLevisBundle:Item:List.html.twig', array(
                            'items' => $items, 'pagination' => $pagination->getView($this)
                        )));
    }

    /**
     * @Route("/backend/item/import", name="backend_item_import")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function importAction() {
        $model = new ImportItem();
        $formType = new FormItemImportType();
        $form = $this->createForm($formType, $model);
        $model->setDm($this->get('doctrine_mongodb')->getManager());
        $model->setController($this);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            // Bind request to the form
            $form->bind($request);
            // If form is valid
            if ($form->isValid()) {
                $this->get('session')->setFlash('notice', $this->get('translator')->trans('File has been import.'));
            }
        }

        return new Response($this->renderView('AevitasLevisBundle:Item:Import.html.twig', array(
                            'form' => $form->createView()
                        )));
    }

    /**
     * @Route("/backend/item/delete", name="backend_item_delete") 
     */
    public function deleteAction() {
        $request = $this->get('request');
        $id = (int) $request->get('id');
        $flag = 0;
        if (isset($id)) {
            $dm = $this->get('database_manager');
            $item = $dm->getRepository('AevitasLevisBundle:Item')->find($id);
            $dm->remove($item);
            $dm->flush();
            $flag = 1;
        }
        exit(json_encode(array('status' => $flag)));
    }

    /**
     * @Route("/item/search.{_format}", name="backend_item_search",defaults={"_format"="json"})
     */
    public function searchAction($_format) {
        $request = $this->get('request');
        $kw = (string) $request->get('q');
        $callback = $request->get('callback');
        $return = array();
        if (isset($kw)) {
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $qb = $dm->createQueryBuilder('AevitasLevisBundle:Item');
            $qb->addOr($qb->expr()->field('description')->equals(new \MongoRegex("/^{$kw}/i")))->limit(10);
            $users = $qb->getQuery()->execute();
            $returnArray = array();

            foreach ($users as $u) {
                $returnArray[] = array('id' => $u->getCode(), 'text' => $u->getDescription());
            }
        }
        exit($callback . '(' . json_encode($returnArray) . ')');
    }

}