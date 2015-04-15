<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SchemaTask
 *
 * @author paul.aan
 */

namespace Visikard\ArmBundle\Service\Multithread;

use Visikard\UserBundle\Document\Profile;
use Visikard\UserBundle\Document\User;
use Visikard\ArmBundle\Document\Behavior;
use Visikard\ArmBundle\Document\DemoGraphic;
use Visikard\ArmBundle\Service\IpLocation;
use Visikard\ArmBundle\Document\Coordinate;
use Visikard\ArmBundle\Document\Location;
use Visikard\ArmBundle\Document\IpRecord;

class SchemaTask extends AbstractTask {

    protected $subject;
    protected $subjectid;
    protected $action;
    protected $object;
    protected $objectid;
    protected $coordinate;
    private $apiService;
    private $dm;
    private $user;
    private $profile;
    private $controller;
    private $instant; //instant coordinate

    public function __construct($subject, $subjectid, $action, $coordinate, $object, $objectid) {
        $this->subject = $subject;
        $this->subjectid = (int) $subjectid;
        $this->action = $action;
        $this->object = $object;
        $this->objectid = (int) $objectid;
        $cExtract = explode(',', $coordinate);
        $this->instant = $coordinate;
        $this->coordinate = new Coordinate((float) $cExtract[0], (float) $cExtract[1]);
    }

    public function getApiService() {
        return $this->apiService;
    }

    public function setApiService($apiService) {
        $this->apiService = $apiService;
        return $this;
    }

    public function getDm() {
        return $this->controller->get('doctrine.odm.mongodb.document_manager');
    }

    public function setController($controller) {
        $this->controller = $controller;
        return $this;
    }

    private function getInstance($object, $objectid) {
        $apiService = $this->getApiService();
        $result = $apiService->getObject($object, $objectid);
        return end($result);
    }

    public function getProfileSchema() {
        $logger = $this->controller->get('logger');
        $schema = null;
        $dm = $this->getDm();
        $analytic = new DemoGraphic();
        $profile = $dm->getRepository('VisikardUserBundle:Profile')->findOneBy(array('oldId' => (int) $this->subjectid));
        if ($profile instanceof Profile) {
            //Get schema from Object
            $this->profile = $profile;
            $schema = $analytic->setSchema($profile->getData())->getSchema(true);
            //var_dump($armUser->getData());exit;
        } else {//This useer does not exist on ARM Services
            //get Instance's Data from Visikard Services
            $instance = $this->getInstance($this->subject, $this->subjectid);
            $profile = new Profile();
            //save User's data and Analyze this User data to get schema
            $profile->setValues(get_object_vars($instance));
            $fkUser = $this->getKardHolder($profile->getFkUser());
            $profile->setUser($fkUser);
            $schema = $analytic->setSchema(get_object_vars($instance))->getSchema(true);
            $dm->persist($profile);
            $dm->flush();
            $this->profile = $profile;
        }
        return $schema;
    }

    public function save() {
        $logger = $this->controller->get('logger');
        $logger->info('start');
        $userSchema = $this->getProfileSchema();
        $logger->err($userSchema);
        if (is_null($userSchema))
            exit;
        $dm = $this->getDm();
        $behavior = new Behavior();
        $location = $this->getApiService()->getLocationByCoordinate($this->instant);
        //Recognize behavior's data
        if ($location)
            $behavior->setLocation($location);
        $behavior->setCoordinate($this->coordinate)
                ->setSubject($this->subject)->setSubjectId((int) $this->subjectid)
                ->setAction($this->action)->setSchema($userSchema)->setUser($this->profile->getUser())->setUserId($this->profile->getFkUser());

        if ($this->objectid) {
            $instance = $this->getInstance($this->object, $this->objectid);
            $object = get_object_vars($instance);
            if (!empty($object))
                $behavior->setKind((int) $object['fkKardType']);
            $behavior->setObject($this->object)->setObjectId((int) $this->objectid)->setBh($object['name']);
        }
        $dm->persist($behavior);
        $dm->flush();
    }

    public function getKardHolder($fkUser) {
        $dm = $this->getDm();
        $user = $dm->getRepository('VisikardUserBundle:User')->findOneBy(array('oldId' => (int) $fkUser));
        if ($user instanceof User && $user->getOldId()) {
            return $user;
        } else {
            $apiService = $this->getApiService();
            $result = $apiService->getUserInfo((int) $fkUser);
            $values = get_object_vars(end($result));
            $usermanager = $this->controller->get('fos_user.user_manager');
            $user = $usermanager->createUser();
            $user->setFirstName($values['fName']);
            $user->setLastName($values['lName']);
            $user->setEmail($values['email']);
            $user->setUsername($values['userName']);
            $user->setOldId($values['idUsers']);
            $usermanager->updateCanonicalFields($user);
            $dm = $this->getDm();
            $dm->persist($user);
            $dm->flush();
            $this->user = $user;
            return $user;
        }
    }

    /**
     * IP 2 Geolocation 
     * @param IpRecord $ip
     */
    protected function getIpRecord() {
        $record = new IpLocation();
        if ($this->ip != 'null') {
            $info = $record->getAll($this->ip);
            return $info;
        } else
            return null;
    }

}