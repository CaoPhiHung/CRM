<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EarnPointListener
 *
 * @author apple
 */

namespace Aevitas\PointBundle\EventListener;

use Vietland\UserBundle\Document\UserLog;
use Vietland\AevitasBundle\Helper\Multithread\MailerTask;
use Doctrine\ODM\MongoDB\LoggableCursor;
use Symfony\Component\DependencyInjection\Container;

class EarnPointListener {

    private $container;
    private $dm;
    private $pointrule;
    private $sms;
    private $mailer;
    private $templating;
    private $translator;

    /**
     *
     * @var EarnPointEvent
     */
    private $event;

    public function __construct($container, $dm, $pointrule, $sms, $mailer, $templating, $translator) {
        $this->container = $container;
        $this->translator = $translator;
        $this->templating = $templating;
        $this->dm = $dm;
        $this->pointrule = $pointrule;
        $this->sms = $sms;
        $this->mailer = $mailer;
    }

    public function onEarnPointEvent(EarnPointEvent $event) {
        $this->event = $event;
        call_user_func(array($this, $event->getAction() . 'Action'));
    }

    public function earnReferralEvent() {
        $user = $this->event->getUser();
        $dm = $this->dm;
        $refUser = $dm->getRepository('VietlandUserBundle:User')->findOneBy(array('CCode' => $user->getRefcel()));
        if (is_object($refUser)) {
            $pointRuleService = $this->pointrule;
            $refPoint = $pointRuleService->getReferralPoint();
            $refUser->earnNonQualifyPoints($refPoint);
            $userRefLog = new UserLog();
            $userRefLog->setUser($refUser)->setAction('get_ref_point')->setSubject($user->getName())->setPoint($refPoint);
            $user->setRef(0);
            $dm->persist($user);
            $dm->persist($refUser);
            $dm->persist($userRefLog);
            $dm->flush();
        }
    }

    public function logger($message = "", $filename = null)
    {
        $context = $this->event->getContext();

        if (!is_null($filename)) {
            $context->logger($filename, $message);
            return;
        }

        if (!is_null($context)) {
            $context->logger('rebuild_point', $message);
        }
    }

    public function buyitemAction()
    {
        $this->logger("\n --------------------------- \n");
        $dm = $this->dm;
        $context = $this->event->getContext();

        $this->logger("Start buy item");

        // Initialize for transaction
        $friend = null;
        $user = null;
        $logReferal = null;
        $extraLog = null;
        $userBuyLog = null;
        $user = null;

        $_friend_ = null;
        $_logReferal_ = null;
        $_extraLog_ = null;
        $_userBuyLog_ = null;
        $_user_ = null;

        $prev_level=null;

        $user = $this->event->getUser();
        $prev_level=$user->getCurrentLevel();
        // For transaction
        $_user_ = clone $user;

        if ($user->getPoint() == 0 && $user->getRefcel()) {
            $this->earnReferralEvent();
        }

        $data = $this->event->getData();
        $sample = end($data);

        $redeem_point = 0;
        $redeem = false;

        if ($context != null) {
            $redeem = $context->getRedeemPoint($sample['BillIDNo']);
            $this->logger("Redeem point $redeem");
        }

        $finalItems = array();

        //base rate at first
        $pointRuleService = $this->pointrule;
        $baseRate = $pointRuleService->getBaseRate($user->getCurrentLevel());
        $userBuyLog = new UserLog();

        //start checking history last 12 month
        $repo = $dm->getRepository("VietlandUserBundle:UserLog");
        $lastOrder = $repo->findFirstLatestOrder($user->getId());

        $this->logger("Calculate points");

        $now = new \DateTime(date('Y-m-d'). ' 00:00:00');

        if (!is_null($lastOrder)) {

            // At least one bill

            $userBuyLog->setTotalPayment($lastOrder->getTotalPayment() + (float) $sample['Amount']);

            $firstBillOneYear = $repo->findFirstOrderOneYear($user->getId());
            if ($user->getLevel() < \Vietland\UserBundle\Document\User::PLATIN) {
                if (!is_null($firstBillOneYear)) {
                    $interval = $userBuyLog->getTotalPayment() - $firstBillOneYear->getTotalPayment();
                } else {
                    $interval = $userBuyLog->getTotalPayment();
                }
                $nextLevel = $this->pointrule->getUserLevelInterval($interval);

                if ($nextLevel){
                    $user->setLevel($nextLevel);

                    //update date upgrade level
                    $user->setUpgradeDate($now);
                    $user->setUpdateLevel($now);
                }
            }
        } else {
            // new user/update level require
            $userBuyLog->setTotalPayment((float) $sample['Amount']);
            $nextLevel = $this->pointrule->getUserLevelInterval((float) $sample['Amount']);
            if ($nextLevel) {//The first time customer get new level
                $user->setLevel($nextLevel);
                $baseRate = $pointRuleService->getBaseRate($user->getCurrentLevel());
                $prev_level=$nextLevel;

                //update date upgrade level
                $user->setUpgradeDate($now);
                $user->setUpdateLevel($now);
            }
        }

        //end checking history
        $queryItemsCode = array();

        // TRANSACTION
        //accumulate point for friend
        if ($user->getRefcel() && !$user->getQualifyPoint()) {
            $friend = $dm->getRepository('VietlandUserBundle:User')->findOneBy(array('cellphone' => $user->getRefcel()));

            if (is_object($friend)) {//Update referal point for user

                // For rollback
                $_friend_ = clone $friend;

                $point = $this->pointrule->getRefcel();
                $logReferal = new UserLog();
                $logReferal->setAction(UserLog::REFERAl_STORE)
                        ->setSubject($data[0]['BranchName'])
                        ->setUser($friend)
                        ->setPoint($point);
                $friend->earnNonQualifyPoints($point);

                // For rollback
                $_logReferal_ = $logReferal;
            }
        }

        //Accumulate point for customer
        $anni = $user->isAnniversaryToday();

        //Bill Date
        $billDate = new \DateTime(date('Y-m-d', strtotime($sample['BillDate'])) . ' ' . date('H:i:s', strtotime($sample['ETime'])));
        
        $pointrule = $pointRuleService->setSchema(array(
            'store' => (int) $sample['BranchID'],
            'action' => UserLog::BUYITEM,
            'gender' => $user->getSex(),
            'level' => $user->getCurrentLevel(),
            'city' => $user->getCity(),
            'district' => $user->getDistrict(),
            'anniversary' => (int) is_object($anni),
            // 'birthday' => (int) $user->isBirthDayToday(),
            'birthday' => (int) 0,
            'bonus' => !$user->getBonusPoints(),
            'time' => $billDate
        ));


        if ($redeem) {
            $redeem_point = $redeem;
        }

        $finalPoints = (((float) $sample['Amount']) - ((float) $redeem)) / $baseRate;
        $basePoint =$finalPoints;
        $storeInfo = array();
        $storeInfo[] = array('bpoint' => round($finalPoints), 'BranchID' => $sample['BranchID'], "BranchName" => $sample["BranchName"], "BillIDNo" => $sample["BillIDNo"], "BillNo" => $sample["BillNo"], "BillDate" => $sample["BillDate"], "Amount" => $sample['Amount'], 'qty' => is_array($this->event->getData()) ? count($this->event->getData()) : 0);
        $itemsInfo = array();

        array_map(function($item)use(&$itemsInfo) {
            $schema = array('iCode' => $item['ItemCode'], 'iDesc' => $item['ItemDescription'], 'Qty' => $item['StkQty'], 'iRate' => $item['ItemRate'], 'iValue' => $item['ItemValue']);
            $metadata = array_filter(array(
                'AVal1' => preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', utf8_decode($item['AVal1'])),
                'Aval2' => preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', utf8_decode($item['AVal2'])),
                'AVal3' => preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', utf8_decode($item['AVal3'])),
                'AVal4' => preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', utf8_decode($item['AVal4'])),
                'AVal5' => preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', utf8_decode($item['AVal5'])),
                'AVal6' => preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', utf8_decode($item['AVal6'])),
                'AVal7' => preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', utf8_decode($item['AVal7'])),
                'AVal8' => preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', utf8_decode($item['AVal8'])),
                'AVal9' => preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', utf8_decode($item['AVal9'])),
                'AVal10' => preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', utf8_decode($item['AVal10'])))
            );

            if (!empty($metadata))
                $schema['metadata'] = $metadata;

            if ($item['ItemCode'] != "") {
                if (isset($itemsInfo[$item['ItemCode']]))
                    $itemsInfo[$item['ItemCode']]['Qty'] = (int) $itemsInfo[$item['ItemCode']]['Qty'] + 1;
                else
                    $itemsInfo[$item['ItemCode']] = $schema;
            }

        }, $this->event->getData());

        if (!empty($itemsInfo)) {
            $storeInfo[] = array('items' => $itemsInfo);
        }

        $rule = null;
        $point_after_ruled = $basePoint;
        foreach ($pointrule->getRules() as $r) {
            if ($r->getOperation() == \Aevitas\PointBundle\Document\PointRule::MULTIPLYQTY) {
                $points = ((float) $sample['Amount'] / $baseRate) * $storeInfo[0]['qty'];
            } else {
                $points = $r->getEarnedPoints((float) $sample['Amount'] / $baseRate);
            }
            if ($points > $point_after_ruled) {
                $rule = $r;
                $point_after_ruled = $points;
            }
        }

        //earn bonus point by rule
        //this is pure effect if not any tripple or birthday calculate
        $user->earnQualifyPoints($point_after_ruled);
        //cause finalpoint here mean bonus point so it must deduct the pure point
        $birthday_point = 0;
        $gift_point=0;
        if ($user->isBillInBirthMonth(
                                    new \DateTime(
                                        date('Y-m-d', strtotime($sample['BillDate'])
                                            )
                                        )
                                    )) 
        {
            $this->logger("Birthday $birthday_point");
            $birthday_point = $finalPoints;
            //the level before re calculate
            switch ($prev_level) {
                case 1:
                //the point * 2 mean bonus is *1
                    $birthday_point *= 1;
                    break;
                case 2:
                //the point * 3 mean bonus is *2
                    $birthday_point *= 2;
                    break;
                case 3:
                //the point * 4 mean bonus is *3 
                    $birthday_point *= 3;
                    break;
            }
        }
        echo 'birthday_point';
        print_r($birthday_point);
        echo "\n";
        $triple_point = 0;

        if ($user->isTripleDay()) {
            $this->logger("Triple day $triple_point");
            $triple_point = $finalPoints;
            //the point * 3 mean bonus is *2
            $triple_point *= 2;
        }
        echo 'tripple';
        print_r($triple_point);
        echo "\n";
        if ($triple_point > $birthday_point) {
            $gift_point = $triple_point;
            $extraLog = new UserLog();
            $extraLog->setUser($user)->setAction('earn_tripleday')->setPoint($gift_point);
            $extraLog->setSchema($storeInfo)->setUid($user->getId());
            $_extraLog_ = $extraLog;
        } else {
            if (($birthday_point > 0) && ($triple_point <= $birthday_point)) {
                $gift_point = $birthday_point;
                $extraLog = new UserLog();
                $extraLog->setUser($user)->setAction('earn_birthday')->setPoint($gift_point);
                $extraLog->setSchema($storeInfo)->setUid($user->getId());
                $_extraLog_ = $extraLog;
            }//else gift point will be zero as default
        }

        $this->logger("Final point $finalPoints");

        //accumulate total point
        echo "\nbonus point";
        var_dump($gift_point);
        echo "\n";
        $user->earnNonQualifyPoints($gift_point);

        $userBuyLog->setUser($user)
                   ->setUid($user->getId())
                   ->setAction($this->event->getAction())
                   ->setPoint($basePoint)
                   ->setSchema($storeInfo)
                   ->setMd5($this->event->getMd5())
                   ->setCreated($billDate);

        if (is_object($rule)) {
            //set rule id for
            $userBuyLog->setRid($rule->getId());
        }

        //Log Subject if user is bonus
        $logSubject = array();

        if (is_object($rule)) {
            $logSubject[] = $rule->getName();
            if (is_object($anni))
                $logSubject[] = $anni->getName();
            if ($user->isBirthdayToday())
                $logSubject[] = 'isdob';
        }

        if (!empty($logSubject)) {
            $userBuyLog->setSubject(implode(' | ', $logSubject));
        }

        //accumulate new point
       
        echo 'base point';
        print_r($basePoint);
        echo "\n";
        echo 'userpoint';
        print_r($userBuyLog->getPoint());
        echo "\n";
        // For transaction
        $_userBuyLog_ = $userBuyLog;
       
        try {
            echo "START TRANSACTION";
            $this->logger("Start transaction");

            $this->transact($dm, $friend);
            $this->transact($dm, $logReferal);
            $this->transact($dm, $userBuyLog);
            $this->transact($dm, $extraLog);
            $this->transact($dm, $user);

            $this->event->setStatus('This bill has been saved successfully to CRM');
            $this->logger("Traction successfully !");

        } catch (\Exception $e) {
            echo "ROLL BACK";
            $this->logger("Transaction fail !");
            $this->logger("Error Bill No  " . $sample["BillNo"]);

            // Rollback transaction
            $this->rollback($dm, $_friend_, 'persist');
            $this->rollback($dm, $_user_, 'persist');
            $this->rollback($dm, $_logReferal_, 'remove');
            $this->rollback($dm, $_userBuyLog_, 'remove');
            $this->rollback($dm, $_extraLog_, 'remove');

            $this->logger("Rollback complete !");
            $this->event->setStatus('This bill is already saved to CRM or got some error');
            $this->logger($e->getMessage());
        }
    }

    // START BEGIN TRANSACTION TO APPLY CHANGES

    public function transact($dm, $object)
    {
        // No need to rollback
        if (is_null($object)) {
            return;
        }

        $dm->persist($object);
        $dm->flush();
    }

    public function rollback($dm, $object, $action)
    {
        // No need to rollback
        if (is_null($object)) {
            return;
        }

        $dm->$action($object);
        $dm->flush();
    }

    public function earnpointqlAction() {
        $userEarnPoint = new UserLog();
        $user = $this->event->getUser();
        $dm = $this->dm;
        $userEarnPoint->setUser($user)->setAction(UserLog::EARN_POINT_QUALIFY)->setSubject($this->event->getData());
        $user->earnQualifyPoints($this->event->getData());
        $dm->persist($userEarnPoint);
        $dm->persist($user);
        $dm->flush();
    }

    public function signuponlineAction() {
        $dm = $this->dm;
        $user = $this->event->getUser();
        $userLog = new UserLog();
        $userLog->setUid($user->getId());
        $userLog->setUser($user)->setAction($this->event->getAction());
        $dm->persist($userLog);
        $dm->flush();
    }

    public function signupstoreAction()
    {
        $this->logger("\n --------------------------- \n");
        $this->logger("Star signup");
        $context = $this->event->getContext();
        $user = $this->event->getUser();
        $user->resetEditedField();
        $dm = $this->dm;
        $pr = $this->pointrule;
        $userLog = new UserLog();
        $data = $this->event->getData();
        $anni = $user->isAnniversaryToday();
        $bday = $user->isBirthdayToday();

        $pr->setSchema(array(
            'store' => $data['store'],
            'action' => UserLog::SIGNUP_STORE,
            'gender' => $user->getSex(),
            'level' => $user->getLevel(),
            'city' => $user->getCity(),
            'district' => $user->getDistrict(),
            'anniversary' => is_object($anni),
            'birthday' => $user->isBirthDayToday()
        ));

        $points = 0;
        $rule = null;

        foreach ($pr->getRules() as $r) {
            if ($r->getPoint() > $points) {
                $points = $r->getPoint();
                $rule = $r;
            }
        }

        if (is_object($rule))
            $userLog->setRid($rule->getId());
        if (!$points) {//Update join bonus
            $points = $this->pointrule->getJoinbonus();
            $userLog->setPoint($points);
        } else
            $userLog->setPoint($points);
        $user->earnNonQualifyPoints($points);
        $dm->persist($user);
        $dm->flush();

        $userLog->setUid($user->getId());
        $userLog->setUser($user)->setAction($this->event->getAction())->setSubject($data['store']);
        $dm->persist($userLog);
        $dm->flush();

        $this->logger("Check domain");
        $email = $user->getEmail();

        /*** DEBUG ***/
        $isemail = preg_match("/@u-matrix.vn/", $email);
        $isemail = true;
        /*** ĐEBUG ***/

        if ($isemail) {
            $this->logger("Email is available");
            $phone = $user->getCellphone();

            // Send SMS Message
            if ($user->getRegcode()) {

                //$this->logger("Send sms to $phone");
                //$sms = $this->container->get('sms_sender');
                /*$sms->setPhone($phone)
                    
->setSms($this->templating->render(':mail:signup.html.twig', 
array('user' => $user, 'code' => 
$user->getRegcode())),'text/html', 'utf8');

                $sms->send();*/

                /*$transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'sslv3')
                            ->setUsername()
                            ->setPassword();

                // create the mailer using the newInstance() method
                $mailer = \Swift_Mailer::newInstance($transport);*/

                $message = \Swift_Message::newInstance()
                                ->setSubject($this->translator->trans('You have just signed up to our Loyalty Program'))
                                ->setFrom('crm@thanbacgroup.com', 'Thanh Bac Fashion')
                                ->setTo($email)
  ->setBody(
$this->templating->render(':mail:newsignup.html.twig', array('name' => $user->getName(), 'code' => $user->getRegcode())), 
'text/html', 'utf8');

                try {
                    //$result = $mailer->send($message);
                   
 $this->container->get('mailer')->send($message);
                    $this->logger("Send email to $phone");
                } catch(\Swift_TransportException $e){
                   // Error
                    $this->logger("Fail to send mail ore create 
user","service");
                }

                //$dm->flush();
            }
        }
    }
}
