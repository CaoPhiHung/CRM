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
        // var_dump("here");
        // die();
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
                                if(d == "'.$current_date.'"){
                                    rt = true;
                                }
                            }
                        }
                        return rt;
                    }';            
        
        $users = $dm->createQueryBuilder('VietlandUserBundle:User')->field('bonusPoint')->exists(true)->where($function)->sort('id', 'desc')->getQuery()->execute();

        $num = count($users);

        $now = new \DateTime(date('Y-m-d'));
        $current_date = $now->format('Y-m-d');

        foreach($users as $user){
            $current_BonusPoint = $user->getBonusPoint();
            
            if(!empty($current_BonusPoint)){
                $current_Point = $user->getPoint();
                $current_TotalExtraPoint = $user->getTotalExtraPoint();

                $num_bonus = count($current_BonusPoint);
                for ($i=0; $i < $num_bonus; $i++) {
                    $value = $current_BonusPoint[$i];
                    if($value['expired_date'] === $current_date){
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
}
