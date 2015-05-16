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
