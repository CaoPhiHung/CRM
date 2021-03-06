<?php

namespace Aevitas\LevisBundle\Controller;

/**
 * Description of StoreController
 *
 * @author RYANTRAN
 */
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
use Vietland\StoreBundle\Form\UserStoreType;
use Vietland\UserBundle\Document\User;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\FOSUserEvents;
use Vietland\AevitasBundle\Helper\Pagination;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Vietland\UserBundle\Document\UserLog;
use Vietland\AevitasBundle\Helper\Multithread\MailerTask;

class StoreController extends Controller {
    //put your code here

    /**
     * @Route("/backend/store/create", name="backend_store_create")
     * @Secure(roles="ROLE_ADMIN, ROLE_STORE")
     */
    public function storeCreateAction() {
        $trans = $this->get('translator');
        $dm = $this->get('database_manager');
        $user = $this->container->get('security.context')->getToken()->getUser();
        $request = $this->get('request');
        $formType = new \Aevitas\LevisBundle\Form\FormStoreType($this->get('translator'));
        $store = new \Aevitas\LevisBundle\Document\Store();
        $form = $this->createForm($formType, $store);
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $store->setUserId($user->getId());
                $dm->persist($store);
                $dm->flush();
                if ($store->getId()) {
                    $this->getRequest()->getSession()->getFlashBag()->add('notice', $trans->trans('Your store has been created.'));
                }
            }
        }
        return new Response($this->renderView('AevitasLevisBundle:Store:createStore.html.twig', array(
                    'form' => $form->createView()
        )));
    }

    /**
     * @Route("/backend/store/edit/{id}", name="backend_store_Edit")
     * @Secure(roles="ROLE_ADMIN, ROLE_STORE")
     */
    public function StoreEditAction($id) {
        $dm = $this->get('database_manager');
        $request = $this->get('request');
        $id = (int) $id;
        if (!$id) {
            throw $this->createNotFoundException('This id do not exits = ' . $id);
        }
        $store = $dm->getRepository('AevitasLevisBundle:Store')->find($id);
        $form = $this->createForm(new \Aevitas\LevisBundle\Form\FormStoreType($this->get('translator')), $store);
        //die($request->getMethod());
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $dm->persist($store);
                $dm->flush();
                return new RedirectResponse($this->get('router')->generate('backend_store_list'));
            }
        }

        $cities = $dm->getRepository('VietlandAevitasBundle:City')->findAll();
        return new Response($this->renderView('AevitasLevisBundle:Store:EditStore.html.twig', array(
                    'form' => $form->createView(),
                    'id' => $id,
                    'cities' => $cities
        )));
    }

    /**
     * @Route("/backend/store/list", name="backend_store_list")
     * @Secure(roles="ROLE_ADMIN, ROLE_STORE")
     */
    public function storeListAction() {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $cities = $dm->getRepository('VietlandAevitasBundle:City')->findAll();
        $districts = $dm->getRepository('VietlandAevitasBundle:District')->findAll();
        $repo = $dm->getRepository('AevitasLevisBundle:Store');
        $form = $this->createFormBuilder()->add('name')->getForm();
        $request = $this->getRequest();
        $limit = $request->get('limit') ? $request->get('limit') : 20;
        $page = $request->get('page') ? $request->get('page') : 1;
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            $data = $form->getData();
            $stores = $repo->getStoreFilter($data, $page, $limit);
        }
        else
            $stores = $repo->getItems($page, $limit);

        $pagination = new Pagination($page, $repo->getCount(), $this->get('router')->generate('backend_store_list'), $limit);
        return new Response($this->renderView('AevitasLevisBundle:Store:ListStore.html.twig', array(
                    'store' => $stores, 'pagination' => $pagination->getView($this),
                    'cities' => $cities,
                    'districts' => $districts, 'form' => $form->createView()
        )));
    }

    /**
     * @Route("/backend/store/delete", name="backend_store_delete") 
     */
    public function storeDeleteAction() {
        $request = $this->get('request');
        $id = (int) $request->get('id');
        $flag = 0;
        if (isset($id)) {
            $dm = $this->get('database_manager');
            $store = $dm->getRepository('AevitasLevisBundle:Store')->find($id);
            $dm->remove($store);
            $dm->flush();
            $flag = 1;
        }
        exit(json_encode(array('status' => $flag)));
    }

    /**
     * @Route("/backend/store/adduser", name="backend_store_adduser")
     * @Secure(roles="ROLE_ADMIN, ROLE_STORE")
     */
    public function addUserToStore() {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $store = $dm->getRepository('AevitasLevisBundle:Store')->findAll();
        $userId = $this->get('request')->get('vietland_select_user');
        $storeId = $this->get('request')->get('storeid');
        $trans = $this->get('translator');
        if ($this->get('request')->getMethod() == 'POST') {
            if (isset($userId) && isset($storeId) && $storeId > 0) {
                $userLoad = $dm->getRepository('VietlandUserBundle:User')->find((int) $userId);
                $storeLoad = $dm->getRepository('AevitasLevisBundle:Store')->find((int) $storeId);
                $userLoad->setStoreId($storeLoad->getOldId());
                $userLoad->addRole('ROLE_STAFF');
                $dm->persist($userLoad);
                $dm->flush();
                $this->getRequest()->getSession()->getFlashBag()->add('notice', $trans->trans('%username% has been add to %store% store.', array('%username%' => $userLoad->getUsername(), '%store%' => $storeLoad->getName())));
            } else {
                $this->getRequest()->getSession()->getFlashBag()->add('notice', $trans->trans('Please select a username.'));
            }
        }
        return new Response($this->renderView('AevitasLevisBundle:Store:addUserToStore.html.twig', array('store' => $store)));
    }

    /**
     * @Route("/backend/store/removeuser", name="backend_store_removeuser")
     * @Secure(roles="ROLE_ADMIN, ROLE_STORE")
     */
    public function removeUserFromStoreAction() {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $store = $dm->getRepository('AevitasLevisBundle:Store')->findAll();
        return new Response($this->renderView('AevitasLevisBundle:Store:removeUserFromStore.html.twig', array('store' => $store)));
    }

    /**
     * @Route("/backend/search/store/user", name="backend_search_user_by_store") 
     */
    public function searchUserByStoreAction() {
        $request = $this->get('request');
        $flag = 0;
        $output = '';
        $storeId = (int) $request->get('storeId');
        if (isset($storeId)) {
            $dm = $this->get('database_manager');
            $users = $dm->getRepository('VietlandUserBundle:User')->findBy(array('storeId' => $storeId));
            if (count($users) > 0) {
                $flag = 1;
                $output = $this->renderView("AevitasLevisBundle:Store:userListByStore.html.twig", array('users' => $users));
            }
        }
        exit(json_encode(array('status' => $flag, 'output' => $output)));
    }

    /**
     * @Route("/backend/remove/user/store", name="backend_remove_user_store")
     * @Secure(roles="ROLE_ADMIN, ROLE_STORE")
     */
    public function removeUserStoreAction() {
        $request = $this->get('request');
        $userId = (int) $request->get('userId');
        $flag = 0;
        if (isset($userId)) {
            $flag = 1;
            $dm = $this->get('database_manager');
            $userLoad = $dm->getRepository('VietlandUserBundle:User')->find((int) $userId);
            $userLoad->setStoreId(0);
            $dm->persist($userLoad);
            $dm->flush();
        }
        exit(json_encode(array('status' => $flag)));
    }

    /**
     * @Route("/backend/search/store.{_format}", name="backend_store_search",defaults={"_format"="json"})
     * @Secure(roles="ROLE_ADMIN, ROLE_STORE")
     */
    public function searchAction($_format) {
        $request = $this->get('request');
        $kw = (string) $request->get('q');
        $callback = $request->get('callback');
        $return = array();
        if (isset($kw)) {
            $dm = $this->get('database_manager');
            $qb = $dm->createQueryBuilder('AevitasLevisBundle:Store');
            $qb->addOr($qb->expr()->field('name')->equals(new \MongoRegex("/^{$kw}/i")))->limit(10);
            $stores = $qb->getQuery()->execute();
            $returnArray = array();

            foreach ($stores as $u) {
                $returnArray[] = array('id' => $u->getId(), 'text' => $u->getName());
            }
        }
        exit($callback . '(' . json_encode($returnArray) . ')');
    }

    /**
     * @Route("/backend/add/user/forstore", name="backend_store_adduser_forstore")
     * @Secure(roles="ROLE_ADMIN, ROLE_STORE")
     * @Template()
     */
    public function addUserForStoreAction() {
        $user = $this->get('security.context')->getToken()->getUser();
        $user->setAddingProfile();
        $request = $this->getRequest();
        $formFactory = $this->container->get('fos_user.profile.form.factory');
        /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
        $userManager = $this->container->get('fos_user.user_manager');
        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->container->get('event_dispatcher');
        $newuser = $userManager->createUser();
        $form = $formFactory->createForm();
        $form->setData($newuser);
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $store = $dm->getRepository('AevitasLevisBundle:Store')->findAll();
        $event = new GetResponseUserEvent($newuser, $request);
        $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_INITIALIZE, $event);

        if ('POST' == $this->getRequest()->getMethod()) {
            $form->bind($this->getRequest());
            $event = new FormEvent($form, $request);
            $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_SUCCESS, $event);
            try {
                $newuser->setEnabled(true);
                $newuser->addRole('ROLE_STAFF');
                $userManager->updateUser($newuser, true);
                if (null === $response = $event->getResponse()) {
                    $url = $this->container->get('router')->generate('backend_store_adduser_forstore');
                    $response = new RedirectResponse($url);
                }
                $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_COMPLETED, new FilterUserResponseEvent($newuser, $request, $response));

                return $response;
            } catch (\Exception $e) {
                $this->getRequest()->getSession()->getFlashBag()->add('notice', $this->get('translator')->trans($e->getMessage()));
            }
        }
        return array('form' => $form->createView(), 'store' => $store);
    }

    /**
      * @Route("/backend/staff/point2vnd", name="backend_staff_point2vnd")
     * @Secure(roles="ROLE_STAFF, ROLE_STORE")
     * @Template()
     */
    public function Point2VndAction() {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $repo = $dm->getRepository('VietlandUserBundle:User');
        $request = $this->getRequest();
        $form = $this->createFormBuilder()
                        ->add('CCode', 'text', array('required' => false))
                        ->add('email', 'text', array('required' => false))
                        ->add('cellphone', 'text', array('required' => false))
                        ->add('page', 'hidden', array('required' => false))
                        ->add('limit', 'hidden', array('required' => false))->getForm();
        $limit = $request->get('limit') ? $request->get('limit') : 20;
        $page = 1;
        $form->bind($request);
        $data = $form->getData();
        $users = $repo->seekRedeemUsers($data);
        $pagination = new Pagination($page, $repo->getCount(), $request->getUri(), $limit);
        return array(
            'users' => $users,
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/backend/staff/redeemption-info", name="backend_staff_redeemption_info")
     * @Secure(roles="ROLE_STAFF, ROLE_STORE")
     * @Method({"POST"})
     * @Template()
     */
    public function RedeemptionInfoAction(Request $request) {
        $userid = $request->get('userid');
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $user = $dm->getRepository('VietlandUserBundle:User')->find((int) $userid);
        if (!is_object($user)) {
            exit(json_encode(array('error' => 'user not found')));
        }
        if ($user->getposId() == null) {
            exit(json_encode(array('error' => 'null PosID')));
        }
        $point = $user->getPoint();
        $baserate = $this->get('point.rule')->getBaseRateRedeem($user->getCurrentLevel());
        /* $history = $dm->getRepository('AevitasLevisBundle:UserConvertPoint')->findBy(
          array('user' => $user), array('time' => 'DESC')
          );/* */
        exit(json_encode(array(
            'point' => $point,
            'baserate' => $baserate,
            'redeemlimit' => $this->get('point.rule')->redeemlimit
        )));
    }

    //     public function addSubToDisableEnableList($email,$fname,$mname,$lname,$authcode){
    //     $listID = '678bbd96d3'; //list enable

    //     $fullname = $fname." ".$mname. " " .$lname;

    //     $args['apikey'] = '908a07f410ddc8c45c09108d5396583a-us10';
        
    //     $data = array(
    //         "email_address" => $email,
    //         "status" => "subscribed",
    //         'merge_fields' => array("FNAME"=>$fullname , "REDEEM" => $authcode)
    //     );

    //     $apiKeyParts = explode('-', $args['apikey']);
    //     $shard = $apiKeyParts[1];

    //     $url = 'https://' . $shard . '.api.mailchimp.com/3.0/lists/'.$listID.'/members/';

    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $url);              
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($ch, CURLOPT_TIMEOUT, 60);            
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization: apikey 908a07f410ddc8c45c09108d5396583a-us10"));
    //     curl_setopt($ch, CURLOPT_POST, 1);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    //     $result = curl_exec($ch);
    //     curl_close($ch);

    //     return $result;
    // }

    /**
     * @Route("/backend/staff/redeemption-process", name="backend_staff_redeemption_process")
     * @Secure(roles="ROLE_STAFF, ROLE_STORE")
     * @Template()
     */
    public function RedeemptionProcessAction(Request $request) {
        $userid = $request->get('userid');
        //exit(json_encode(array('error' => $userid)));
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $staff = $this->get('security.context')->getToken()->getUser();
        $store = $dm->getRepository('AevitasLevisBundle:Store')->findOneBy(array('oldId' => $staff->getStoreId()));
        $user = $dm->getRepository('VietlandUserBundle:User')->find((int) $userid);
        //exit(json_encode(array('error' => $user)));

        if (!is_object($user)) {
            exit(json_encode(array('error' => 'user not found -----')));
        }
        $point = $user->getPoint();
        $p = $request->get('point');

        $redeemlimit = $this->get('point.rule')->redeemlimit;
        if ($point < $redeemlimit) {
            exit(json_encode(array('error' => 'Your point must greater than redeem limit (<b>' . $redeemlimit . ' point</b>)')));
        }

        $baserate = $this->get('point.rule')->getBaseRateRedeem($user->getCurrentLevel());
        $rs = $p * $baserate;

        # create UserConvertPoint object
        $cvObj = new \Aevitas\LevisBundle\Document\UserConvertPoint();
        $cvObj->setBaserate($baserate)->setPoint($p)
                ->setVnd($rs)
                ->setStore($store)
                ->setUser($user)
        ;
        $dm->persist($cvObj);
        $dm->flush();

        #send SMS
        $phoneNo = $user->getCellphone();
        $authcode = $cvObj->getHash();

        //Mailchimp api add subcriseber to list
        //$test = $this->addSubToDisableEnableList($user->getEmail(),$user->getFirstname(),$user->getMiddlename(),
         //                   $user->getLastname(),$authcode);

         $message = \Swift_Message::newInstance()
                    ->setSubject($this->get('translator')->trans('Reedem OTP Password'))
                    ->setFrom('crm@thanbacgroup.com', 'Thanh Bac Fashion')
                                //             ->setReplyTo('getsocial@atipso.com', 'Atipso Team') 
                    ->setTo($user->getEmail())
                    ->setBody($this->renderView(':mail:redeemmail.html.twig', array('name' => $user->getName(),'code' =>$authcode)), 'text/html', 'utf8');
            $this->get('mailer')->send($message);


        $msg = $this->renderView(":sms:redeemProcess.html.twig", array('authcode' => $authcode));

        $this->get('sms_sender')
                ->setPhone($phoneNo)
                ->setSms($msg)
                ->send($authcode)
        ;

        return new Response(json_encode(array(
                    'msg' => 'completed',
                    'authcode' => $authcode,
                    'store' => $store->getName(),
                    'point' => $p,
                    'baserate' => $baserate,
                    'remaining' => ($point - $p),
                    'vnd' => $rs,
                    'time' => date('h:i:s d/m/Y', time()),
                    'name' => $user->getName(),
                    'ccode' => $user->getCCode(),
                    'id' => $cvObj->getId()
        )));
    }

    /**
     * @Route("/backend/staff/redeemption-auth", name="backend_staff_redeemption_auth")
     * @Secure(roles="ROLE_STAFF, ROLE_STORE")
     * @Method({"POST"})
     * @Template()
     */
    public function RedeemptionAuthAction(Request $request) {
        $authcode = $request->get('code');
        $redeemId = $request->get('id');
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $cvObj = $dm->getRepository('AevitasLevisBundle:UserConvertPoint')->findOneBy(array('hash' => $authcode));
        if (!is_object($cvObj)) {
            return new Response(json_encode(array(
                        'msg' => 'false'
            )));
        }
        $cvObj->setAuth(true);
        $dm->persist($cvObj);

        $user = $cvObj->getUser();
        $bPoint = $user->getPoint();
        if (!$user->redeemPoint($cvObj->getPoint())) {//redeem point
            exit(json_encode(array('error' => 'the points to redeemption much be less than or equail your points')));
        }
        $aPoint = $user->getPoint();

        $cvObj->setBPoint($bPoint)->setAPoint($aPoint);
        
        $newTotalPayment = $user->getTotalPayment() + $cvObj->getPoint();
        $user->setTotalPayment($newTotalPayment);
        $dm->persist($user);
        $dm->flush();

        ### add userlog here ...
        $schema = array('BillNo' => $authcode);
        $userRedeemLog = new UserLog();
        $userRedeemLog
                ->setUser($user)
                ->setAction(UserLog::REDEEM_POINTS)
                ->setPoint(0 - $cvObj->getPoint())
                ->addSchema($schema);
        $dm->persist($userRedeemLog);
        ### cash back ...
        $userCashBackLog = new UserLog();
        $cashbackPoints = round($cvObj->getPoint() * ($this->get('point.rule')->cashback / 100));
        $userCashBackLog
                ->setUser($user)
                ->setAction(UserLog::CASHBACK)
                ->setPoint($cashbackPoints);
        $dm->persist($userCashBackLog);
        $user->earnNonQualifyPoints($cashbackPoints);

        $dm->persist($user);

        $dm->flush();

        return new Response(json_encode(array(
                    'msg' => 'ok'
        )));
    }

    /**
     * @Route("/backend/staff/redeemption", name="backend_staff_redeemption")
     * @Secure(roles="ROLE_STAFF, ROLE_STORE")
     * @Template()
     */
    public function RedeemptionAction() {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        if ($this->get('security.context')->isGranted('ROLE_ADMIN')) {
            $history = $dm->getRepository('AevitasLevisBundle:UserConvertPoint')->findBy(array(), array('time' => 'DESC'));
        } else {
            $history = $dm->getRepository('AevitasLevisBundle:UserConvertPoint')->findBy(array('auth' => true), array('time' => 'DESC'));
        }
        return array(
            'history' => $history
        );
    }

    /**
     * @Route("/backend/staff/redeemption/print", name="backend_staff_redeemption_print")
     * @Secure(roles="ROLE_STAFF, ROLE_STORE")
     * @Method({"POST"})
     * @Template()
     */
    public function RedeemptionPrintAction(Request $request) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $id = $request->get('rid');
        $redeem = $dm->getRepository('AevitasLevisBundle:UserConvertPoint')->find($id);
        if (!is_object($redeem)) {
            return new Response(json_encode(array('error' => 'the redeem id not exists')));
        }
        return new Response(json_encode(array(
                    'hash' => $redeem->getHash(),
                    'store' => $redeem->getStore()->getName(),
                    'point' => $redeem->getPoint(),
                    'baserate' => $redeem->getVnd() / $redeem->getPoint(),
                    'vnd' => $redeem->getVnd(),
                    'time' => $redeem->getTime()->format('h:i:s d/m/Y'),
                    'name' => $redeem->getUser()->getName(),
                    'ccode' => $redeem->getUser()->getCCode(),
        )));
    }

    /**
     * @Route("/backend/staff/redeemption/delete", name="backend_staff_redeemption_delete")
     * @Secure(roles="ROLE_STAFF, ROLE_STORE")
     * @Method({"POST"})
     * @Template()
     */
    public function RedeemptionDeleteAction(Request $request) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $id = $request->get('rid');
        $redeem = $dm->getRepository('AevitasLevisBundle:UserConvertPoint')->find($id);
        if (!is_object($redeem)) {
            return new Response(json_encode(array('error' => 'the redeem id not exists')));
        }
        $dm->remove($redeem);
        $dm->flush();
        return new Response(json_encode(array(
                    'msg' => 'ok'
        )));
    }

}
