<?php

namespace Aevitas\LevisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Aevitas\LevisBundle\Form\FormGiftArticleType;
use Aevitas\LevisBundle\Document\GiftArticle;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Vietland\UserBundle\Import\ImportGift;
use Aevitas\ConfigBundle\Config\Configuration;
use Aevitas\ConfigBundle\Config\ConfigData;
use Vietland\AevitasBundle\Helper\Pagination;

class GiftController extends Controller {

    /**
     * @Route("/backend/gift/list", name="backend_gift_list")
     * @Secure(roles="ROLE_ADMIN, ROLE_GIFT")
     */
    public function giftListAction() {
        $trans = $this->get('translator');
        $user = $this->container->get('security.context')->getToken()->getUser();
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $giftArticle = $dm->getRepository('AevitasLevisBundle:GiftArticle')->findAll();
        return new Response($this->renderView('AevitasLevisBundle:GiftArticle:ListGiftArticle.html.twig', array(
                    'giftArticle' => $giftArticle
        )));
    }

    /**
     * @Route("/backend/gift/create", name="backend_gift_create")
     * @Secure(roles="ROLE_ADMIN, ROLE_GIFT")
     */
    public function giftCreateAction() {
        $trans = $this->get('translator');
        $dm = $this->get('database_manager');
        $user = $this->container->get('security.context')->getToken()->getUser();
        $request = $this->get('request');
        $categories = $dm->getRepository('AevitasLevisBundle:Categories')->findAll();
        $category = array();
        foreach ($categories as $term) {
            $category[$term->getId()] = $term->getName();
        }
        $configuration = $this->get('levis.configurator');
        $configuration->setConfig(Configuration::LOYALTY);
        $configuration->setContent(new ConfigData());
        $content = $configuration->getContent();
        $formType = new FormGiftArticleType($trans, $category, $content->categories);
        $giftArticle = new GiftArticle();
        $form = $this->createForm($formType, $giftArticle);
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $giftArticle->setDm($dm);
                $dm->persist($giftArticle);
                $dm->flush();
                if ($giftArticle->getId()) {
                    $this->getRequest()->getSession()->getFlashBag()->add('notice', $trans->trans('New gift article has been created.'));
                    return new RedirectResponse($this->get('router')->generate('backend_gift_list'));
                }
            }
        }
        return new Response($this->renderView('AevitasLevisBundle:GiftArticle:createGiftArticle.html.twig', array(
                    'form' => $form->createView()
        )));
    }

    /**
     * @Route("/backend/gift/edit/{id}", name="backend_gift_Edit")
     * @Secure(roles="ROLE_ADMIN, ROLE_GIFT")
     */
    public function gifEditAction($id) {
        $dm = $this->get('database_manager');
        $request = $this->get('request');
        $id = (int) $id;
        if (!$id) {
            throw $this->createNotFoundException('This id do not exits = ' . $id);
        }
        $categories = $dm->getRepository('AevitasLevisBundle:Categories')->findAll();
        $category = array();
        foreach ($categories as $term) {
            $category[$term->getId()] = $term->getName();
        }
        $gift = $dm->getRepository('AevitasLevisBundle:GiftArticle')->find($id);
        $imageThumb = $gift->getThumbnail(100, 75, $gift->getPath());
        $configuration = $this->get('levis.configurator');
        $configuration->setConfig(Configuration::LOYALTY);
        $configuration->setContent(new ConfigData());
        $content = $configuration->getContent();
        $formType = new FormGiftArticleType($this->get('translator'), $category, $content->categories);
        $form = $this->createForm($formType, $gift);
        //die($request->getMethod());
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $gift->setDm($dm);
                $dm->persist($gift);
                $dm->flush();
                return new RedirectResponse($this->get('router')->generate('backend_gift_list'));
            }
        }
        return new Response($this->renderView('AevitasLevisBundle:GiftArticle:EditGiftArticle.html.twig', array(
                    'form' => $form->createView(),
                    'id' => $id,
                    'uploaded' => $gift->getUploadFolder(),
                    'imagethumb' => $imageThumb
        )));
    }

    /**
     * @Route("/backend/gift/delete", name="backend_gift_delete") 
     */
    public function giftDeleteAction() {
        $request = $this->get('request');
        $id = (int) $request->get('id');
        $flag = 0;
        if (isset($id)) {
            $dm = $this->get('database_manager');
            $gift = $dm->getRepository('AevitasLevisBundle:GiftArticle')->find($id);
            $dm->remove($gift);
            $dm->flush();
            $flag = 1;
        }
        exit(json_encode(array('status' => $flag)));
    }

    /**
     * @Route("/backend/category/delete", name="backend_gift_category_delete") 
     */
    public function categoryDeleteAction() {
        $request = $this->get('request');
        $id = (int) $request->get('id');
        $flag = 0;
        if (isset($id)) {
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $gift = $dm->getRepository('AevitasLevisBundle:Categories')->find($id);
            $dm->remove($gift);
            $dm->flush();
            $flag = 1;
        }
        exit(json_encode(array('status' => $flag)));
    }

    /**
     * @Route("/backend/categories/add", name="backend_gift_addcategories") 
     * @Secure(roles="ROLE_ADMIN, ROLE_GIFT")
     */
    public function giftAddCategories() {
        $trans = $this->get('translator');
        $user = $this->container->get('security.context')->getToken()->getUser();
        $request = $this->get('request');
        $formType = new \Aevitas\LevisBundle\Form\FormCategoriesType($trans);
        $categories = new \Aevitas\LevisBundle\Document\Categories();
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $form = $this->createForm($formType, $categories);
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                // $categories->setUserId($user->getId());
                $dm->persist($categories);
                $dm->flush();
                if ($categories->getId()) {
                    $this->getRequest()->getSession()->getFlashBag()->add('notice', $trans->trans('New categories has been created.'));
                    //return new RedirectResponse($this->get('router')->generate('backend_gift_create'));
                }
            }
        }
        return new Response($this->renderView('AevitasLevisBundle:GiftArticle:createCategories.html.twig', array(
                    'form' => $form->createView()
        )));
    }

    /**
     * @Route("/backend/categories/edit/{id}", name="backend_gift_categories_edit")
     * @Secure(roles="ROLE_ADMIN, ROLE_GIFT")
     */
    public function categoryEditAction($id) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $request = $this->get('request');
        $id = (int) $id;
        if (!$id) {
            throw $this->createNotFoundException('This id do not exits = ' . $id);
        }
        $category = $dm->getRepository('AevitasLevisBundle:Categories')->find($id);
        $form = $this->createForm(new \Aevitas\LevisBundle\Form\FormCategoriesType($this->get('translator')), $category);
        //die($request->getMethod());
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $dm->persist($category);
                $dm->flush();
                return new RedirectResponse($this->get('router')->generate('backend_gift_category_list'));
            }
        }
        return new Response($this->renderView('AevitasLevisBundle:GiftArticle:EditCategories.html.twig', array(
                    'form' => $form->createView(),
                    'id' => $id
        )));
    }

    /**
     * @Route("/backend/category/list", name="backend_gift_category_list")
     * @Secure(roles="ROLE_ADMIN, ROLE_GIFT")
     */
    public function categoriesListAction() {
        $trans = $this->get('translator');
        $user = $this->container->get('security.context')->getToken()->getUser();
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $categories = $dm->getRepository('AevitasLevisBundle:Categories')->findAll();
        return new Response($this->renderView('AevitasLevisBundle:GiftArticle:ListCategories.html.twig', array(
                    'categories' => $categories
        )));
    }

    /**
     * @Route("/backend/gift/import", name="backend_gift_import") 
     * @Secure(roles="ROLE_ADMIN, ROLE_GIFT")
     */
    public function importGiftAction() {
        $model = new ImportGift();
        $formType = new \Aevitas\LevisBundle\Form\FormGiftImportType();
        $form = $this->createForm($formType, $model);
        $model->setDm($this->get('doctrine_mongodb')->getManager());
        $model->setController($this);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            // Bind request to the form
            $form->bind($request);
            // If form is valid
            if ($form->isValid()) {
                $this->getRequest()->getSession()->getFlashBag()->add('notice', $this->get('translator')->trans('File has been import.'));
            }
        }

        return new Response($this->render('AevitasLevisBundle:GiftArticle:importGift.html.twig', array(
                    'form' => $form->createView()
        )));
    }

    /**
     * @Route("/backend/test", name="backend_test")
     */
    public function testAction() {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $name = 'ha noi 2';
        $categories = $dm->getRepository('AevitasLevisBundle:Categories')->findOneByName($name);
        // return Response ($categories->getId());
    }

    /**
     * @Route("/reward/{topcat}", name="levis_gift_category",defaults={"topcat"="Reward"})
     * @Template()
     */
    public function categoryAction($topcat) {
        $session = $this->getRequest()->getSession();
        $session->set('currentcat', $topcat);
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $request = $this->getRequest();
        $data = $request->get('form');
        $page = $request->get('page');
        $limit = $request->get('amount') ? $request->get('amount') : $session->get('amount');
        $sort = $request->get('sort') ? $request->get('sort') : $session->get('sort');
        if (isset($data['page']))
            $page = $data['page'];
        if (isset($data['amount'])) {
            $limit = $data['amount'];
        }
        if (isset($data['sort'])) {
            $sort = $data['sort'];
        }
        $session->set('amount', $limit);
        $session->set('sort', $sort);
        $gifts = $dm->getRepository('AevitasLevisBundle:GiftArticle')->getGifts($topcat, $page, $limit, $sort);
        return array('gifts' => $gifts, 'topcat' => $topcat);
    }

    /**
     * @Route("/reward/{topcat}/{catslug}_{catid}", name="levis_gift_subcategory")
     * @Template()
     */
    public function subCategoryAction($topcat, $catslug, $catid) {
        $session = $this->getRequest()->getSession();
        $request = $this->getRequest();
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $repo = $dm->getRepository('AevitasLevisBundle:GiftArticle');
        $category = $dm->getRepository('AevitasLevisBundle:Categories')->findOneBy(array('slug' => $catslug, 'id' => (int) $catid));
        $data = $request->get('form');
        $page = $request->get('page');
        $limit = $request->get('amount') ? $request->get('amount') : $session->get('amount');
        $sort = $request->get('sort') ? $request->get('sort') : $session->get('sort');
        if (isset($data['page']))
            $page = $data['page'];
        if (isset($data['amount'])) {
            $limit = $data['amount'];
        }
        if (isset($data['sort'])) {
            $sort = $data['sort'];
        }
        $session->set('amount', $limit);
        $session->set('sort', $sort);
        $gifts = $repo->getGiftInCategory($topcat, $catid, $page, $limit, $sort);
        $session->set('totalitem' . $catslug, $repo->getCount());
        $session->set('currentcat', $catslug);
        return array('gifts' => $gifts, 'category' => $category, 'topcat' => $topcat);
    }

    /**
     * @Route("/_proxy/renderstatistic/tags/{topcat}/{catid}", name="levis_gift_tags",defaults={"topcat"="Reward","catid"="0"})
     * @Template()
     */
    public function renderTagsAction($topcat, $catid = 0) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $map = 'function(){
                var tags = this.tags;
                if(tags.length) {for(i = 0; i < tags.length; i++){emit(tags[i], {count: 1})}}
            }';
        $red = 'function(k, vals){
            sum = {count: vals.length};
            return sum;
            }';
        $qb = $dm->createQueryBuilder('AevitasLevisBundle:GiftArticle')->field('tags')->exists(true);
        if ($topcat != 'Reward')
            $qb = $qb->field('cat')->equals($topcat);
        if ((int) $catid)
            $qb = $qb->field('catid')->equals($catid);
        $qb = $qb->map($map)->reduce($red);
        $results = $qb->getQuery()->execute();
        $statistic = array('count' => 0);
        array_map(function($item)use(&$statistic) {
                    $statistic['count'] += (int) $item['value']['count'];
                }, $results->toArray());
        $statistic['data'] = $results->toArray();
        return array('statistic' => $statistic);
    }

    /**
     * @Route("/_proxy/sumup/cat/{topcat}/{catid}", name="levis_gift_sumup",defaults={"topcat"="Reward","catid"="0"})
     * @Template("AevitasLevisBundle:Gift:filterMenu.html.twig")
     */
    public function renderSideBarAction($topcat, $catid = 0) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $map = 'function(){
                            point = this.point;
                        if(point < 300) emit(this.catid, {count: 1, level1: 1, level2: 0, level3: 0, level4: 0, level5: 0, level6: 0})
                        else if(point < 500) emit(this.catid, {count: 1, level1: 0, level2: 1, level3: 0, level4: 0, level5: 0, level6: 0})
                        else if(point < 800) emit(this.catid, {count: 1, level1: 0, level2: 0, level3: 1, level4: 0, level5: 0, level6: 0})
                        else if(point < 1000) emit(this.catid, {count: 1, level1: 0, level2: 0, level3: 0, level4: 1, level5: 0, level6: 0})
                        else if(point < 1500) emit(this.catid, {count: 1, level1: 0, level2: 0, level3: 0, level4: 0, level5: 1, level6: 0})
                        else emit(this.catid, {count: 1, level1: 0, level2: 0, level3: 0, level4: 0, level5: 0, level6: 1})
                    }';
        $red = 'function(k, vals){
                    sum = {count: 0,level1: 0, level2: 0, level3: 0, level4: 0, level5: 0, level6: 0};
                    result = null;
                    vals.forEach(function(v){
                        sum.count += 1;
                        sum.level1 += v.level1;
                        sum.level2 += v.level2;
                        sum.level3 += v.level3;
                        sum.level4 += v.level4;
                        sum.level5 += v.level5;
                        sum.level6 += v.level6;
                    });
                    return sum;
                    }';
        $qb = $dm->createQueryBuilder('AevitasLevisBundle:GiftArticle');
        if ($topcat != 'Reward')
            $qb = $qb->field('cat')->equals($topcat);
        if ((int) $catid)
            $qb = $qb->field('catid')->equals($catid);
        $qb = $qb->map($map)->reduce($red);
        $subcats = $qb->getQuery()->execute();
        $results = $subcats->toArray();
        $statistic = array();
        $catids = array();
        $session = $this->getRequest()->getSession();
        $totalItem = 0; //total item in this category
        $pointfilter = array('level1' => 0, 'level2' => 0, 'level3' => 0, 'level4' => 0, 'level5' => 0, 'level6' => 0);
        array_map(function($cat)use(&$statistic, &$catids, &$pointfilter, &$totalItem) {
                    $statistic[$cat['_id']] = (int) $cat['value']['count'];
                    $totalItem += (int) $cat['value']['count'];
                    $value = array_filter($cat['value']);
                    foreach ($value as $key => $value) {
                        if ($key != 'count')
                            $pointfilter[$key] += (int) $value;
                    }
                    $catids[] = (int) $cat['_id'];
                }, $results);
        $session->set('totalitem' . $topcat, $totalItem);
        $categories = $dm->createQueryBuilder('AevitasLevisBundle:Categories')->field('id')->in($catids)->getQuery()->execute();
        return array('categories' => $categories, 'statistic' => $statistic, 'pointfilter' => $pointfilter);
    }

    /**
     * @Route("/_proxy/generate/pagination", name="generate_pagination")
     */
    public function renderPaginationAction($current = 1, $total = 0, $path = '/', $amount = 9) {
        $pagination = new Pagination($current, $total, $path, $amount);
        return new Response($pagination->getView($this));
    }

    /**
     * @Route("/reward/{topcat}/{category}/{slug}.{_format}", name="levis_gift_detail")
     * @Template()
     */
    public function giftDetailAction($topcat, $category, $slug) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $gift = $dm->getRepository('AevitasLevisBundle:GiftArticle')->findOneBySlug($slug);
        return array('gift' => $gift, 'topcat' => $topcat);
    }

    /**
     * @Route("/_proxy/rendertopgrid/{amount}/{sort}", name="render_topgrid", defaults={"amount"="6","sort"="name"})
     */
    public function renderTopGridAction($amount = 6, $sort = 'name') {
        $data = new \stdClass;
        $data->amount = $amount;
        $data->sort = $sort;
        $form = $this->createFormBuilder($data)->add('amount', 'choice', array('choices' => array('9' => '9', '15' => '15','24' => '24', '36' => '36')))
                        ->add('sort', 'choice', array('choices' => array('name' => 'Name', 'point' => 'Point', 'date' => 'Date')))->getForm();
        return new Response($this->renderView('AevitasLevisBundle:Gift:topgrid.html.twig', array('form' => $form->createView())));
    }

    /**
     * @Route("/reward/add-wish-list/{gid}", name="levis_gift_addwishlist")
     * @Secure(roles="ROLE_USER")
     * @Template()
     */
    public function giftAddWishListAction($gid) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $gift = $dm->getRepository('AevitasLevisBundle:GiftArticle')->find($gid);
        if (count($gift) == 0) {
            exit(json_encode(array('error' => 'fail')));
        }
        $user = $this->container->get('security.context')->getToken()->getUser();
        if ($user->hasGiftInWishList($gift->getId())) {
            exit(json_encode(array('error' => 'exists')));
        }

        $rt = $user->addWishList($gift->getId());
        $dm->persist($user);
        $dm->flush();

        exit(json_encode(array('result' => $rt)));
    }

}
