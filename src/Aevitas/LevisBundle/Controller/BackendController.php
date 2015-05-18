<?php
namespace Aevitas\LevisBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use Vietland\AevitasBundle\Helper\Pagination;
use Vietland\UserBundle\Document\User;
use Aevitas\LevisBundle\Document\Cart;
use Aevitas\LevisBundle\Form\FormGiftMetaType;
use Aevitas\LevisBundle\Document\GiftMeta;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Vietland\UserBundle\Document\UserLog;
class BackendController extends Controller {
    /**
     * @Route("/backend", name="backend_index")
     * @Secure(roles="ROLE_STAFF,ROLE_POINT, ROLE_GIFT,ROLE_STORE")
     * @Template()
     */
    public function indexAction() {
//        $excelService = $this->get('xls.service_xls5');$excelService->excelObj->getProperties()->setCreator("Maarten Balliauw")
//                            ->setLastModifiedBy("Maarten Balliauw")
//                            ->setTitle("Office 2005 XLSX Test Document")
//                            ->setSubject("Office 2005 XLSX Test Document")
//                            ->setDescription("Test document for Office 2005 XLSX, generated using PHP classes.")
//                            ->setKeywords("office 2005 openxml php")
//                            ->setCategory("Test result file");
//        $excelService->excelObj->setActiveSheetIndex(0)
//                    ->setCellValue('A1', 'Hello')
//                    ->setCellValue('B2', 'world!');
//        $excelService->excelObj->getActiveSheet()->setTitle('Simple');
//        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
//        $excelService->excelObj->setActiveSheetIndex(0);
//
//        //create the response
//        $response = $excelService->getResponse();
//        $response->headers->set('Content-type', 'application/ms-excel; charset=utf-8');
//        $response->headers->set('Content-Disposition', 'attachment; filename="Paul2.xls"');
//
//        // If you are using a https connection, you have to set those two headers and use sendHeaders() for compatibility with IE <9
//        $response->headers->set('Pragma', 'public');
//        $response->headers->set('Cache-Control', 'maxage=1');
//        $response->sendHeaders();
//        return $response;      
        return array();
    }
    public function profileAction() {
        $user = $this->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $form = $this->get('fos_user.profile.form');
        $formHandler = $this->get('fos_user.profile.form.handler');
        $process = $formHandler->process($user);
        if ($process) {
            $this->setFlash('fos_user_success', 'profile.flash.updated');
            return new RedirectResponse($this->getRedirectionUrl($user));
        }
        return array(
            'form' => $form->createView()
        );
    }
    /**
     * @Route("/edit/user/{id}", name="backend_edit_user")
     */
    public function editUserAction($id) {
        $currentUser = $this->get('security.context')->getToken()->getUser();
        $currentUser->setEditing(true);
        $request = $this->getRequest();
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $user = $dm->getRepository('VietlandUserBundle:User')->find((int) $id);
        $translator = $this->get('translator');
        $form = $this->createFormBuilder($user)->add('CCode', 'text', array('disabled' => 'disabled', 'label' => $translator->trans('Customer Code')))
                        ->add('email', 'text')->add('firstname', 'text', array('label' => $translator->trans('First Name')))
                        ->add('lastname', 'text', array('label' => $translator->trans('Last Name')))
                        ->add('regcode', 'text', array('attr' => array('disabled' => 'disabled')))
                        ->add('storeId', 'hidden')
                        ->add('CCode')
                        ->add('point')
                        ->add('sex', 'choice', array('choices' => User::getSexOptions($translator)))
                        ->add('join', 'date', array('required' => true, 'attr' => array('class' => 'datetime')))
                        ->add('phone')
                        ->add('currentLevel', 'choice', array('choices' => User::getLevelOptions($translator), 'label' => $translator->trans('Current Level')))
                        ->add('roles', 'choice', array('choices' => User::getRoleOptions($this->get('translator')), 'multiple' => true))->getForm();
        if ('POST' === $request->getMethod()) {
            $form->bind($request);
            if ($form->isValid()) {
                /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
                $userManager = $this->get('fos_user.user_manager');
                $userManager->updateUser($user);
            } else {
                var_dump(($form->getErrorsAsString()));
                exit;
            }
        }
        return new Response($this->renderView(
                        'AevitasLevisBundle:Backend:profile.html.twig', array(
                    'form' => $form->createView(),
                    'user' => $user
                        )
        ));
    }
    /**
     * @Route("/backend/user/list", name="backend_user_list")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function listUserAction() {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $repo = $dm->getRepository('VietlandUserBundle:User');
        $request = $this->getRequest();
        $form = $this->createFormBuilder()
                ->add('level', 'choice', array('required' => false, 'empty_value' => 'Choose an Level', 'choices' => User::getLevelOptions($this->get('translator'))))
                ->add('CCode', 'text', array('required' => false))
                ->add('name', 'text', array('required' => false))
                ->add('cellphone', 'text', array('required' => false))
                ->add('email', 'text', array('required' => false))
                ->add('spoint', 'text', array('required' => false, 'label' => 'from point'))
                ->add('fpoint', 'text', array('required' => false, 'label' => 'to point'))
                ->getForm();
        $limit = $request->get('amount') ? $request->get('amount') : 25;
        $page = $request->get('page') ? $request->get('page') : 1;
        $users = $repo->getUsers($page, $limit);
        $export = $this->get('router')->generate('backend_user_exportseeking');
        $pagination = new Pagination($page, $repo->getCount(), $this->get('router')->generate('backend_user_list'), $limit);
        $import = $this->createFormBuilder()->add('file', 'file')->getForm();
        return new Response($this->renderView('AevitasLevisBundle:Backend:userList.html.twig', array(
                    'users' => $users, 'pagination' => $pagination->getView($this), 'form' => $form->createView(),
                    'import' => $import->createView(),
                    'exporturl' => $export
        )));
    }
    /**
     * @Route("/backend/user/advancedsearch", name="backend_user_advancedsearch")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function advancedSearchUserAction() {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $repo = $dm->getRepository('VietlandUserBundle:User');
        $request = $this->getRequest();
        
        $form_level = $this->createFormBuilder()
                        ->add('level', 'choice', array('required' => false, 'empty_value' => 'Choose an Level', 'choices' => User::getLevelOptions($this->get('translator'))))
                        ->getForm();
        
        $form_gender = $this->createFormBuilder()
                        ->add('sex', 'choice', array('required' => false, 'label' => 'Gender', 'empty_value' => 'Çhoose Gender', 'choices' => User::getSexOptions($this->get('translator'))))
                        ->getForm();
        $form_marital = $this->createFormBuilder()
                        ->add('mari', 'choice', array('required' => false, 'empty_value' => 'Marital status', 'label' => 'Marital status', 'choices' => User::getMarriageStatus($this->get('translator'))))
                        ->getForm();
        $form_status = $this->createFormBuilder()
                        ->add('status', 'choice', array('required' => false, 'empty_value' => 'Enabled/Disabled', 'choices' => array('1'=>'Enabled', '0'=>'Disabled')))
                        ->getForm();
        $form_bill = $this->createFormBuilder()
                        ->add('bill', 'choice', array('required' => false, 'label' => "Bill's Information within", 'empty_value' => 'Bill Count/Value', 'choices' => array('1'=>'Bill Count', '2'=>'Value')))
                        ->getForm();
        $form_tier = $this->createFormBuilder()
                        ->add('tier', 'choice', array('required' => false, 'label' => "Customers, whose tiers are just...",'empty_value' => 'Upgrade/Downgrade', 'choices' => array('1'=>'Upgrade', '2'=>'Downgrade')))
                        ->getForm();
        $form_from_tier = $this->createFormBuilder()
                        ->add('from_tier', 'choice', array('required' => false, 'label' => false, 'empty_value' => 'Tier', 'choices' => User::getLevelOptions($this->get('translator'))))
                        ->getForm();
        $form_to_tier = $this->createFormBuilder()
                        ->add('to_tier', 'choice', array('required' => false, 'label' => false, 'empty_value' => 'Tier', 'choices' => User::getLevelOptions($this->get('translator'))))
                        ->getForm();
        $form_point = $this->createFormBuilder()
                        ->add('point', 'choice', array('required' => false, 'empty_value' => 'Redeemed/Balance', 'choices' => array('1'=>'Redeemed', '2'=>'Balance')))
                        ->getForm();
        $form_bonuspoint = $this->createFormBuilder()
                        ->add('bonuspoint', 'choice', array('required' => false, 'empty_value' => 'Give extra points', 'label' => 'Bonus Point', 'choices' => array('1'=>'Add Up To', '2'=>'Top Up')))
                        ->getForm();
                     
        $limit = $request->get('amount') ? $request->get('amount') : 25;
        $page = $request->get('page') ? $request->get('page') : 1;
        $users = $repo->getUsers($page, $limit);
        $export = $this->get('router')->generate('backend_user_exportseeking');
        $pagination = new Pagination($page, $repo->getCount(), $request->getUri(), $limit);
        $import = $this->createFormBuilder()->add('file', 'file')->getForm();
        return new Response($this->renderView('AevitasLevisBundle:Backend:userSearch.html.twig', array(
                    'users' => $users, 'pagination' => $pagination->getView($this), 'form_level' => $form_level->createView(),
                    'form_gender' => $form_gender->createView(),
                    'form_marital' => $form_marital->createView(),
                    'form_status' => $form_status->createView(),
                    'form_bill' => $form_bill->createView(),
                    'form_tier' => $form_tier->createView(),
                    'form_from_tier' => $form_from_tier->createView(),
                    'form_to_tier' => $form_to_tier->createView(),
                    'form_point' => $form_point->createView(),
                    'form_bonuspoint' => $form_bonuspoint->createView(),
                    'import' => $import->createView(),
                    'exporturl' => $export
        )));
    }
    /**
     * @Route("/backend/staff/list", name="backend_staff_list")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function staffManagerAction() {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $repo = $dm->getRepository('VietlandUserBundle:User');
        $request = $this->getRequest();
        $limit = $request->get('amount') ? $request->get('amount') : 25;
        $page = $request->get('page') ? $request->get('page') : 1;
        $users = $repo->getStaffs($page, $limit);
        $pagination = new Pagination($page, $repo->getCount(), $this->get('router')->generate('backend_staff_list'), $limit);
        return new Response($this->renderView('AevitasLevisBundle:Backend:staffList.html.twig', array(
                    'users' => $users, 'pagination' => $pagination->getView($this)
        )));
    }
    /**
     * @Route("/backend/user/seeking", name="backend_user_seeking")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function listSearchAction() {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $repo = $dm->getRepository('VietlandUserBundle:User');
        $request = $this->getRequest();
        $form = $this->createFormBuilder()
                ->add('level', 'choice', array('required' => false, 'empty_value' => 'Choose an Level', 'choices' => User::getLevelOptions($this->get('translator'))))
                ->add('CCode', 'text', array('required' => false))
                ->add('name', 'text', array('required' => false))
                ->add('cellphone', 'text', array('required' => false))
                ->add('email', 'text', array('required' => false))
                ->add('spoint', 'text', array('required' => false, 'label' => 'from point'))
                ->add('fpoint', 'text', array('required' => false, 'label' => 'to point'))
                ->getForm();
        $limit = $request->get('amount') ? $request->get('amount') : 25;
        $page = $request->get('page') ? $request->get('page') : 1;
        $form->bind($request);
        $data = $form->getData();
        $data['page'] = $page;
        $data['amount'] = $limit;
        $users = $repo->seekUsers($data);
        $export = $this->get('router')->generate('backend_user_exportseeking', $data);
        $pagination = new Pagination($page, $repo->getCount(), $request->getUri(), $limit);
        $import = $this->createFormBuilder()->add('file', 'file')->getForm();
        return new Response($this->renderView('AevitasLevisBundle:Backend:userList.html.twig', array(
                    'users' => $users, 'pagination' => $pagination->getView($this), 'form' => $form->createView(),
                    'import' => $import->createView(),
                    'exporturl' => $export
        )));
    }

            /**
     * Call an API method. Every request needs the API key, so that is added automatically -- you don't need to pass it in.
     * @param  string $method The API method to call, e.g. 'lists/list'
     * @param  array  $args   An array of arguments to pass to the method. Will be json-encoded for you.
     * @return array          Associative array of json decoded API response.
     */
    public function call($method, $args=array(), $timeout = 10)
    {
        return $this->makeRequest($method, $args, $timeout);
    }

    /**
     * Performs the underlying HTTP request. Not very exciting
     * @param  string $method The API method to be called
     * @param  array  $args   Assoc array of parameters to be passed
     * @return array          Assoc array of decoded result
     */
    private function makeRequest($method, $args=array(), $timeout = 10)
    {      
        $args['apikey'] = '908a07f410ddc8c45c09108d5396583a-us10';
        list(, $datacentre) = explode('-', $args['apikey']);
        $this->api_endpoint = str_replace('<dc>', $datacentre, 'https://<dc>.api.mailchimp.com/2.0');
        $url = $this->api_endpoint.'/'.$method.'.json';

        if (function_exists('curl_init') && function_exists('curl_setopt')){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');       
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($args));
            $result = curl_exec($ch);
            curl_close($ch);
        } else {
            $json_data = json_encode($args);
            $result    = file_get_contents($url, null, stream_context_create(array(
                'http' => array(
                    'protocol_version' => 1.1,
                    'user_agent'       => 'PHP-MCAPI/2.0',
                    'method'           => 'POST',
                    'header'           => "Content-type: application/json\r\n".
                                          "Connection: close\r\n" .
                                          "Content-length: " . strlen($json_data) . "\r\n",
                    'content'          => $json_data,
                ),
            )));
        }

        return $result ? json_decode($result, true) : false;
    }

    public function addSubToList($email,$fname,$mname,$lname,$username,$status,$reason){
                $listID = '2fa4c3d639'; //list enable
                if($status == false){
                    $listID = '6ed8a62e36'; // list disable
                }
                $result = $this->call('lists/subscribe', array(
                'id'                => $listID,
                'email'             => array('email'=>$email),
                'merge_vars'        => array('EMAIL'=> $email, 'FNAME'=>$fname, 'MNAME'=> $mname  ,'LNAME'=> $lname,
                                            'UNAME'=> $username,'STATUS'=>$status,'REASON'=>$reason),
                'double_optin'      => false,
                'update_existing'   => true,
                'replace_interests' => false,
                'send_welcome'      => false,
            ));
    }


    /**
     * @Route("/backend/user/advancedseeking", name="backend_user_advancedseeking")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function listAdvancedSearchAction() {


        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $repo = $dm->getRepository('VietlandUserBundle:User');
        $request = $this->getRequest();
                
        $form_level = $this->createFormBuilder()
                        ->add('level', 'choice', array('required' => false, 'empty_value' => 'Choose an Level', 'choices' => User::getLevelOptions($this->get('translator'))))
                        ->getForm();
        $form_level->bind($request);
        $form_gender = $this->createFormBuilder()
                        ->add('sex', 'choice', array('required' => false, 'label' => 'Gender', 'empty_value' => 'Çhoose Gender', 'choices' => User::getSexOptions($this->get('translator'))))
                        ->getForm();
        $form_gender->bind($request);
                        
        $form_marital = $this->createFormBuilder()
                        ->add('mari', 'choice', array('required' => false, 'empty_value' => 'Marital status', 'label' => 'Marital status', 'choices' => User::getMarriageStatus($this->get('translator'))))
                        ->getForm();
        $form_marital->bind($request);
                        
        $form_status = $this->createFormBuilder()
                        ->add('status', 'choice', array('required' => false, 'empty_value' => 'Enabled/Disabled', 'choices' => array('1'=>'Enabled', '0'=>'Disabled')))
                        ->getForm();
        $form_status->bind($request);
                        
        $form_bill = $this->createFormBuilder()
                        ->add('bill', 'choice', array('required' => false, 'label' => "Bill's Information within", 'empty_value' => 'Bill Count/Value', 'choices' => array('1'=>'Bill Count', '2'=>'Value')))
                        ->getForm();
        $form_bill->bind($request);
                        
        $form_tier = $this->createFormBuilder()
                        ->add('tier', 'choice', array('required' => false, 'label' => "Customers, whose tiers are just...", 'empty_value' => 'Upgrade/Downgrade','choices' => array('1'=>'Upgrade', '2'=>'Downgrade')))
                        ->getForm();
        $form_tier->bind($request);
        $form_from_tier = $this->createFormBuilder()
                        ->add('from_tier', 'choice', array('required' => false, 'label' => false, 'empty_value' => 'Tier', 'choices' => User::getLevelOptions($this->get('translator'))))
                        ->getForm();
        $form_from_tier->bind($request);
        $form_to_tier = $this->createFormBuilder()
                        ->add('to_tier', 'choice', array('required' => false, 'label' => false, 'empty_value' => 'Tier', 'choices' => User::getLevelOptions($this->get('translator'))))
                        ->getForm();
        $form_to_tier->bind($request);
        $form_point = $this->createFormBuilder()
                        ->add('point', 'choice', array('required' => false, 'empty_value' => 'Redeemed/Balance', 'choices' => array('1'=>'Redeemed', '2'=>'Balance')))
                        ->getForm();
        $form_point->bind($request);
                        
        $form_bonuspoint = $this->createFormBuilder()
                        ->add('bonuspoint', 'choice', array('required' => false, 'empty_value' => 'Give extra points', 'label' => 'Bonus Point', 'choices' => array('1'=>'Add Up To', '2'=>'Top Up')))
                        ->getForm();
        $form_bonuspoint->bind($request);
                        
        $limit = $request->get('amount') ? $request->get('amount') : 25;
        $page = $request->get('page') ? $request->get('page') : 1;
        $data = $request->get('form');        
        
        $data['page'] = $page;
        $data['amount'] = $limit;
        $data['dm'] = $this->get('doctrine_mongodb');
        $users = $repo->advancedSeekUsers($data);
        $export = $this->get('router')->generate('backend_user_exportadvancedseeking',$data);
        $pagination = new Pagination($page, $repo->getCount(), $request->getUri(), $limit);
        $import = $this->createFormBuilder()->add('file', 'file')->getForm();
        return new Response($this->renderView('AevitasLevisBundle:Backend:userSearch.html.twig', array(
                    'data' => $data, 'users' => $users, 'pagination' => $pagination->getView($this), 'form_level' => $form_level->createView(),
                    'form_gender' => $form_gender->createView(),
                    'form_marital' => $form_marital->createView(),
                    'form_status' => $form_status->createView(),
                    'form_bill' => $form_bill->createView(),
                    'form_tier' => $form_tier->createView(),
                    'form_from_tier' => $form_from_tier->createView(),
                    'form_to_tier' => $form_to_tier->createView(),
                    'form_point' => $form_point->createView(),
                    'form_bonuspoint' => $form_bonuspoint->createView(),
                    'import' => $import->createView(),
                    'exporturl' => $export
        )));
    }
    /**
     * @Route("/backend/user/confirmsms/{id}.{_format}", name="backend_confirm_sms", defaults={"_format"="json"})
     * @Secure(roles="ROLE_ADMIN, ROLE_STAFF")
     */
    public function resendRegCodeAction($id, $_format) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $repo = $dm->getRepository('VietlandUserBundle:User');
        $user = $repo->find((int) $id);
        $sms = $this->get('sms_sender');
        if (!$user->getRegcode()) {
            $user->generateRegcode();
            $dm->persist($user);
            $dm->flush();
        }
        $sms->setPhone($user->getCellphone())
                        ->setSms($this->renderView(":sms:resendRegCode.html.twig", array('code' => $user->getRegcode())))
//                ->setSms($this->get('translator')->trans('Vui long vao website www.starclubvn.com de kich hoat tai khoan bang code') . ': ' . $user->getRegcode())
                ;
        $sms->send();
        return new Response(json_encode(array('status' => true, 'regcode' => $user->getRegcode())));
    }
    /**
     * @Route("/_proxy/render/topsidebar", name="backend_render_topsidebar")
     */
    public function renderTopSidebarAction() {
        $session = $this->get('session');
        $storename = $session->get('storename');
        if (!is_string($storename) || $storename == '') {
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $user = $this->get('security.context')->getToken()->getUser();
            if ($user->getStoreId()) {
                $session = $this->get('session');
                $storename = $session->get('storename');
                $store = $dm->getRepository('AevitasLevisBundle:Store')->findOneBy(array('oldId' => (int) $user->getStoreId()));
                if (is_object($store)) {
                    $session->set('storename', $store->getName());
                }
            }
        }
        $response = new Response($this->renderView('AevitasLevisBundle:Backend:renderTopSidebar.html.twig'));
        $response->setPrivate();
        $response->setETag(md5($response->getContent()));
        return $response;
    }
    /**
     * @Route("/backend/cart/list", name="backend_cart_list")
     * @Secure(roles="ROLE_ADMIN, ROLE_GIFT")
     */
    public function cartListAction() {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $repo = $dm->getRepository('AevitasLevisBundle:Cart');
        $request = $this->getRequest();
        $limit = $request->get('limit') ? $request->get('limit') : 20;
        $page = $request->get('page');
        $items = $repo->getCarts($page, $limit);
        $pagination = new Pagination($page, $repo->getCount(), $this->get('router')->generate('backend_cart_list'), $limit);
        return new Response($this->renderView('AevitasLevisBundle:Checkout:cartList.html.twig', array(
                    'items' => $items, 'pagination' => $pagination->getView($this)
        )));
    }
    /**
     * @Route("/staff/list/cart/list", name="store_staff_order")
     * @Secure(roles="ROLE_ADMIN, ROLE_STAFF")
     */
    public function cartListStoreStaffAction() {
        $user = $this->get('security.context')->getToken()->getUser();
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $repo = $dm->getRepository('AevitasLevisBundle:Cart');
        $request = $this->getRequest();
        $limit = $request->get('limit') ? $request->get('limit') : 20;
        $page = $request->get('page');
        $items = $repo->getCartsByStore($user->getStoreId(), $page, $limit);
        $pagination = new Pagination($page, $repo->getCount(), $this->get('router')->generate('backend_cart_list'), $limit);
        return new Response($this->renderView('AevitasLevisBundle:Checkout:cartList.html.twig', array(
                    'items' => $items, 'pagination' => $pagination->getView($this)
        )));
    }
    /**
     * @Route("/backend/edit/cart/{id}", name="backend_cart_edit")
     * @Secure(roles="ROLE_ADMIN, ROLE_GIFT, ROLE_STAFF")
     * @Template("AevitasLevisBundle:Checkout:editCart.html.twig")
     */
    public function editCartAction($id) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $cart = $dm->getRepository('AevitasLevisBundle:Cart')->find((int) $id);
        $user = $this->get('security.context')->getToken()->getUser();
        $giftForm = '';
        foreach ($cart->getGifts($dm) as $gift) {
            $giftForm .= $this->renderSelectedGiftAction($gift);
        }
        $form = $this->createForm(new \Aevitas\LevisBundle\Form\FormCartType($this->get('translator'), $user->hasRole('ROLE_ADMIN')), $cart);
        $request = $this->getRequest();
        if ('POST' == $request->getMethod()) {
            $form->bind($request);
            if ($form->isValid()) {
                $dm->persist($cart);
                $dm->flush();
            }
        }
        return array('form' => $form->createView(), 'cart' => $cart, 'giftform' => $giftForm);
    }
    /**
     * @Route("/_proxy/selected/gift")
     */
    public function renderSelectedGiftAction($gift) {
        $fType = new FormGiftMetaType($this->get('translator'));
        $form = $this->createForm($fType, $gift);
        return $this->renderView('AevitasLevisBundle:Checkout:renderSelectedGift.html.twig', array('form' => $form->createView(), 'gift' => $gift));
    }
    /**
     * @Route("/delete/user/{id}", name="admin_delete_user")
     */
    public function deleteUserAction($id) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $user = $dm->getRepository('VietlandUserBundle:User')->find((int) $id);
        $user->setEnabled(false);
        $dm->persist($user);
        $dm->flush();
        return new RedirectResponse($this->get('router')->generate('backend_user_list'));
    }

    /**
     * @Route("/deleteadvanced/user/{id}", name="admin_deleteadvanced_user")
     */
    public function deleteAdvancedUserAction($id) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $user = $dm->getRepository('VietlandUserBundle:User')->find((int) $id);
        $user->setEnabled(false);
        $dm->persist($user);
        $dm->flush();
        return new RedirectResponse($this->get('router')->generate('backend_user_advancedsearch'));
    }

    /**
     * @Route("/backend/user/status-disabled", name="backend_user_status_disabled")
     * 
     */
    public function StatusDisabledAction() {
        $request  = $this->getRequest();
        $userid = $request->get('userid');
        $reason = $request->get('reason');
        $status = $request->get('status');
        if($status == 'true'){
            $status = true;
        }else{
            $status = false;
        }

        $uid = null;
        $arr_userid = explode(',', $userid);
        if(count($arr_userid) === 1){
            $uid = $arr_userid[0];
        }
        
        if(!empty($uid)){
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $user = $dm->getRepository('VietlandUserBundle:User')->find((int) $uid);
            $user->setStatus($status);
            $user->setReason($reason);
            $user->setDisabledDate($status);

            // Mailchimp api add subcriseber to list
            // $this->addSubToList($user->getEmail(),$user->getFirstname(),$user->getMiddlename(),
            //                     $user->getLastname(),$user->getUsername(),$user->getStatus(),
            //                     $user->getReason());
            $dm->persist($user);
            $dm->flush();
        }else{
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            for($i = 0; $i < count($arr_userid); $i++){
                if(!empty($arr_userid[$i])){
                    $user = $dm->getRepository('VietlandUserBundle:User')->find((int) $arr_userid[$i]);
                    $user->setStatus($status);
                    $user->setReason($reason);
                    $user->setDisabledDate($status);
                    
                    // Mailchimp api add subcriseber to list
                    // $this->addSubToList($user->getEmail(),$user->getFirstname(),$user->getMiddlename(),
                    //                     $user->getLastname(),$user->getUsername(),$user->getStatus(),
                    //                     $user->getReason());
                    $dm->persist($user);
                    $dm->flush();
                }               
            }
        }
        
        exit(json_encode(array(
            'result' => true,
            'content' => 'CONTENT'
        )));
    }

    /**
     * @Route("/check/posbill", name="admin_check_posbill")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function checkPosBillAction() {
        $form = $this->createFormBuilder()
                ->add('start', 'text', array('required' => true, 'attr' => array('class' => 'datetime')))
                ->add('end', 'text', array('required' => true, 'attr' => array('class' => 'datetime')))
                ->getForm();
        $request = $this->getRequest();
        $results = array();
        if ('POST' == $request->getMethod()) {
            $form->bind($request);
            if ($form->isValid()) {
                $dm = $this->get('doctrine.odm.mongodb.document_manager');
                //Query to filter Account prefix
                $formCodes = $dm->getRepository('AevitasCustomerCodeBundle:CustomerCode')->findAll();
                $accountFilter = array();
                $accountFilterString = '';
                $storeIds = array();
                $storeIdsString = '';
                if (is_object($formCodes)) {
                    foreach ($formCodes as $code) {
                        $storeIds[] = $code->getStore()->getOldId();
                        $accountFilter[] = "Party.AccountsidName like '" . $code->getPrefix() . "%'";
                    }
                    $accountFilterString = '(' . implode(' OR ', $accountFilter) . ') AND';
                    $storeIdsString = 'store.branchID in (' . implode(',', $storeIds) . ') AND';
                }
                //Quuery to filter bill
                $qb = $dm->createQueryBuilder('VietlandAevitasBundle:Log')
                                ->field('action')->equals(UserLog::BUYITEM);
                $map = 'function(){
                    emit(this.md5,{count: 1});
                }';
                $reduce = 'function(key, values){return values;}';
                $billedQuery = '';
                $resultsMap = $qb->map($map)->reduce($reduce)->getQuery()->execute();
                $processedBill = array();
                if (is_object($resultsMap))
                    array_map(function($bill)use(&$processedBill) {
                        $processedBill[] = $bill['_id'];
                    }, $resultsMap->toArray());
                if (!empty($processedBill))
                    $billedQuery = 'Bill.BillIdNo NOT IN (' . implode(',', $processedBill) . ') AND ';
                $data = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $rsm = new ResultSetMapping;
                $checkQuery = "Select   Store.BranchName As StoreName,Bill.BillDate As BillDate,DATEPART(year,Bill.BillDate) As year , DATEPART(month,Bill.BillDate) As Month , DATEname(dw,Bill.BillDate) As Day ,  DATEPART(HOUR,Bill.etime) As Billtime , 
(Bill.Prefix + '/' + cast(Bill.BillNo as varchar) + (Case When Bill.Suffix = '' Then '' Else '/'+Bill.Suffix End)) As BillNo,
Party.AccountsName As PartyName, Party.AccountsidName As PartyID , CardType.CardName As CardTypeName,
Party.CellNo As CellNo, Party.Email As Email, Bill.SaleValue As GrossAmount,
(Bill.Misc1 + Bill.Misc2 + Bill.Misc3 + Bill.Misc4 + Bill.Misc5) As Discount, Bill.BillIdNo, Bill.AccountsCVID, Party.LedgerID as Ledgerid,
Bill.Amount As NetValue
From EtBillFile Bill
Left Outer Join MstAcctCVLedger Party On Party.LedgerID = Bill.AccountsCVID
Left Outer Join MstBGBranch Store On Store.BranchID = Bill.BranchID
Left Outer Join POSMstCardType CardType On CardType.CardID = Party.CardID  where 
$billedQuery
Bill.BillDate between  '" . $data['start'] . "' and '" . $data['end'] . "'
And Bill.VoucherType in (14,15,16,17,8,10,11,129,214)  and 
$storeIdsString
$accountFilterString
CardType.CardName = 'LEVIS CRM'
order by store.branchID ,Bill.BillDate";
                $query = $em->createNativeQuery($checkQuery, $rsm);
                $results = $query->getResult();
            }
        }
        return array('form' => $form->createView(), 'results' => $results);
    }
    /**
     * @Route("/check/bill/{ledgerid}/{billno}", name="check_bill")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function checkBillAction($ledgerid, $billno) {
        $session = $this->get('session');
        if (is_null($session->get('logbill' . $billno))) {
            $em = $this->getDoctrine()->getManager();
            $rsm = new ResultSetMapping;
            $string0 = "Select POSMstCamp.Name as CampName,B.BranchID, B.TransType, SD1.AttribValue as SDVal1, SD2.AttribValue as SDVal2, SD3.AttribValue as SDVal3, MstSalesMan.SalesManName, MstBGBranch.BranchName, B.ETime, B.BillIDNo, B.VoucherType, B.Prefix, B.BillNo, B.Suffix, B.BillDate, B.AccountsCVID, MstAcctCVLedger.AccountsIDName, MstAcctCVLedger.AccountsName, MstItem.ItemCode, MstItem.ItemDescription, BI.StkQty, BI.ItemRate, BI.ItemValue, B.RoundOff, B.Amount,  BI.Misc1 as ItemDisc, 
BI.Misc2 as ItemSpDisc, BI.Misc3 as ItemProDisc, (Case When B.SaleValue<>0 then (B.Misc3*BI.ItemValue)/B.SaleValue Else 0 End) as BillDisc, (Case When B.SaleValue<>0 then (B.Misc4*BI.ItemValue)/B.SaleValue Else 0 End) as BillSpDisc, (Case When B.SaleValue<>0 then (B.Misc6*BI.ItemValue)/B.SaleValue Else 0 End) as BillProDisc,  A1.AttribValue as AVal1, A2.AttribValue as AVal2, A3.AttribValue as AVal3, A4.AttribValue as AVal4, A5.AttribValue as AVal5, A6.AttribValue as AVal6, 
A7.AttribValue as AVal7, A8.AttribValue as AVal8, A9.AttribValue as AVal9, A10.AttribValue as AVal10, MstItemSubGroup.ItemSubGroupDescription, MstItemGroup.ItemGroupDescription , (Case When B.Amount <> 0 then (B.StaxAmount * ((BI.ItemValue+BI.Misc1+BI.Misc2+BI.Misc3)/B.Amount) ) else 0 End) as Tax  
From EtBillFile B  
LEFT OUTER JOIN EtBillfileItems BI ON BI.BillIDNo = B.BillIDNo  
LEFT OUTER JOIN MstSalesMan ON MstSalesMan.SalesManID = B.SalesManId  
LEFT OUTER JOIN MstBGBranch ON MstBGBranch.BranchID = B.BranchID  
LEFT OUTER JOIN MstAcctCVLedger ON MstAcctCVLedger.LedgerID = B.AccountsCVID  
LEFT OUTER JOIN MstItem ON MstItem.ItemID = BI.ItemID
LEFT OUTER JOIN MstItemSubGroup ON MstItemSubGroup.ItemSubGroupID = MstItem.ItemSubGroupID  
LEFT OUTER JOIN MstItemGroup ON MstItemGroup.ItemGroupID = MstItemSubGroup.ItemGroupID  
LEFT OUTER JOIN MstAttribute SD1 ON SD1.ID = BI.ISD_ID1  
LEFT OUTER JOIN MstAttribute SD2 ON SD2.ID = BI.ISD_ID2  
LEFT OUTER JOIN MstAttribute SD3 ON SD3.ID = BI.ISD_ID3  
LEFT OUTER JOIN MstAttribute A1 ON A1.ID = MstItem.AttribID1  
LEFT OUTER JOIN MstAttribute A2 ON A2.ID = MstItem.AttribID2  
LEFT OUTER JOIN MstAttribute A3 ON A3.ID = MstItem.AttribID3  
LEFT OUTER JOIN MstAttribute A4 ON A4.ID = MstItem.AttribID4  
LEFT OUTER JOIN MstAttribute A5 ON A5.ID = MstItem.AttribID5  
LEFT OUTER JOIN MstAttribute A6 ON A6.ID = MstItem.AttribID6  
LEFT OUTER JOIN MstAttribute A7 ON A7.ID = MstItem.AttribID7  
LEFT OUTER JOIN MstAttribute A8 ON A8.ID = MstItem.AttribID8  
LEFT OUTER JOIN MstAttribute A9 ON A9.ID = MstItem.AttribID9  
LEFT OUTER JOIN MstAttribute A10 ON A10.ID = MstItem.AttribID10 
LEFT OUTER JOIN POSMstCamp ON POSMstCamp.ID = BI.GPTransFix2
Where ISNULL(B.DOACase,0)=0 And ISNULL(B.Passed,0)=0 and B.VoucherType in (14,15,16,17,8,10,11,129,214) and B.BillIdNo = $billno and B.AccountsCVID = $ledgerid 
Order By B.BillDate DESC, B.Prefix, B.BillNo, B.BillIDNo;"; //AND B.Billdate BETWEEN CAST(FLOOR(CAST(GETDATE() AS FLOAT)) AS DATETIME) AND DATEADD(DAY, 1, CAST(FLOOR(CAST(GETDATE() AS FLOAT)) AS DATETIME))
//            var_dump($string0);exit;
            $query = $em->createNativeQuery($string0, $rsm);
            $results = $query->getResult();
        } else
            $results = $session->get('logbill' . $billno);
//        var_dump(count($this->get('session')->getFlashBag()->get('notice')));exit;
//        if (count($this->get('session')->getFlashBag()->get('notice')) > 1)
        $notices = $this->get('session')->getFlashBag()->get('notice');
        //$this->get('session')->getFlashBag()->clear();
        if (count($results)) {
            $sample = end($results);
            $storeinfo = array('aName' => $sample['AccountsName'], 'bName' => $sample['BranchName'], 'Amount' => $sample['Amount'], 'itemNumber' => count($results), 'bDate' => new \DateTime($sample['BillDate']));
            $iteminfo = array();
            array_map(function($item)use(&$iteminfo) {
                $iteminfo[] = array('iCode' => iconv("Latin1", "UTF-8//IGNORE", $item['ItemCode']), 'iDesc' => iconv("Latin1", "UTF-8//IGNORE", $item['ItemDescription']), 'Qty' => $item['StkQty'], 'iRate' => $item['ItemRate'], 'iValue' => $item['ItemValue'], 'metadata' => array_filter(array('AVal1' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal1']), 'Aval2' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal2']), 'AVal3' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal3']), 'AVal4' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal4']), 'AVal5' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal5']), 'AVal6' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal6']), 'AVal7' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal7']), 'AVal8' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal8']), 'AVal9' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal9']), 'AVal10' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal10']))));
            }, $results);
            $session->set('logbill' . $billno, $results);
            $session->save();
            $dm = $this->get('database_manager');
            $response = array('notices' => $notices, 'items' => $iteminfo, 'store' => $storeinfo, 'billno' => $billno, 'ledgerid' => $ledgerid);
            $usercrm = $dm->getRepository('VietlandUserBundle:User')->findOneBy(array('posId' => $ledgerid));
            if (is_object($usercrm))
                $response['usercrm'] = $usercrm;
            return new Response($this->renderView('VietlandStoreBundle:Store:shoppingAction.html.twig', $response));
        }
    }
    /**
     * @Route("/multiply/newpoints", name="multiply_new_points")
     * @Template()
     */
    public function multiplyNewPointsAction() {
        $logger = $this->get('admin.logger');
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $repo = $dm->createQueryBuilder("VietlandUserBundle:User");
        $users = $repo->field('point')->lt(25000)->field('point')->gt(50)->field('posId')->exists(true)->getQuery()->execute();
        foreach ($users as $user) {
            $before = $user->getPoint();
            $user->setPoint($user->getPoint() * 500)->setQualifyPoint($user->getQualifyPoint() * 500);
            $dm->persist($user);
            $dm->flush();
            $logger->info('Multiplied 500 successfully for user: ' . $user->getId(), array('before' => $before, 'after' => $user->getPoint()));
            echo 'finished for user' . $user->getId() . '<br/>';
        }
        exit('Finished');
    }
    /**
     * @Route("/import", name="user_import")
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function userImportAction() {
        $request = $this->getRequest();
        $import = $this->createFormBuilder()->add('file', 'file')->getForm();
        // $excelEngine = $this->get('excel_engine');
        // $import->bind($request);
        // $data = $import->getData();
        // $excelEngine->importToObject($data['file'], $this->get('fos_user.user_manager'), '\Vietland\\UserBundle\\Document\\User');
        return new \Symfony\Component\HttpFoundation\RedirectResponse($this->generateUrl('backend_user_list'));
    }
}
