<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Vietland\StoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\Query\ResultSetMapping;
use JMS\JobQueueBundle\Entity\Job;
use Symfony\Component\Console\Input\InputOption;
use Vietland\UserBundle\Document\UserLog;
use Aevitas\PointBundle\EventListener\EarnPointEvent;
use Vietland\StoreBundle\Document\Jobqueue;
use Symfony\Component\Process\Process;

class RepairPointCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('crm:repairpoint')
             ->setDescription('repair the bill');
    }

    public function signup($code, $store_id)
    {
        $dm = $this->getContainer()->get('doctrine_mongodb')->getManager();
        $user = $dm->getRepository('VietlandUserBundle:User')->findOneBy(array('CCode' => $code));
        $dispatcher = $this->getContainer()->get('event_dispatcher');

        $dispatcher->dispatch(
            'user.earn.point',
                new EarnPointEvent(
                    $user,
                    UserLog::SIGNUP_STORE,
                    array(
                        'plainPassword' => $user->getCellphone(),
                        'store' => $store_id
                    ),
                    null,
                    $this
                )
        );
    }

    public function buyitem($code, $billno, $ledgerid)
    {

        $branchQuery = '';
        $sql = "Select POSMstCamp.Name as CampName,B.BranchID, B.TransType, SD1.AttribValue as SDVal1, SD2.AttribValue as SDVal2, SD3.AttribValue as SDVal3, MstSalesMan.SalesManName, MstBGBranch.BranchName, B.ETime, B.BillIDNo, B.VoucherType, B.Prefix, B.BillNo, B.Suffix, B.BillDate, B.AccountsCVID, MstAcctCVLedger.AccountsIDName, MstAcctCVLedger.AccountsName, MstItem.ItemCode, MstItem.ItemDescription, BI.StkQty, BI.ItemRate, BI.ItemValue, B.RoundOff, B.Amount,  BI.Misc1 as ItemDisc,
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
Order By B.BillDate DESC, B.Prefix, B.BillNo, B.BillIDNo;";

        // Prepare and execute SQL Command
        $em = $this->getContainer()->get('doctrine')->getManager();
        $statement = $em->getConnection()->prepare($sql);
        $statement->execute();

        // Fetching all data
        $results = $statement->fetchAll();

        array_map(function($item)use(&$iteminfo) {
            $iteminfo[] = array('iCode' => iconv("Latin1", "UTF-8//IGNORE", $item['ItemCode']), 'iDesc' => iconv("Latin1", "UTF-8//IGNORE", $item['ItemDescription']), 'Qty' => $item['StkQty'], 'iRate' => $item['ItemRate'], 'iValue' => $item['ItemValue'], 'metadata' => array_filter(array('AVal1' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal1']), 'Aval2' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal2']), 'AVal3' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal3']), 'AVal4' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal4']), 'AVal5' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal5']), 'AVal6' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal6']), 'AVal7' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal7']), 'AVal8' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal8']), 'AVal9' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal9']), 'AVal10' => iconv("Latin1", "UTF-8//IGNORE", $item['AVal10']))));
        }, $results);

        $dm = $this->getContainer()->get('doctrine_mongodb')->getManager();
        $user = $dm->getRepository('VietlandUserBundle:User')->findOneBy(array('CCode' => $code));
        $dispatcher = $this->getContainer()->get('event_dispatcher');
        $event = $dispatcher->dispatch(
                    'user.earn.point',
                    new EarnPointEvent(
                        $user,
                        UserLog::BUYITEM,
                        $results,
                        $billno,
                        $this
                ));
    }

    public function debug($var)
    {
        print_r($var);
        die();
    }

    protected function processCommand()
    {
        $dm = $this->getContainer()->get('doctrine_mongodb')->getManager();

        $users = $dm->getRepository('VietlandUserBundle:User')->findAll();
        $index = [];

        foreach ($users as $user) {
            $index[$user->getCCode()] = $user;
        }

        // Get job in job queue indentified by BillID
        $jobs = $dm->getRepository('VietlandStoreBundle:Jobqueue')->findAll();

        foreach ($jobs as $job)
        {
            $data = json_decode($job->getData(), true);
            $code =  $data['PartyID'];
            $billno = $data['Billidno'];
            $ledgerid = $data['ledgerID'];
            $store_id = $data['StoreID'];

            $this->logger('rebuild_point', "--------- $code ---------");

            if (!isset($index[$code])) {
                continue;
            }

            $user = $index[$code];

            if (is_null($user->getPoint())) {

                $this->logger('rebuild_point', "Sign up for user $code");

                // Point is missing
                $this->signup($code, $store_id);
            }

            $this->logger('rebuild_point', "User $code buy item");
            $this->buyitem($code, $billno, $ledgerid);
            $this->logger('rebuild_point', " ");
        }

        $this->logger('rebuild_point', " --------------------------- ");
        $this->logger('rebuild_point', " ");
        $this->logger('rebuild_point', " ");
        $this->logger('rebuild_point', " ");
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

    public function preProcess()
    {

    $this->logger('rebuild_point', 'Backup database');
system('mongoexport --db levis_release --collection users --out /tmp/users.json > /dev/null');

    $dm = $this->getContainer()->get('doctrine_mongodb')->getManager();
    $mongo = new \MongoClient();
    $db = $dm->getConnection()->getConfiguration()->getDefaultDB();

    // DROP AVITASLOG
    $col_log = $mongo->$db->aevitaslog;
    $col_log->drop();

    $col_users = $mongo->$db->users;
    $col_job   = $mongo->$db->jobqueue;

    $users = $col_users->find();

    $this->logger('rebuild_point', 'Clean point, level and qlf');

    // REMOVE ALL POINT FROM users_point
    foreach ($users as $user) {
        $col_users->update(
            array('_id'  => $user['_id']),
            array(
                '$unset' => array('point' => true),
                '$set'   => array(
                    'level' => 1,
                    'qlf'   => 0
                )
            )
        );
    }

    $this->processCommand();

system('mongoexport --db levis_release --collection users --out /tmp/users_point.json > /dev/null');
system('mongoimport --db levis_release --collection users_point --file /tmp/users_point.json --upsert > /dev/null');
system('mongoimport --db levis_release --collection users --file /tmp/users.json --upsert  > /dev/null');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->logger('rebuild_point', '----------- START PREPARE POINT ----------');
        $this->preProcess();
    }

}
