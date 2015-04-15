<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cronMailAnniversaryCommand
 *
 * @author Truong LD <mr.truongld at gmail.com>
 */
namespace Vietland\AevitasBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class cronMailAnniversaryCommand extends ContainerAwareCommand {
    protected function configure()
    {
        $this
            ->setName('aevitas:autoemail')
            ->setDescription('auto send email on Birthday and Anniversary day')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dm = $this->getContainer()->get('database_manager');
        
        ### begin check custommers's anniversary day
        $vmonth = date('m')-1;
        $vdate = date('d');
        $where = "function() { var d=new Date(); var rt=false; if(typeof(this.anni)=='undefined'){return false;} for (i in this.anni){ if (this.anni[i].date.getDate() == ".$vdate." && this.anni[i].date.getMonth() == ".$vmonth.") rt=true; } return rt;}";
        $qb = $dm->createQueryBuilder('VietlandUserBundle:User')
            ->where($where);
        $users = $qb->getQuery()->execute();
        foreach ($users as $user){
            # output
            $output->writeln('send an anniversary day email to '.$user->getFirstname().' '.$user->getLastname());
            #check point rule
            $pointrule = $this->getContainer()->get('point.rule')->setSchema(array(
                'action' => 'buyitem',
                'gender' => $user->getSex(),
                'level' => $user->getCurrentLevel(),
                'anniversary' => (int) is_object($user->isAnniversaryToday())
            ));
            $rules = array();
            foreach ($pointrule->getRules() as $r) {
                $arr = explode('_', $r->getStore());
                foreach ($arr as $store){
                    if ($store == ''){
                        $store = '-';
                    }
                    if (!isset($rules[$store]) || $r->getEarnedPoints(100) > $rules[$store]->getEarnedPoints(100)){
                        $rules[$store] = $r;
                    }
                }
            }
            
            #colection rules info
            $operation = false;
            $content = array();
            $id = -1;
            foreach($rules as $store=>$rule){
                if ($operation===false){
                    $operation = $rule->getOperationOptions();
                }
                $content[++$id] = array();
                # store
                if ($store == '-'){
                    $content[$id]['store'] = 'All';
                }else{
                    $content[$id]['store'] = $dm->getRepository('AevitasLevisBundle:Store')->find($store)->getName();
                }
                #level
                if ($rule->getLevel() == ''){
                    $content[$id]['level'] = 'All';
                }else{
                    $content[$id]['level'] = $rule->getLevelLabel();
                }
                #operation
                if ($rule->getOperation() == ''){
                    $content[$id]['operation'] = 'All';
                }else{
                    $content[$id]['operation'] = $operation[$rule->getOperation()].' width '.$rule->getPoint();
                }
                #qty
                if ($rule->getOperation() == \Aevitas\PointBundle\Document\PointRule::MULTIPLYQTY){
                    $content[$id]['qty'] = 'yes';
                }else{
                    $content[$id]['qty'] = 'no';
                }
                
                # output
                if ($store == '-'){
                    echo 'All store : '.$operation[$rule->getOperation()].' width '.$rule->getPoint().chr(13).chr(10);
                }else{
                    echo $dm->getRepository('AevitasLevisBundle:Store')->find($store)->getName().' : '.$operation[$rule->getOperation()].' width '.$rule->getPoint().chr(13).chr(10);
                }
            }
            echo chr(13).chr(10);   // test part
            //continue;               // test part
            
            # send email
            $email = $user->getEmail();
            if ($email != '' && strpos($email,'@')!==FALSE){
                $message = \Swift_Message::newInstance()
                    ->setSubject($this->getContainer()->get('translator')->trans('Happy anniversary day to '.$user->getFirstname().' !'))
                    ->setFrom('crm@thanbacgroup.com', 'Thanh Bac Fashion')
                    ->setTo($email)
                    ->setBody($this->getContainer()->get('templating')->render('VietlandAevitasBundle:Command:AnniversaryMail.html.twig', 
                            array(
                                'content'=>$content,
                                'cdn' => $this->getContainer()->getParameter('cdn')
                            )
                        ), 'text/html', 'utf8');
                $rt = $this->getContainer()->get('mailer')->send($message);
                sleep(5);
            }
            //continue;
            #send SMS
            $phoneNo = $user->getCellphone();
            $msg = 'some messages here ...';
            $this->getContainer()->get('sms_sender')
                    ->setPhone($phoneNo)
                    ->setSms($msg)
                    ->send()
            ;
        }
        /**/
        ### end check custommers's anniversary day
        
        ### begin check custommers's birthday
        $qb = $dm->createQueryBuilder('VietlandUserBundle:User')
            ->where("function() { var d=new Date(); if (typeof(this.dob)!='undefined' && this.dob.getDate() == d.getDate() && this.dob.getMonth() == d.getMonth()) return true; }");
        $users = $qb->getQuery()->execute();
        foreach ($users as $user){
            $output->writeln('send a birthday email to '.$user->getFirstname().' '.$user->getLastname());
            #check point rule
            $pointrule = $this->getContainer()->get('point.rule')->setSchema(array(
                'action' => 'buyitem',
                'gender' => $user->getSex(),
                'level' => $user->getCurrentLevel(),
                'birthday' => (int) $user->isBirthDayToday()
            ));
            $rules = array();
            foreach ($pointrule->getRules() as $r) {
                $arr = explode('_', $r->getStore());
                foreach ($arr as $store){
                    if ($store == ''){
                        $store = '-';
                    }
                    if (!isset($rules[$store]) || $r->getEarnedPoints(100) > $rules[$store]->getEarnedPoints(100)){
                        $rules[$store] = $r;
                    }
                }
            }
            #colection rules info
            $operation = false;
            $content = array();
            $id = -1;
            foreach($rules as $store=>$rule){
                if ($operation===false){
                    $operation = $rule->getOperationOptions();
                }
                $content[++$id] = array();
                # store
                if ($store == '-'){
                    $content[$id]['store'] = 'All';
                }else{
                    $content[$id]['store'] = $dm->getRepository('AevitasLevisBundle:Store')->find($store)->getName();
                }
                #level
                if ($rule->getLevel() == ''){
                    $content[$id]['level'] = 'All';
                }else{
                    $content[$id]['level'] = $rule->getLevelLabel();
                }
                #operation
                if ($rule->getOperation() == ''){
                    $content[$id]['operation'] = 'All';
                }else{
                    $content[$id]['operation'] = $operation[$rule->getOperation()].' width '.$rule->getPoint();
                }
                #qty
                if ($rule->getOperation() == \Aevitas\PointBundle\Document\PointRule::MULTIPLYQTY){
                    $content[$id]['qty'] = 'yes';
                }else{
                    $content[$id]['qty'] = 'no';
                }
                
                # output
                if ($store == '-'){
                    echo 'All store : '.$operation[$rule->getOperation()].' width '.$rule->getPoint().chr(13).chr(10);
                }else{
                    echo $dm->getRepository('AevitasLevisBundle:Store')->find($store)->getName().' : '.$operation[$rule->getOperation()].' width '.$rule->getPoint().chr(13).chr(10);
                }
            }
            echo chr(13).chr(10);   // test part
            //continue;               // test part
            
            # send email
            $email = $user->getEmail();
            if ($email != '' && strpos($email,'@')!==FALSE){
                $message = \Swift_Message::newInstance()
                    ->setSubject($this->getContainer()->get('translator')->trans('Happy birthday to '.$user->getFirstname().' !'))
                    ->setFrom('crm@thanbacgroup.com', 'Thanh Bac Fashion')
                    ->setTo($email)
                    ->setBody($this->getContainer()->get('templating')->render('VietlandAevitasBundle:Command:BirthdayMail.html.twig', 
                            array(
                                'content'=>$content,
                                'cdn' => $this->getContainer()->getParameter('cdn')
                            )
                        ), 'text/html', 'utf8');
                $rt = $this->getContainer()->get('mailer')->send($message);
                sleep(5);
            }
            //continue;
            #send SMS
            $phoneNo = $user->getCellphone();
            $msg = 'some messages here ...';
            $this->getContainer()->get('sms_sender')
                    ->setPhone($phoneNo)
                    ->setSms($msg)
                    ->send()
            ;
        }
        ### end check custommers's birthday
    }
}