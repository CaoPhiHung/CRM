<?php

namespace Aevitas\ChannelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Aevitas\ChannelBundle\Controller\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Aevitas\ChannelBundle\Channel\SmsTemplate;
use Aevitas\ChannelBundle\Channel\MailerTemplate;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\TwigBundle\Loader\FilesystemLoader;
use JMS\SecurityExtraBundle\Annotation\Secure;
use \Twig_Environment;
use Aevitas\ChannelBundle\Helper\elFinder;
use Aevitas\ChannelBundle\Helper\elFinderLogger;
use Vietland\AevitasBundle\Helper\Pagination;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Vietland\UserBundle\Document\User;
use Aevitas\LevisBundle\Document\EmailSmsTemplate;
use Aevitas\ChannelBundle\Document\TemplateRule;
use Aevitas\ChannelBundle\Document\Process as ProcessDocument;
use Aevitas\ChannelBundle\Document\CronJob as JobDocument;
use Aevitas\ChannelBundle\Document\ProcessRepository;
use Aevitas\ChannelBundle\Document\TemplateRuleRepository;
use Aevitas\ChannelBundle\Document\RuleOption;
use Symfony\Component\Process\ProcessBuilder;
use Symfony\Component\Process\Process;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends BaseController {

    private $type;
    private $handle;

    /**
     * @Route("/backend/template/list", name="backend_list_template")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function listTemplateAction() {
        $trans = $this->get('translator');
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        // $lists = $dm->getRepository('AevitasLevisBundle:EmailSmsTemplate')->findAll();

        $request =  $this->get('request');
        $templateType = (null!==$request->query->get('type'))?$request->query->get('type'):((null!==$request->request->get('template-type'))?$request->request->get('template-type'):'');
        $lists = $dm->getRepository('AevitasLevisBundle:EmailSmsTemplate')->findAll();

        return array(
            'lists' => $lists,
            'genderArr' => User::getSexOptions($trans),
            'levelArr' => User::getLevelOptions($trans),
            'type'=>$templateType
        );
    }

    /**
     * @Route("/backend/template/create", name="backend_create_template")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function createTemplateAction(){

        $trans = $this->get('translator');
        $dm = $this->get('database_manager');
        $cities = $dm->getRepository('VietlandAevitasBundle:City')->findAll();
        $request = $this->get('request');
        $templateType = (null!==$request->query->get('type'))?$request->query->get('type'):((null!==$request->request->get('template-type'))?$request->request->get('template-type'):'');
        if($templateType=='sms')
        {
            $formType = new \Aevitas\LevisBundle\Form\FormTemplateType($trans);
        }
        elseif ($templateType=='mail') {
            $formType = new \Aevitas\LevisBundle\Form\FormEmailTemplateType($trans);
        }

        $entity = new EmailSmsTemplate();
        $form = $this->createForm($formType, $entity);
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {

                $entity->setType($templateType);
                $twigEnvironment = new Twig_Environment();

                try {
                    $twigEnvironment->parse($twigEnvironment->tokenize($request->get('template-content')));

                     if($templateType=='mail')
                        $content = $request->request->get('aevitas_edit_template')['bodymail'];
                    if($templateType=='sms')
                    $content = $request->get('template-content');

                    if ($content == ''){
                        $entity->setBodymail(null);
                    }else{
                        $entity->setBodymail($content);
                    }
                    $dm->persist($entity);
                    $dm->flush();
                    $router = $this->get('router');
                    $this->getRequest()->getSession()->getFlashBag()->add('notice', 'New template has been created!');
                    $responseParameter =  array(
                        'type'=>$templateType
                        );
                    $redirectresponse =  new RedirectResponse($router->generate('backend_list_template',$responseParameter));
                    return $redirectresponse;
                } catch (\Exception $e) {

                    $this->getRequest()->getSession()->getFlashBag()->add('error', 'Template errors: ' . $e->getMessage());
                }
            }
        }

        return array(
            'form' => $form->createView(),
            'listvars' => $entity->getListVariable(),
            'cities' =>  $cities,
            'type'=>$templateType

        );
    }


    /**
     * @Route("/backend/template/process", name="backend_create_process")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function createProcessAction()
    {

        // Handle MongoDB
        $dm = $this->get('database_manager');
        $mongo = new \MongoClient();
        $db = $dm->getConnection()->getConfiguration()->getDefaultDB();

        // Handle collection
        $col_process = $mongo->$db->process;
        $col_templates = $mongo->$db->EmailSmsTemplate;
        $col_rules = $mongo->$db->EmailAndSmsTemplateRule;

        // Scan all necessary data
        $processes = $col_process->find();
        $templates = $col_templates->find();
        $rules = $col_rules->find();

        $index_template = array();
        $index_rule = array();

        // Index template by _id
        foreach ($templates as $template) {
            $index_template[$template['_id']] = $template;
        }

        // Index rule by _id
        foreach ($rules as $rule) {
            $index_rule[$rule['_id']] = $rule;
        }

        $process_table = array();
        $id = 0;

        // Preprocess data before render
        foreach ($processes as $process) {
            $process['id'] = ++$id;
            $process_table[] = $process;
        }
        // Pass variable to template
        return array(
            'rules' => $index_rule,
            'templates' => $index_template,
            'processes' => $process_table,
            'number_process' => count($process_table)
        );
    }

    /**
     * @Route("/backend/template/process/save")
     * @Secure(roles="ROLE_ADMIN")
     * @Method({"POST"})
     */
    public function saveProcessAction()
    {
        $request = $this->get('request');
        $post = json_decode($request->getContent(), true);

        $dm = $this->get('database_manager');
        $rule = $dm->getRepository('AevitasChannelBundle:TemplateRule')->find($post['rule']);
        $template = $dm->getRepository('AevitasLevisBundle:EmailSmsTemplate')->find($post['template']);

        $dm = $this->get('database_manager');
        $process = new ProcessDocument();

        $option_to_get_delay_type = $rule->getOptions()->filter(function($v){
                        return $v->getName()=='timer';
                        })->first();
        $result = $this->analysRule($rule);

        $process->setType($post['type'])
                ->setTemplate($template)
                ->setMode($post['mode'])
                ->setRule($rule)
                ->setStatus(0)
                ->setJob(0)
                ->setDate($result['date'])
                ->setDelay($result['delay'])
                ->setTime(time());
                if(!empty($option_to_get_delay_type))
                    $process->setDelaytype($option_to_get_delay_type->getType());
        $dm->persist($process);
        $dm->flush();

        $response = new JsonResponse();

        $response->setData(array(
            'id' => $process->getId()
        ));

        return $response;
    }

    /**
     * @Route("/backend/template/process/delete/{id}")
     * @Secure(roles="ROLE_ADMIN")
     * @Method({"POST"})
     */
    public function deleteProcessAction($id)
    {
        $dm = $this->get('database_manager');
        $process = $dm->getRepository('AevitasChannelBundle:Process')->find($id);
        $dm->remove($process);
        $dm->flush();

        $response = new JsonResponse();

        $response->setData(array(
            'status' => 'done'
        ));

        return $response;
    }

    /**
     * @Route("/backend/template/process/start/{id}")
     * @Secure(roles="ROLE_ADMIN")
     * @Method({"POST"})
     */
    public function startProcessAction($id)
    {
        $dm = $this->get('database_manager');
        $process = $dm->getRepository('AevitasChannelBundle:Process')->find($id);

        $job = new JobDocument();
        $result = $this->analysRule($process->getRule());
        $job->setType($process->getType())
            ->setCommand($this->generateProcessSchedule($id))
            // ->setTime(time())
            //this is start date
            ->setTime($result['date'])
            ->setTimes(0)
            ->setStatus(0)
            ->setProcess($process->getId());
        if($process->getDelayType())
            $job->setDelayType($process->getDelayType());

        $dm->persist($job);
        $dm->flush();

        $process->setStatus(1)
                ->setJob($job->getId());

        $dm->persist($process);
        $dm->flush();

        $response = new JsonResponse();

        $response->setData(array(
            'status' => "process $id has started"
        ));

        return $response;
    }

    public function analysRule($rule)
    {
        $option_to_get_delay_type = $rule->getOptions()->filter(function($v){
                        return $v->getName()=='timer';
                        })->first();
        //default is manual mean no delay
        $delayType = '';
        $delay = 0;
        $date  = time();
        if(!empty($option_to_get_delay_type))
        {
            $delayType = $option_to_get_delay_type->getType();
        }
        if(!empty($delayType))
        {
            
            switch ($delayType) {
                case RuleOption::TYPE_DATE:
                    $date=$option_to_get_delay_type->getValue();
                    break;
                case RuleOption::TYPE_DAYS:
                    # code...
                    $date = time();
                    $delay= $option_to_get_delay_type->getValue();
                    break;
                case RuleOption::TYPE_EACH_MONTH:
                    //find recent day to send
                    //default to send at 9:00 AM
                    $now_month = date('m');
                    $now_year = date('Y');

                    $date_to_save = new \DateTime();
                    $date_to_save->setDate($now_year,$now_month,$option_to_get_delay_type->getValue());
                    $date_to_save->setTime(9,0);

                    $date = $date_to_save->getTimestamp();
                    $delay=30;

                    break;
                case RuleOption::TYPE_EACH_WEEK:
                    //find star day in same week with current day
                    //default to send at 9:00 AM
                    $now_date=date('d');
                    $now_month = date('m');
                    $now_year = date('Y');

                    $date_to_save = new \DateTime();
                    $date_to_save->setDate($now_year,$now_month,$now_date);
                    $date_to_save->setTime(9,0);
                    $dayofweek = date('w', $date_to_save->getTimestamp());
                    //86400 = 24h * 60m * 60s
                    $date = $date_to_save->getTimestamp() + (($option_to_get_delay_type->getValue()-$dayofweek)*86400);
                    $delay=7;

                    break;
                
            }

        }
        

        return array(
            'date'   => $date,
            'delay'  => $delay
        );
    }

    /**
     * Generate Process Schedule
     * @param int process id
     * @return type
     */
    public function generateProcessSchedule($id)
    {
        $dm = $this->get('database_manager');
        $process = $dm->getRepository('AevitasChannelBundle:Process')->find($id);
        $rule = $process->getRule();
        $options = $rule->getOptions();

        $mode = $process->getMode();

        // min_hour_day_month
        $date = "0_0_1_1";
        $delay = 0;

        if ($mode == 1) {

            $time = time() + 60;
            $date = date('i_H_d_m', $time);

        } else {
            $result = $this->analysRule($rule);
            $date  = $result['date'];
            $delay = $result['delay'];

        }

        $script = "$mode $date $delay";
        return $script;
    }

    /**
     * @Route("/backend/template/process/stop/{id}")
     * @Secure(roles="ROLE_ADMIN")
     * @Method({"POST"})
     */
    public function stopProcessAction($id)
    {
        $dm = $this->get('database_manager');
        $job='';
        $process = $dm->getRepository('AevitasChannelBundle:Process')->find($id);
        $response = new JsonResponse();
        $response->setData(array(
            'status' => "process $id has stopped"
        ));
        if($process)
            $job = $dm->getRepository('AevitasChannelBundle:CronJob')->find($process->getJob());
        else
        {
            $response->setData(array(
            'status' => "process does not exists"
            ));
            return $response;
        }
        if($job)
        {
            $dm->remove($job);
            $dm->flush();
        }
        else
        {
            $response->setData(array(
            'status' => "job does not exists or has been removed"
            ));
        }
        $process->setStatus(0);

        $dm->persist($process);
        $dm->flush();

        return $response;
    }

    public function installProcesss()
    {

    }

    /**
     * @Route("/backend/template/edit/{id}", name="backend_edit_template")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function editTemplateAction($id) {
        $trans = $this->get('translator');
        $dm = $this->get('database_manager');
        $cities = $dm->getRepository('VietlandAevitasBundle:City')->findAll();
        $request = $this->get('request');
        $templateType = (null!==$request->query->get('type')) ? $request->query->get('type'):'';

        if($templateType=='sms')
        {
        $formType = new \Aevitas\LevisBundle\Form\FormTemplateType($trans);
        }
        elseif ($templateType=='mail') {
            $formType = new \Aevitas\LevisBundle\Form\FormEmailTemplateType($trans);
        }

        $entity = $dm->getRepository('AevitasLevisBundle:EmailSmsTemplate')->find($id);;
        $form = $this->createForm($formType, $entity);
        $form->setData($entity);
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                // city
                if ($request->get('select-city') != '0'){
                    $entity->setCity($request->get('select-city'));
                    $entity->setCityName($request->get('city-name'));
                }else{
                    $entity->setCity(null);
                    $entity->setCityName('');
                }
                // district
                if ($request->get('select-district') != '0'){
                    $entity->setDistrict($request->get('select-district'));
                    $entity->setDistrictName($request->get('district-name'));
                }else{
                    $entity->setDistrict(null);
                    $entity->setDistrictName('');
                }
                $twigEnvironment = new Twig_Environment();
                try {
                    $twigEnvironment->parse($twigEnvironment->tokenize($request->get('template-content')));
                    if($templateType=='mail')
                        $content = $request->request->get('aevitas_edit_template')['bodymail'];
                    if($templateType=='sms')
                    $content = $request->get('template-content');
                    if ($content == ''){
                        $entity->setBodymail(null);
                    }else{
                        $entity->setBodymail($content);
                    }
                    $dm->persist($entity);
                    $dm->flush();
                    // $this->getRequest()->getSession()->getFlashBag()->add('notice', 'The template has been edited!');
                    $router = $this->get('router');
                    $this->getRequest()->getSession()->getFlashBag()->add('notice', 'The template has been edited!');
                    $responseParameter =  array(
                        'type'=>$templateType
                        );
                    $redirectresponse =  new RedirectResponse($router->generate('backend_list_template',$responseParameter));
                    return $redirectresponse;
                } catch (\Exception $e) {
                    $this->getRequest()->getSession()->getFlashBag()->add('error', 'Template errors: ' . $e->getMessage());
                }
            }
        }
        return array(
            'form' => $form->createView(),
            'type'=>$templateType,
            'content' => $entity->getBodymail(),
            'listvars' => $entity->getListVariable(),
            'cities' =>  $cities,
            'city' => $entity->getCity(),
            'district' => $entity->getDistrict()
        );
    }

    /**
     * @Route("/backend/template/delete/{id}", name="backend_delete_template")
     * @Secure(roles="ROLE_POINT")
     * @Template()
     */
    public function deleteAction($id) {
        if (isset($id)) {
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $entity = $dm->getRepository('AevitasLevisBundle:EmailSmsTemplate')->find($id);;
            $dm->remove($entity);
            $dm->flush();
            $router = $this->get('router');
            $this->getRequest()->getSession()->getFlashBag()->add('notice', 'The template has been deleted!');
            return new RedirectResponse($router->generate('backend_list_template'));
        }

        $this->getRequest()->getSession()->getFlashBag()->add('notice', 'has an error!');
        return array();
    }

    /**
     * @Route("/backend/edit-template/{type}/{action}", name="backend_edit_template_builder")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function editTemplateBuilderAction($type, $action = null) {
        $this->type = $type;
        $this->action = $action;

        $actionObj = $this->get('loyalty');

//        var_dump(get_class($actionObj));exit;

        if ($this->type == 'sms') {
            $this->handle = new SmsTemplate($this->get('twig.loader'));
            $actions = $actionObj->getSmsactions();
        } else if ($this->type == 'mail') {
            $this->handle = new MailerTemplate($this->get('twig.loader'));
            $actions = $actionObj->getActions();
        }

        $this->handle->setController($this);
        $this->handle->setAction($this->action);

        if ($this->action == null) {
            $content = '';
            $this->getRequest()->getSession()->getFlashBag()->add('notice', 'Please choose an action first!');
        } else {
            $content = $this->handle->getTemplateSource();
        }
        //var_dump($content);exit;
        $request = $this->getRequest();
        if ('POST' == $request->getMethod()) {
            if ($this->action != null) {
                $twigEnvironment = new Twig_Environment();
                try {
                    $twigEnvironment->parse($twigEnvironment->tokenize($request->get('template-content')));
                    $content = $request->get('template-content');
                    $this->handle->setTemplateSource($request->get('template-content'))->writeTemplateSource();
                } catch (\Exception $e) {
                    $this->getRequest()->getSession()->getFlashBag()->add('error', 'Template errors: ' . $e->getMessage());
                }
            }
        }

        //
        return array('actions' => $actions, 'type' => $this->type, 'action' => $this->action, 'content' => $content);
    }
    /**
     * @Route("/backend/elfinder/connection", name="backend_elfinder_connection")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function elFinderConnectionAction() {
        $opts = array(
            'root' => getcwd().DIRECTORY_SEPARATOR.'files', // path to root directory
            'URL' => '/files/', // root directory URL
            'rootAlias' => 'Home', // display this instead of root directory name
            'disabled' => array('mkfile', 'duplicate', 'archives', 'extract'),
            'defaults' => array(// default permisions
                'read' => true,
                'write' => true,
                'rm' => false
            ),

                //'uploadAllow'   => array('images/*'),
                //'uploadDeny'    => array('all'),
                //'uploadOrder'   => 'deny,allow'
                // 'disabled'     => array(),      // list of not allowed commands
                // 'dotFiles'     => false,        // display dot files
                // 'dirSize'      => true,         // count total directories sizes
                // 'fileMode'     => 0666,         // new files mode
                // 'dirMode'      => 0777,         // new folders mode
                // 'mimeDetect'   => 'internal',       // files mimetypes detection method (finfo, mime_content_type, linux (file -ib), bsd (file -Ib), internal (by extensions))
                // 'uploadAllow'  => array(),      // mimetypes which allowed to upload
                // 'uploadDeny'   => array(),      // mimetypes which not allowed to upload
                // 'uploadOrder'  => 'deny,allow', // order to proccess uploadAllow and uploadAllow options
                // 'imgLib'       => 'mogrify',       // image manipulation library (imagick, mogrify, gd)
                // 'tmbDir'       => '.tmb',       // directory name for image thumbnails. Set to "" to avoid thumbnails generation
                // 'tmbCleanProb' => 1,            // how frequiently clean thumbnails dir (0 - never, 100 - every init request)
                // 'tmbAtOnce'    => 5,            // number of thumbnails to generate per request
                // 'tmbSize'      => 48,           // images thumbnails size (px)
                // 'fileURL'      => true,         // display file URL in "get info"
                // 'dateFormat'   => 'j M Y H:i',  // file modification date format
                // 'logger'       => null,         // object logger
                // 'defaults'     => array(        // default permisions
                // 	'read'   => true,
                // 	'write'  => true,
                // 	'rm'     => true
                // 	),
                // 'perms'        => array(),      // individual folders/files permisions
                // 'debug'        => true,         // send debug to client
                // 'archiveMimes' => array(),      // allowed archive's mimetypes to create. Leave empty for all available types.
                // 'archivers'    => array()       // info about archivers to use. See example below. Leave empty for auto detect
                // 'archivers' => array(
                // 	'create' => array(
                // 		'application/x-gzip' => array(
                // 			'cmd' => 'tar',
                // 			'argc' => '-czf',
                // 			'ext'  => 'tar.gz'
                // 			)
                // 		),
                // 	'extract' => array(
                // 		'application/x-gzip' => array(
                // 			'cmd'  => 'tar',
                // 			'argc' => '-xzf',
                // 			'ext'  => 'tar.gz'
                // 			),
                // 		'application/x-bzip2' => array(
                // 			'cmd'  => 'tar',
                // 			'argc' => '-xjf',
                // 			'ext'  => 'tar.bz'
                // 			)
                // 		)
                // 	)
        );
        $fm = new elFinder($opts);
        $fm->run();
    }

    /**
     * @Route("/backend/template/send/info", name="backend_send_info_template")
     * @Secure(roles="ROLE_STAFF, ROLE_STORE")
     * @Method({"POST"})
     */
    public function sendInfoAction(Request $request) {
        $dm = $this->get('database_manager');
        $id = $request->get('id');
        $template = $dm->getRepository('AevitasLevisBundle:EmailSmsTemplate')->find($id);
        if (!is_object($template)){
            return new Response(json_encode(array(
                'error' => 'template not found'
            )));
        }
        $qb = $dm->createQueryBuilder('VietlandUserBundle:User');
        $qb->field('posId')->exists(true);
        $qb->field('enabled')->equals(true);
        $qb->field('CCode')->exists(true);
        if (!is_null($template->getGender())){
            $qb->field('sex')->equals($template->getGender());
        }
        if (!is_null($template->getLevel())){
            $qb->field('level')->equals($template->getLevel());
        }
        if (!is_null($template->getCity())){
            $qb->field('city')->equals($template->getCity());
        }
        if (!is_null($template->getDistrict())){
            $qb->field('district')->equals($template->getDistrict());
        }
        $users = $qb->getQuery()->execute();

        return new Response(json_encode(array(
            'count' => count($users),
            'sms' => !is_null($template->getBodysms()),
            'mail' => !is_null($template->getBodymail())
        )));
    }

    /**
     * @Route("/backend/template/send/process", name="backend_send_process_template")
     * @Secure(roles="ROLE_STAFF, ROLE_STORE")
     * @Method({"POST"})
     */
    public function sendProcessAction(Request $request) {
        //
        $appDir = $this->get('kernel')->getRootDir();
        //
        if (!$request->get('send-email') && !$request->get('send-sms')){
            return new Response(json_encode(array(
                'error' => 'do not send nothing (email, sms)'
            )));
        }
        $dm = $this->get('database_manager');
        $id = $request->get('id');
        $template = $dm->getRepository('AevitasLevisBundle:EmailSmsTemplate')->find($id);
        if (!is_object($template)){
            return new Response(json_encode(array(
                'error' => 'template not found'
            )));
        }
        $qb = $dm->createQueryBuilder('VietlandUserBundle:User');
        $qb->field('posId')->exists(true);
        $qb->field('enabled')->equals(true);
        $qb->field('CCode')->exists(true);
        if (!is_null($template->getGender())){
            $qb->field('sex')->equals($template->getGender());
        }
        if (!is_null($template->getLevel())){
            $qb->field('level')->equals($template->getLevel());
        }
        if (!is_null($template->getCity())){
            $qb->field('city')->equals($template->getCity());
        }
        if (!is_null($template->getDistrict())){
            $qb->field('district')->equals($template->getDistrict());
        }
        $users = $qb->getQuery()->execute();

        $arrCommands = array();
        foreach ($users as $user){
            if ($request->get('send-email')){
                if ($request->get('send-sms')){
                    # send email only
                    $arrCommands[] = 'php '.$appDir.'/console channel:sending '.$user->getId().' '.$template->getId().' both';
                }else{
                    # send both email and sms
                    $arrCommands[] = 'php '.$appDir.'/console channel:sending '.$user->getId().' '.$template->getId().' email';
                }
            }else if ($request->get('send-sms')){
                # send sms only
                $arrCommands[] = 'php '.$appDir.'/console channel:sending '.$user->getId().' '.$template->getId().' sms';
            }
        }
//        echo 'php '.$appDir.'/console channel:sending 821 1 email';
//        var_dump(implode(' && ', $arrCommands));exit;
//        $process = new Process('php '.$appDir.'/console channel:sending 821 1 email');
//        $rt = $process->run();
//        print $process->getOutput();
//        var_dump($rt);exit;
//        $builder = new ProcessBuilder($arrCommands);
//        $rt = $builder->getProcess()->run();
//        var_dump($rt);exit;
        $pid = pcntl_fork();
        if ($pid == -1) {
            return new Response(json_encode(array(
                'error' => 'could not fork'
            )));
        } else if ($pid) {
             // we are the parent
             return new Response(json_encode(array(
                'msg' => 'ok'
             )));
             pcntl_wait($status); //Protect against Zombie children
        } else {
             // we are the child
            $command = implode(' && ', $arrCommands);
            exec($command, $output, $rt);
            //file_put_contents($appDir.'/logs/cmd.log', $command.' ----- '.$rt, FILE_APPEND);
        }
//        $thread = new \Vietland\AevitasBundle\Helper\Multithread\Thread(array($this,'startThread'));
//        $thread->start($arrCommands);

    }

    public function startThread($arrCommands){
        $appDir = $this->get('kernel')->getRootDir();

        $command = implode(' && ', $arrCommands);
        exec($command, $output, $rt);
        file_put_contents($appDir.'/logs/cmd.log', $command.' ----- '.$rt, FILE_APPEND);
    }

    /**********************************Template Rule Action************************************************/
    /**
     * @Route("/backend/template/rule/list", name="backend_list_template_rule")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function listTemplateRuleAction(){
        $trans = $this->get('translator');
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $request =  $this->get('request');
        // $templateType = (null!==$request->query->get('type'))?$request->query->get('type'):((null!==$request->request->get('template-type'))?$request->request->get('template-type'):'');
        $lists=array();
        $lists = $dm->getRepository('AevitasChannelBundle:TemplateRule')->findAll();
        return array(
            'lists' => $lists
        );
    }


    function isAnyFilterInserted($data){
        return true;
        unset($data['filter-timer1']);
        unset($data['filter-timer2']);
        $keys=array_keys(array_filter($data,'strlen'));
        $op='';
        foreach ($keys as $k => $v) {
           $chk = explode('-', $v);
           $op[]=$chk[0];

        }
        if(in_array('filter', $op))
        {
            return true;
        }
        else
            return false;
    }
    /**
     * @Route("/backend/template/rule/add", name="backend_create_template_rule")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function createTemplateRuleAction(){
        $trans = $this->get('translator');
        $dm = $this->get('database_manager');

        $request = $this->get('request');

        $formType = new \Aevitas\LevisBundle\Form\FormTemplateRuleType($trans);


        $entity = new TemplateRule();
        $entity->setType(1);
        $form = $this->createForm($formType);
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            $options = array();

            $form_data=$request->request->get('aevitas_edit_template_rule');
            // $qb = $dm->createQueryBuilder('VietlandUserBundle:User');
            if ($form->isValid()) {
                
                if(!$this->isAnyFilterInserted($form_data))
                {
                    $this->getRequest()->getSession()->getFlashBag()->add('notice', '**Please insert at least one filter!');
                    return array(
                        'form'=>$form->createView()
                        );
                }
                // Rule name
                if ($form_data['templateRuleName']!=''){
                    $entity->setTemplateRuleName($form_data['templateRuleName']);
                }

                // email
                if (!empty($form_data['filter-email']) && !empty($form_data['emailtype'])){
                    $option = new RuleOption();
                   
                    $option->setName('email');
                    $option->setType($form_data['emailtype']);
                    $option->setValue($form_data['filter-email']);
                    $options['email']=$option;
                }

                // name
                if (!empty($form_data['filter-name']) && !empty($form_data['nametype'])){
                    $option = new RuleOption();
                    $option->setName('name');
                    $option->setType($form_data['nametype']);
                    $option->setValue($form_data['filter-name']);
                    $options['name']=$option;

                }

                // gender
                if (!empty($form_data['filter-gender']) && !empty($form_data['gendertype'])){

                    $option = new RuleOption();
                    $option->setName('gender');
                    $option->setType($form_data['gendertype']);
                    $option->setValue($form_data['filter-gender']);
                    $options['gender']=$option;

                }
                // level
                if (!empty($form_data['filter-level']) && !empty($form_data['leveltype'])){
                    $option = new RuleOption();
                    $option->setName('level');
                    $option->setType($form_data['leveltype']);
                    $option->setValue($form_data['filter-level']);
                    $options['level']=$option;
                }

                // is birthday
                if (!empty($form_data['filter-isbirthday'])){
                    $option = new RuleOption();
                    $option->setName('isbirthday');
                    $option->setType(RuleOption::TYPE_BOOLEAN);
                    $option->setValue($form_data['filter-isbirthday']);
                    $options['isbirthday']=$option;
                }

                // is anniversary
                if (!empty($form_data['filter-isanniversary'])){
                    $option = new RuleOption();
                    $option->setName('isanniversary');
                    $option->setType(RuleOption::TYPE_BOOLEAN);
                    $option->setValue($form_data['filter-isanniversary']);
                    $options['isanniversary']=$option;
                }

                // point
                if (!empty($form_data['filter-fromPoint']) && !empty($form_data['filter-toPoint']) && !empty($form_data['pointtype'])){
                    if($form_data['filter-fromPoint']>$form_data['filter-toPoint'])
                    {
                        $this->getRequest()->getSession()->getFlashBag()->add('notice', 'From Point must less or equal To Point!');
                        return array(
                            'form'=>$form->createView()
                            );
                    }
                    $option = new RuleOption();
                    $option->setName('fromPoint');
                    $option->setType($form_data['pointtype']);
                    $option->setValue($form_data['filter-fromPoint']);
                    $options['fromPoint']=$option;

                    $option = new RuleOption();
                    $option->setName('toPoint');
                    $option->setType($form_data['pointtype']);
                    $option->setValue($form_data['filter-toPoint']);
                    $options['toPoint']=$option;
                }

                // Delay Time if Auto
                if (!empty($form_data['timertype'])){
                    $type= $form_data['timertype'];
                    $name = 'timer';
                    $data_key = 'filter-timer'.$type;
                    $value='';
                    if($type==RuleOption::TYPE_DATE)
                    {
                        $date = $form_data[$data_key];
                        if(empty($date['date']['month']) || empty($date['date']['day']))
                        {
                            $this->getRequest()->getSession()->getFlashBag()->add('notice', '** Month and Day can not be null!');
                                return array(
                            'form'=>$form->createView()
                            );
                        }
                        $year=$date['date']['year'];
                        if(!empty($date['date']['month']))
                        {
                            $month=$date['date']['month'];
                        }
                        if(!empty($date['date']['day']))
                            $day=$date['date']['day'];
                        if(!empty($date['time']['hour']))
                            $hour=$date['time']['hour'];
                        else
                            $hour=0;
                        $d = new \DateTime();
                        $d->setDate($year,$month,$day);
                        $d->setTime($hour,0);
                        $value=$d->getTimestamp();
                    }
                    else
                    {
                        if(empty($form_data[$data_key]) || is_int($form_data[$data_key]))
                        {
                            $this->getRequest()->getSession()->getFlashBag()->add('notice', 'Please insert days!');
                            return array(
                                'form'=>$form->createView()
                                );
                        }
                        $value=$form_data[$data_key];
                    }
                    $option = new RuleOption();
                    $option->setName($name);
                    $option->setType($type);
                    $option->setValue($value);
                    $options['delayTime']=$option;
                    $entity->setType(2);
                }else{//special case for birthday need run each day if not specific a day
                    if(!empty($form_data['filter-isbirthday']))
                    {
                        $option = new RuleOption();
                        $option->setName('timer');
                        $option->setType(RuleOption::TYPE_DAYS);
                        $option->setValue(1);
                        $options['delayTime']=$option;
                        $entity->setType(2);
                    }
                    
                }

                $entity->setOptions($options);
                $twigEnvironment = new Twig_Environment();

                try {

                    $dm->persist($entity);
                    $dm->flush();
                    $router = $this->get('router');
                    $this->getRequest()->getSession()->getFlashBag()->add('notice', 'New template rule has been created!');

                    $redirectresponse =  new RedirectResponse($router->generate('backend_list_template_rule'));
                    return $redirectresponse;
                } catch (\Exception $e) {
                    // $this->getRequest()->getSession()->getFlashBag()->add('error', 'Template Rule errors: ' . $e->getMessage());
                }
            }
        }
        return array(
            'form' => $form->createView(),
            'timertype'=>array_keys(RuleOption::getAutoTimeType($this->get('translator')))
        );
    }

    /**
     * @Route("/backend/template/rule/edit/{id}", name="backend_edit_template_rule")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function editTemplateRuleAction($id) {

        $trans = $this->get('translator');
        $dm = $this->get('database_manager');
        $request = $this->get('request');

        $entity = $dm->getRepository('AevitasChannelBundle:TemplateRule')->find($id);
        $formType = new \Aevitas\LevisBundle\Form\FormTemplateRuleType($trans,$entity);
        $form = $this->createForm($formType, $entity);

        /*****************************map data***********************************************/
        $options = $entity->getOptions();

        foreach ($options as $k => $v) {
                
                $filter = 'filter-'.$v->getName();
                $type=$v->getName().'type';
                if($v->getName()=='fromPoint' || $v->getName()=='toPoint')
                {
                    $type='pointtype';

                }
                if($v->getName()=='timer')
                {
                    $filter.=$v->getType();
                    if($v->getType()==RuleOption::TYPE_DATE)
                    {
                        $date = new \DateTime();
                        $date->setTimestamp($v->getValue());
                        $date_data=date_parse($date->format('Y-m-d H:i:s'));
                        // $form->get($filter)->get('date')->get('year')->setData($date_data['year']);
                        $form->get($filter)->setData($date);
                        // if(!empty($date_data['month']))
                        // {
                        //     $form->get($filter)->get('date')->get('month')->setData($date_data['month']);
                        // }
                        // if(!empty($date_data['day']))
                        //     $form->get($filter)->get('date')->get('day')->setData($date_data['day']);
                        // if(!empty($date_data['hour']))
                            // $form->get($filter)->get('time')->get('hour')->setData($date_data['hour']);
                    }else
                    {
                        $form->get($filter)->setData((int)$v->getValue());
                    }
                }
                else
                {
                    $value=$v->getValue();
                    if($v->getType()==RuleOption::TYPE_BOOLEAN)
                        $value = (bool)$value;
                    $form->get($filter)->setData($value);

                }
                if($v->getType()!==RuleOption::TYPE_BOOLEAN)
                    $form->get($type)->setData($v->getType($v->getType()));
                

        }
        if ($request->getMethod() == 'POST') {

            $form->bind($request);
            $form_data=$request->request->get('aevitas_edit_template_rule');
            if ($form->isValid()) {
                
                 if(!$this->isAnyFilterInserted($form_data))
                {
                    $this->getRequest()->getSession()->getFlashBag()->add('notice', '**Please insert at least one filter!');
                    return array(
                        'form'=>$form->createView()
                        );
                }

                // Rule name
                if ($form_data['templateRuleName']!=''){
                    $entity->setTemplateRuleName($form_data['templateRuleName']);
                }
                $entity->setOptions(array());
                $dm->persist($entity);
                $dm->flush();
                $entity = $dm->getRepository('AevitasChannelBundle:TemplateRule')->find($id);
                // email
                if (!empty($form_data['filter-email']) && !empty($form_data['emailtype'])){
                    $option = new RuleOption();
                   
                    $option->setName('email');
                    $option->setType($form_data['emailtype']);
                    $option->setValue($form_data['filter-email']);
                    $options['email']=$option;
                }
                // name
                if (!empty($form_data['filter-name']) && !empty($form_data['nametype'])){
                    $option = new RuleOption();
                   
                    $option->setName('name');
                    $option->setType($form_data['nametype']);
                    $option->setValue($form_data['filter-name']);
                    $options['name']=$option;
                }

                // gender
                if (!empty($form_data['filter-gender']) && !empty($form_data['gendertype'])){


                    $option = new RuleOption();
                    $option->setName('gender');
                    // $option->setType($form_data['gendertype']);
                    $option->setValue($form_data['filter-gender']);
                    $options['gender']=$option;

                }
                // level
                if (!empty($form_data['filter-level']) && !empty($form_data['leveltype'])){

                    $option = new RuleOption();
                    $option->setName('level');
                    $option->setType($form_data['leveltype']);
                    $option->setValue($form_data['filter-level']);
                    $options['level']=$option;
                }
                
                // is birthday
                if (!empty($form_data['filter-isbirthday'])){
                    $option = new RuleOption();
                    $option->setName('isbirthday');
                    $option->setType(RuleOption::TYPE_BOOLEAN);
                    $option->setValue($form_data['filter-isbirthday']);
                    $options['isbirthday']=$option;
                }
                
                // is anniversary
                if (!empty($form_data['filter-isanniversary'])){
                    $option = new RuleOption();
                    $option->setName('isanniversary');
                    $option->setType(RuleOption::TYPE_BOOLEAN);
                    $option->setValue($form_data['filter-isanniversary']);
                    $options['isanniversary']=$option;
                }
                // point
                if (!empty($form_data['filter-fromPoint']) && !empty($form_data['filter-toPoint']) && !empty($form_data['pointtype'])){

                    if($form_data['filter-fromPoint']>$form_data['filter-toPoint'])
                    {
                        $this->getRequest()->getSession()->getFlashBag()->add('notice', 'From Point must less or equal To Point!');
                        return array(
                            'form'=>$form->createView()
                            );
                    }

                    $option = new RuleOption();
                    $option->setName('fromPoint');
                    // $option->setType($form_data['pointtype']);
                    $option->setValue($form_data['filter-fromPoint']);
                    $options['fromPoint']=$option;


                    $option = new RuleOption();
                    $option->setName('toPoint');
                    // $option->setType($form_data['pointtype']);
                    $option->setValue($form_data['filter-toPoint']);
                    $options['toPoint']=$option;
                }

                 // Delay Time if Auto
                if (!empty($form_data['timertype'])){
                    $type= $form_data['timertype'];
                    $name = 'timer';
                    $data_key = 'filter-timer'.$type;
                    $value='';
                    if($type==RuleOption::TYPE_DATE)
                    {
                        $date = $form_data[$data_key];
                        if(empty($date['date']['month']) || empty($date['date']['day']))
                        {
                            $this->getRequest()->getSession()->getFlashBag()->add('notice', '** Month and Day can not be null!');
                                return array(
                            'form'=>$form->createView()
                            );
                        }
                        $year=$date['date']['year'];
                        if(!empty($date['date']['month']))
                        {
                            $month=$date['date']['month'];
                        }
                        if(!empty($date['date']['day']))
                            $day=$date['date']['day'];
                        if(!empty($date['time']['hour']))
                            $hour=$date['time']['hour'];
                        else
                            $hour=0;    
                        $d = new \DateTime();
                        $d->setDate($year,$month,$day);
                        $d->setTime($hour,0);
                        $value=$d->getTimestamp();
                    }
                    else
                    {
                        if(empty($form_data[$data_key]) || is_int($form_data[$data_key]))
                        {
                            $this->getRequest()->getSession()->getFlashBag()->add('notice', 'Please insert days!');
                            return array(
                                'form'=>$form->createView()
                                );
                        }
                        $value=$form_data[$data_key];
                    }
                    $option = new RuleOption();
                    $option->setName($name);
                    $option->setType($type);
                    $option->setValue($value);
                    $options['delayTime']=$option;
                    $entity->setType(2);
                
                }else
                {
                    if($entity->getOptions()!==null)
                    {
                        $option_to_remove = $entity->getOptions()->filter(function($v){
                        return $v->getName()=='timer';
                        })->first();
                        $entity->getOptions()->removeElement($option_to_remove);
                        $entity->setType(1);
                    }
                    if(!empty($form_data['filter-isbirthday']))
                    {
                        $option = new RuleOption();
                        $option->setName('timer');
                        $option->setType(RuleOption::TYPE_DAYS);
                        $option->setValue(1);
                        $options['delayTime']=$option;
                        $entity->setType(2);
                    }

                }
                $entity->setOptions($options);
                // $entity->setOptions(null);

                $twigEnvironment = new Twig_Environment();
                try {
                    $twigEnvironment->parse($twigEnvironment->tokenize($request->get('template-content')));
                    $dm->merge($entity);
                    $dm->persist($entity);

                    $dm->flush();
                    // $this->getRequest()->getSession()->getFlashBag()->add('notice', 'The template rule has been edited!');
                    $router = $this->get('router');
                    $this->getRequest()->getSession()->getFlashBag()->add('notice', 'The template rule '.$entity->getTemplateRuleName().' has been edited!');

                    $redirectresponse =  new RedirectResponse($router->generate('backend_list_template_rule'));
                    return $redirectresponse;
                } catch (\Exception $e) {
                    // $this->getRequest()->getSession()->getFlashBag()->add('error', 'Template rule errors: ' . $e->getRawMessage());
                    
                    $this->getRequest()->getSession()->getFlashBag()->add('error', 'Template rule errors: ' );
                }
            }
        }

        return array(
            'form' => $form->createView(),
            'timertype'=>array_keys(RuleOption::getAutoTimeType($this->get('translator')))
        );
    }

    /**
     * @Route("/backend/template/rule/delete/{id}", name="backend_delete_template_rule")
     * @Secure(roles="ROLE_POINT")
     * @Template()
     */
    public function deleteRuleAction($id) {
        if (isset($id)) {
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $entity = $dm->getRepository('AevitasChannelBundle:TemplateRule')->find($id);;
            $dm->remove($entity);
            $dm->flush();
            $router = $this->get('router');
            $this->getRequest()->getSession()->getFlashBag()->add('notice', 'The template rule has been deleted!');
            return new RedirectResponse($router->generate('backend_list_template_rule'));
        }

        $this->getRequest()->getSession()->getFlashBag()->add('notice', 'has an error!');
        return array();
    }
}
