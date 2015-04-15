<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserLoginEvent
 *
 * @author truongld
 */

namespace Aevitas\LevisBundle\Event;
 
use Vietland\AevitasBundle\Helper\Multithread\MailerTask;
use Aevitas\ChannelBundle\Channel\MailerTemplate;
use Symfony\Bundle\TwigBundle\Loader\FilesystemLoader;

class UserLoginEvent extends UserEvent {
    
    protected $mailer;
    protected $dm;
    protected $security_context;
    protected $templating;


    public function prelaunch($mailer, $dm, $security_context, $templating){
        $this->mailer = $mailer;
        $this->dm = $dm;
        $this->security_context = $security_context;
        $this->templating = $templating;
    }
    
    public function launch(){
        $user= $this->security_context->getToken()->getUser();
        
        //exit('user login event here');
        
        // find out how many point this event accummulate => $dm -> search Database Point collection
        //$user->addPoints($point);
        //do something here
        
        if (!$this->templating-> exists(':mail:'.$this->getAction().'.html.twig')){
            //trigger_error('this email template for action ['.$this->getAction().'] does not exists or was not added!');
            return;
        }
        
        try{
            $mailsource = $this->templating->render(
                    ':mail:'.$this->getAction().'.html.twig',
                    array(
                        'name' => $user->getUsername(),
                        'time' => date('h:i:s d/m/Y', time()),
                        'ip' => $_SERVER['REMOTE_ADDR']
                    )
            );
        } catch (Exception $e){
            exit($e->getMessages());
        }
        
        //exit($mailsource);
        
        $message = \Swift_Message::newInstance()
            ->setSubject('Login Alert!')
            ->setFrom('aevitas.team@gmail.com', 'Aevitas Team')
            ->setTo($user->getEmail())
            ->setBody($mailsource, 'text/html', 'utf8');

        //$this->mailer->send($message);
        
        //use new thread
        $sender = new MailerTask($this->mailer, $message);
        $sender->start();
        return;
    }
}