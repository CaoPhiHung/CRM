<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author paulaan
 */

namespace Vietland\UserBundle\Document;

use FOS\UserBundle\Document\User as BaseUser;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Vietland\UserBundle\Document\Avatar;
use Vietland\AdsBundle\Document\Coordinates;
use Doctrine\ODM\MongoDB\MongoDBException;
use Symfony\Component\Form\Type\FileType;
use Vietland\AevitasBundle\Logger\AevitasLogger;
use Doctrine\Common\Collections\ArrayCollection;
use Vietland\AevitasBundle\Logger\LoggerInterface as Logger;
use Vietland\AevitasBundle\Document\Anniversary;
use Vietland\AevitasBundle\Helper\ImageHelper;
use Vietland\AevitasBundle\Helper\FolderComponent;
use Aevitas\LevisBundle\Document\GiftArticle;
use FOS\UserBundle\Model\UserInterface;

/**
 * @MongoDB\Document(collection="users",repositoryClass="Vietland\UserBundle\Document\UserRepository")
 * @MongoDB\UniqueIndex(keys={"cellphone"="asc", "CCode"="asc"})
 */
class User extends BaseUser implements Logger {

    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_STAFF = 'ROLE_STAFF';
    const ROLE_SUPER_ADMIN = 'ROLE_SUPER_ADMIN';
    const ROLE_USER = 'ROLE_USER';
    const ROLE_REPORT = 'ROLE_REPORT';
    const ROLE_POINT = 'ROLE_POINT';
    const ROLE_GIFT = 'ROLE_GIFT';
    const ROLE_STORE = 'ROLE_STORE';
    /**
     * @MongoDB\Id(strategy="increment")
     */
    protected $id;

    /**
     *
     * @MongoDB\Int
     */
    protected $point;

    /**
     *
     * @MongoDB\Int
     */
    protected $bonuspoints;

    /**
     *
     * @MongoDB\Date
     */
    protected $bonusexpired;

    /**
     * @MongoDB\Collection
     */
    protected $bonusPoint = array();

    /**
     * @MongoDB\String
     */
    protected $posId;

    /**
     *
     * @MongoDB\Date
     */
    protected $dob;

    const FEMALE = 1;
    const MALE = 2;

    /**
     *
     * @MongoDB\Int
     */
    protected $sex;

    /**
     *
     * @MongoDB\Boolean
     */
    protected $status;

    /**
     *
     * @MongoDB\Date
     */
    protected $modifyStatusDate;

    /**
    *
    * @MongoDB\String
    */
    protected $reason;

    /**
     *
     * @MongoDB\String
     */
    protected $address1;

    /**
     *
     * @MongoDB\String
     */
    protected $address2;

    /**
     * @MongoDB\Boolean
     */
    protected $dship;

    /**
     *
     * @MongoDB\String
     */
    protected $address3;

    /**
     *
     * @MongoDB\String
     */
    protected $commonname;

    /**
     *
     * @MongoDB\String
     */
    protected $state;

    /**
     *
     * @MongoDB\String
     */
    protected $district;

    /**
     *
     * @MongoDB\String
     */
    protected $city;

    /**
     *
     * @MongoDB\Int
     */
    protected $ref;

    /**
     *
     * @MongoDB\String
     */
    protected $phone;

    /**
     *
     * @MongoDB\String
     */
    protected $fax;

    /**
     *
     * @MongoDB\String
     */
    protected $brand;

    /**
     *
     * @MongoDB\String
     */
    protected $aniversary;

    /**
     *
     * @MongoDB\String
     */
    protected $accountid;

    /**
     *
     * @MongoDB\String
     */
    protected $accounttype;

    /**
     *
     * @MongoDB\String
     */
    protected $cellphone;

    /**
     *
     * @MongoDB\String
     */
    protected $fbid;

    /**
     *
     * @MongoDB\String
     */
    protected $glid;

    /**
     *
     * @MongoDB\String
     */
    protected $avatar;
    protected $avatarUpload;

    /**
     *
     * @MongoDB\String
     */
    protected $avatarCoords;

    /**
     *
     * @MongoDB\Int
     */
    protected $age;

    /**
     *
     * @MongoDB\Float
     */
    protected $ttpay;

    /**
     *
     * @MongoDB\String
     */
    protected $ava;

    /**
     *
     * @MongoDB\String
     */
    protected $type = 0;

    /**
     * @MongoDB\String
     */
    protected $firstname;

    /**
     * @MongoDB\String
     */
    protected $lastname;

    /**
     * @MongoDB\String
     */
    protected $middlename;

    /**
     * @MongoDB\String
     */
    protected $about;

    /**
     * @MongoDB\ReferenceMany(targetDocument="Vietland\AevitasBundle\Document\Log", mappedBy="user")
     */
    protected $logs;
    private $dm;

    /**
     * @MongoDB\ReferenceMany(targetDocument="Group", mappedBy="admin")
     */
    protected $staff;

    /**
     * @MongoDB\String
     */
    protected $cropped;

    /**
     * @MongoDB\Int
     */
    protected $storeId;

    /**
     * @MongoDB\Int
     */
    protected $mari;

    /**
     * @todo Newsletter
     * @MongoDB\Boolean
     */
    protected $nlt;

    const STATUS_RELATIONSHIP = 0;
    const STATUS_SINGLE = 1;
    const STATUS_MARRIAGE = 2;
    const STATUS_SINGLEFATHER = 3;
    const STATUS_SINGLEMOM = 4;
    const STATUS_DIVORCED = 5;

    /**
     * @MongoDB\ReferenceMany(
     *      targetDocument="Vietland\UserBundle\Document\UserLog",
     *      mappedBy="user",
     *      sort={"created"="desc"},
     *      limit=5
     * )
     */
    protected $lastlogs;

    /**
     * @MongoDB\Int
     */
    protected $kids;

    /**
     * @MongoDB\Int
     */
    protected $ocpu;

    /**
     * @MongoDB\Int
     */
    protected $inco;

    /**
     * @MongoDB\EmbedMany(targetDocument="Vietland\AevitasBundle\Document\Anniversary")
     */
    protected $anni;

    /**
     * @MongoDB\String
     */
    public $edt;

    /**
     * @MongoDB\String
     */
    public $CCode;
    protected $edit = array('praddress1' => 0, 'prdob' => 0, 'pranniversary' => 0,
        'prcity' => 0, 'prdistrict' => 0, 'prfirstname' => 0, 'prlastname' => 0, 'prsex' => 0,
        'prmari' => 0, 'procpu' => 0, 'princo' => 0, 'prkids' => 0, 'prfone' => 0, 'premail' => 0, 'pranni' => 0);
    protected $updated = array();

    /**
     * @MongoDB\Int
     */
    public $qlf = 0;
    protected $increasePoint;

    const SILVER = 1;
    const GOLD = 2;
    const PLATIN = 3;

    /**
     * @MongoDB\Int
     */
    protected $level;

    /**
     * @MongoDB\Date
     */
    protected $uLevel;

    /**
     * @MongoDB\Float
     */
    protected $kp;

    /**
     * @MongoDB\Float
     */
    protected $lastKp;

    /**
     * @MongoDB\Date
     */
    protected $lastbuy;

    /**
     * @MongoDB\Date
     */
    protected $join;

    /**
     * @MongoDB\Timestamp
     */
    protected $edited;

    /**
     * @MongoDB\Timestamp
     */
    protected $change;

    /**
     * @MongoDB\String
     */
    protected $regcode;
    private $editing = false;

    /**
     * @MongoDB\Collection
     */
    protected $wishlist = array();

    /**
     * @MongoDB\Collection
     */
    protected $newroles = array();

    /**
     * @MongoDB\ReferenceMany(targetDocument="Aevitas\LevisBundle\Document\Cart", mappedBy="user")
     */
    protected $carts;

    /**
     * @MongoDB\EmbedMany(targetDocument="Aevitas\LevisBundle\Document\TrippleDate")
     */
    protected $trdate;

    /**
     * @MongoDB\String
     */
    protected $ans1;

    /**
     * @MongoDB\String
     */
    protected $ans2;

    /**
     * @MongoDB\String
     */
    protected $ans3;

    /**
     * @MongoDB\String
     */
    protected $ans4;

    /**
     * @MongoDB\String
     */
    protected $ans5;

    /**
     * @MongoDB\String
     */
    protected $ans6;

    /**
     * @MongoDB\String
     */
    protected $ans7;

    /**
     * @MongoDB\String
     */
    protected $lang;

    /**
     * @MongoDB\String
     */
    protected $refcel;

    /**
     * @MongoDB\Float
     */
    protected $used;

    public function __construct() {
        parent::__construct();
        $this->staff = new ArrayCollection();
        $this->anni = new ArrayCollection();
        $this->wishlist = array();
        $this->nlt = true;
        $this->qlf = 0;
        $this->point = 0;
        $this->level = self::SILVER;
        $this->kp = 0;
        $this->join = new \DateTime(date('Y-m-d'));
        $this->CCode = 'notyet_' . $this->generateReadableRandomString(10);
        $this->cellphone = 'notyet_' . $this->generateReadableRandomString(10);
        $this->status = true;
        $this->modifyStatusDate = new \DateTime(date('Y-m-d'));
    }

    public function getJoined() {
        return $this->join->format('Y-m-d');
    }

    public function updateJoined() {
        if (is_object($this->edited)) {
            if (is_object($this->lastbuy) && $this->edited->sec > $this->lastbuy->getTimestamp())
                $this->join = $this->lastbuy;
            else
                $this->join = new \DateTime(date('Y-m-d', $this->edited->sec));
        } else if (is_object($this->lastbuy))
            $this->join = $this->lastbuy;
        else
            $this->join = new \DateTime(date('Y-m-d'));
    }

    public function getJoin() {
        return $this->join;
    }

    public function setJoin($join) {
        $this->join = $join;
        return $this;
    }

    public function equals(UserInterface $user) {
        return
                md5($user->getUsername()) == md5($this->getUsername()) &&
                md5(serialize($user->getRoles())) == md5(serialize($this->getRoles()));
    }

    public function getRegcode() {
        if (!$this->regcode)
            $this->generateRegcode();
        return $this->regcode;
    }

    public function generateRegcode() {
        $character_set_array = array();
        $character_set_array[] = array('count' => 4, 'characters' => 'ABCDEFGHJKLMNPQRSTUVWXYZ');
        $character_set_array[] = array('count' => 4, 'characters' => '123456789');
        $temp_array = array();
        foreach ($character_set_array as $character_set) {
            for ($i = 0; $i < $character_set['count']; $i++) {
                $temp_array[] = $character_set['characters'][rand(0, strlen($character_set['characters']) - 1)];
            }
        }
        shuffle($temp_array);
        $this->regcode = implode('', $temp_array);
        return $this;
    }

    public static function getMarriageStatus($trans = null) {
        if (is_null($trans)) {
            return array(self::STATUS_SINGLE => 'Single', self::STATUS_RELATIONSHIP => 'In a Relationship', self::STATUS_MARRIAGE => 'Married', self::STATUS_SINGLEFATHER => 'Single Dad', self::STATUS_SINGLEMOM => 'Single Mom', self::STATUS_DIVORCED => 'Divorced');
        }
        return array(self::STATUS_SINGLE => $trans->trans('Single'), self::STATUS_RELATIONSHIP => $trans->trans('In a Relationship'), self::STATUS_MARRIAGE => $trans->trans('Married'), self::STATUS_SINGLEFATHER => $trans->trans('Single Dad'), self::STATUS_SINGLEMOM => $trans->trans('Single Mom'), self::STATUS_DIVORCED => $trans->trans('Divorced'));
    }

    public function getMarriageLabel() {
        $array = array(self::STATUS_SINGLE => 'Single', self::STATUS_RELATIONSHIP => 'In a Relationship', self::STATUS_MARRIAGE => 'Married', self::STATUS_SINGLEFATHER => 'Single Dad', self::STATUS_SINGLEMOM => 'Single Mom', self::STATUS_DIVORCED => 'Divorced');
        if (isset($array[$this->mari]))
            return $array[$this->mari];
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setRoles(array $roles) {
        parent::setRoles($roles);
        $this->newroles = $roles;
        return $this;
    }

    public function setNewroles(array $roles) {
        $this->newroles = $roles;
        return $this;
    }

    public function getNewroles() {
        return $this->newroles;
    }

    public function setBonusPoint(array $points) {
        $this->bonusPoint = $points;
        return $this;
    }

    public function getBonusPoint() {
        return $this->bonusPoint;
    }

    public function getRef() {
        return $this->ref;
    }

    public function setRef($ref) {
        $this->ref = $ref;
        return $this;
    }

    public function setRegcode($regcode) {
        $this->regcode = $regcode;
    }

    public function getLastEdited() {
        return $this->edited;
    }

    public function updateKeepingPoint($point, $expired = false) {
        if (!$expired)
            $this->kp += round($point);
        else
            $this->kp = $point;
        return $this;
    }

    public function getUpLevelDate() {
        return $this->uLevel;
    }

    public function setUpLevelDate($date = null) {
        if (is_null($date))
            $this->uLevel = new \DateTime('now');
        else
            $this->uLevel = $date;
        return $this;
    }

    public function getLastLogs() {
        return $this->lastlogs;
    }

    public function cropAvatar($image_width, $image_height, $source_x, $source_y) {

        $src = imagecreatefromjpeg($this->getAbsolutePath($this->avatar));
        $dest = imagecreatetruecolor($image_width, $image_height);

// Copy
        imagecopy($dest, $src, 0, 0, $source_x, $source_y, $image_width, $image_height);

        imagejpeg($dest, $this->getAbsolutePath($this->avatar));

        imagedestroy($dest);
        imagedestroy($src);
        return $this->getThumbnail(140, 140);
    }

    public function earnQualifyPoints($point) {
        $this->lastbuy = new \DateTime('now');
        $this->qlf += round($point);
        $this->point += round((float) $point);
        return $this;
    }
    //add bonus point to user
    public function earnNonQualifyPoints($point) {
        $this->point += round($point);
        return $this;
    }

    public function getLevel() {
        $labels = array(self::SILVER => 'Silver', self::PLATIN => 'Platinium', self::GOLD => 'Gold');
        if (!is_null($this->level))
            return $labels[$this->level];
        else
            return 'Silver';
    }

    public function getNextLevel(){
        if($this->getLevel() == 'Silver'){
            return 'Gold';
        }elseif ($this->getLevel() == 'Gold') {
            return 'Platinium';
        }
        return 'Platinium';
    }

    public function pointToNextLevel($point){
        if($point < 4000000){
            return 4000000 - $point;
        }elseif (4000000 <= $point && $point < 10000000) {
            return 10000000 - $point;
        }
        return 0;
    }

    public function getCurrentLevel() {
        return $this->level;
    }

    public function setCurrentLevel($level) {
        $this->setLevel($level);
        return $this;
    }

    public function getLevelExpiredDate() {
        $expired = $this->uLevel;
        if (is_object($expired))
            return $expired->add(new \DateInterval('P12M'));
        return new \DateTime('now');
    }

    public function setLevel($level) {
        $levelRange = array(self::SILVER => 'Silver', self::GOLD => 'Gold', self::PLATIN => 'Platinum');
        if (isset($levelRange[$level]))
            $this->level = $level;
        else {
            $key = array_search($level, $levelRange);
            if ($key !== false)
                $this->level = $key;
        }

        return $this;
    }

    public function levelUp() {
        if ($this->level < self::PLATIN)
            $this->level += 1;
    }

    public static function getLevelOptions($trans) {
        return array(self::SILVER => $trans->trans('Silver'), self::GOLD => $trans->trans('Gold'), self::PLATIN => $trans->trans('Platinum'));
    }

    public static function getLevelLabel($id, $trans) {
        $levelArr = self::getLevelOptions($trans);
        if (isset($levelArr[$id])) {
            return $levelArr[$id];
        }
        return '';
    }

    public function reduceQualifyPoint($point) {
        $this->point -= $point;
        $this->qlf -= $point;
        return $this;
    }

    public function getQualifyPoint() {
        return $this->qlf;
    }

    public function getLang() {
        return $this->lang;
    }

    public function setLang($lang) {
        $this->lang = $lang;
        return $this;
    }

    public function getNlt() {
        return $this->nlt;
    }

    public function setNlt($nlt) {
        $this->nlt = $nlt;
        return $this;
    }

    public function getNewsletter() {
        return $this->nlt;
    }

    public function getTotalPoint() {
        return $this->point + $this->used;
    }

    public function getUsedPoint() {
        return $this->used;
    }

    public function getPoint() {
        return $this->point;
    }

    public function setPoint($point) {
        $this->point = (int) $point;
        return $this;
    }

    public function getposId() {
        return $this->posId;
    }

    public function setposId($posid) {
        $this->posId = $posid;
        return $this;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function setFirstname($firstname, $signup = false) {
        $this->firstname = $firstname;
        if (!$this->edit['prfirstname']) {
            $this->edit['prfirstname'] = 1;
            if (!is_array($this->updated))
                $this->updated = array();
            $this->updated[] = 'firstname';
        }
        return $this;
    }

    public function getName() {
        if ($this->getLastname() == '' && $this->getFirstname() == '') {
            $email = explode('@', $this->getEmail());
            return $email[0];
        } else if ($this->getLastname() != '' && $this->getFirstname() != '')
            return $this->getFirstname() . ' ' . $this->getLastname();
        else if ($this->getFirstname() == '')
            return $this->getLastname();
        else
            return $this->getFirstname();
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function setEmail($email, $signup = false) {
        $this->email = $email;

        if (preg_match('/@/', $email) && !$this->edit['premail']) {
            $this->edit['premail'] = 1;
            if (!is_array($this->updated))
                $this->updated = array();
            $this->updated[] = 'email';
        }

        return $this;
    }

    public function setLastname($lastname, $signup = false) {
        $this->lastname = $lastname;
        if (!$this->edit['prlastname']) {
            $this->edit['prlastname'] = 1;
            if (!is_array($this->updated))
                $this->updated = array();
            $this->updated[] = 'lastname';
        }
        return $this;
    }

    public function setMiddlename($name)
    {
        $this->middlename = $name;
        return $this;
    }

    public function getMiddlename()
    {
        return $this->middlename;
    }

    public function getCellphone() {
        if (substr($this->cellphone, 0, 6) == 'notyet')
            return '';
        return $this->cellphone;
    }

    public function setCellphone($cellphone) {
        $zero = substr($cellphone, 0, 1);
        if ($zero !== "0")
            $cellphone = "0" . $cellphone;
        $this->cellphone = $cellphone;
        if (!$this->edit['prfone']) {
            $this->edit['prfone'] = 1;
            if (!is_array($this->updated))
                $this->updated = array();
            $this->updated[] = 'fone';
        }

        return $this;
    }

    public function setPhone($phone) {
        $this->cellphone = $phone;
        return $this;
    }

    public function getPhone() {
        return $this->cellphone;
    }

    public static function getSexOptions($trans) {
        return array(self::FEMALE => $trans->trans('Female'), self::MALE => $trans->trans('Male'));
    }

    public function getSexLabel() {
        $array = array(self::FEMALE => 'Female', self::MALE => 'Male');
        if (isset($array[$this->sex]))
            return $array[$this->sex];
    }

    public function getDistrict() {
        return $this->district;
    }

    public function setDistrict($district, $signup = false) {
        $this->district = $district;
        if (!$this->edit['prdistrict']) {
            $this->edit['prdistrict'] = 1;
            if (!is_array($this->updated))
                $this->updated = array();
            $this->updated[] = 'district';
        }
        return $this;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city, $signup = false) {
        $this->city = $city;
        if (!$this->edit['prcity']) {
            $this->edit['prcity'] = 1;
            if (!is_array($this->updated))
                $this->updated = array();
            $this->updated[] = 'city';
        }
        return $this;
    }

    /**
     * Set posts
     * @param int $posts
     */
    public function setPosts($posts) {
        $this->posts = $posts;
        return $this;
    }

    /**
     * Get posts
     *
     * @return int $posts
     */
    public function getPosts() {
        return $this->posts;
    }

    /**
     * Set age
     *
     * @param int $age
     */
    public function setAge($age) {
        $this->age = $age;
        return $this;
    }

    /**
     * Get age
     *
     * @return int $age
     */
    public function getAge() {
        return $this->age;
    }

    /**
     * Set fbid
     *
     * @param string $fbid
     */
    public function setFbid($fbid) {
        $this->fbid = $fbid;
        $this->avatar = $fbid . '.jpg';
        return $this;
    }

    public function updateFbAvatar() {
        $fbid = $this->fbid;
        if ($this->avatar != '') {
            $extract = explode('.', $this->avatar);
            $image = str_replace('.' . end($extract), '', $this->avatar);
            FolderComponent::removeFileName($image . '*', $this->getUploadRootDir());
        }
        try {
            $savefile = $this->getAbsolutePath($fbid . '.jpg');
            $img = imagecreatefromjpeg('https://graph.facebook.com/' . $fbid . '/picture?type=large');
            imagejpeg($img, $savefile);
        } catch (\Exception $e) {
            $savefile = $this->getAbsolutePath($fbid . '.gif');
            $img = imagecreatefromjpeg('https://graph.facebook.com/' . $fbid . '/picture?type=large');
            imagejpeg($img, $savefile);
        }
        if ($img)
            imagedestroy($img);
    }

    private $adding = false;

    public function setAddingProfile() {
        $this->adding = true;
    }

    public function isAddingProfile() {
        return $this->adding;
    }

    public function setEditing() {
        $this->editing = true;
        return $this;
    }

    public function isEditing() {
        return $this->editing;
    }

    private function cropImage($image, $dest_image, $wsize = 64, $hsize = 64, $jpg_quality = 90) {
        $imageHelper = new ImageHelper($image);
        $imageHelper->resizeImage($dest_image, $wsize, $hsize, 'crop');
    }

    public function getThumbnail($w = 64, $h = 64, $image = null) {
        if (is_null($image)) {
            $image = $this->avatar;
        }
        if (!is_null($image) && '' != $image) {
            $extract = explode('.', $image);
            $image = str_replace('.' . end($extract), '', $image);
            $ext = end($extract);
            if (!file_exists($this->getAbsolutePath($image . '_' . $w . 'x' . $h . '.' . $ext)))
                if (file_exists($this->getAbsolutePath($image . '.' . $ext)))
                    $this->cropImage($this->getAbsolutePath($image . '.' . $ext), $this->getAbsolutePath($image . '_' . $w . 'x' . $h . '.' . $ext), $w, $h);
            return $this->getWebPath($image . '_' . $w . 'x' . $h . '.' . $ext);
        } else
            return '/images/noavatar.jpg';
    }

    /**
     * Get fbid
     *
     * @return string $fbid
     */
    public function getFbid() {
        return $this->fbid;
    }

    /**
     * Set glid
     *
     * @param string $glid
     */
    public function setGlid($glid) {
        $this->glid = $glid;
        return $this;
    }

    /**
     * Get glid
     *
     * @return string $glid
     */
    public function getGlid() {
        return $this->glid;
    }

    /**
     * Set about
     *
     * @param string $about
     */
    public function setAbout($about) {
        $this->about = $about;
        return $this;
    }

    /**
     * Get about
     *
     * @return string $about
     */
    public function getAbout() {
        return $this->about;
    }

    public function getRefcel() {
        return $this->refcel;
    }

    public function setRefcel($refcel) {
        $this->refcel = $refcel;
        return $this;
    }

    /**
     * Set dob
     *
     * @param date $dob
     */
    public function setDob($dob, $signup = false) {
        $this->dob = $dob;
        if (!$this->edit['prdob'] && $dob != null) {
            $this->edit['prdob'] = 1;
            if (!is_array($this->updated))
                $this->updated = array();
            $this->updated[] = 'dob';
        }
        return $this;
    }

    /**
     * Get dob
     *
     * @return date $dob
     */
    public function getDob() {
        return $this->dob;
    }

    /**
     * Get dob
     *
     * @return date $dob as string
     */
    public function getDobAsString() {
        $result = date('m-d-Y',$this->dob->getTimestamp());
        return $result;
    }

    public function getEditedFields() {
        return $this->edit;
    }

    /**
     * Set sex
     *
     * @param string $sex
     */
    public function setSex($sex, $signup = false) {

        $array = array(self::FEMALE => 'Female', self::MALE => 'Male');
        if (isset($array[$sex]))
            $this->sex = $sex;
        else {
            $key = array_search($sex, $array);
            if ($key !== false)
                $this->sex = $key;
        }
        if (!$this->edit['prsex']) {
            $this->edit['prsex'] = 1;
            if (!is_array($this->updated))
                $this->updated = array();
            $this->updated[] = 'sex';
        }
        return $this;
    }

    /**
     * Get sex
     *
     * @return string $sex
     */
    public function getSex() {
        return $this->sex;
    }

    /**
     * Add logs
     *
     * @param Vietland\AevitasBundle\Document\Log $logs
     */
    public function addLogs(\Vietland\AevitasBundle\Document\Log $logs) {
        $this->logs[] = $logs;
    }

    /**
     * Get logs
     *
     * @return Doctrine\Common\Collections\Collection $logs
     */
    public function getLogs() {
        return $this->logs;
    }

    /**
     * Set cropped
     *
     * @param string $cropped
     * @return \User
     */
    public function setCropped($cropped) {
        $this->cropped = $cropped;
        return $this;
    }

    /**
     * Get cropped
     *
     * @return string $cropped
     */
    public function getCropped() {
        return $this->cropped;
    }

    /**
     * get the User's home directory
     *
     * @return string
     */
    public function getHomeDirectory() {
        $physicalWebDir = getcwd();

        return $physicalWebDir . 'media' . DIRECTORY_SEPARATOR . 'avatar' . DIRECTORY_SEPARATOR . $this->getId();
    }

    public function getHomeDirectoryUrl() {
        $physicalWebDir = getcwd();

        return str_replace(
                $physicalWebDir, '', $this->getHomeDirectory()
        );
    }

    /**
     * get the avatar
     *
     * @return string
     */
    public function getAvatar() {
        return $this->getWebPath($this->avatar);
    }

    /**
     * set the avatar
     *
     * @param string $avatar
     */
    public function setAvatar($avatar) {
        if ($this->avatar != '') {
            $extract = explode('.', $this->avatar);
            $image = str_replace('.' . end($extract), '', $this->avatar);
            FolderComponent::removeFileName($image . '*', $this->getUploadRootDir());
        }
        $this->avatar = $avatar;
        return $this;
    }

    public function getAvatarUpload() {
        return $this->avatarUpload;
    }

    public function setAvatarUpload($avatarUpload) {
        $this->avatarUpload = $avatarUpload;
        if (is_object($this->avatarUpload)) {
            $this->avatar = $this->getHomeDirectoryUrl() . DIRECTORY_SEPARATOR . $this->avatarUpload->getClientOriginalName();
            $this->avatarUpload->move($this->getHomeDirectoryUrl(), $this->avatarUpload->getClientOriginalName());
            //$this->cropImage($this->getAbsolutePath($this->avatar), $this->getAbsolutePath(50 . 'x' . 50 . '_' . $this->img), 50, 50);
            unset($this->avatarUpload);
        }
    }

    public function getAbsolutePath($file) {
        return null === $file ? null : $this->getUploadRootDir() . '/' . $file;
    }

    public function getWebPath($file) {
        $dir = str_replace(DIRECTORY_SEPARATOR, '/', $this->getUploadDir());
        return null === $file ? null : $dir . DIRECTORY_SEPARATOR . $file;
    }

    protected function getUploadRootDir() {
        // the absolute directory path where uploaded documents should be saved
        if (!file_exists(getcwd() . DIRECTORY_SEPARATOR . $this->getUploadDir()))
            @mkdir(getcwd() . DIRECTORY_SEPARATOR . $this->getUploadDir());
        return getcwd() . DIRECTORY_SEPARATOR . $this->getUploadDir();
    }

    public function getMediaDir() {
        return __DIR__ . '/../../../../web';
    }

    protected function getUploadDir() {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'media' . DIRECTORY_SEPARATOR . 'users' . DIRECTORY_SEPARATOR . $this->getId();
    }

    /**
     * set the avatarCoords
     *
     *  @param array $coords
     */
    public function setAvatarCoords($coords) {
        if (!is_array($coords))
            $coords = array($coords);

        $this->avatarCoords = serialize($coords);
    }

    /**
     * get the avatarCoords
     *
     * @return array
     */
    public function getAvatarCoords() {
        if (!$this->avatarCoords)
            return array();

        return unserialize($this->avatarCoords);
    }

    public function setAddress1($address, $signup = false) {
        $this->address1 = $address;
        if (!$this->edit['praddress1']) {
            $this->edit['praddress1'] = 1;
            if (!is_array($this->updated))
                $this->updated = array();
            $this->updated[] = 'address1';
        }
        return $this;
    }

    public function getAddress1() {
        return $this->address1;
    }

    public function setAddress2($address) {
        $this->address2 = $address;
        return $this;
    }

    public function getAddress2() {
        return $this->address2;
    }

    public function setDship($dship) {
        $this->dship = $dship;
        return $this;
    }

    public function getDship() {
        return $this->dship;
    }

    public function setAddress3($address) {
        $this->address3 = $address;
        return $this;
    }

    public function getAddress3() {
        return $this->address3;
    }

    public function setCommonname($name) {
        $this->commonname = $name;
        return $this;
    }

    public function getCommonname() {
        return $this->commonname;
    }

    public function setState($state) {
        $this->state = $state;
        return $this;
    }

    public function getState() {
        return $this->state;
    }

    public function setFax($fax) {
        $this->fax = $fax;
        return $this;
    }

    public function getFax() {
        return $this->fax;
    }

    public function setBrand($brand) {
        $this->brand = $brand;
        return $this;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function setAniversary($aniversary) {
        $this->aniversary = $aniversary;
        return $this;
    }

    public function getAniversary() {
        return $this->aniversary;
    }

    public function setAccountid($accountid) {
        $this->accountid = $accountid;
        return $this;
    }

    public function getAccountid() {
        return $this->accountid;
    }

    public function setAccounttype($accounttype) {
        $this->accounttype = $accounttype;
        return $this;
    }

    public function getAccounttype() {
        return $this->accounttype;
    }

    public function getMari() {
        return $this->mari;
    }

    public function setMari($mari, $signup = false) {
        $this->mari = $mari;
        if (!$this->edit['prmari']) {
            $this->edit['prmari'] = 1;
            if (!is_array($this->updated))
                $this->updated = array();
            $this->updated[] = 'mari';
        }
        return $this;
    }

    public function getKids() {
        return $this->kids;
    }

    public function setKids($kids, $signup = false) {
        $this->kids = $kids;
        if (!$this->edit['prkids']) {
            $this->edit['prkids'] = 1;
            if (!is_array($this->updated))
                $this->updated = array();
            $this->updated[] = 'kids';
        }
        return $this;
    }

    public function getOcpu() {
        return $this->ocpu;
    }

    public function setOcpu($ocpu, $signup = false) {
        $occupations = array(
            '1' => 'Student',
            '2' => 'Business Owner',
            '3' => 'Government Officer',
            '4' => 'Official of Multinational Company',
            '5' => 'NGO Official',
        );
        if (isset($occupations[$ocpu]))
            $this->ocpu = $ocpu;
        else {
            $key = array_search($ocpu, $occupations);
            if ($key !== false)
                $this->ocpu = $key;
        }
        if (!$this->edit['procpu']) {
            $this->edit['procpu'] = 1;
            if (!is_array($this->updated))
                $this->updated = array();
            $this->updated[] = 'ocpu';
        }
        return $this;
    }

    public function getInco() {
        return $this->inco;
    }

    public function setInco($inco, $signup = false) {
        $incomes = array(
            '5' => '1 - 5 million VND',
            '10' => '5 - 10 million VND',
            '20' => '10 - 20 million VND',
            '30' => '20 - 30 million VND',
            '40' => '30 - 40 million VND',
            '50' => '40 - 50 million VND',
            '60' => '50 - 60 million VND',
            '70' => '60 - 70 million VND',
            '80' => '70 - 80 million VND',
            '90' => '80 - 90 million VND',
            '100' => '90 - 100 million VND',
            '101' => '>100 million VND',
        );
        if (isset($incomes[$inco]))
            $this->inco = $inco;
        else {
            $key = array_search($inco, $incomes);
            if ($key !== false)
                $this->inco = $key;
        }
        if (!$this->edit['princo']) {
            $this->edit['princo'] = 1;
            if (!is_array($this->updated))
                $this->updated = array();
            $this->updated[] = 'inco';
        }
        return $this;
    }

    public function getIncomeLabel() {
        $incomes = array(
            '5' => '1 - 5 million VND',
            '10' => '5 - 10 million VND',
            '20' => '10 - 20 million VND',
            '30' => '20 - 30 million VND',
            '40' => '30 - 40 million VND',
            '50' => '40 - 50 million VND',
            '60' => '50 - 60 million VND',
            '70' => '60 - 70 million VND',
            '80' => '70 - 80 million VND',
            '90' => '80 - 90 million VND',
            '100' => '90 - 100 million VND',
            '101' => '>100 million VND',
        );
        if (isset($incomes[$this->inco]))
            return $incomes[$this->inco];
    }

    public function getOccupationLabel() {
        $occupations = array(
            '1' => 'Student',
            '2' => 'Business Owner',
            '3' => 'Government Officer',
            '4' => 'Official of Multinational Company',
            '5' => 'NGO Official',
        );
        if (isset($occupations[$this->ocpu]))
            return $occupations[$this->ocpu];
    }

    static function getRoleOptions($trans) {
        return array(self::ROLE_ADMIN => 'Admin', self::ROLE_USER => 'User', self::ROLE_REPORT => 'Report', self::ROLE_STAFF => 'Store Staff Memember', self::ROLE_POINT => 'Manage Point', self::ROLE_GIFT => 'Manage Gift', self::ROLE_STORE => 'Manage Store Information');
    }

    public function addStaff(Group $staff) {
        if ($this->staff instanceof ArrayCollection) {
            $exist = false;
            $this->staff->map(function($gr)use(&$exist, $staff) {
                if ($gr->getId() == $staff->getId())
                    $exist = true;
            });
            if (!$exist)
                $this->staff->add($staff);
        }
    }

    public function removeStaff(Group $staff) {
        $exist = false;
        if ($this->staff instanceof ArrayCollection) {
            $this->staff->map(function($gr)use(&$exist, $staff) {
                if ($gr->getId() == $staff->getId())
                    $exist = true;
            });
        }
        if ($exist)
            $this->staff->removeElement($staff);
    }

    public function getStoreId() {
        return $this->storeId;
    }

    public function setStoreId($storeId) {
        $this->storeId = $storeId;
        return $this;
    }

    public function setLedgerID($id) {
        $this->posId = (int) $id;
        return $this;
    }

    public function getLedgerID() {
        return $this->posId;
    }

    public function saveAnniversary(Anniversary $anni) {
        $getpoint = false;
        if (!$anni->getId()) {
            $this->edit['pranni'] = $this->edit['pranni'] + 1;
            if (!is_array($this->updated))
                $this->updated = array();
            if ($this->edit['pranni'] == 1)
                $this->updated[] = 'anni';
            return $this->addAnniversary($anni);
        } else {
            $this->anni->map(function($r)use($anni, &$getpoint) {
                if ($r->getId() == $anni->getId()) {
                    if ('' == $r->getName() && $anni->getName() != '')
                        $getpoint = true;
                    $vars = array_filter(get_object_vars($anni));
                    foreach ($vars as $prop => $value)
                        $r->$prop = $value;
                }
            });
        }
        if ($getpoint) {
            $this->edit['pranni'] = $this->edit['pranni'] + 1;
            if (!is_array($this->updated))
                $this->updated = array();
            if ($this->edit['pranni'] == 1)
                $this->updated[] = 'anni';
        }
        return true;
    }

    public function getAnniversary() {
        if (!is_object($this->anni) || (is_object($this->anni) && !$this->anni->count())) {
            $this->addAnniversary();
        }
        return $this->anni;
    }

    public function getLastAnniversary() {
        return $this->anni->offsetGet($this->anni->count() - 1);
    }

    public function getTripleDate() {
        $count = $this->getTrippleDateLimit() - $this->trdate->count();
        for ($i = 0; $i < $count; $i++)
            $this->addTrippleDate();
        return $this->trdate;
    }

    public function getLastTripleDate() {
        return $this->trdate->offsetGet($this->trdate->count() - 1);
    }

    public function saveTripleDate($date) {
        return $this->addTrippleDate($date);
    }

    public function addAnniversary($anni = null) {
        if (!is_object($this->anni))
            $this->anni = new ArrayCollection ();
        if ($this->anni->count() < 5) {
            if (is_null($anni))
                $this->anni->add(new Anniversary());
            else
                $this->anni->add($anni);
            return true;
        } else
            return false;
    }

    public function addTrippleDate($date = null) {
        if (!is_object($this->trdate))
            $this->trdate = new ArrayCollection ();
        if ($this->trdate->count() <= $this->getTrippleDateLimit()) {
            if (is_null($date))
                $this->trdate->add(new \Aevitas\LevisBundle\Document\TrippleDate());
            else if (!(int) $date->getId())
                $this->trdate->add($date);
            else {
                $this->trdate->map(function($r)use($date) {
                    if ($r->getId() == $date->getId()) {
                        $vars = array_filter(get_object_vars($date));
                        if ($r->isEditable())
                            foreach ($vars as $prop => $value)
                                $r->$prop = $value;
                    }
                });
            }
            return true;
        } else
            return false;
    }

    public function isTripleDay() {
        $now = new \DateTime('now');
        $checking = false;

        if (is_object($this->trdate)) {
            $this->trdate->map(function($d) use(&$checking, $now) {
                if (date('m', $d->date->getTimestamp()) == date('m', $now->getTimestamp()) &&
                    date('d', $d->date->getTimestamp()) == date('d', $now->getTimestamp())) {
                    $checking = true;
                }
            });
        }

        return $checking;
    }

    public function getTrippleDateLimit() {
        if (!is_object($this->trdate))
            $this->trdate = new ArrayCollection ();
        $limit = array(self::SILVER => 2, self::GOLD => 3, self::PLATIN => 5);
        return $limit[$this->level];
    }

    public function getWishlist($dm) {
        $gifts = $dm->createQueryBuilder('AevitasLevisBundle:GiftArticle')->field('id')->in($this->wishlist)->sort('point', 'asc')->getQuery()->execute();

        return $gifts;
    }

    public function addWishList($gift = null) {
        if ($gift) {
            $this->wishlist[] = $gift;
        }
        return true;
    }

    public function getWishlistIds() {
        return $this->wishlist;
    }

    public function hasGiftInWishList($gift) {
        if (!in_array($gift, $this->wishlist))
            return false;
        return true;
    }

    public function getUpdatedFields() {
        if (is_array($this->updated))
            return $this->updated;
        else
            return array();
    }

    public function getCCode() {
        if (preg_match('/notyet/', $this->CCode))
            return '';
        return $this->CCode;
    }

    public function setCCode($CCode) {
        $this->CCode = $CCode;
        return $this;
    }

    /**
     * @todo Update the point for fillup profile
     * @param type $config
     * @return type
     */
    public function getUpdatedPoints($config) {
        $points = 0;
        foreach ($this->updated as $key) {
            $points += $config[$key];
        }
        $this->point += round($points);
        $this->increasePoint = $points;
        return $points;
    }

    public function turnLevelDown() {
//        if ($this->level > 1) {
//            $this->level -= 1;
//            $this->uLevel = new \DateTime('now');
//            $this->kp = 0;
//        }
        return $this;
    }

    public function turnLevelUp($level = null) {
        if ($this->level < self::PLATIN) {
            if (is_null($level))
                $this->level += 1;
            else
                $this->level = $level;
            $this->uLevel = new \DateTime('now');
            $this->kp = $this->lastKp;
        }
    }

    public function setUpLevel($date) {
        $this->uLevel = $date->add(new \DateInterval('P12M'));
    }

    public function isLevelExpired() {
        if (!is_object($this->uLevel)) {
            $now = new \DateTime('now');
            $this->uLevel = $now;
        }
        $lastTime = clone $this->uLevel;
        $nextTime = $lastTime->add(new \DateInterval('P12M'));
        $now = new \DateTime('now');
        if ($nextTime->getTimestamp() >= $now->getTimestamp()) {
            return false;
        } else
            return true;
    }

    public function redeemPoint($point) {
        if ((float) $point < 1) {
            return false;
        }
        $bonuspoint = $this->getBonusPoints();
        if ($point <= ($this->point + $bonuspoint)) {
            if ($bonuspoint) {
                if ($point >= $bonuspoint)
                    $point = $point - $bonuspoint;
                else {
                    $this->bonuspoints = $bonuspoint - $point;
                    $point = 0;
                }
            } else
                $this->bonuspoints = 0;
            $this->point = $this->point - (float) $point;
            $this->used += (float) $point;
            return true;
        } else
            return false;
    }

    public function getBonusPoints() {
        if (is_object($this->bonusexpired)) {
            $now = new \DateTime('now');
            if ($now->getTimestamp() >= $this->bonusexpired->getTimestamp())
                return 0;
            else
                return $this->bonuspoints;
        }
        return 0;
    }

    public function setBonusPoints($point) {
        if (!$this->getBonusPoints())
            $this->bonuspoints = (int) $point;
        return $this;
    }

    public function setBonusexpired($bonusexpired) {
        $this->bonusexpired = new \DateTime($bonusexpired);
        return $this;
    }

    public function getKeepingPoint() {
        return $this->kp;
    }

    public function setQualifyPoint($point) {
        $this->qlf = $point;
        return $this;
    }

    /**
     * @MongoDB\PrePersist
     */
    public function prePersist() {
        $log = new UserLog();
        $log->setAction(UserLog::SIGNUP)->setSubject($this->getUsername())->setUser($this);
        AevitasLogger::setLog($log);
        $stringarray = array();
        array_map(function($i)use(&$stringarray) {
            $stringarray[] = (int) $i;
        }, $this->edit);
        $this->edt = implode('-', $stringarray);
        $this->change = time();
        if (is_array($this->getUpdatedFields())) {
            $log = new UserLog();
            $log->setAction(UserLog::UPDATE_PROFILE)->setSubject($this->increasePoint)->setUser($this)->setPoint((int) $this->increasePoint);
            AevitasLogger::setLog($log);
        }
    }

    /**
     * @MongoDB\PostUpdate
     * @MongoDB\PreUpdate
     */
    public function postUpdate() {
        $stringarray = array();
        $this->change = time();
        array_map(function($i)use(&$stringarray) {
            $stringarray[] = (int) $i;
        }, $this->edit);
        $edt = implode('-', $stringarray);
        if (is_array($this->getUpdatedFields())) {
            $this->edt = $edt;
            $log = new UserLog();
            $log->setAction(UserLog::UPDATE_PROFILE)->setSubject($this->increasePoint)->setUser($this)->setPoint((int) $this->increasePoint);
            AevitasLogger::setLog($log);
        }
    }

    /**
     * @MongoDB\PostLoad
     */
    public function postLoad() {
        if (preg_match('/@thanbacgroup.com/', $this->email))
            $this->email = str_replace('@thanbacgroup.com', '', $this->email);
        $this->edit = array('praddress1' => 0, 'prdob' => 0, 'pranniversary' => 0,
            'prcity' => 0, 'prdistrict' => 0, 'prfirstname' => 0, 'prlastname' => 0, 'prsex' => 0,
            'prmari' => 0, 'procpu' => 0, 'princo' => 0, 'prkids' => false, 'prfone' => 0, 'premail' => 0, 'pranni' => 0);
        if ($this->edt != '') {
            $extract = explode('-', $this->edt);
            $index = 0;
            foreach ($this->edit as $key => $value) {
                if (isset($extract[$index]))
                    $this->edit[$key] = (int) $extract[$index];
                else
                    $this->edit[$key] = 0;
                $index++;
            }
        }
        if (is_object($this->lastbuy)) {
            $diff = $this->lastbuy->diff(new \DateTime('now'));
            if ($diff->days > 0)
                $this->lastKp = 0;
        } else
            $this->lastKp = 0;
    }

    public function getLastbuy() {
        return $this->lastbuy;
    }

    public function resetEditedField() {
        $this->point = 0;
        $this->edit = array('praddress1' => 0, 'prdob' => 0, 'pranniversary' => 0,
            'prcity' => 0, 'prdistrict' => 0, 'prfirstname' => 0, 'prlastname' => 0, 'prsex' => 0,
            'prmari' => 0, 'procpu' => 0, 'princo' => 0, 'prkids' => false, 'prfone' => 0, 'premail' => 0, 'pranni' => 0);
    }

    public function isPassedBasic() {
        if (count($this->edit) > 3)
            return true;
        return false;
    }

    public function isAnniversaryToday() {
        if (is_object($this->anni)) {
            foreach ($this->anni as $anni) {
                if (date('d', $anni->getDate()->getTimestamp()) == date('d')) {
                    return $anni;
                }
            }
        }
        return;
    }

    public function isBirthDayToday() {
        if (is_object($this->dob)) {
            $today = $this->dob;
            $month = date("m", $today->getTimestamp());
            if (date('m') == $month)
                return true;
        }
        return false;
    }

    /**
    * @param the bill date need to check(Date)
    */
    public function isBillInBirthMonth($billdate) {
        if (is_object($this->dob)) {
            $today = $this->dob;
            $month = date("m", $today->getTimestamp());

            $bill_month = date("m",$billdate->getTimestamp());
            if ($bill_month == $month)
                return true;
        }
        return false;
    }

    public function getAns1() {
        return $this->ans1;
    }

    public function setAns1($ans1) {
        $this->ans1 = $ans1;
    }

    public function getAns2() {
        if (is_string($this->ans2))
            return unserialize($this->ans2);
        else
            return array();
    }

    public function setAns2($ans2) {
        if (is_array($ans2))
            $this->ans2 = serialize($ans2);
        if (is_string($ans2)) {
            $htis->ans2 = serialize(array_filter(explode('|', $ans2)));
        }
        return $this;
    }

    public function getAns3() {
        if (is_string($this->ans3))
            return unserialize($this->ans3);
        else
            return array();
    }

    public function setAns3($ans3) {
        if (is_array($ans3))
            $this->ans3 = serialize($ans3);
        if (is_string($ans3)) {
            $htis->ans3 = serialize(array_filter(explode('|', $ans3)));
        }
        return $this;
    }

    public function getAns4() {
        return $this->ans4;
    }

    public function setAns4($ans4) {
        $this->ans4 = $ans4;
    }

    public function getAns5() {
        return $this->ans5;
    }

    public function setAns5($ans5) {
        $this->ans5 = $ans5;
    }

    public function getAns6() {
        return $this->ans6;
    }

    public function setAns6($ans6) {
        $this->ans6 = $ans6;
    }

    public function getAns7() {
        if (is_string($this->ans7))
            return $this->ans7;
        else
            return '';
    }

    public function setAns7($ans7) {
        $this->ans7 = $ans7;
    }

    public function getKidsLabel() {
        $kids = array('0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '+4');
        if (isset($kids[$this->kids]))
            return $kids[$this->kids];
    }

    public function getReportAttributes() {
        $anniversaries = array();
        foreach ($this->anni as $anni) {
            $anniversaries[] = $anni->getName();
        }
        return array('Card No' => $this->getCCode(), 'POS ID' => $this->getposId(), 'firstname' => $this->getFirstname(), 'lastname' => $this->getLastname(),
            'cellphone' => $this->getCellphone(), 'birthday' => $this->getDob() ? $this->getDob()->format('m-d-Y') : 'null', 'join' => $this->getJoined(),
            'email' => $this->getEmail(), 'gender' => $this->getSexLabel(), 'address' => $this->getAddress1(),
            'marital_status' => $this->getMarriageLabel(), 'child_status' => $this->getKidsLabel(),
            'occupation' => $this->getOccupationLabel(), 'income' => $this->getIncomeLabel(), 'anniversaries' => implode(' | ', array_filter($anniversaries)),
            'top_3websites' => $this->getAns1(), 'communication_tool' => implode(' | ', $this->getAns2()),
            'favorite_brand' => implode(' | ', $this->getAns3()), 'total_jeans' => $this->getAns4(),
            'jeans_year' => $this->getAns5(), 'top_jeans_brand' => $this->getAns6(), 'favorite_fit_jean' => $this->getAns7(), 'city' => false, 'district' => false, 'percent_fulfill' => 0);
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($boolean)
    {
        $this->status = (Boolean) $boolean;

        return $this;
    }

    /**
     * Set ModifyStatusDate
     *
     * @param date $modifyStatusDate
     */
    public function setModifyStatusDate() {
         $this->modifyStatusDate = new \DateTime(date('Y-m-d'));
        
        return $this;
    }

    /**
     * Get modifyStatusDate
     *
     * @return date $modifyStatusDate
     */
    public function getModifyStatusDate() {
        return $this->modifyStatusDate;
    }

    public function setReason($reason) {
        $this->reason = $reason;
        return $this;
    }

    public function getReason() {
        return $this->reason;
    }

    private function generateReadableRandomString($length = 12) {
        $characters = '23456789ABCDEFGHJKLMNPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public function __get($name) {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        return;
    }

    public function __call($method, $args) {
        $key = '_' . strtolower(substr($method, 3, 1)) . substr($method, 4);
        $value = isset($args[0]) ? $args[0] : null;
        switch (substr($method, 0, 3)) {
            case 'get':
                if (property_exists($this, $key)) {
                    return $this->$key;
                }
                break;

            case 'set':
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                    return $this;
                }
                break;

            case 'has':
                return property_exists($this, $key);
                break;
        }
    }

    }
