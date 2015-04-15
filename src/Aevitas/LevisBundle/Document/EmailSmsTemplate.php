<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmailSmsTemplate
 *
 * @author Truong LD <mr.truongld at gmail.com>
 */

namespace Aevitas\LevisBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @MongoDB\Document(collection="EmailSmsTemplate")
 */
class EmailSmsTemplate {
    /**
     * @MongoDB\Id(strategy="increment")
     */
    protected $id;
    
    /**
     * @MongoDB\String
     */
    protected $name;

    /**
     * @MongoDB\String
     */
    protected $bodymail;
    
    /**
     * @MongoDB\String
     */
    protected $bodysms;
    
    /**
     * @MongoDB\Int
     */
    protected $gender;
    
    /**
     * @MongoDB\String
     */
    protected $group;
    
    /**
     * @MongoDB\String
     */
    protected $city;
    
    /**
     * @MongoDB\String
     */
    protected $district;
    
    /**
     * @MongoDB\String
     */
    protected $cityName;
    
    /**
     * @MongoDB\String
     */
    protected $districtName;
    
    /**
     * @MongoDB\Int
     */
    protected $level;
    
    /**
     * @MongoDB\String
     */
    protected $type;
    
    public function getListVariable() {
        $arr = array();
        $arr[] = array('name'=>'Firstname', 'code'=>'[firstname]', 'replace'=>'{{user.firstname}}','getAttribute'=>'getFirstname');
        $arr[] = array('name'=>'Lastname', 'code'=>'[lastname]', 'replace'=>'{{user.lastname}}','getAttribute'=>'getLastname');
        $arr[] = array('name'=>'Email', 'code'=>'[email]', 'replace'=>'{{user.email}}','getAttribute'=>'getEmail');
        $arr[] = array('name'=>'Sex', 'code'=>'[sex]', 'replace'=>'{{user.getSexLabel}}','getAttribute'=>'getSexLabel');
        $arr[] = array('name'=>'Birthday', 'code'=>'[dob]', 'replace'=>'{{user.dob|date(\'d/m/Y\')}}','getAttribute'=>'getDobAsString');
        $arr[] = array('name'=>'State', 'code'=>'[state]', 'replace'=>'{{user.state}}','getAttribute'=>'getState');
        $arr[] = array('name'=>'District', 'code'=>'[district]', 'replace'=>'{{user.district}}','getAttribute'=>'getDistrict');
        $arr[] = array('name'=>'City', 'code'=>'[city]', 'replace'=>'{{user.city}}','getAttribute'=>'getCity');
        $arr[] = array('name'=>'Card no', 'code'=>'[ccode]', 'replace'=>'{{user.ccode}}','getAttribute'=>'getCCode');
        $arr[] = array('name'=>'Level', 'code'=>'[level]', 'replace'=>'{{user.getLevel}}','getAttribute'=>'getLevel');
        $arr[] = array('name'=>'Cell phone', 'code'=>'[cellphone]', 'replace'=>'{{user.getCellphone}}','getAttribute'=>'getCellphone');
        //$arr[] = array('name'=>'', 'code'=>'', 'replace'=>'');
        return $arr;
    }
    
    public function parseVariable($content){
        $arrF = array();
        $arrR = array();
        foreach ($this->getListVariable() as $var){
            $arrF[] = $var['code'];
            $arrR[] = $var['replace'];
        }
        return str_replace($arrF, $arrR, $content);
    }

    /**
    *@param $content as template
    *@param $user
    *@return content 
    */
    public function mergeUserContent($user,$content){
        
            foreach ($this->getListVariable() as $var){
                $arrF[] = $var['code'];
                $func=$var['getAttribute'];
                $arrR[] = $user->$func();
                
            }
            $newcontent = str_replace($arrF, $arrR, $content);
            return $newcontent;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setName($name){
        $this->name = $name;
        return $this;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function setBodymail($text){
        $this->bodymail = $text;
        return $this;
    }
    
    public function getBodymail(){
        return $this->bodymail;
    }
    
    public function setBodysms($text){
        $this->bodysms = $text;
        return $this;
    }
    
    public function getBodysms(){
        return $this->bodysms;
    }
    
    public function setGender($gender){
        $this->gender = $gender;
        return $this;
    }
    
    public function getGender(){
        return $this->gender;
    }
    
    public function setGroup($group){
        $this->group = $group;
        return $this;
    }
    
    public function getGroup(){
        return $this->group;
    }
    
    public function setCity($city){
        $this->city = $city;
        return $this;
    }
    
    public function getCity(){
        return $this->city;
    }
    
    public function setDistrict($district){
        $this->district = $district;
        return $this;
    }
    
    public function getDistrict(){
        return $this->district;
    }
    
    public function setCityName($city){
        $this->cityName = $city;
        return $this;
    }
    
    public function getCityName(){
        return $this->cityName;
    }
    
    public function setDistrictName($district){
        $this->districtName = $district;
        return $this;
    }
    
    public function getDistrictName(){
        return $this->districtName;
    }
    
    public function setLevel($level){
        $this->level = $level;
        return $this;
    }
    
    public function getLevel(){
        return $this->level;
    }

    public function setType($type){
        $this->type = $type;
        return $this;
    }
    
    public function getType(){
        return $this->type;
    }

}