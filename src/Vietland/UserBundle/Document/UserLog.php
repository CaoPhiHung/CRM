<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Music
 *
 * @author paul.aan
 */

namespace Vietland\UserBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;
use Vietland\AevitasBundle\Document\Log;
use Vietland\AevitasBundle\Logger\LoggerInterface;

/**
 * @MongoDB\Document(repositoryClass="Vietland\UserBundle\Document\UserLogRepository")
 */
class UserLog extends Log {

    /**
     * @MongoDB\Collection
     */
    public $schema;

    const SIGNUP = 'signup';
    const SIGNUP_STORE = 'signupstore';
    const SIGNUP_ONLINE = 'signuponline';
    const INCREASE_POINT = 'increasepoint';
    const REFERAl_STORE = 'referalstore';
    const REDEEM_GIFT = 'redeem_gift';
    const REDEEM_POINTS = 'redeem_points';
    const BUYITEM = 'buyitem';
    const FB_INTEGRATE = 'fb_integrate';
    const LOGIN = 'login';
    const EARN_POINT_QUALIFY = 'earnpointql';
    const EARN_NON_POINT_QUALIFY = 'earnpointnq';
    const UPDATE_PROFILE = 'upprofile';
    const CASHBACK = 'cashback';

    /**
     * @MongoDB\Int
     */
    private $type;

    /**
     * @MongoDB\Float
     */
    protected $point;

    /**
     * @MongoDB\Float
     */
    protected $totalPayment;

    /**
     * @MongoDB\Float
     */
    protected $rid;

    const TYPE_SYSTEM = 1;
    const TYPE_ACTIVITY = 2;

    public function __construct() {
        $this->schema = array();
        $this->type = self::TYPE_ACTIVITY;
        parent::__construct();
    }

    public function getSchema() {
        return $this->schema;
    }

    public function setSchema($schema) {
        $this->schema = (array_values($schema));
        return $this;
    }

    public function addSchema($data) {
        $this->schema[] = $data;
        return $this;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
        return $this;
    }

    public function getPoint() {
        return $this->point;
    }

    public function setPoint($point) {
        $this->point = round($point);
        return $this;
    }

    public function getRid() {
        return $this->rid;
    }

    public function setRid($rid) {
        $this->rid = $rid;
        return $this;
    }

    public static function getActionPoints() {
        return array(self::BUYITEM => 'Shopping', self::SIGNUP_STORE => 'Sign up at Store', self::SIGNUP_ONLINE => 'Signup Online');
    }

    public function getTotalPayment() {
        return $this->totalPayment;
    }

    public function setTotalPayment($totalPayment) {
        $this->totalPayment = $totalPayment;
        return $this;
    }

    /**
     * @var $id
     */
    protected $id;

    /**
     * @var string $action
     */
    protected $action;

    /**
     * @var string $subject
     */
    protected $subject;

    /**
     * @var date $created
     */
    protected $created;

    /**
     * @var string $md5
     */
    protected $md5;

    /**
     * @var int $uid
     */
    protected $uid;

    /**
     * @var Vietland\UserBundle\Document\User
     */
    protected $user;


    /**
     * Get id
     *
     * @return int_id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param Vietland\UserBundle\Document\User $user
     * @return self
     */
    public function setUser(\Vietland\UserBundle\Document\User $user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Get user
     *
     * @return Vietland\UserBundle\Document\User $user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set action
     *
     * @param string $action
     * @return self
     */
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    /**
     * Get action
     *
     * @return string $action
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set subject
     *
     * @param string $subject
     * @return self
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * Get subject
     *
     * @return string $subject
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set created
     *
     * @param date $created
     * @return self
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * Get created
     *
     * @return date $created
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set md5
     *
     * @param string $md5
     * @return self
     */
    public function setMd5($md5)
    {
        $this->md5 = $md5;
        return $this;
    }

    /**
     * Get md5
     *
     * @return string $md5
     */
    public function getMd5()
    {
        return $this->md5;
    }

    /**
     * Set uid
     *
     * @param int $uid
     * @return self
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * Get uid
     *
     * @return int $uid
     */
    public function getUid()
    {
        return $this->uid;
    }
}
