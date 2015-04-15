<?php
namespace Vietland\UserBundle\Import;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Vietland\AdsBundle\Document\Coordinates;
use Doctrine\ODM\MongoDB\MongoDBException;
use Vietland\UserBundle\Form\Type\ImportUserFromType;
use Vietland\AevitasBundle\Helper\CSVReader;
use Vietland\AevitasBundle\Helper\Excel;
use Vietland\AevitasBundle\Helper\Multithread\MailerTask;
use Vietland\AevitasBundle\Helper\Multithread\SmsTask;
use Vietland\UserBundle\Document\User;


class ImportUser {

    private $fileupload;
    private $filename;
    

    private $dm;
    
    public function setDm($dm){
        $this->dm = $dm;
    }
    
    private $controller;
    
    public function setController($cm){
        $this->controller = $cm;
    }
    
    /**
    * get the User's home directory
    *
    * @return string
    */
    public function getHomeDirectory()
    {
        $physicalWebDir = getcwd();
        
        return $physicalWebDir.'data';
    }
    
    
    public function getHomeDirectoryUrl()
    {
        $physicalWebDir = getcwd();
        
        return str_replace(
            $physicalWebDir,
            '',
            $this->getHomeDirectory()
        );
    }

    public function setFileupload($file) {
        $this->fileupload = $file;
        
        if (is_object($this->fileupload)) {
            $this->filename = getcwd().DIRECTORY_SEPARATOR.$this->getHomeDirectoryUrl().DIRECTORY_SEPARATOR.$this->fileupload->getClientOriginalName();
            $this->fileupload->move($this->getHomeDirectoryUrl(), $this->fileupload->getClientOriginalName());
            unset($this->fileupload);
        }
        
        $ext = substr($this->filename, strlen($this->filename)-3, 3);
        
        //doing
        if ($ext == 'xls'){
            $obj = new Excel($this->filename);
        }else if($ext == 'csv'){
            $obj = new CSVReader($this->filename);
        }
        $header = array(
            'sex'    =>  1,
            'address1'  =>  2,
            'address2'  =>  3,
            'address3'  =>  4,
            'commonname'=>  5,
            'state'     =>  6,
            'cellphone' =>  7,
            'phone'     =>  8,
            'fax'       =>  9,
            'email'     =>  10,
            'brand'     =>  11,
            'bday'      =>  12,
            'aniversary'=>  13,
            'accountid' =>  14,
            'accounttype'=>  15
        );        //var_dump($this->reader->sheets[0]['cells'][1][1]);exit;
        for ($i=0; $i<$obj->getNumRows(); $i++){
            $user = new User();
            $accname = $obj->getCell($i, 0);
            $pos = strlen($accname)-1;
            while ($accname[$pos] != ' ' && $pos>=0) $pos--;
            $firstname = substr($accname, $pos+1, strlen($accname)-$pos-1);
            $lastname = substr($accname, 0, $pos);
            
            $user->setFirstname($firstname)
                    ->setLastname($lastname)
                    ->setSex($obj->getCell($i, $header['sex']))
                    ->setAddress1($obj->getCell($i, $header['address1']))
                    ->setAddress2($obj->getCell($i, $header['address2']))
                    ->setAddress3($obj->getCell($i, $header['address3']))
                    ->setCommonname($obj->getCell($i, $header['commonname']))
                    ->setState($obj->getCell($i, $header['state']))
                    ->setCellphone($obj->getCell($i, $header['cellphone']))
                    ->setPhone($obj->getCell($i, $header['phone']))
                    ->setFax($obj->getCell($i, $header['fax']))
                    ->setEmail($obj->getCell($i, $header['email']))
                    ->setBrand($obj->getCell($i, $header['brand']))
                    ->setAniversary($obj->getCell($i, $header['aniversary']))
                    ->setCCode($obj->getCell($i, $header['accountid']))
                    ->setAccounttype($obj->getCell($i, $header['accounttype']))
             ;
            
            $username = $user->getEmail();
            if ($username == ''){
                $username = $user->getCellphone();
            }
            $user->setUsername($username);
            
            // generate random password (8 characters)
            $password = substr(md5(uniqid(rand(),1)),rand(0,10),8);
            
            try {
                $this->dm->persist($user);
                $this->dm->flush();
            } catch (\Exception $e){
                
            }
            
            # begin set default
            $user->setEmail('mr.truongld@gmail.com');
            $user->setCellphone('0979239909');
            # end set default
            
            // send SMS message
            if ($user->getCellphone() != ''){
                $smsSender = $this->controller->get('sms_sender');
                $smsSender
                            ->setPhone($user->getCellphone())
                            ->setSms($this->controller->get('templating')->render('VietlandAevitasBundle:Mailer:import_user_sms.html.twig', array()), 'text/html', 'utf8')
                ;
                
                $smsHandler = new SmsTask($smsSender);
                $smsHandler->start();
                
                //logging
                //var_dump($smsSender->getReturnCode().'|'.$smsSender->getReturnMsg().'|'.$smsSender->getReturnTime());exit();
            }
            
            // send email
            if ($user->getEmail() != ''){
                $message = \Swift_Message::newInstance()
                    ->setSubject($this->controller->get('translator')->trans('Welcome to '.$firstname.' !'))
                    ->setFrom('crm@thanbacgroup.com', 'Aevitas Team')
                    //                         ->setReplyTo('getsocial@atipso.com', 'Atipso Team') 
                    ->setTo($user->getEmail())
                    ->setBody($this->controller->get('templating')->render('VietlandAevitasBundle:Mailer:import_user_mail.html.twig', array()), 'text/html', 'utf8');

                $mailer = new MailerTask($this->controller->get('mailer'), $message);
                $mailer->start();
            }
        }
    }
    
    public function getFileupload() {
        return $this->fileupload;
    }
    
    public function setFilename($fname){
        $this->filename = $fname;
        return $this;
    }
    
    public function getFilename($file){
        return $this->filename;
    }
}