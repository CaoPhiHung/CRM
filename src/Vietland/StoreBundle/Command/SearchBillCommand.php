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


class SearchBillCommand extends ContainerAwareCommand
{
    /**
     * Configure for search bill
     *
     * @return void
     */
    protected function configure()
    {
        $this->setName('crm:searchbill')
             ->setDescription('Process the bill')
             ->addOption('start', null, InputOption::VALUE_OPTIONAL, 'Start Date')
             ->addOption('end', null, InputOption::VALUE_OPTIONAL, 'End Date');
    }

    public function getBillCollection($start, $end)
    {
        $message = "Comparing phone number in duplicated list";
        $this->logger('jobqueue', $message);

        $sql = "Select b.billidno as Billidno, Party.AccountsidName As PartyID ,  Party.CellNo As CellNo
From EtBillFile B
LEFT OUTER JOIN EtBillFileItems BI On BI.BillIDNo = B.BillIDNo
Left Outer Join MstAcctCVLedger Party On Party.LedgerID = B.AccountsCVID
Left Outer Join MstBGBranch Store On Store.BranchID = B.BranchID
Left Outer Join POSMstCardType CardType On CardType.CardID = Party.CardID
where
B.BillDate >='$start' and B.BillDate <='$end'  -- MM/DD/YYYY
and Party.AccountsidName like '831%'
and CardType.CardID = 20
And ISNULL(B.DOACase,0)=0
And ISNULL(B.Passed,0)=0
and B.VoucherType in (14,15,16,17,8,10,11,129,214)
group by Store.BranchName , Store.Branchid , Store.regionid , b.BillDate , b.etime , b.prefix , b.billno , b.suffix ,  Party.AccountsName ,  Party.AccountsidName , CardType.CardName , party.CellNo , party.email, b.salevalue , b.BillIdNo ,b.AccountsCVId, b.Vouchertype ,b.Misc1 , b.Misc2, b.Misc3 , b.Misc4 , b.Misc5 ,b.Amount";

        $result1 = array();
        $result2 = array();

        // ---------- PACKAGE 1 ------------
        // Entity manager
        $em = $this->getContainer()->get('doctrine')->getManager();

        // Prepare and execute SQL Command
        $statement = $em->getConnection()->prepare($sql);
        $statement->execute();

        // Fetching all data
        $result1 = $statement->fetchAll();

        // ----------- PACKAGE 2 ------------
        $dm = $this->getContainer()->get('doctrine_mongodb')->getManager();
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
and Party.AccountsidName like '831%'
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
        $collection = array();

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
                $collection[] = $index[0];
                continue;
            }

            $duplicated[$key] = $index;
        }

        return array (
            'collection' => $collection,
            'duplicated' => $duplicated,
            'listphone'  => $list_phone
        );
    }

    public function flushDuplicate($data)
    {
        $message = "Saving duplicated phone to crm";
        $this->logger('jobqueue', $message);

        $dm = $this->getContainer()->get('doctrine_mongodb')->getManager();
        $mongo = new \MongoClient();
        $db = $dm->getConnection()->getConfiguration()->getDefaultDB();

        $col_duplicated = $mongo->$db->phone_duplicated;
        $col_duplicated->remove(array(), array('safe' => true));

        foreach ($data as $key => $value) {
            $col_duplicated->insert(array(
                'phone'=> $key,
                'account' => $value
            ));
        }
    }

    public function castutf8($str)
    {
        return utf8_encode(utf8_decode($str));
    }

    /**
     * Process the command for search
     *
     * @param date $start
     * @param date $end
     * @return void
     */
    protected function processCommand($start, $end)
    {
        $result1 = array();
        $result2 = array();

        $message = "\n\n ----------------------------- \n\n";
        $this->logger('jobqueue', $message);

        $message = "Start scanning ERP data";
        echo $message;
        $this->logger('jobqueue', $message);

        // Document Manager handle MongoDB
        $dm = $this->getContainer()->get('doctrine_mongodb')->getManager();

        // There is no start day
        if ($start == null) {

            $config = $dm->getRepository('VietlandStoreBundle:JobConfiguration')->findOneBy(array('name' => 'last-search-bill'));

            if (!$config) {
                $start = '07/01/2014';
            } else {
                $start = $config->getValue();
            }
        }

        // There is no end day
        if ($end == null) {
            $dateObj = new \DateTime($start.' 0:0:0');
            $dateObj->add(new \DateInterval('P2D'));
            //$end = $dateObj->format('m/d/Y');
            $end = date("m/d/Y", time());
        }

        $package = $this->getBillCollection($start, $end);
        $this->flushDuplicate($package['duplicated']);
        $collection = $package['collection'];
        $list_phone = $package['listphone'];

        $message = date('m/d/Y h:i:s', time()).': new search bill command start at '.$start.', end at '.$end;
        $this->logger('jobqueue', $message);

        //---------- PACKAGE 1 -------------
$cmd = "Select Store.Branchid as StoreID, b.billidno as Billidno , B.AccountsCVID as ledgerID ,   Store.BranchName As StoreName,
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

        // Using Entity Manager for SQL Server
        $em = $this->getContainer()->get('doctrine')->getManager();

        // Prepare and execute SQL Command
        $statement = $em->getConnection()->prepare($cmd);
        $statement->execute();

        // Fetching all data
        $result1 = $statement->fetchAll();

        // ------------ PACKAGE 2 -------------------

        if (count($list_phone) > 0) {
            $set = "(";

            foreach ($list_phone as $phone) {
                $set .= "'$phone',";
            }

            $set = substr($set, 0, strlen($set) - 1) . ")";

            $sql = "Select Store.Branchid as StoreID, b.billidno as Billidno , B.AccountsCVID as ledgerID ,   Store.BranchName As StoreName,
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
where
Party.AccountsidName IN $set and CardType.CardID = 20
and Party.AccountsidName like '831%'
And ISNULL(B.DOACase,0)=0
And ISNULL(B.Passed,0)=0
and B.VoucherType in (14,15,16,17,8,10,11,129,214)
group by Store.BranchName , Store.Branchid ,  Store.regionid, b.BillDate , b.etime , b.prefix , b.billno , b.suffix ,  Party.AccountsName ,  Party.AccountsidName , CardType.CardName , party.CellNo , party.email, b.salevalue , b.BillIdNo ,b.AccountsCVId, b.Vouchertype ,b.Misc1 , b.Misc2, b.Misc3 , b.Misc4 , b.Misc5 ,b.Amount";

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

        if (count($results)) {

            // Initialize user array information
            $users = array();

            // For each result in results array was processed and
            // assign to corresponding item in user array

            array_map(function($u) use (&$users, $dm, $collection) {

                $id = $u['PartyID'];

                $message =  $u['Billidno'];

                if (!in_array($id, $collection)) {
                    $message .= " is ignored. Account ID = $id is duplicated cellphone";
                    $this->logger('jobqueue', $message);
                    return;
                }

                $message .= ' is transfered successful !';
                $this->logger('jobqueue', $message);

                // Get job in job queue indentified by BillID
                $job = $dm->getRepository('VietlandStoreBundle:Jobqueue')
                          ->findOneBy(
                                array(
                                    'bill' => $u['Billidno']
                                )
                          );

                // If job does not exist in jobqueue
                if (!$job) {

                    $dm = $this->getContainer()->get('doctrine_mongodb')->getManager();
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

            }, $results);
        }

        $config = $dm->getRepository('VietlandStoreBundle:JobConfiguration')->findOneBy(array('name' => 'last-search-bill'));

        // If configuration does not exists
        if (!$config) {
            $config = new JobConfiguration();
            $config->setName('last-search-bill');
        }

        // Create new end date
        $endDateObj = new \DateTime($end.' 0:0:0');

        if ($endDateObj > date_create('now')) {
            $end = date('m/d/Y');
        }

        // Set latest time
        $config->setValue($end);
        echo 'search done';
        try {
            $dm->persist($config);
            $dm->flush();
        } catch (Exception $e) {
            echo 'Caught exception: '.  $e->getMessage();
            exit();
        }
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $this->processCommand($input->getOption('start'), $input->getOption('end'));
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
