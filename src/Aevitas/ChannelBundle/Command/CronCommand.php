<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SendCommand
 *
 * @author Truong LD <mr.truongld at gmail.com>
 */
namespace Aevitas\ChannelBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Vietland\UserBundle\Document\User;
use Aevitas\LevisBundle\Document\EmailSmsTemplate;
use Aevitas\ChannelBundle\Document\RuleOption;

class CronCommand extends ContainerAwareCommand {

    protected function configure()
    {
    	$this
            ->setName('channel:cron')
            ->setDescription('Install crontab')
            ->addOption('path', null, InputOption::VALUE_REQUIRED, 'Path')
        ;
    }

    public function forkProcess($cron, $path)
    {
        $type = $cron->getType();
        $process = $cron->getProcess();
        $date = "1/1";
        $delay = 0;

        $cmd = "php $path/app/console channel:sending --process=$process --type=$type --date=$date --delay=$delay --env=prod";
        $pid = pcntl_fork();

        if ($pid == -1) {
            die('could not fork');
        } else if ($pid) {
            exit;
        } else {
            $dm = $this->getContainer()->get('database_manager');
            exec("$cmd &");
        }

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $path = realpath($input->getOption('path'));
    	$dm = $this->getContainer()->get('database_manager');

    	$crons = $dm->getRepository('AevitasChannelBundle:CronJob')->findBy(array(
            "status" => 0
        ));
        $now =  time();
        $now_time = date('i_H_d_m', $now);
        foreach ($crons as $cron) {
            $cmd = $cron->getCommand();
            $times = $cron->getTimes();

            $cmd_arr = explode(" ", $cmd);
            $date  = $cmd_arr[1];
            $delay = $cmd_arr[2];
            $delayType='';
            if($cron->getDelayType())
                $delayType=$cron->getDelayType();

            if ($delay == 0) {  
                 
                if ($now_time == $date) {
                    $this->forkProcess($cron, $path);
                }

            } else {
                $second = $delay * 24 * 60 * 60;
                
                switch ($delayType) {
                    case RuleOption::TYPE_EACH_WEEK:
                        # code...
                        $mod = ($now - $date) % $second;
                        $times_new = ($now - $date - $mod) / $second;

                        if (($times_new > $times) && $mod==0) {

                            // Update new times for cron
                            $this->forkProcess($cron, $path);
                            $cron->setTimes($times_new);
                            $dm->persist($cron);
                            $dm->flush();
                        }
                        break;
                    case RuleOption::TYPE_EACH_MONTH:
                        $current_date= date('d');
                        $current_month = date('m');
                        $current_hour = date('H');

                        $compare_date= date('d',$date);
                        $compare_month = date('m',$date);
                        $compare_hour= date('H',$date);
                        if($current_date==$compare_date 
                            && $current_hour==$compare_hour 
                            && (
                                    (
                                        ($current_month-$compare_month)>$times
                                    )
                                    ||
                                    (
                                        $times==0
                                        &&($current_month==$compare_month)
                                    )
                                )
                            )
                        {
                            $times+=1;
                            $this->forkProcess($cron, $path);
                            $cron->setTimes($times);
                            $dm->persist($cron);
                            $dm->flush();

                        }
                        # code...
                        break;
                    default:
                        # code...
                    //$now = 1421628608;
                    $mod = ($now - $date) % $second;
                    $times_new = ($now - $date - $mod) / $second;

                    if (($times_new > $times) && $mod==0) {

                        // Update new times for cron
                        $this->forkProcess($cron, $path);
                        $cron->setTimes($times_new);
                        $dm->persist($cron);
                        $dm->flush();
                    }
                    break;
                }
                
            }
    	}
    }
}
