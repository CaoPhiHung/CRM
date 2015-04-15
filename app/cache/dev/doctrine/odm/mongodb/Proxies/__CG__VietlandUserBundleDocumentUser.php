<?php

namespace MongoDBODMProxies\__CG__\Vietland\UserBundle\Document;

use Doctrine\ODM\MongoDB\Persisters\DocumentPersister;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ODM. DO NOT EDIT THIS FILE.
 */
class User extends \Vietland\UserBundle\Document\User implements \Doctrine\ODM\MongoDB\Proxy\Proxy
{
    private $__documentPersister__;
    public $__identifier__;
    public $__isInitialized__ = false;
    public function __construct(DocumentPersister $documentPersister, $identifier)
    {
        $this->__documentPersister__ = $documentPersister;
        $this->__identifier__ = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->__documentPersister__) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->__documentPersister__->load($this->__identifier__, $this) === null) {
                throw \Doctrine\ODM\MongoDB\DocumentNotFoundException::documentNotFound(get_class($this), $this->__identifier__);
            }
            unset($this->__documentPersister__, $this->__identifier__);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function getJoined()
    {
        $this->__load();
        return parent::getJoined();
    }

    public function updateJoined()
    {
        $this->__load();
        return parent::updateJoined();
    }

    public function getJoin()
    {
        $this->__load();
        return parent::getJoin();
    }

    public function setJoin($join)
    {
        $this->__load();
        return parent::setJoin($join);
    }

    public function equals(\FOS\UserBundle\Model\UserInterface $user)
    {
        $this->__load();
        return parent::equals($user);
    }

    public function getRegcode()
    {
        $this->__load();
        return parent::getRegcode();
    }

    public function generateRegcode()
    {
        $this->__load();
        return parent::generateRegcode();
    }

    public function getMarriageLabel()
    {
        $this->__load();
        return parent::getMarriageLabel();
    }

    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return $this->__identifier__;
        }
        $this->__load();
        return parent::getId();
    }

    public function setId($id)
    {
        $this->__load();
        return parent::setId($id);
    }

    public function setRoles(array $roles)
    {
        $this->__load();
        return parent::setRoles($roles);
    }

    public function setNewroles(array $roles)
    {
        $this->__load();
        return parent::setNewroles($roles);
    }

    public function getNewroles()
    {
        $this->__load();
        return parent::getNewroles();
    }

    public function getRef()
    {
        $this->__load();
        return parent::getRef();
    }

    public function setRef($ref)
    {
        $this->__load();
        return parent::setRef($ref);
    }

    public function setRegcode($regcode)
    {
        $this->__load();
        return parent::setRegcode($regcode);
    }

    public function getLastEdited()
    {
        $this->__load();
        return parent::getLastEdited();
    }

    public function updateKeepingPoint($point, $expired = false)
    {
        $this->__load();
        return parent::updateKeepingPoint($point, $expired);
    }

    public function getUpLevelDate()
    {
        $this->__load();
        return parent::getUpLevelDate();
    }

    public function setUpLevelDate($date = NULL)
    {
        $this->__load();
        return parent::setUpLevelDate($date);
    }

    public function getLastLogs()
    {
        $this->__load();
        return parent::getLastLogs();
    }

    public function cropAvatar($image_width, $image_height, $source_x, $source_y)
    {
        $this->__load();
        return parent::cropAvatar($image_width, $image_height, $source_x, $source_y);
    }

    public function earnQualifyPoints($point)
    {
        $this->__load();
        return parent::earnQualifyPoints($point);
    }

    public function earnNonQualifyPoints($point)
    {
        $this->__load();
        return parent::earnNonQualifyPoints($point);
    }

    public function getLevel()
    {
        $this->__load();
        return parent::getLevel();
    }

    public function getCurrentLevel()
    {
        $this->__load();
        return parent::getCurrentLevel();
    }

    public function setCurrentLevel($level)
    {
        $this->__load();
        return parent::setCurrentLevel($level);
    }

    public function getLevelExpiredDate()
    {
        $this->__load();
        return parent::getLevelExpiredDate();
    }

    public function setLevel($level)
    {
        $this->__load();
        return parent::setLevel($level);
    }

    public function levelUp()
    {
        $this->__load();
        return parent::levelUp();
    }

    public function reduceQualifyPoint($point)
    {
        $this->__load();
        return parent::reduceQualifyPoint($point);
    }

    public function getQualifyPoint()
    {
        $this->__load();
        return parent::getQualifyPoint();
    }

    public function getLang()
    {
        $this->__load();
        return parent::getLang();
    }

    public function setLang($lang)
    {
        $this->__load();
        return parent::setLang($lang);
    }

    public function getNlt()
    {
        $this->__load();
        return parent::getNlt();
    }

    public function setNlt($nlt)
    {
        $this->__load();
        return parent::setNlt($nlt);
    }

    public function getNewsletter()
    {
        $this->__load();
        return parent::getNewsletter();
    }

    public function getTotalPoint()
    {
        $this->__load();
        return parent::getTotalPoint();
    }

    public function getUsedPoint()
    {
        $this->__load();
        return parent::getUsedPoint();
    }

    public function getPoint()
    {
        $this->__load();
        return parent::getPoint();
    }

    public function setPoint($point)
    {
        $this->__load();
        return parent::setPoint($point);
    }

    public function getposId()
    {
        $this->__load();
        return parent::getposId();
    }

    public function setposId($posid)
    {
        $this->__load();
        return parent::setposId($posid);
    }

    public function getFirstname()
    {
        $this->__load();
        return parent::getFirstname();
    }

    public function setFirstname($firstname, $signup = false)
    {
        $this->__load();
        return parent::setFirstname($firstname, $signup);
    }

    public function getName()
    {
        $this->__load();
        return parent::getName();
    }

    public function getLastname()
    {
        $this->__load();
        return parent::getLastname();
    }

    public function setEmail($email, $signup = false)
    {
        $this->__load();
        return parent::setEmail($email, $signup);
    }

    public function setLastname($lastname, $signup = false)
    {
        $this->__load();
        return parent::setLastname($lastname, $signup);
    }

    public function setMiddlename($name)
    {
        $this->__load();
        return parent::setMiddlename($name);
    }

    public function getMiddlename()
    {
        $this->__load();
        return parent::getMiddlename();
    }

    public function getCellphone()
    {
        $this->__load();
        return parent::getCellphone();
    }

    public function setCellphone($cellphone)
    {
        $this->__load();
        return parent::setCellphone($cellphone);
    }

    public function setPhone($phone)
    {
        $this->__load();
        return parent::setPhone($phone);
    }

    public function getPhone()
    {
        $this->__load();
        return parent::getPhone();
    }

    public function getSexLabel()
    {
        $this->__load();
        return parent::getSexLabel();
    }

    public function getDistrict()
    {
        $this->__load();
        return parent::getDistrict();
    }

    public function setDistrict($district, $signup = false)
    {
        $this->__load();
        return parent::setDistrict($district, $signup);
    }

    public function getCity()
    {
        $this->__load();
        return parent::getCity();
    }

    public function setCity($city, $signup = false)
    {
        $this->__load();
        return parent::setCity($city, $signup);
    }

    public function setPosts($posts)
    {
        $this->__load();
        return parent::setPosts($posts);
    }

    public function getPosts()
    {
        $this->__load();
        return parent::getPosts();
    }

    public function setAge($age)
    {
        $this->__load();
        return parent::setAge($age);
    }

    public function getAge()
    {
        $this->__load();
        return parent::getAge();
    }

    public function setFbid($fbid)
    {
        $this->__load();
        return parent::setFbid($fbid);
    }

    public function updateFbAvatar()
    {
        $this->__load();
        return parent::updateFbAvatar();
    }

    public function setAddingProfile()
    {
        $this->__load();
        return parent::setAddingProfile();
    }

    public function isAddingProfile()
    {
        $this->__load();
        return parent::isAddingProfile();
    }

    public function setEditing()
    {
        $this->__load();
        return parent::setEditing();
    }

    public function isEditing()
    {
        $this->__load();
        return parent::isEditing();
    }

    public function getThumbnail($w = 64, $h = 64, $image = NULL)
    {
        $this->__load();
        return parent::getThumbnail($w, $h, $image);
    }

    public function getFbid()
    {
        $this->__load();
        return parent::getFbid();
    }

    public function setGlid($glid)
    {
        $this->__load();
        return parent::setGlid($glid);
    }

    public function getGlid()
    {
        $this->__load();
        return parent::getGlid();
    }

    public function setAbout($about)
    {
        $this->__load();
        return parent::setAbout($about);
    }

    public function getAbout()
    {
        $this->__load();
        return parent::getAbout();
    }

    public function getRefcel()
    {
        $this->__load();
        return parent::getRefcel();
    }

    public function setRefcel($refcel)
    {
        $this->__load();
        return parent::setRefcel($refcel);
    }

    public function setDob($dob, $signup = false)
    {
        $this->__load();
        return parent::setDob($dob, $signup);
    }

    public function getDob()
    {
        $this->__load();
        return parent::getDob();
    }

    public function getDobAsString()
    {
        $this->__load();
        return parent::getDobAsString();
    }

    public function getEditedFields()
    {
        $this->__load();
        return parent::getEditedFields();
    }

    public function setSex($sex, $signup = false)
    {
        $this->__load();
        return parent::setSex($sex, $signup);
    }

    public function getSex()
    {
        $this->__load();
        return parent::getSex();
    }

    public function addLogs(\Vietland\AevitasBundle\Document\Log $logs)
    {
        $this->__load();
        return parent::addLogs($logs);
    }

    public function getLogs()
    {
        $this->__load();
        return parent::getLogs();
    }

    public function setCropped($cropped)
    {
        $this->__load();
        return parent::setCropped($cropped);
    }

    public function getCropped()
    {
        $this->__load();
        return parent::getCropped();
    }

    public function getHomeDirectory()
    {
        $this->__load();
        return parent::getHomeDirectory();
    }

    public function getHomeDirectoryUrl()
    {
        $this->__load();
        return parent::getHomeDirectoryUrl();
    }

    public function getAvatar()
    {
        $this->__load();
        return parent::getAvatar();
    }

    public function setAvatar($avatar)
    {
        $this->__load();
        return parent::setAvatar($avatar);
    }

    public function getAvatarUpload()
    {
        $this->__load();
        return parent::getAvatarUpload();
    }

    public function setAvatarUpload($avatarUpload)
    {
        $this->__load();
        return parent::setAvatarUpload($avatarUpload);
    }

    public function getAbsolutePath($file)
    {
        $this->__load();
        return parent::getAbsolutePath($file);
    }

    public function getWebPath($file)
    {
        $this->__load();
        return parent::getWebPath($file);
    }

    public function getMediaDir()
    {
        $this->__load();
        return parent::getMediaDir();
    }

    public function setAvatarCoords($coords)
    {
        $this->__load();
        return parent::setAvatarCoords($coords);
    }

    public function getAvatarCoords()
    {
        $this->__load();
        return parent::getAvatarCoords();
    }

    public function setAddress1($address, $signup = false)
    {
        $this->__load();
        return parent::setAddress1($address, $signup);
    }

    public function getAddress1()
    {
        $this->__load();
        return parent::getAddress1();
    }

    public function setAddress2($address)
    {
        $this->__load();
        return parent::setAddress2($address);
    }

    public function getAddress2()
    {
        $this->__load();
        return parent::getAddress2();
    }

    public function setDship($dship)
    {
        $this->__load();
        return parent::setDship($dship);
    }

    public function getDship()
    {
        $this->__load();
        return parent::getDship();
    }

    public function setAddress3($address)
    {
        $this->__load();
        return parent::setAddress3($address);
    }

    public function getAddress3()
    {
        $this->__load();
        return parent::getAddress3();
    }

    public function setCommonname($name)
    {
        $this->__load();
        return parent::setCommonname($name);
    }

    public function getCommonname()
    {
        $this->__load();
        return parent::getCommonname();
    }

    public function setState($state)
    {
        $this->__load();
        return parent::setState($state);
    }

    public function getState()
    {
        $this->__load();
        return parent::getState();
    }

    public function setFax($fax)
    {
        $this->__load();
        return parent::setFax($fax);
    }

    public function getFax()
    {
        $this->__load();
        return parent::getFax();
    }

    public function setBrand($brand)
    {
        $this->__load();
        return parent::setBrand($brand);
    }

    public function getBrand()
    {
        $this->__load();
        return parent::getBrand();
    }

    public function setAniversary($aniversary)
    {
        $this->__load();
        return parent::setAniversary($aniversary);
    }

    public function getAniversary()
    {
        $this->__load();
        return parent::getAniversary();
    }

    public function setAccountid($accountid)
    {
        $this->__load();
        return parent::setAccountid($accountid);
    }

    public function getAccountid()
    {
        $this->__load();
        return parent::getAccountid();
    }

    public function setAccounttype($accounttype)
    {
        $this->__load();
        return parent::setAccounttype($accounttype);
    }

    public function getAccounttype()
    {
        $this->__load();
        return parent::getAccounttype();
    }

    public function getMari()
    {
        $this->__load();
        return parent::getMari();
    }

    public function setMari($mari, $signup = false)
    {
        $this->__load();
        return parent::setMari($mari, $signup);
    }

    public function getKids()
    {
        $this->__load();
        return parent::getKids();
    }

    public function setKids($kids, $signup = false)
    {
        $this->__load();
        return parent::setKids($kids, $signup);
    }

    public function getOcpu()
    {
        $this->__load();
        return parent::getOcpu();
    }

    public function setOcpu($ocpu, $signup = false)
    {
        $this->__load();
        return parent::setOcpu($ocpu, $signup);
    }

    public function getInco()
    {
        $this->__load();
        return parent::getInco();
    }

    public function setInco($inco, $signup = false)
    {
        $this->__load();
        return parent::setInco($inco, $signup);
    }

    public function getIncomeLabel()
    {
        $this->__load();
        return parent::getIncomeLabel();
    }

    public function getOccupationLabel()
    {
        $this->__load();
        return parent::getOccupationLabel();
    }

    public function addStaff(\Vietland\UserBundle\Document\Group $staff)
    {
        $this->__load();
        return parent::addStaff($staff);
    }

    public function removeStaff(\Vietland\UserBundle\Document\Group $staff)
    {
        $this->__load();
        return parent::removeStaff($staff);
    }

    public function getStoreId()
    {
        $this->__load();
        return parent::getStoreId();
    }

    public function setStoreId($storeId)
    {
        $this->__load();
        return parent::setStoreId($storeId);
    }

    public function setLedgerID($id)
    {
        $this->__load();
        return parent::setLedgerID($id);
    }

    public function getLedgerID()
    {
        $this->__load();
        return parent::getLedgerID();
    }

    public function saveAnniversary(\Vietland\AevitasBundle\Document\Anniversary $anni)
    {
        $this->__load();
        return parent::saveAnniversary($anni);
    }

    public function getAnniversary()
    {
        $this->__load();
        return parent::getAnniversary();
    }

    public function getLastAnniversary()
    {
        $this->__load();
        return parent::getLastAnniversary();
    }

    public function getTripleDate()
    {
        $this->__load();
        return parent::getTripleDate();
    }

    public function getLastTripleDate()
    {
        $this->__load();
        return parent::getLastTripleDate();
    }

    public function saveTripleDate($date)
    {
        $this->__load();
        return parent::saveTripleDate($date);
    }

    public function addAnniversary($anni = NULL)
    {
        $this->__load();
        return parent::addAnniversary($anni);
    }

    public function addTrippleDate($date = NULL)
    {
        $this->__load();
        return parent::addTrippleDate($date);
    }

    public function isTripleDay()
    {
        $this->__load();
        return parent::isTripleDay();
    }

    public function getTrippleDateLimit()
    {
        $this->__load();
        return parent::getTrippleDateLimit();
    }

    public function getWishlist($dm)
    {
        $this->__load();
        return parent::getWishlist($dm);
    }

    public function addWishList($gift = NULL)
    {
        $this->__load();
        return parent::addWishList($gift);
    }

    public function getWishlistIds()
    {
        $this->__load();
        return parent::getWishlistIds();
    }

    public function hasGiftInWishList($gift)
    {
        $this->__load();
        return parent::hasGiftInWishList($gift);
    }

    public function getUpdatedFields()
    {
        $this->__load();
        return parent::getUpdatedFields();
    }

    public function getCCode()
    {
        $this->__load();
        return parent::getCCode();
    }

    public function setCCode($CCode)
    {
        $this->__load();
        return parent::setCCode($CCode);
    }

    public function getUpdatedPoints($config)
    {
        $this->__load();
        return parent::getUpdatedPoints($config);
    }

    public function turnLevelDown()
    {
        $this->__load();
        return parent::turnLevelDown();
    }

    public function turnLevelUp($level = NULL)
    {
        $this->__load();
        return parent::turnLevelUp($level);
    }

    public function setUpLevel($date)
    {
        $this->__load();
        return parent::setUpLevel($date);
    }

    public function isLevelExpired()
    {
        $this->__load();
        return parent::isLevelExpired();
    }

    public function redeemPoint($point)
    {
        $this->__load();
        return parent::redeemPoint($point);
    }

    public function getBonusPoints()
    {
        $this->__load();
        return parent::getBonusPoints();
    }

    public function setBonusPoints($point)
    {
        $this->__load();
        return parent::setBonusPoints($point);
    }

    public function setBonusexpired($bonusexpired)
    {
        $this->__load();
        return parent::setBonusexpired($bonusexpired);
    }

    public function getKeepingPoint()
    {
        $this->__load();
        return parent::getKeepingPoint();
    }

    public function setQualifyPoint($point)
    {
        $this->__load();
        return parent::setQualifyPoint($point);
    }

    public function prePersist()
    {
        $this->__load();
        return parent::prePersist();
    }

    public function postUpdate()
    {
        $this->__load();
        return parent::postUpdate();
    }

    public function postLoad()
    {
        $this->__load();
        return parent::postLoad();
    }

    public function getLastbuy()
    {
        $this->__load();
        return parent::getLastbuy();
    }

    public function resetEditedField()
    {
        $this->__load();
        return parent::resetEditedField();
    }

    public function isPassedBasic()
    {
        $this->__load();
        return parent::isPassedBasic();
    }

    public function isAnniversaryToday()
    {
        $this->__load();
        return parent::isAnniversaryToday();
    }

    public function isBirthDayToday()
    {
        $this->__load();
        return parent::isBirthDayToday();
    }

    public function isBillInBirthMonth($billdate)
    {
        $this->__load();
        return parent::isBillInBirthMonth($billdate);
    }

    public function getAns1()
    {
        $this->__load();
        return parent::getAns1();
    }

    public function setAns1($ans1)
    {
        $this->__load();
        return parent::setAns1($ans1);
    }

    public function getAns2()
    {
        $this->__load();
        return parent::getAns2();
    }

    public function setAns2($ans2)
    {
        $this->__load();
        return parent::setAns2($ans2);
    }

    public function getAns3()
    {
        $this->__load();
        return parent::getAns3();
    }

    public function setAns3($ans3)
    {
        $this->__load();
        return parent::setAns3($ans3);
    }

    public function getAns4()
    {
        $this->__load();
        return parent::getAns4();
    }

    public function setAns4($ans4)
    {
        $this->__load();
        return parent::setAns4($ans4);
    }

    public function getAns5()
    {
        $this->__load();
        return parent::getAns5();
    }

    public function setAns5($ans5)
    {
        $this->__load();
        return parent::setAns5($ans5);
    }

    public function getAns6()
    {
        $this->__load();
        return parent::getAns6();
    }

    public function setAns6($ans6)
    {
        $this->__load();
        return parent::setAns6($ans6);
    }

    public function getAns7()
    {
        $this->__load();
        return parent::getAns7();
    }

    public function setAns7($ans7)
    {
        $this->__load();
        return parent::setAns7($ans7);
    }

    public function getKidsLabel()
    {
        $this->__load();
        return parent::getKidsLabel();
    }

    public function getReportAttributes()
    {
        $this->__load();
        return parent::getReportAttributes();
    }

    public function __get($name)
    {
        $this->__load();
        return parent::__get($name);
    }

    public function __call($method, $args)
    {
        $this->__load();
        return parent::__call($method, $args);
    }

    public function addRole($role)
    {
        $this->__load();
        return parent::addRole($role);
    }

    public function serialize()
    {
        $this->__load();
        return parent::serialize();
    }

    public function unserialize($serialized)
    {
        $this->__load();
        return parent::unserialize($serialized);
    }

    public function eraseCredentials()
    {
        $this->__load();
        return parent::eraseCredentials();
    }

    public function getUsername()
    {
        $this->__load();
        return parent::getUsername();
    }

    public function getUsernameCanonical()
    {
        $this->__load();
        return parent::getUsernameCanonical();
    }

    public function getSalt()
    {
        $this->__load();
        return parent::getSalt();
    }

    public function getEmail()
    {
        $this->__load();
        return parent::getEmail();
    }

    public function getEmailCanonical()
    {
        $this->__load();
        return parent::getEmailCanonical();
    }

    public function getPassword()
    {
        $this->__load();
        return parent::getPassword();
    }

    public function getPlainPassword()
    {
        $this->__load();
        return parent::getPlainPassword();
    }

    public function getLastLogin()
    {
        $this->__load();
        return parent::getLastLogin();
    }

    public function getConfirmationToken()
    {
        $this->__load();
        return parent::getConfirmationToken();
    }

    public function getRoles()
    {
        $this->__load();
        return parent::getRoles();
    }

    public function hasRole($role)
    {
        $this->__load();
        return parent::hasRole($role);
    }

    public function isAccountNonExpired()
    {
        $this->__load();
        return parent::isAccountNonExpired();
    }

    public function isAccountNonLocked()
    {
        $this->__load();
        return parent::isAccountNonLocked();
    }

    public function isCredentialsNonExpired()
    {
        $this->__load();
        return parent::isCredentialsNonExpired();
    }

    public function isCredentialsExpired()
    {
        $this->__load();
        return parent::isCredentialsExpired();
    }

    public function isEnabled()
    {
        $this->__load();
        return parent::isEnabled();
    }

    public function isExpired()
    {
        $this->__load();
        return parent::isExpired();
    }

    public function isLocked()
    {
        $this->__load();
        return parent::isLocked();
    }

    public function isSuperAdmin()
    {
        $this->__load();
        return parent::isSuperAdmin();
    }

    public function isUser(\FOS\UserBundle\Model\UserInterface $user = NULL)
    {
        $this->__load();
        return parent::isUser($user);
    }

    public function removeRole($role)
    {
        $this->__load();
        return parent::removeRole($role);
    }

    public function setUsername($username)
    {
        $this->__load();
        return parent::setUsername($username);
    }

    public function setUsernameCanonical($usernameCanonical)
    {
        $this->__load();
        return parent::setUsernameCanonical($usernameCanonical);
    }

    public function setCredentialsExpireAt(\DateTime $date = NULL)
    {
        $this->__load();
        return parent::setCredentialsExpireAt($date);
    }

    public function setCredentialsExpired($boolean)
    {
        $this->__load();
        return parent::setCredentialsExpired($boolean);
    }

    public function setEmailCanonical($emailCanonical)
    {
        $this->__load();
        return parent::setEmailCanonical($emailCanonical);
    }

    public function setEnabled($boolean)
    {
        $this->__load();
        return parent::setEnabled($boolean);
    }

    public function setExpired($boolean)
    {
        $this->__load();
        return parent::setExpired($boolean);
    }

    public function setExpiresAt(\DateTime $date = NULL)
    {
        $this->__load();
        return parent::setExpiresAt($date);
    }

    public function setPassword($password)
    {
        $this->__load();
        return parent::setPassword($password);
    }

    public function setSuperAdmin($boolean)
    {
        $this->__load();
        return parent::setSuperAdmin($boolean);
    }

    public function setPlainPassword($password)
    {
        $this->__load();
        return parent::setPlainPassword($password);
    }

    public function setLastLogin(\DateTime $time = NULL)
    {
        $this->__load();
        return parent::setLastLogin($time);
    }

    public function setLocked($boolean)
    {
        $this->__load();
        return parent::setLocked($boolean);
    }

    public function setConfirmationToken($confirmationToken)
    {
        $this->__load();
        return parent::setConfirmationToken($confirmationToken);
    }

    public function setPasswordRequestedAt(\DateTime $date = NULL)
    {
        $this->__load();
        return parent::setPasswordRequestedAt($date);
    }

    public function getPasswordRequestedAt()
    {
        $this->__load();
        return parent::getPasswordRequestedAt();
    }

    public function isPasswordRequestNonExpired($ttl)
    {
        $this->__load();
        return parent::isPasswordRequestNonExpired($ttl);
    }

    public function getGroups()
    {
        $this->__load();
        return parent::getGroups();
    }

    public function getGroupNames()
    {
        $this->__load();
        return parent::getGroupNames();
    }

    public function hasGroup($name)
    {
        $this->__load();
        return parent::hasGroup($name);
    }

    public function addGroup(\FOS\UserBundle\Model\GroupInterface $group)
    {
        $this->__load();
        return parent::addGroup($group);
    }

    public function removeGroup(\FOS\UserBundle\Model\GroupInterface $group)
    {
        $this->__load();
        return parent::removeGroup($group);
    }

    public function __toString()
    {
        $this->__load();
        return parent::__toString();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'username', 'usernameCanonical', 'email', 'emailCanonical', 'enabled', 'salt', 'password', 'lastLogin', 'locked', 'expired', 'expiresAt', 'confirmationToken', 'passwordRequestedAt', 'roles', 'id', 'point', 'bonuspoints', 'bonusexpired', 'posId', 'dob', 'sex', 'address1', 'address2', 'dship', 'address3', 'commonname', 'state', 'district', 'city', 'ref', 'phone', 'fax', 'brand', 'aniversary', 'accountid', 'accounttype', 'cellphone', 'fbid', 'glid', 'avatar', 'avatarCoords', 'age', 'ttpay', 'ava', 'type', 'firstname', 'lastname', 'middlename', 'about', 'logs', 'staff', 'cropped', 'storeId', 'mari', 'nlt', 'lastlogs', 'kids', 'ocpu', 'inco', 'anni', 'edt', 'CCode', 'qlf', 'level', 'uLevel', 'kp', 'lastKp', 'lastbuy', 'join', 'edited', 'change', 'regcode', 'wishlist', 'newroles', 'carts', 'trdate', 'ans1', 'ans2', 'ans3', 'ans4', 'ans5', 'ans6', 'ans7', 'lang', 'refcel', 'used');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->__documentPersister__) {
            $this->__isInitialized__ = true;
            $class = $this->__documentPersister__->getClassMetadata();
            $original = $this->__documentPersister__->load($this->__identifier__);
            if ($original === null) {
                throw \Doctrine\ODM\MongoDB\MongoDBException::documentNotFound(get_class($this), $this->__identifier__);
            }
            foreach ($class->reflFields AS $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->__documentPersister__, $this->__identifier__);
        }
        
    }
}