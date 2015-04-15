<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PointRule
 *
 * @author apple
 */

namespace Aevitas\PointBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Vietland\UserBundle\Document\User;

/**
 * @MongoDB\Document(repositoryClass="Aevitas\PointBundle\Document\PointRuleRepository")
 */
class PointRule {

    /**
     * @MongoDB\Id(strategy="increment")
     */
    protected $id;

    /**
     * @MongoDB\String
     */
    protected $name;

    /**
     * @MongoDB\Int
     */
    protected $point;

    /**
     * @MongoDB\String
     */
    protected $action;

    const MALE = 1;
    const FEMALE = 0;

    /**
     * @MongoDB\Int
     */
    protected $gender;

    /**
     * @MongoDB\Boolean
     */
    protected $anniversary;

    /**
     * @MongoDB\Boolean
     */
    protected $birthday;
    
    /**
     * @MongoDB\Boolean
     */
    protected $bonus;

    const ADDITION = 1;
    const MULTIPLY = 2;
    const MULTIPLYQTY = 3;

    /**
     * @MongoDB\Int
     */
    protected $operation;

    /**
     * @MongoDB\Int
     */
    protected $level;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Aevitas\PointBundle\Document\Program")
     */
    protected $program;

    /**
     * @MongoDB\String
     */
    protected $store;
    
    /**
     * @MongoDB\Int
     */
    protected $city;
    
    /**
     * @MongoDB\Int
     */
    protected $district;
    
    /**
     * @MongoDB\String
     */
    protected $locate;

    /**
     * @MongoDB\Int
     */
    protected $sDayInMonth;

    /**
     * @MongoDB\Int
     */
    protected $fDayInMonth;

    /**
     * @MongoDB\String
     */
    protected $arrDayInWeek;

    /**
     * @MongoDB\Int
     */
    protected $sHourInDay;

    /**
     * @MongoDB\Int
     */
    protected $fHourInDay;

    /**
     * @MongoDB\Int
     */
    protected $DayParity;

    /**
     * @MongoDB\Int
     */
    protected $sDay;

    /**
     * @MongoDB\Int
     */
    protected $fDay;

    /**
     * @MongoDB\String
     */
    protected $schema;
    public static $pointSchema = array(
        'gender' => '_',
        'level' => '_',
        'interval-time' => '_',
        'day-month' => '_',
        'day-week' => '_',
        'hour' => '_',
        'parity' => '_',
        'anniversary' => '_',
        'birthday' => '_',
        'bonus' => '_',
        'city' => '_',
        'district' => '_'
    );

    public function __construct() {
        $this->operation = self::ADDITION;
    }

    public function getEarnedPoints($points) {
        if ($this->operation == self::ADDITION)
            return $points + $this->point;
        else
            return $points * $this->point;
    }

    public function getLevelLabel() {
        $level = array(User::SILVER => 'Silver', User::GOLD => 'Gold', User::PLATIN => 'Platin');
        if (isset($level[$this->level]))
            return $level[$this->level];
        else
            return 'Global';
    }

    /**
     * Get id
     *
     * @return int_id $id
     */
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set action
     *
     * @param string $name
     * @return \PointRule
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * Set point
     *
     * @param int $point
     * @return \PointRule
     */
    public function setPoint($point) {
        $this->point = $point;
        return $this;
    }

    /**
     * Get point
     *
     * @return int $point
     */
    public function getPoint() {
        return $this->point;
    }

    /**
     * Set sDayInMonth
     *
     * @param int $day
     * @return \PointRule
     */
    public function setSDayInMonth($day) {
        $this->sDayInMonth = $day;
        return $this;
    }

    /**
     * Get sDayInMonth
     *
     * @return int $day
     */
    public function getSDayInMonth() {
        return $this->sDayInMonth;
    }

    /**
     * Set action
     *
     * @param string $action
     * @return \PointRule
     */
    public function setAction($action) {
        $this->action = $action;
        return $this;
    }

    /**
     * Get action
     *
     * @return string $action
     */
    public function getAction() {
        return $this->action;
    }

    /**
     * Set gender
     *
     * @param int $gender
     * @return \PointRule
     */
    public function setGender($gender) {
        $this->gender = $gender;
        return $this;
    }

    /**
     * Get gender
     *
     * @return int $gender
     */
    public function getGender() {
        return $this->gender;
    }

    public static function getOperationOptions() {
        return array(self::ADDITION => 'Addition', self::MULTIPLY => 'Multiply', self::MULTIPLYQTY => 'Multiply by quantity');
    }

    public function setAnniversary($anniversary) {
        $this->anniversary = $anniversary;
        return $this;
    }

    public function getAnniversary() {
        return $this->anniversary;
    }

    public function setBonus($bonus) {
        $this->bonus = $bonus;
        return $this;
    }

    public function getBonus() {
        return $this->bonus;
    }
    
    public function setBirthday($birthday) {
        $this->birthday = $birthday;
        return $this;
    }

    public function getBirthday() {
        return $this->birthday;
    }

    public function setOperation($operation) {
        $this->operation = $operation;
        return $this;
    }

    public function getOperation() {
        return $this->operation;
    }

    public function setLevel($level) {
        $this->level = $level;
        return $this;
    }

    public function getLevel() {
        return $this->level;
    }

    public function setProgram($program) {
        $this->program = $program;
        return $this;
    }

    public function getProgram() {
        return $this->program;
    }

    public function setStore($store) {
        $this->store = $store;
        return $this;
    }

    public function getStore() {
        return $this->store;
    }
    
    public function setDistrict($district){
        $this->district = $district;
        return $this;
    }
    
    public function getDistrict(){
        return $this->district;
    }
    
    public function setCity($city){
        $this->city = $city;
        return $this;
    }
    
    public function getCity(){
        return $this->city;
    }
    
    public function setLocate($locate=null){
        if ($locate != null){
            $this->locate = $locate;
            return $this;
        }
        if (is_null($this->city)){
            $this->locate = '--';
            return $this;
        }
        if (is_null($this->district)){
            $this->locate = $this->city;
            return $this;
        }
        $this->locate = $this->district.' - '.$this->city;
        return $this;
    }
    
    public function getLocate(){
        return $this->locate;
    }

    /**
     * @MongoDB\PostRemove
     */
    public function afterRemove() {
        
    }

    /**
     * Set fDayInMonth
     *
     * @param int $fDayInMonth
     * @return \PointRule
     */
    public function setFDayInMonth($fDayInMonth) {
        $this->fDayInMonth = $fDayInMonth;
        return $this;
    }

    /**
     * Get fDayInMonth
     *
     * @return int $fDayInMonth
     */
    public function getFDayInMonth() {
        return $this->fDayInMonth;
    }

    /**
     * Set arrDayInWeek
     *
     * @param string $arrDayInWeek
     * @return \PointRule
     */
    public function setArrDayInWeek($arrDayInWeek) {
        $this->arrDayInWeek = $arrDayInWeek;
        return $this;
    }

    /**
     * Get arrDayInWeek
     *
     * @return string $arrDayInWeek
     */
    public function getArrDayInWeek() {
        return $this->arrDayInWeek;
    }

    /**
     * Set sHourInDay
     *
     * @param int $sHourInDay
     * @return \PointRule
     */
    public function setSHourInDay($sHourInDay) {
        $this->sHourInDay = $sHourInDay;
        return $this;
    }

    /**
     * Get sHourInDay
     *
     * @return int $sHourInDay
     */
    public function getSHourInDay() {
        return $this->sHourInDay;
    }

    /**
     * Set fHourInDay
     *
     * @param int $fHourInDay
     * @return \PointRule
     */
    public function setFHourInDay($fHourInDay) {
        $this->fHourInDay = $fHourInDay;
        return $this;
    }

    /**
     * Get fHourInDay
     *
     * @return int $fHourInDay
     */
    public function getFHourInDay() {
        return $this->fHourInDay;
    }

    /**
     * Set DayParity
     *
     * @param int $DayParity
     * @return \PointRule
     */
    public function setDayParity($DayParity) {
        $this->DayParity = $DayParity;
        return $this;
    }

    /**
     * Get DayParity
     *
     * @return int $DayParity
     */
    public function getDayParity() {
        return $this->DayParity;
    }

    /**
     * Set sDay
     *
     * @param int $sDay
     * @return \PointRule
     */
    public function setSDay($sDay) {
        $this->sDay = $sDay;
        return $this;
    }

    /**
     * Get sDay
     *
     * @return int $sDay
     */
    public function getSDay() {
        return $this->sDay;
    }

    /**
     * Set fDay
     *
     * @param int $fDay
     * @return \PointRule
     */
    public function setFDay($fDay) {
        $this->fDay = $fDay;
        return $this;
    }

    /**
     * Get fDay
     *
     * @return int $fDay
     */
    public function getFDay() {
        return $this->fDay;
    }

    /**
     * Set schema
     *
     * @param string $schema
     * @return \PointRule
     */
    public function setSchema($schema) {
        $this->schema = $schema;
        return $this;
    }

    /**
     * Get schema
     *
     * @return string $schema
     */
    public function getSchema() {
        return $this->schema;
    }

    /**
     * @todo Update Schema before save to database
     * @MongoDB\PrePersist
     * @MongoDB\PreUpdate
     */
    public function beforePersist() {
        $schema = '';
        $ii = 1;
        foreach (self::$pointSchema as $key => $value) {
            switch ($key) {
                case 'interval-time':
                    if (is_null($this->sDay) || is_null($this->fDay)) {
                        $schema .= $value;
                    } else {
                        $schema .= $this->sDay . ':' . $this->fDay;
                    }
                    break;
                case 'day-month':
                    if (is_null($this->sDayInMonth) || is_null($this->fDayInMonth)) {
                        $schema .= $value;
                    } else {
                        $schema .= $this->sDayInMonth . ':' . $this->fDayInMonth;
                    }
                    break;
                case 'day-week':
                    if (is_null($this->arrDayInWeek)) {
                        $schema .= $value;
                    } else {
                        $schema .= $this->arrDayInWeek;
                    }
                    break;
                case 'hour':
                    if (is_null($this->sHourInDay) || is_null($this->fHourInDay)) {
                        $schema .= $value;
                    } else {
                        $schema .= $this->sHourInDay . ':' . $this->fHourInDay;
                    }
                    break;
                case 'parity':
                    if (is_null($this->DayParity)) {
                        $schema .= $value;
                    } else {
                        $schema .= $this->DayParity . '';
                    }
                    break;
                default:
                    if (is_null($this->$key) || $this->$key=='') {
                        $schema .= $value;
                    } else {
                        $schema .= $this->$key;
                    }
                    break;
            }

            if ($ii++ < count(self::$pointSchema)) {
                $schema .= '&';
            }
        }
        $this->schema = $schema;

        //exit($this->name.'|'.$this->schema);
    }

}
