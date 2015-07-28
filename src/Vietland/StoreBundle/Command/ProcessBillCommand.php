<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReadFileCommand
 *
 * @author paulaan
 */

namespace Vietland\StoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Component\Console\Input\InputOption;
use Aevitas\PointBundle\EventListener\EarnPointEvent;
use Vietland\UserBundle\Document\UserLog;
use Vietland\UserBundle\Document\User;
use Vietland\AevitasBundle\Services;

class ProcessBillCommand extends ContainerAwareCommand {

    protected function configure()
    {
        $this->setName('crm:processbill')
             ->setDescription('Process the bill')
             ->addOption('ledgerid', null, InputOption::VALUE_REQUIRED, 'User(Ledger ID) ID')
             ->addOption('billidno', null, InputOption::VALUE_REQUIRED, 'Bill No ID');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        function castutf8($str)
        {
            return utf8_encode(utf8_decode($str));
        }
        $branchQuery = '';

        // Get argument from commandline
        $billno = $input->getOption('billidno');
        $ledgerid = $input->getOption('ledgerid');
        // var_dump("im here");
        // die();

        // SQL Server Entity Manager
        $em = $this->getContainer()->get('doctrine')->getManager();

        // MongoDB Documet Manager
        $dm = $this->getContainer()->get('doctrine_mongodb')->getManager();

        // Retrive all job in  job queue
        $job = $dm->getRepository('VietlandStoreBundle:Jobqueue')->findOneBy(array('bill' => $billno));

$sql ="
Select POSMstCamp.Name as CampName,B.BranchID, B.TransType, SD1.AttribValue as SDVal1, SD2.AttribValue as SDVal2, SD3.AttribValue as SDVal3, MstSalesMan.SalesManName, MstBGBranch.BranchName, B.ETime, B.BillIDNo, B.VoucherType, B.Prefix, B.BillNo, B.Suffix, B.BillDate, B.AccountsCVID, MstAcctCVLedger.AccountsIDName, MstAcctCVLedger.AccountsName, MstItem.ItemCode, MstItem.ItemDescription, BI.StkQty, BI.ItemRate, BI.ItemValue, B.RoundOff, B.Amount,  BI.Misc1 as ItemDisc,
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

Where B.BillIdNo = $billno and B.AccountsCVID = $ledgerid
Order By B.BillDate DESC, B.Prefix, B.BillNo, B.BillIDNo;";

        // Prepare and execute SQL Command
        $statement = $em->getConnection()->prepare($sql);
        $statement->execute();

        // Fetching all data
        $results = $statement->fetchAll();

        if (count($results)) {

            $sample = end($results);

            array_map(function($item) use (&$iteminfo) {

                $iteminfo[] = array(
                                'iCode' => iconv(
                                                "Latin1",
                                                "UTF-8//IGNORE",
                                                $item['ItemCode']
                                            ),
                                'iDesc' => iconv(
                                                "Latin1",
                                                "UTF-8//IGNORE",
                                                $item['ItemDescription']
                                            ),
                                'Qty' => $item['StkQty'],
                                'iRate' => $item['ItemRate'],
                                'iValue' => $item['ItemValue'],
                                'metadata' => array_filter(
                                                array(
                                                    'AVal1' => iconv(
                                                        "Latin1",
                                                        "UTF-8//IGNORE",
                                                        $item['AVal1']
                                                    ),
                                                    'Aval2' => iconv(
                                                        "Latin1",
                                                        "UTF-8//IGNORE",
                                                        $item['AVal2']
                                                    ),
                                                    'AVal3' => iconv(
                                                        "Latin1",
                                                        "UTF-8//IGNORE",
                                                        $item['AVal3']
                                                    ),
                                                    'AVal4' => iconv(
                                                        "Latin1",
                                                        "UTF-8//IGNORE",
                                                        $item['AVal4']
                                                    ),
                                                    'AVal5' => iconv(
                                                        "Latin1",
                                                        "UTF-8//IGNORE",
                                                        $item['AVal5']
                                                    ),
                                                    'AVal6' => iconv(
                                                        "Latin1",
                                                        "UTF-8//IGNORE",
                                                        $item['AVal6']
                                                    ),
                                                    'AVal7' => iconv(
                                                        "Latin1",
                                                        "UTF-8//IGNORE",
                                                        $item['AVal7']
                                                    ),
                                                    'AVal8' => iconv(
                                                        "Latin1",
                                                        "UTF-8//IGNORE",
                                                        $item['AVal8']
                                                    ),
                                                    'AVal9' => iconv(
                                                        "Latin1",
                                                        "UTF-8//IGNORE",
                                                        $item['AVal9']
                                                    ),
                                                    'AVal10' => iconv(
                                                        "Latin1",
                                                        "UTF-8//IGNORE",
                                                        $item['AVal10']
                                                    )
                                                )
                                            )
                                        );

            }, $results);
            if(!$job)
            {
               echo 'EMPTY JOB';
               return;
            }
            $data = json_decode($job->getData(), true);
            $user = $dm->getRepository('VietlandUserBundle:User')->findOneBy(array('CCode' => $data['PartyID'], 'status' => true));
            $userManager = $this->getContainer()->get('fos_user.user_manager');
            
            if (!is_object($user)) {
                $user = $userManager->createUser();
                $uid = $data['PartyID'];

                $sql = "Select * from dbo.MstAccTCVLedger Where cardid=20 and AccountsIDName='$uid'";
                $statement_user = $em->getConnection()->prepare($sql);
                $statement_user->execute();

                // Account Number per user is unique
                $result_user = $statement_user->fetchAll();

                $fullname   = '';
                $firstname  = '';
                $lastname   = '';
                $middlename = '';
                $gender     = '';
                $email      = '';
                $birthday   = '';

                if (count($result_user) == 1) {
                    // First record
                    $info = $result_user[0];

                    $firstname  = castutf8($info["FirstName"]);
                    $middlename = castutf8($info["MiddleName"]);
                    $lastname   = castutf8($info["LastName"]);
                    $gender     = castutf8($info["Gender"]);
                    $email      = castutf8($info["Email"]);
                    $birthday   = $info["BGDueDate"];

                    if($gender==1)
                        $gender = User::FEMALE;
                    else
                        $gender = User::MALE;

                    if (empty(trim($email))) {
                        $email = $uid . '@tbfvietnam.com';
                    }

                } else {
                    $logfile="USER_NOT_EXISTED_ON_ERP".date('d-m-Y',time());
                    $logmessage="User has AccountsIDName = $uid does not exist\n";
                    $logmessage.="       --------->cause by bill with BillIdNo = $billno";

                    $this->logger($logfile,$logmessage);

                    throw new \Exception("User has AccountsIDName = $uid does not exist", 1);
                }

                $phone = $data['CellNo'];

                if(empty($phone)||
                    empty($email)||
                    empty($gender)||
                    empty($birthday)||
                    (empty($firstname)&&empty($lastname)&&empty($middlename))||
                    empty($data['PartyID'])
                    )
                {
                    $log_data=array(
                        'phone'=>$phone,
                        'email'=>$email,
                        'gender'=>$gender,
                        'birthday'=>$birthday,
                        'firstname'=>$firstname,
                        'lastname'=>$lastname,
                        'middlename'=>$middlename,
                        'ccode'=>$data['PartyID'],
                        'postid'=>$ledgerid
                        );
                    foreach ($log_data as $key => &$value) {
                        # code...
                        if(empty($value))
                            $value='empty';
                        $value = $key.' -> '.$value;
                    }
                    $log_string = implode(" | ", $log_data);
                    $log_file_name = "Missing_User_Field_From_ERP_".date('d-m-y',time());
                    $this->logger($log_file_name, $log_string);
                }
                if(!empty($info["BGDueDate"]))
                    $birthday   = new \DateTime($info["BGDueDate"]);
                else
                    $birthday="";

                //new user
                $totalPayment = $user->getTotalPayment() + (int)$data['NetValue'];
                $user->setCellphone($phone)
                     ->setCCode($data['PartyID'])
                     ->setUsername($data['PartyID'])
                     ->setFirstname($firstname)
                     ->setLastname($lastname)
                     ->setMiddlename($middlename)
                     ->setEmail($email)
                     ->setSex($gender)
                     ->setPosId($ledgerid)
                     ->setRoles(array())
                     ->setEnabled(true)
                     ->generateRegcode()
                     ->setTotalBill(1)
                     ->setBonusPoint(array())
                     ->setTotalPayment($totalPayment)
                     ->setRegisterStore($data['StoreName'])
                     ->setPlainPassword($user->getCellphone());

                $sms = "Kinh gui ". $user->getName().",diem Star Club cua ban hien tai la ".$user->getPoint().",hay tan huong dich vu dac quyen cua Star Club, CT www.starclubvn.com";
                $this->sendNew($phone,$sms);

                if(!empty($birthday))
                     $user->setDob($birthday, true);
                try {
                    $join_date = new \DateTime(date('Y-m-d'));
                    if(isset($sample['BillDate']))
                        $join_date =  new \DateTime($sample['BillDate']);
                    $user->setJoin($join_date);
                    $userManager->updateUser($user, true);
                    $dispatcher = $this->getContainer()->get('event_dispatcher');
                    $dispatcher->dispatch(
                        'user.earn.point',
                        new EarnPointEvent(
                            $user,
                            UserLog::SIGNUP_STORE,
                            array(
                                'plainPassword' => $user->getCellphone(),
                                'store' => $sample['BranchID']
                            ),
                            null,
                            $this
                        )
                    );

                } catch (\Exception $e) {
                    $str = chr(13) . chr(10) . 'Caught exception: ' . $e->getMessage();
                    $str .= chr(13) . chr(10) . '--billno: ' . $billno . ' --ccode: ' . $data['PartyID'] . ' --cellphone: ' . $data['CellNo'];
                    $this->logger('bill_error', $str);
                }
            }else{
                //old user
                $total_bill = $this->getCaculateTotalBill("",$user->getId());
                $total_bill = $total_bill + 1;
                $user->setTotalBill((int) $total_bill);

                $totalPayment = $this->getCalculateTotalPayment("",$user->getId());
                $totalPayment = $totalPayment + (int)$data['NetValue'];
                $user->setTotalPayment($totalPayment);
                $dm->persist($user);
                $dm->flush();
                $sms = "Kinh gui ". $user->getName().",diem Star Club cua ban hien tai la ".$user->getPoint().",hay tan huong dich vu dac quyen cua Star Club, CT www.starclubvn.com";
                $this->sendNew($user->getPhone(),$sms);
            }

            $storeinfo = array('aName' => $sample['AccountsName'], 'bName' => $sample['BranchName'], 'Amount' => $sample['Amount'], 'itemNumber' => count($results), 'bDate' => new \DateTime($sample['BillDate']));
            $iteminfo = array();

            array_map(function($item)use(&$iteminfo) {
                $iteminfo[] = array('iCode' => iconv("Latin1", "UTF-8//IGNORE", $item['ItemCode']), 'iDesc' => iconv("Latin1", "UTF-8//IGNORE", $item['ItemDescription']), 'Qty' => $item['StkQty'], 'iRate' => $item['ItemRate'], 'iValue' => $item['ItemValue'], 'metadata' => array_filter(array('AVal1' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal1']), 'Aval2' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal2']), 'AVal3' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal3']), 'AVal4' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal4']), 'AVal5' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal5']), 'AVal6' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal6']), 'AVal7' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal7']), 'AVal8' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal8']), 'AVal9' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal9']), 'AVal10' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal10']))));
            }, $results);

            $dispatcher = $this->getContainer()->get('event_dispatcher');
            $event = $dispatcher->dispatch(
                'user.earn.point',
                new EarnPointEvent(
                    $user,
                    UserLog::BUYITEM,
                    $results,
                    $billno,
                    $this
                )
            );
        }
        $job->setStatus(true);
        $dm->persist($job);
        $dm->flush();
        
    }

    public function getRedeemPoint($bill_id)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();
        $sql = "select * from POSEtBillTenderDetail where PayMode=4 and Taken >0 and BillID='$bill_id'";
        $statement_user = $em->getConnection()->prepare($sql);
        $statement_user->execute();

        // Account Number per user is unique
        $redeems = $statement_user->fetchAll();
        if (count($redeems) == 1) {
            $redeem = $redeems[0];
            return $redeem['Taken'];
        }

        return false;
    }

    public function logger($filename, $message, $type = "service")
    {
        $message = $message . PHP_EOL;
        $folder = __DIR__ . "/../../../../app/logs/$type";
        $file = "$folder/$filename.txt";

        system("mkdir -p $folder");

        if (!file_exists($file)) {
            system("touch $file");
            system("chmod a+w $file");
        }

        file_put_contents($file, $message, FILE_APPEND);
    }

    //new calculate totalpayment function
        //get Total Payment
    public function getCalculateTotalPayment($number_day,$id){
        $lastdate = date('Y-m-d', strtotime("now -".$number_day." days") );
        $day = date("j", strtotime($lastdate));
        $month = date("n", strtotime($lastdate));
        $year = date("Y", strtotime($lastdate));
        
        $function = 'function(){
                        var rt = false;
                        var d = this.created;
                        if( this.action == "buyitem"){
                            if(d.getFullYear() > '.$year.'){
                                rt = true;
                            }
                            if(d.getFullYear() == '.$year.'){
                                if(d.getDate() >= '.($day).' &&  d.getMonth() == '.($month-1).'){
                                    rt = true;
                                }
                                if(d.getMonth() > '.($month-1).'){
                                    rt = true;
                                }
                            }
                        }
                        return rt;
                    }';
                    $dm = $this->getContainer()->get('doctrine_mongodb')->getManager();
               // $am = $this->get('doctrine.odm.mongodb.document_manager');
       // $dm = $am->getManager();
        $mongo = new \MongoClient();
        $db = $dm->getConnection()->getConfiguration()->getDefaultDB();
        $col_log = $mongo->$db->aevitaslog;
        $aevitagslog = $col_log->find(array('$where' => $function))->sort(array('user.$id' => 1, "created" => 1));
        $totalPayemnt = 0;
        if(!empty($aevitagslog)){
            $index = 0;
            $length_arr = count($aevitagslog);
            foreach ($aevitagslog as $doc) {
                //$totalPayment = $doc['totalPayment'];
                if($doc['user']['$id'] == $id){
                    $totalPayemnt = $totalPayemnt + $doc['totalPayment'];
                }
                
            }
            //return $totalPayemnt;
        }     
        return $totalPayemnt;
    }

    //new calculate bill function
        //get Total Bill
    public function getCaculateTotalBill($number_day,$id){

        $lastdate = date('Y-m-d', strtotime("now -".$number_day." days") );
        $day = date("j", strtotime($lastdate));
        $month = date("n", strtotime($lastdate));
        $year = date("Y", strtotime($lastdate));
        
        $function = 'function(){
                        var rt = false;
                        var d = this.created;
                        if( this.action == "buyitem"){
                            if(d.getFullYear() > '.$year.'){
                                rt = true;
                            }
                            if(d.getFullYear() == '.$year.'){
                                if(d.getDate() >= '.($day).' &&  d.getMonth() == '.($month-1).'){
                                    rt = true;
                                }
                                if(d.getMonth() > '.($month-1).'){
                                    rt = true;
                                }
                            }
                        }
                        return rt;
                    }';
                    $dm = $this->getContainer()->get('doctrine_mongodb')->getManager();
               // $am = $this->get('doctrine.odm.mongodb.document_manager');
       // $dm = $am->getManager();
        $mongo = new \MongoClient();
        $db = $dm->getConnection()->getConfiguration()->getDefaultDB();
        $col_log = $mongo->$db->aevitaslog;
        $aevitagslog = $col_log->find(array('$where' => $function))->sort(array('user.$id' => 1, "created" => 1));
        $bill_count = 0;
        if(!empty($aevitagslog)){
            $index = 0;
            $length_arr = count($aevitagslog);
            foreach ($aevitagslog as $doc) {
                $index++;
                if($doc['user']['$id'] == $id){
                    $bill_count++;
                }
                
            }
            return $bill_count;
        }     
        return 0;
    }

    //new sms function -Hung

    public function sendNew($phone,$sms) {

        $sms = str_replace("+"," ",$sms);
        $sms = str_replace("%3A"," :",$sms);
        $data = array (
                      'submission' => 
                      array (
                        'api_key' => '420355a1',
                        'api_secret' => '21a66509',
                        'sms' => 
                        array (
                          0 => 
                          array (
                            'brandname' => 'Levis',
                            'text' => $sms,
                            'to' => $phone,
                          ),
                        ),
                      ),
                    );

        $url = "https://sms.vht.com.vn/ccsms/json";
        $ch = curl_init(); $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);              
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);         
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $response = curl_exec($ch);

        return $response;
    }

}
