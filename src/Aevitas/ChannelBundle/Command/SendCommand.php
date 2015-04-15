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

class SendCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('channel:sending')
            ->addOption('process', null, InputOption::VALUE_REQUIRED, 'Date')
            ->addOption('type', null, InputOption::VALUE_REQUIRED, 'Sending mode')
            ->addOption('date', null, InputOption::VALUE_REQUIRED, 'Date')
            ->addOption('delay',null, InputOption::VALUE_REQUIRED, 'Delay days')
            ->setDescription('auto send email on Birthday and Anniversary day');
    }

    public function processRequest($type_process = 0, $id = 0, $date = null, $delay = 0)
    {
        $dm = $this->getContainer()->get('database_manager');
        $process = $dm->getRepository('AevitasChannelBundle:Process')->find($id);
        $rule = $process->getRule();
        $template = $process->getTemplate();
        $options = $rule->getOptions();
        $builder = $dm->createQueryBuilder('VietlandUserBundle:User');
        $expr = $builder->expr();

        foreach ($options as $option)
        {
            $name  = $option->getName();
            $type  = $option->getType();
            $value = $option->getValue();
            if(is_numeric($value))
                $value=(int)$value;

            if ($name == 'timer') {
                continue;
            }

            if($name=='isbirthday')
            {
                // $date_string ="1983-08-17T17:00:00.0Z";
                // $expr->field('dob')->equals(new \DateTime($date_string));
                $expr->field('dob')->equals(new \DateTime(date('d-m-Y',time())));
                continue;
            }

            $point =  false;

            switch ($type) {

                //  Equal
                case '1':

                    if ($name == 'name') {
                        $or = clone $expr;
                        $or ->field('firstname')->equals($value)
                            ->field('lastname')->equals($value)
                            ->field('middlename')->equals($value);
                        $expr->addOr($or);
                    } else {
                        $expr->field($name)->equals($value);
                    }

                    break;

                case '2':

                    $regex = new \MongoRegex("/$value/i");

                    if ($name == 'name') {
                        $or = clone $expr;
                        $first  = clone $or->field('firstname')->equals($regex);
                        $or = clone $expr;
                        $last   = clone $or->field('lastname')->equals($regex);
                        $or = clone $expr;
                        $middle = clone $or->field('middlename')->equals($regex);
                        $expr->addOr($first);
                        $expr->addOr($last);
                        $expr->addOr($middle);
                    } else {
                        $expr->field($name)->equals($regex);
                    }

                    break;

                case '3':
                    if ($name == 'fromPoint') {
                        $expr->field('point')->gt($value);
                    }

                    if ($name == 'toPoint') {
                        $expr->field('point')->lt($value);
                    }

                    break;
            }
        }
        if (!empty($expr->getQuery())) {
            if (count($expr->getQuery()) == 1) {
                foreach ($expr->getQuery() as $key => $value) {
                    if(is_numeric($value))
                    {
                        $value=(int)$value;
                    }
                    $builder->field("$key")
                            ->equals($value);
                    break;
                }
            } else {
                $builder->addAnd($expr);
            }
        }
        $users = $builder->getQuery()->execute();
        $this->logger('send_auto', json_encode($users));

        $this->sendToListUser($type_process, $users, $template);

        // Update process
        $job_id = $process->getJob();
        $job = $dm->getRepository('AevitasChannelBundle:CronJob')->find($job_id);

        $cmd = $job->getCommand();

        // Manually
        if ($cmd[0] == 1) {
            $dm->remove($job);
            $dm->flush();

            $process->setStatus(0);
            $dm->persist($process);
            $dm->flush();
        }

    }

    /**
     * Send mail to user
     *
     * @param type $user
     * @param type $template
     * @return type
     */
    public function sendMail($user, $template)
    {
        $content = html_entity_decode($template->mergeUserContent($user, $template->getBodyMail()));
        $email = $user->getEmail();

        $this->logger('send_auto','Send email to '. $email);

        if (empty($email) || is_null($email)) {
            return;
        }

        // create the mailer using the newInstance() method
        // $mailer = \Swift_Mailer::newInstance($transport);

        $message = \Swift_Message::newInstance()
                        ->setSubject("StarClub")
                        ->setFrom('crm@thanbacgroup.com', 'Thanh Bac Fashion')
                        ->setTo($email)
                        ->setBody($content, 'text/html', 'utf8');

        try {
            $result =  $this->getContainer()->get('mailer')->send($message);
            // $result = $mailer->send($message);
            $this->logger('send_auto','SEND DONE');
        }catch(\Swift_TransportException $e){
            print_r($e->getMessage());
        }
    }

    public function sendSMS($user, $template)
    {

        
        echo "SMS SENT TO " . $phoneNo . "\n";
            $msg = 'some messages here ...';
            $content = html_entity_decode($template->mergeUserContent($user, $template->getBodySMS()));
            $this->getContainer()->get('sms_sender')
                    ->setPhone($user->getCellphone())
                    ->setSms($content)
                    ->send()
            ;

    }

    public function sendToListUser($type, $users, $template)
    {
        $this->logger('send_auto', 'Send to list ');
        $domain = '@u-matrix.vn';

        if (count($users) == 0) {
            $this->logger('send_auto', 'EMPTY LIST USER');
            return;
        }

        foreach ($users as $user) {
            $email = $user->getEmail();
            $this->logger('send_auto','scan: ', $email);
            $isemail = preg_match("/$domain/", $email);
            $isemail = true;  
            if ($isemail) {
                // $this->logger('send_auto','SEND -> '. $email);
                if ($type == 1) $this->sendMail($user, $template);
                if ($type == 2) $this->sendSMS($user, $template);
            }
        }
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->processRequest(
            $input->getOption('type'),
            $input->getOption('process'),
            $input->getOption('date'),
            $input->getOption('delay')
        );
    }

    public function logger($filename, $message, $type = "service")
    {
        /*$message = $message . PHP_EOL;
        $folder = __DIR__ . "/../../../../app/logs/$type";
        $file = "$folder/$filename.txt";

        system("mkdir -p $folder");

        if (!file_exists($file)) {
            system("touch $file");
            system("chmod a+w $file");
        }

        file_put_contents($file, $message, FILE_APPEND);*/
    }

}
