<?php

namespace MongoDBODMProxies\__CG__\Aevitas\LevisBundle\Document;

use Doctrine\ODM\MongoDB\Persisters\DocumentPersister;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ODM. DO NOT EDIT THIS FILE.
 */
class Store extends \Aevitas\LevisBundle\Document\Store implements \Doctrine\ODM\MongoDB\Proxy\Proxy
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

    public function getVisible()
    {
        $this->__load();
        return parent::getVisible();
    }

    public function setVisible($visible)
    {
        $this->__load();
        return parent::setVisible($visible);
    }

    public function getOldId()
    {
        $this->__load();
        return parent::getOldId();
    }

    public function setOldId($oldId)
    {
        $this->__load();
        return parent::setOldId($oldId);
    }

    public function getName()
    {
        $this->__load();
        return parent::getName();
    }

    public function setName($name)
    {
        $this->__load();
        return parent::setName($name);
    }

    public function getUserId()
    {
        $this->__load();
        return parent::getUserId();
    }

    public function setUserId($userId)
    {
        $this->__load();
        return parent::setUserId($userId);
    }

    public function getAddress()
    {
        $this->__load();
        return parent::getAddress();
    }

    public function setAddress($address)
    {
        $this->__load();
        return parent::setAddress($address);
    }

    public function getAlias()
    {
        $this->__load();
        return parent::getAlias();
    }

    public function setAlias($alias)
    {
        $this->__load();
        return parent::setAlias($alias);
    }

    public function getAddress2()
    {
        $this->__load();
        return parent::getAddress2();
    }

    public function setAddress2($address2)
    {
        $this->__load();
        return parent::setAddress2($address2);
    }

    public function getAddress3()
    {
        $this->__load();
        return parent::getAddress3();
    }

    public function setAddress3($address3)
    {
        $this->__load();
        return parent::setAddress3($address3);
    }

    public function getPhone()
    {
        $this->__load();
        return parent::getPhone();
    }

    public function setPhone($phone)
    {
        $this->__load();
        return parent::setPhone($phone);
    }

    public function getEmail()
    {
        $this->__load();
        return parent::getEmail();
    }

    public function setEmail($email)
    {
        $this->__load();
        return parent::setEmail($email);
    }

    public function getFax()
    {
        $this->__load();
        return parent::getFax();
    }

    public function setFax($fax)
    {
        $this->__load();
        return parent::setFax($fax);
    }

    public function getCity()
    {
        $this->__load();
        return parent::getCity();
    }

    public function setCity($city)
    {
        $this->__load();
        return parent::setCity($city);
    }

    public function getDistrict()
    {
        $this->__load();
        return parent::getDistrict();
    }

    public function setDistrict($district)
    {
        $this->__load();
        return parent::setDistrict($district);
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'oldId', 'name', 'address', 'address2', 'address3', 'city', 'district', 'phone', 'email', 'fax', 'alias', 'userId', 'visible');
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