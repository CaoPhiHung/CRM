<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoadJobsCommand
 *
 * @author TruongLD
 */

namespace Vietland\StoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\Query\ResultSetMapping;
use JMS\JobQueueBundle\Entity\Job;
use Symfony\Component\Console\Input\InputOption;
use Vietland\UserBundle\Document\UserLog;
use Vietland\StoreBundle\Document\Jobqueue;
use Symfony\Component\Process\Process;

class LoadJobsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('crm:loadbill')
             ->addOption('path', null, InputOption::VALUE_REQUIRED, 'Path script')
             ->setDescription('Process the bill');
    }

    protected function processCommand($path)
    {
        $dm = $this->getContainer()->get('doctrine_mongodb')->getManager();
        $jobs = $dm->createQueryBuilder('VietlandStoreBundle:Jobqueue')
                ->field('status')->notEqual(true)
                ->sort('_id', 'asc')
                ->getQuery()
                ->execute();
        // find user status is disabled
        $users = $dm->getRepository('VietlandUserBundle:User')->findBy(array('status' => false));
        $list_userid = array();

        //send monthly birthday email
        // $now = new \DateTime(date('Y-m-d'));
        // $current_date = $now->format('Y-m-d');

        //     $month = date("m",strtotime($current_date ));
        //     $start = new \DateTime("".$month."/01/2015");
        //     $end = new \DateTime("".$month."/31/2015");

        // //var_dump($start);

        //         $function = "function() { var dob = this.dob, start = new Date('" . $start->format('Y-m-d') . "'), end = new Date('" . $end->format('Y-m-d') . ' 23:59:59' . "'), rt = false;
        //         if(typeof this.dob != 'undefined'){
        //             dob.setFullYear('" . $start->format('Y') . "');
        //             if(start.getTime() <= dob.getTime() && dob.getTime() <= end.getTime()) rt = true;
        //         };
        //         return rt;
        //         }";
        // $usersDOB = $dm->createQueryBuilder('VietlandUserBundle:User')->field('dob')->exists(true)->where($function)->sort('id', 'desc')->getQuery()->execute();
        //         //$num = count($usersDOB);
        //         //var_dump($num);
        
        // foreach($usersDOB as $user){
        //     $test= $this->addSubToDisableEnableList($user->getEmail(),$user->getFirstname(),$user->getMiddlename(),$user->getLastname(),$user->getPoint(),$user->getLevel(),$user->getNextLevel(),$user->getDob());
        // }
        // end send monthly email
        
        if(!empty($users)){
            foreach ($users as $user) {
                $list_userid[] = $user->getCCode();
            }
        }

        //end find disabled

        foreach ($jobs as $job)
        {
            $data = json_decode($job->getData(), true);

            if(!empty($list_userid) && in_array($data['PartyID'], $list_userid)){
                $this->logger('process_bill', '----------->CCode = '.$data['PartyID'].' . This user is disabled! <----------');
                continue;
            }

            $cmd = 'php ' . $path . 'app/console crm:processbill '
                    . '--ledgerid=' . $data['ledgerID'].' '
                    . '--billidno=' . $job->getBill().' '
                    . '--env=prod ';

            $this->logger('process_bill', " --> $cmd");
            exec($cmd);
        }


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
        
        $users = $dm->createQueryBuilder('VietlandUserBundle:User')->field('bonusPoint')->exists(true)->where($function)->sort('id', 'desc')->getQuery()->execute();

        $num = count($users);

        // $now = new \DateTime(date('Y-m-d'));
        // $current_date = $now->format('Y-m-d');

        foreach($users as $user){
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
            $level_downgrade = null;

            if(isset($user_payment[$uid])){
                if($date_update_level != null){
                    if($date_update_level < $month12_before){
                        if($level == 1){
                            if($user_payment[$uid] < 1000000){
                                $level_downgrade = 1;
                                $status = false;
                            }

                        }
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
                }else{
                    if($registration_date < $month12_before){
                        if($level == 1){
                            if($user_payment[$uid] < 1000000){
                                $level_downgrade = 1;
                                $status = false;
                            }

                        }
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
                }

                //Silver: 12 months no shopping inactive customer , more 3 month no shopping truncate the points
                if($level == 1 && $status == false){
                    $month3_before = date('Y-m-d', strtotime("now -3 month"));
                    if($date_update_level < $month3_before){
                        //truncate the points
                        $user->setPoint(0);
                            
                        $dm->persist($user);
                        $dm->flush(); 
                        //send mail - sms
                        //Cho nay kiem tra sau 3 thang ke tu ngay inactive -> khong shopping thi truncat point
                        //Co can gui mail khong
                    }
                }

                if(!empty($level_downgrade)){
                    //downgrade
                    $user->setStatus($status);
                    $user->setCurrentLevel($level_downgrade);
                    $user->setDowngradeDate($now);
                    $user->setUpdateLevel($now);
                    
                    $dm->persist($user);
                    $dm->flush(); 
                    //send mail - sms
                }

            }
        }
        //-------->End Downgrade Action
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->logger('process_bill', '----------- START LOAD QUEUE ----------');
        $this->processCommand($input->getOption('path'));
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

        //new mail function
        public function addSubToDisableEnableList($email,$fname,$mname,$lname,$point,$clevel,$nlevel,$dob){
        $listID = '9a02d65624'; //list enable

        $fullname = $fname." ".$mname. " " .$lname;

        $args['apikey'] = '908a07f410ddc8c45c09108d5396583a-us10';
        
        $data = array(
            "email_address" => $email,
            "status" => "subscribed",
            'merge_fields' => array("FNAME"=>$fullname,
                "POINT"=>$point,
                "CLEVEL"=>$clevel,
                "NLEVEL"=>$nlevel,
                "DOB"=>$dob->format('Y-m-d'))
        );

        $apiKeyParts = explode('-', $args['apikey']);
        $shard = $apiKeyParts[1];

        $url = 'https://' . $shard . '.api.mailchimp.com/3.0/lists/'.$listID.'/members/';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);              
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);            
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization: apikey 908a07f410ddc8c45c09108d5396583a-us10"));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}
