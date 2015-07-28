<?php

namespace Vietland\StoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\Query\ResultSetMapping;
use JMS\JobQueueBundle\Entity\Job;
use Symfony\Component\Console\Input\InputOption;
use Vietland\UserBundle\Document\UserLog;
use Vietland\StoreBundle\Document\Jobqueue;
use Vietland\StoreBundle\Document\JobConfiguration;


class SyncBillCommand extends ContainerAwareCommand
{
    /**
     * Configure for search bill
     *
     * @return void
     */
    protected function configure()
    {
        $this->setName('crm:syncbill')
             ->setDescription('Synchronize bill from ERP');
    }

    public function syncBillFromERPManualAction()
    {
        $start = '07/01/2014';
        $end = date("m/d/Y", time());
        $dm = $this->getContainer()->get('doctrine_mongodb')->getManager();
        $em = $this->getContainer()->get('doctrine')->getManager();
        /******load all bills from ERP since start CRM******/
        //take all bill(IDNo and legderId) with card type = 20 , and billdate >= 07/01/2014
       $sql="Select Store.Branchid as StoreID, b.billidno as Billidno , B.AccountsCVID as ledgerID ,   Store.BranchName As StoreName,
B.BillDate As BillDate,
B.etime As Billtime ,
(B.Prefix + '/' + cast(B.BillNo as varchar) + (Case When B.Suffix = '' Then '' Else '/'+B.Suffix End)) As BillNo,
(case when (B.VoucherType = '17') then (Sum ( BI.StkQty * -1 )) else  (Sum (BI.StkQty)) end ) as SaleQty ,
Party.AccountsName As PartyName, Party.AccountsidName As PartyID , CardType.CardName As CardTypeName,
Party.CellNo As CellNo, Party.Email As Email,
(case when (B.VoucherType = '17') then (B.SaleValue * -1 ) else  B.SaleValue end ) as GrossAmount ,
(B.Misc1 + B.Misc2 + B.Misc3 + B.Misc4 + B.Misc5) As Discount,
(case when (B.VoucherType = '17') then (B.Amount * -1 ) else  B.Amount end ) as NetValue
From EtBillFile B
LEFT OUTER JOIN EtBillFileItems BI On BI.BillIDNo = B.BillIDNo
Left Outer Join MstAcctCVLedger Party On Party.LedgerID = B.AccountsCVID
Left Outer Join MstBGBranch Store On Store.BranchID = B.BranchID
Left Outer Join POSMstCardType CardType On CardType.CardID = Party.CardID
where B.BillDate >='$start' and B.BillDate <='$end'  -- MM/DD/YYYY
and Party.AccountsidName like '831%'
and CardType.CardID = 20
And ISNULL(B.DOACase,0)=0
And ISNULL(B.Passed,0)=0
and B.VoucherType in (14,15,16,17,8,10,11,129,214)
group by Store.BranchName , Store.Branchid ,  Store.regionid, b.BillDate , b.etime , b.prefix , b.billno , b.suffix ,  Party.AccountsName ,  Party.AccountsidName , CardType.CardName , party.CellNo , party.email, b.salevalue , b.BillIdNo ,b.AccountsCVId, b.Vouchertype ,b.Misc1 , b.Misc2, b.Misc3 , b.Misc4 , b.Misc5 ,b.Amount
order by B.BillDate asc";


        // Prepare and execute SQL Command
        $statement = $em->getConnection()->prepare($sql);
        $statement->execute();

        // Fetching all data
       $result_from_erp=array();
       while ($row = $statement->fetch()) {
            $row['PartyName'] = $this->castutf8( $row['PartyName']);
            $result_from_erp[$row['Billidno']] = json_decode(json_encode($row, JSON_UNESCAPED_UNICODE), false);
        }
       
        /******load all bills from CRM******/
        //take all current bill(IDNo and legderId) from crm (which mean the bill had been processed)
        $dm = $this->getContainer()->get('database_manager');
        $mongo = new \MongoClient();

        // $database_name = $dm->getConnection()->getConfiguration()->getDefaultDB();
        $database_name='levis_10012015';
        $db = $mongo->$database_name;
        $userlog = $db->aevitaslog;
       $bill_from_crm = $userlog->find(
        array(
            'action'=>'buyitem'
            ),
        array(
            'schema.BillIDNo','uid'
            )
        );

       $result_from_crm=array();
       foreach ($bill_from_crm as $key => $value) {
           # code...
        $result_from_crm[$value['schema'][0]['BillIDNo']]=$value;
       }
        /******find out bills need to sync******/
       //take out which bill from ERP not in CRM , which mean it needed to be processed
       $bill_diff_from_erp =array();
       $bill_diff_from_erp= array_diff_key($result_from_erp, $result_from_crm) ;

       /******insert bills into job******/
       //get list to check cellphone

        $sql = "Select b.billidno as Billidno, Party.AccountsidName As PartyID ,  Party.CellNo As CellNo
From EtBillFile B
LEFT OUTER JOIN EtBillFileItems BI On BI.BillIDNo = B.BillIDNo
Left Outer Join MstAcctCVLedger Party On Party.LedgerID = B.AccountsCVID
Left Outer Join MstBGBranch Store On Store.BranchID = B.BranchID
Left Outer Join POSMstCardType CardType On CardType.CardID = Party.CardID
where
B.BillDate >='$start' and B.BillDate <='$end'  -- MM/DD/YYYY
and CardType.CardID = 20
And ISNULL(B.DOACase,0)=0
And ISNULL(B.Passed,0)=0
and B.VoucherType in (14,15,16,17,8,10,11,129,214)
group by Store.BranchName , Store.Branchid , Store.regionid , b.BillDate , b.etime , b.prefix , b.billno , b.suffix ,  Party.AccountsName ,  Party.AccountsidName , CardType.CardName , party.CellNo , party.email, b.salevalue , b.BillIdNo ,b.AccountsCVId, b.Vouchertype ,b.Misc1 , b.Misc2, b.Misc3 , b.Misc4 , b.Misc5 ,b.Amount";

        $result1 = array();
        $result2 = array();

        // ---------- PACKAGE 1 ------------

        // Prepare and execute SQL Command
        $statement = $em->getConnection()->prepare($sql);
        $statement->execute();

        // Fetching all data
        $result1 = $statement->fetchAll();

        // ----------- PACKAGE 2 ------------

        $mongo = new \MongoClient();
        $db = $dm->getConnection()->getConfiguration()->getDefaultDB();
        $col_duplicated = $mongo->$db->phone_duplicated;
        $phones = $col_duplicated->find();
        $list_phone = array();

        foreach ($phones as $item) {
            $accounts = $item['account'];
            $list_phone = array_unique(array_merge($list_phone, $accounts));
        }

        if (count($list_phone) >0) {
            $set = "(";

            foreach ($list_phone as $phone) {
                $set .= "'$phone',";
            }

            $set = substr($set, 0, strlen($set) - 1) . ")";

            $sql = "Select b.billidno as Billidno, Party.AccountsidName As PartyID ,  Party.CellNo As CellNo
From EtBillFile B
LEFT OUTER JOIN EtBillFileItems BI On BI.BillIDNo = B.BillIDNo
Left Outer Join MstAcctCVLedger Party On Party.LedgerID = B.AccountsCVID
Left Outer Join MstBGBranch Store On Store.BranchID = B.BranchID
Left Outer Join POSMstCardType CardType On CardType.CardID = Party.CardID
where
Party.AccountsidName IN $set and CardType.CardID = 20
And ISNULL(B.DOACase,0)=0
And ISNULL(B.Passed,0)=0
and B.VoucherType in (14,15,16,17,8,10,11,129,214)
group by Store.BranchName , Store.Branchid , Store.regionid , b.BillDate , b.etime , b.prefix , b.billno , b.suffix ,  Party.AccountsName ,  Party.AccountsidName , CardType.CardName , party.CellNo , party.email, b.salevalue , b.BillIdNo ,b.AccountsCVId, b.Vouchertype ,b.Misc1 , b.Misc2, b.Misc3 , b.Misc4 , b.Misc5 ,b.Amount";

            // Prepare and execute SQL Command
            $statement = $em->getConnection()->prepare($sql);
            $statement->execute();

            // Fetching all data
            $result2 = $statement->fetchAll();
        }

        $set_result_1 = array();
        $set_result_2 = array();

        foreach ($result1 as $key => $value) {
            $set_result_1["_".$value['PartyID']] = $value;
        }

        foreach ($result2 as $key => $value) {
            $set_result_2["_".$value['PartyID']] = $value;
        }

        $results = array_merge($set_result_1, $set_result_2);

        $indexes = array();
        $data = array();
        $duplicated = array();
        $check_duplicate_cellphone_collection = array();


        // find user status is disabled
        $disableUsers = $dm->getRepository('VietlandUserBundle:User')->findBy(array('status' => false));
        $list_userid = array();
        // var_dump("here");
        // die();
        if(!empty($disableUsers)){
            foreach ($disableUsers as $user) {
                $list_userid[] = $user->getCCode();
            }
        }

        //end find disabled


        //---->begin check bonus point - expired date
        //$dm = $this->get('doctrine.odm.mongodb.document_manager');
        //$users = $dm->getRepository('VietlandUserBundle:User')->findAll();
        $now = new \DateTime(date('Y-m-d'));
        $current_date = $now->format('Y-m-d');

        $function = 'function(){
                        var rt = false;
                        if(typeof this.bonusPoint != ""){                            
                            var arr = this.bonusPoint;
                            for(var i = 0; i < arr.length; i++){
                                var obj = arr[i];
                                var d = obj.expired_date;
                                if(d <= "'.$current_date.'"){
                                    rt = true;
                                }
                            }
                        }
                        return rt;
                    }';            
        
        $usersbonus = $dm->createQueryBuilder('VietlandUserBundle:User')->field('bonusPoint')->exists(true)->where($function)->sort('id', 'desc')->getQuery()->execute();

        $num = count($usersbonus);

        // $now = new \DateTime(date('Y-m-d'));
        // $current_date = $now->format('Y-m-d');

        foreach($usersbonus as $user){
            $current_BonusPoint = $user->getBonusPoint();
            
            if(!empty($current_BonusPoint)){
                $current_Point = $user->getPoint();
                $current_TotalExtraPoint = $user->getTotalExtraPoint();

                $num_bonus = count($current_BonusPoint);
                for ($i=0; $i < $num_bonus; $i++) {
                    $value = $current_BonusPoint[$i];
                    if($value['expired_date'] <= $current_date){
                        //get redeem point of user
                        $date = new \DateTime($value['start_date']. ' 00:00:00');
                        $redeems = $dm->createQueryBuilder('AevitasLevisBundle:AbstractRedeem')
                                    ->field('uid')->equals($user->getId())
                                    ->field('created')->gte($date)->sort('time', 'desc')->getQuery()->execute();
                        $redeem_point = 0;
                        foreach ($redeems as $obj) {
                            $redeem_point = $obj->getPoint();
                            break;
                        }
                        //end get redeem point
                        if($value['type'] === 1){
                            if($redeem_point <= $value['extra_point']){
                                $expired_point = $value['extra_point'] - $redeem_point;

                                $current_TotalExtraPoint = $current_TotalExtraPoint - $expired_point;
                                $current_Point = $current_Point - $expired_point;
                                unset($current_BonusPoint[$i]);
                            }else{
                                $current_TotalExtraPoint = $current_TotalExtraPoint - $value['extra_point'];
                                unset($current_BonusPoint[$i]);
                            }
                        }

                        if($value['type'] === 2){
                            if($redeem_point <= $value['extra_point']){
                                $expired_point = $value['extra_point'] - $redeem_point;

                                $current_TotalExtraPoint = $current_TotalExtraPoint - $expired_point;
                                $current_Point = $current_Point - $expired_point;
                                unset($current_BonusPoint[$i]);
                            }else{
                                $current_TotalExtraPoint = $current_TotalExtraPoint - $value['extra_point'];
                                unset($current_BonusPoint[$i]);
                            }
                        }
                    }
                }

                //updated value of BonusPoint for user
                $user->setBonusPoint($current_BonusPoint);
                $user->setTotalExtraPoint((int) $current_TotalExtraPoint);
                $user->setPoint((int) $current_Point);

                $dm->persist($user);
                $dm->flush();
            }
        }

        //---> end check bonus point

        //----------------------------------------------------
        //------------->Begin Downgrade Action<---------------
        //----------------------------------------------------
        $repo = $dm->getRepository('VietlandUserBundle:User');
        $data = array();
        $data['dm'] = $this->getContainer()->get('doctrine_mongodb');
        
        //PROCESS: no purchase activity for 12 months AND purchase level of each Tier
        $user_payment = $repo->getTotalPaymentOfUser($data);
        $month12_before = date('Y-m-d', strtotime("now -12 month") );
        
        $users = $dm->getRepository('VietlandUserBundle:User')->findAll();
        $now = new \DateTime(date('Y-m-d'). ' 00:00:00');
        
        foreach ($users as $user) {
            $date_update_level = $user->getUpdateLevel();
            $registration_date = $user->getJoined();
            $level = $user->getCurrentLevel();
            $uid = $user->getId();
            $status = $user->getStatus();
            $points = $user->getPoint();
            $level_downgrade = null;

            if(isset($user_payment[$uid])){
                if($date_update_level != null){
                    if($date_update_level < $month12_before){
                        // if($level == 1){
                        //     if($user_payment[$uid] < 1000000){
                        //         $level_downgrade = 1;
                        //         $status = false;
                        //     }

                        // }
                        if($level == 2){
                            if($user_payment[$uid] < 4000000){
                                $level_downgrade = 1;
                            }
                        }
                        if($level == 3){
                            if($user_payment[$uid] < 10000000){
                               $level_downgrade = 2;
                            }
                        }
                    }

                    //Silver: 15 months no shopping inactive customer and truncate the points
                    if($level == 1){
                        $month15_before = date('Y-m-d', strtotime("now -15 month"));
                        if($date_update_level < $month15_before){
                            if($level == 1){
                                if($user_payment[$uid] < 1000000){
                                    $level_downgrade = 1;
                                    $status = false;
                                    //truncate the points
                                    $points = 0;
                                }
                            }                     
                             
                        }
                    }
                }else{
                    if($registration_date < $month12_before){
                        // if($level == 1){
                        //     if($user_payment[$uid] < 1000000){
                        //         $level_downgrade = 1;
                        //         $status = false;
                        //     }

                        // }
                        if($level == 2){
                            if($user_payment[$uid] < 4000000){
                                $level_downgrade = 1;
                            }
                        }
                        if($level == 3){
                            if($user_payment[$uid] < 10000000){
                                $level_downgrade = 2;
                            }
                        }
                    }
                    //Silver: 15 months no shopping inactive customer and truncate the points
                    if($level == 1){
                        $month15_before = date('Y-m-d', strtotime("now -15 month"));
                        if($registration_date < $month15_before){
                            if($level == 1){
                                if($user_payment[$uid] < 1000000){
                                    $level_downgrade = 1;
                                    $status = false;
                                    //truncate the points
                                    $points = 0;
                                }
                            }                     
                             
                        }
                    }
                }

                if(!empty($level_downgrade)){
                    //downgrade
                    $user->setStatus($status);
                    $user->setCurrentLevel($level_downgrade);
                    $user->setPoint((int) $points);
                    $user->setDowngradeDate($now);
                    $user->setUpdateLevel($now);
                    
                    $dm->persist($user);
                    $dm->flush(); 
                    //send mail - sms
                }

            }
        }
        //-------->End Downgrade Action



        // Index by cell phone
        foreach ($results as $key => $result) {

            $data[$result['PartyID']] = $result;

            if (!isset($indexes[$result['CellNo']])) {
                $indexes[$result['CellNo']] = array($result['PartyID']);
                continue;
            }

            $indexes[$result['CellNo']] =  array_unique(array_merge($indexes[$result['CellNo']], array($result['PartyID'])));
        }

        // Count item
        foreach ($indexes as $key => $index) {

            if (count($index)==1) {
                $check_duplicate_cellphone_collection[] = $index[0];
                continue;
            }

            $duplicated[$key] = $index;
        }
       $dm = $this->getContainer()->get('doctrine_mongodb')->getManager();
        if (count($bill_diff_from_erp)) {
            // Initialize user array information
            $users = array(); 

            // For each result in results array was processed and
            // assign to corresponding item in user array

            array_map(function($u) use (&$users, $dm,$check_duplicate_cellphone_collection) {
                $u = json_decode(json_encode($u),true);
                $id = $u['PartyID'];
                $message =  $u['Billidno'];

                if (!in_array($id, $check_duplicate_cellphone_collection)) {
                    $message .= " is ignored. Account ID = $id is duplicated cellphone";
                    $this->logger('jobqueue', $message);
                    return;
                }

                if(!empty($list_userid) && in_array($id, $list_userid)){
                //$this->logger('process_bill', '----------->CCode = '.$id.' . This user is disabled! <----------');
                //continue;
                    $message .= " is ignored. Account ID = $id is disabled!!!";
                    $this->logger('jobqueue', $message);
                    return;
                 }

                //$message .= ' is transfered successful !';
                // $this->logger('jobqueue', $message);

                // Get job in job queue indentified by BillID
                $job = $dm->getRepository('VietlandStoreBundle:Jobqueue')
                          ->findOneBy(
                                array(
                                    'bill' => $u['Billidno']
                                )
                          );

                // If job does not exist in jobqueue
                if (!$job) {

                    $mongo = new \MongoClient();
                    $db = $dm->getConnection()->getConfiguration()->getDefaultDB();
                    $c_jobqueue = $mongo->$db->jobqueue;

                    $result = $c_jobqueue->find();
                    $max_col = $result->sort(array('_id' => -1))->limit(1);
                    $max_res =  $max_col->getNext();
                    $id = $max_res['_id'] + 1;
                    $u['PartyName'] = $this->castutf8($u['PartyName']);

                    $data = array(
                        "_id" => $id,
                        "bill" => $u['Billidno'],
                        "data" => json_encode($u),
                        "start"=> time() + 2*3600,
                    );

                    $c_jobqueue->insert($data);
                }

            }, $bill_diff_from_erp);
        }
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $this->syncBillFromERPManualAction();
    }

    public function castutf8($str)
    {
        return utf8_encode(utf8_decode($str));
    }

    public function logger($filename, $message, $type = "service")
    {
        echo "$filename : $message \n";
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

}
