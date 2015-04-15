<?php

namespace Vietland\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Vietland\StoreBundle\Entity\POSUser;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Vietland\StoreBundle\Form\FormUserStoreType;
use Aevitas\LevisBundle\Import\ImportStore;
use Vietland\UserBundle\Document\UserLog;
use Aevitas\PointBundle\EventListener\EarnPointEvent;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use Vietland\AevitasBundle\Helper\Pagination;
use \PHPExcel_IOFactory as IOFactory;

class StoreController extends Controller {

    /**
     * @Route("/store/updateuser/{ledgerid}/{billno}", name="store_update_user")
     * @Secure(roles="ROLE_STAFF")
     */
    public function updateUserAction($ledgerid, $billno) {
        $em = $this->getDoctrine()->getManager();
        $rsm = new ResultSetMapping;
        $string0 = "Select MstParty.LedgerID, MstParty.AccountsName, (case when MstParty.Gender = 0 then 'MALE' else 'FEMALE' End) as Gender, MstParty.Address1, MstParty.Address2, MstParty.Address3, MstParty.AccountsIDName as CCode,
MstState.StateName, MstParty.CellNo, MstParty.Phone, MstParty.Fax, MstParty.Email, MstBGBranch.BranchName as Store, MstParty.BGDueDate as BDay, MstParty.Anniversary, MstPartyType.CommonName as PartyTypeName,
MstParty.CardValidFrom, MstParty.CardValidUpto, MstParty.AccountsType, MstCatagory.CommonName as Catagory,ROW_NUMBER() OVER (ORDER BY MstParty.LedgerID) AS rownum
From MstAcctCVLedger MstParty
LEFT OUTER JOIN MstState ON MstState.StateId = MstParty.State
LEFT OUTER JOIN MstBGBranch ON MstBGBranch.BranchID = MstParty.CVBranchId
LEFT OUTER JOIN MstCommon MstPartyType ON MstPartyType.CommonID = MstParty.PartyType
LEFT OUTER JOIN MstCommon MstCatagory ON MstCatagory.CommonID = MstParty.Catagory
Where MstParty.LedgerID = $ledgerid";
        $query = $em->createNativeQuery($string0, $rsm);
        $results = $query->getResult();
        if (count($results)) {
            $user = new POSUser();
            $user->setData(end($results));
            $dm = $this->get('database_manager');
            $request = $this->getRequest();
            /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
            $formFactory = $this->container->get('fos_user.profile.form.factory');
            /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
            $userManager = $this->container->get('fos_user.user_manager');
            /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
            $dispatcher = $this->container->get('event_dispatcher');

            $form = $formFactory->createForm();
            $crmUser = $dm->getRepository('VietlandUserBundle:User')->findOneBy(array('posId' => $ledgerid));
            if (!is_object($crmUser)) {
                $crmUsers = $dm->getRepository('VietlandUserBundle:User')->findFromPos($user->getEmail());
                if (is_object($crmUsers))
                    $crmUser = $crmUsers->current();
            }

            if (!is_object($crmUser)) {
                $crmUser = $userManager->createUser();
                $crmUser->setPosId($ledgerid);
            }
            if ("GET" == $request->getMethod())
                $user->migrateData($crmUser);

            $form->setData($crmUser);

            if ('POST' == $request->getMethod()) {
                $form->bind($request);
                $existUser = $dm->getRepository('VietlandUserBundle:User')->findOneByEmail($crmUser->getEmail());
                if (is_object($existUser)) {//Already exist in CRM
                    if ("" != $crmUser->getCellphone())
                        $existUser->setCellphone($crmUser->getCellphone());
                    if (!is_null($crmUser->getSex()))
                        $existUser->setSex($crmUser->getSex());
                    if ("" != $crmUser->getFirstname())
                        $existUser->setFirstname($crmUser->getFirstname());
                    if ("" != $crmUser->getLastname())
                        $existUser->setLastname($crmUser->getLastname());
                    $existUser->setPosId($crmUser->getPosId());
                    $crmUser = $existUser;
                } else {//Create new user for CRM
                    $crmUser->setEnabled(true);
                    $crmUser->generateRegcode();
                    $crmUser->setUsername($crmUser->getEmail());
                    $crmUser->setPlainPassword($crmUser->getCellphone());
                }
                if (is_string($crmUser->getCCode())) {
                    $crmUser->setCCode($user->getCCode());
                }
                $event = new FormEvent($form, $request);
                $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_SUCCESS, $event);
                try {
                    if (is_null($crmUser->getId())) {
                        $dispatcher = $this->container->get('event_dispatcher');
                        $this->formManagementNotify($user->getCCode());
                        $dispatcher->dispatch('user.earn.point', new EarnPointEvent($crmUser, UserLog::SIGNUP_STORE, array('plainPassword' => $crmUser->getCellphone(), 'store' => $user->getStore())));
                    }
                    $userManager->updateUser($crmUser, true);
                    if (null === $response = $event->getResponse()) {
                        $url = $this->container->get('router')->generate('store_shopping_action', array('ledgerid' => $user->getLedgerID(), 'billno' => $billno));
                        $response = new RedirectResponse($url);
                    }
                    $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_COMPLETED, new FilterUserResponseEvent($crmUser, $request, $response));

                    return $response;
                } catch (\Exception $e) {
                    $this->getRequest()->getSession()->getFlashBag()->add('notice', $this->get('translator')->trans($e->getMessage()));
                }
            } else {
                $form->setData($crmUser);
            }
            return new Response($this->renderView('VietlandStoreBundle:Store:updateUser.html.twig', array('form' => $form->createView())));
        }
    }

    /**
     * @Route("/store/searchuser", name="store_search_user")
     * @Secure(roles="ROLE_STAFF")
     * @Template()
     */
    public function searchUserAction() {
        $request = $this->getRequest();
        $data = new POSUser();
        $user = $this->get('security.context')->getToken()->getUser();
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $form = $this->createFormBuilder($data)->add('name', 'text', array('required' => false))
                        ->add('cCode', 'text', array('required' => true))
                        ->add('cellphone', 'text', array('required' => false))
                        ->add('start', 'text', array('required' => false, 'label' => 'From'))
                        ->add('end', 'text', array('required' => false, 'label' => 'To'))->getForm();
        if ('POST' == $request->getMethod()) {
            $form->bind($request);
            if ($form->isValid()) {
                //map reduce to filter processed bill
                $billedQuery = '';
                $processedBill = array();
                $qb = $dm->createQueryBuilder('VietlandAevitasBundle:Log')->field('action')->equals(UserLog::BUYITEM);
                if ($data->getStart() && $data->getEnd())
                    $qb->field('created')->gte(new \DateTime($data->getStart() . ' 0:0:0'))
                            ->field('created')->lte(new \DateTime($data->getEnd() . ' 23:59:59'));
                else
                    $qb->field('created')->gte(new \DateTime(date('Y-m-d') . ' 0:0:0'))
                            ->field('created')->lte(new \DateTime(date('Y-m-d') . ' 23:59:59'));
                if ($user->getStoreId())
                    $map = 'function(){
                    data = this.schema[0];
                    if(data["BranchID"] == ' . $user->getStoreId() . ')
                        emit(this.md5,{count: 1});
                }';
                else
                    $map = 'function(){
                    emit(this.md5,{count: 1});
                }';
                $reduce = 'function(key, values){return values;}';
                try {
                    $resultsMap = $qb->map($map)->reduce($reduce)->getQuery()->execute();
                } catch (\Exception $e) {
                    $resultsMap = null;
                }
                if (is_object($resultsMap))
                    array_map(function($bill)use(&$processedBill) {
                        $processedBill[] = $bill['_id'];
                    }, $resultsMap->toArray());
                if (!empty($processedBill))
                    $billedQuery = 'B.BillIdNo NOT IN (' . implode(',', $processedBill) . ') AND ';
                //end billed index
                $branchQuery = '';
                $userQuery = array();
                if ($data->getEnd() != NULL && $data->getStart() != NULL) {
                    $between = "'" . $data->getStart() . " 0:0:0'" . ' AND ' . "'" . $data->getEnd() . ' 23:59:59' . "'";
                } else
                    $between = 'CAST(FLOOR(CAST(GETDATE() AS FLOAT)) AS DATETIME) AND DATEADD(DAY, 1, CAST(FLOOR(CAST(GETDATE() AS FLOAT)) AS DATETIME))';
                $user = $this->get('security.context')->getToken()->getUser();
                if ($user->getStoreId())
                    $userQuery[] = 'B.BranchID = ' . $user->getStoreId();
                if ($data->getCellphone())
                    $userQuery[] = "MstParty.CellNo LIKE '%" . $data->getCellphone() . "%'";
                if ($data->getName())
                    $userQuery[] = "MstParty.AccountsName LIKE '%" . $data->getName() . "%'";
                if ($data->getCCode())
                    $userQuery[] = "MstParty.AccountsIDName LIKE '" . $data->getCCode() . "%'";
                if (!empty($userQuery))
                    $branchQuery = implode(' AND ', $userQuery) . ' AND ';
                $em = $this->getDoctrine()->getManager();
                $rsm = new ResultSetMapping;
                $string0 = "
WITH SearchUser AS (                
Select MstParty.LedgerID, MstParty.AccountsName, MstParty.AccountsIDName as CCode, B.Amount, B.Billdate, B.ETime, B.BillIdNo, (case when MstParty.Gender = 0 then 'MALE' else 'FEMALE' End) as Gender, MstParty.Address1, MstParty.Address2, MstParty.Address3, MstParty.AccountsIDName as CommonName,
MstParty.CellNo, MstParty.Phone, MstParty.Email, MstBGBranch.BranchName as Store, MstParty.BGDueDate as BDay, MstParty.Anniversary, MstPartyType.CommonName as PartyTypeName,
MstParty.AccountsType,ROW_NUMBER() OVER (ORDER BY MstParty.LedgerID) AS rownum
From MstAcctCVLedger MstParty
LEFT OUTER JOIN MstState ON MstState.StateId = MstParty.State
LEFT OUTER JOIN EtBillFile B ON MstParty.LedgerID = B.AccountsCVID
LEFT OUTER JOIN MstBGBranch ON MstBGBranch.BranchID = B.BranchId
LEFT OUTER JOIN MstCommon MstPartyType ON MstPartyType.CommonID = MstParty.PartyType
LEFT OUTER JOIN MstCommon MstCatagory ON MstCatagory.CommonID = MstParty.Catagory
Where MstParty.CardID = 20 AND $branchQuery $billedQuery B.Billdate BETWEEN $between)
SELECT * FROM SearchUser
WHERE rownum  BETWEEN 0 AND 500 ORDER BY Billdate DESC"; //MstParty.CardID = 1 AND 
                $query = $em->createNativeQuery($string0, $rsm);
                $results = $query->getResult();
                if (count($results)) {
                    $users = array();
                    array_map(function($u)use(&$users) {
                        $user = new POSUser();
                        $user->setData($u);
                        $users[] = $user;
                    }, $results);
                    return new Response($this->renderView('VietlandStoreBundle:Store:resultsUser.html.twig', array('users' => $users)));
                } else {
                    $this->getRequest()->getSession()->getFlashBag()->add('notice', $this->get('translator')->trans('Not found'));
                }
            }
        }
        return array('form' => $form->createView());
    }

    public function searchTransactionAction() {
        
    }

    /**
     * @Route("/store/shoppingaction/{ledgerid}/{billno}", name="store_shopping_action")
     * @Secure(roles="ROLE_STAFF")
     */
    public function shoppingAction($ledgerid, $billno) {
        $branchQuery = '';
        $user = $this->get('security.context')->getToken()->getUser();
        $session = $this->get('session');
        if (!is_object($user)) {
            $this->getRequest()->getSession()->getFlashBag()->add('notice', $this->get('translator')->trans('You should update this user data first.'));
            $session->set('referrer', $this->get('router')->generate('store_shopping_action', array('ledgerid' => $ledgerid)));
            $session->save();
            return new RedirectResponse($this->get('router')->generate('store_update_user', array('ledgerid' => $ledgerid)));
        }
        if (is_null($session->get('logbill' . $billno))) {
            if ($user->getStoreId())
                $branchQuery = 'and B.BranchID = ' . $user->getStoreId();
            $em = $this->getDoctrine()->getManager();
            $rsm = new ResultSetMapping;
            $string0 = "Select POSMstCamp.Name as CampName,B.BranchID, B.TransType, SD1.AttribValue as SDVal1, SD2.AttribValue as SDVal2, SD3.AttribValue as SDVal3, MstSalesMan.SalesManName, MstBGBranch.BranchName, B.ETime, B.BillIDNo, B.VoucherType, B.Prefix, B.BillNo, B.Suffix, B.BillDate, B.AccountsCVID, MstAcctCVLedger.AccountsIDName, MstAcctCVLedger.AccountsName, MstItem.ItemCode, MstItem.ItemDescription, BI.StkQty, BI.ItemRate, BI.ItemValue, B.RoundOff, B.Amount,  BI.Misc1 as ItemDisc, 
BI.Misc2 as ItemSpDisc, BI.Misc3 as ItemProDisc, (Case When B.SaleValue<>0 then (B.Misc3*BI.ItemValue)/B.SaleValue Else 0 End) as BillDisc, (Case When B.SaleValue<>0 then (B.Misc4*BI.ItemValue)/B.SaleValue Else 0 End) as BillSpDisc, (Case When B.SaleValue<>0 then (B.Misc6*BI.ItemValue)/B.SaleValue Else 0 End) as BillProDisc,  A1.AttribValue as AVal1, A2.AttribValue as AVal2, A3.AttribValue as AVal3, A4.AttribValue as AVal4, A5.AttribValue as AVal5, A6.AttribValue as AVal6, 
(B.Prefix + '/' + cast(B.BillNo as varchar) + (Case When B.Suffix = '' Then '' Else '/'+B.Suffix End)) As BillNo,
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

Where B.BillIdNo = $billno and B.AccountsCVID = $ledgerid $branchQuery 
Order By B.BillDate DESC, B.Prefix, B.BillNo, B.BillIDNo;"; //AND B.Billdate BETWEEN CAST(FLOOR(CAST(GETDATE() AS FLOAT)) AS DATETIME) AND DATEADD(DAY, 1, CAST(FLOOR(CAST(GETDATE() AS FLOAT)) AS DATETIME))
//            var_dump($string0);exit;
            $query = $em->createNativeQuery($string0, $rsm);
            $results = $query->getResult();
        } else
            $results = $session->get('logbill' . $billno);
//        var_dump(count($this->getRequest()->getSession()->getFlashBag()->get('notice')));exit;
//        if (count($this->getRequest()->getSession()->getFlashBag()->get('notice')) > 1)
        $notices = $this->getRequest()->getSession()->getFlashBag()->get('notice');
        //$this->getRequest()->getSession()->getFlashBag()->clear();
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
        } else {
            $this->getRequest()->getSession()->getFlashBag()->add('notice', $this->get('translator')->trans('This user does not have any bill today.'));
            return new RedirectResponse($this->get('router')->generate('store_search_user'));
        }
    }

    /**
     * @Route("/store/saveshopping/{ledgerid}/{billno}", name="store_save_shopping")
     * @Secure(roles="ROLE_STAFF")
     */
    public function saveShoppingAction($ledgerid, $billno) {
        $dm = $this->get('database_manager');
        $session = $this->get('session');
        $results = $session->get('logbill' . $billno);
        if ((int) $results[0]['AccountsCVID'] == (int) $ledgerid) {
            $user = $dm->getRepository('VietlandUserBundle:User')->findOneBy(array('posId' => $ledgerid));

            if (!is_object($user)) {
                $this->getRequest()->getSession()->getFlashBag()->add('notice', $this->get('translator')->trans('You should update this user data first.'));
                $session->set('referrer', $this->get('router')->generate('store_shopping_action', array('ledgerid' => $ledgerid, 'billno' => $billno)));
                $session->save();
                return new RedirectResponse($this->get('router')->generate('store_update_user', array('ledgerid' => $ledgerid, 'billno' => $billno)));
            }
        } else {
            $this->getRequest()->getSession()->getFlashBag()->add('notice', $this->get('translator')->trans('This request does not match our requirement.'));
            return new RedirectResponse($this->get('router')->generate('store_search_user'));
        }

        $dispatcher = $this->container->get('event_dispatcher');
        $event = $dispatcher->dispatch('user.earn.point', new EarnPointEvent($user, UserLog::BUYITEM, $results, $billno));
        $this->getRequest()->getSession()->getFlashBag()->add('notice', $this->get('translator')->trans($event->getStatus()));

        return new RedirectResponse($this->get('router')->generate('store_shopping_action', array('billno' => $billno, 'ledgerid' => $ledgerid)));
    }

    /**
     * @Route("/store/importstore", name="store_import")
     * @Template()
     */
    public function importStoreAction() {
        $model = new ImportStore();
        $form = $this->createFormBuilder($model)->add('fileupload', 'file')->getForm();

        $model->setDm($this->get('doctrine_mongodb')->getManager());
        $model->setController($this);

        $request = $this->getRequest();
        if ('POST' == $request->getMethod()) {
            $form->bind($request);
            if ($form->isValid()) {
                //return $response;
            }
        }
        return array('form' => $form->createView());
    }

    /**
     * @Route("/backend/importcity", name="backend_import_city")
     * @Template()
     */
    public function importCityAction() {
        $model = new \Aevitas\LevisBundle\Import\ImportCity();
        $form = $this->createFormBuilder($model)->add('fileupload', 'file')->getForm();

        $model->setDm($this->get('doctrine_mongodb')->getManager());
        $model->setController($this);

        $request = $this->getRequest();
        if ('POST' == $request->getMethod()) {
            $form->bind($request);
            if ($form->isValid()) {
                //return $response;
            }
        }
        return array('form' => $form->createView());
    }

    /**
     * @Route("/backend/importdistrict", name="backend_import_district")
     * @Template()
     */
    public function importDistrictAction() {
        $model = new \Aevitas\LevisBundle\Import\ImportDistrict();
        $form = $this->createFormBuilder($model)->add('fileupload', 'file')->getForm();

        $model->setDm($this->get('doctrine_mongodb')->getManager());
        $model->setController($this);

        $request = $this->getRequest();
        if ('POST' == $request->getMethod()) {
            $form->bind($request);
            if ($form->isValid()) {
                //return $response;
            }
        }
        return array('form' => $form->createView());
    }

    /**
     * @Route("/update/{cCode}", name="staff_update_form_code")
     * @Secure(roles="ROLE_STAFF")
     */
    public function updateformManagementNotify($cCode) {
        $id = substr($cCode, 0, 2);
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $formManagement = $dm->getRepository('AevitasCustomerCodeBundle:CustomerCode')
                ->findOneByPrefix((int) $id);
        if (is_object($formManagement)) {
            $formManagement->setUsedById((int) substr($cCode, 2, strlen($cCode)));
            $dm->persist($formManagement);
            $dm->flush();
        }
        return new Response('Total Used - ' . $formManagement->getUsed());
    }

    public function formManagementNotify($cCode) {
        $id = substr($cCode, 0, 2);
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $formManagement = $dm->getRepository('AevitasCustomerCodeBundle:CustomerCode')
                ->findOneByPrefix((int) $id);
        if (is_object($formManagement)) {
            $formManagement->setUsedById((int) substr($cCode, 2, strlen($cCode)));
            $dm->persist($formManagement);
            $dm->flush();
        }
    }

    /**
     * @Route("/checking/email/{email}", name="staff_checking_email", defaults={"email"="noemail"})
     * @Secure(roles="ROLE_STAFF")
     */
    public function checkingEmailAction($email) {
        if ($email == 'noemail')
            exit(json_encode(array('count' => 0)));
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $qb = $dm->createQueryBuilder('VietlandUserBundle:User');
        $users = $qb->addOr($qb->expr()->field('email')->equals(new \MongoRegex("/^{$email}/i")))->limit(10)->getQuery()->execute();
        $usersJson = array('count' => 0, 'users' => array());
        foreach ($users as $user) {
            $item = array('email' => $user->getEmail(), 'Code' => $user->getCCode(), 'firstname' => $user->getFirstname(), 'lastname' => $user->getLastname(), 'cellphone' => $user->getCellphone(), 'sex' => $user->getSex());
            $usersJson['users'][] = $item;
            $usersJson['count'] += $usersJson['count'] + 1;
        }
        exit(json_encode($usersJson));
    }

    /**
     * @Route("/checking/cellphone/{cellphone}", name="staff_checking_cellphone", defaults={"cellphone"="nocellphone"})
     * @Secure(roles="ROLE_STAFF")
     */
    public function checkingCellphoneAction($cellphone) {
        if ($cellphone == 'nocellphone')
            exit(json_encode(array('count' => 0)));
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $qb = $dm->createQueryBuilder('VietlandUserBundle:User');
        $users = $qb->addOr($qb->expr()->field('cellphone')->equals(new \MongoRegex("/^{$cellphone}/i")))->limit(10)->getQuery()->execute();
        $usersJson = array('count' => 0, 'users' => array());
        foreach ($users as $user) {
            $item = array('email' => $user->getEmail(), 'Code' => $user->getCCode(), 'firstname' => $user->getFirstname(), 'lastname' => $user->getLastname(), 'cellphone' => $user->getCellphone(), 'sex' => $user->getSex());
            $usersJson['users'][] = $item;
            $usersJson['count'] += $usersJson['count'] + 1;
        }
        exit(json_encode($usersJson));
    }

    /**
     * @Route("/billjob/list", name="staff_billjob_list")
     * @Secure(roles="ROLE_STAFF")
     */
    public function listJobAction() {
        $request = $this->getRequest();
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $repo = $dm->getRepository('VietlandStoreBundle:Jobqueue');
        $limit = $request->get('amount') ? $request->get('amount') : 25;
        $page = $request->get('page') ? $request->get('page') : 1;
        $jobs = $repo->getJobs($page, $limit);
        $pagination = new Pagination($page, $repo->getCount(), $this->get('router')->generate('staff_billjob_list'), $limit);
         
        return new Response($this->renderView("VietlandStoreBundle:Store:listJob.html.twig", array(
            'jobs' => $jobs,
            'pagination' => $pagination->getView($this)
        )));
    }

    

}
