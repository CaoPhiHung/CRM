<?php

namespace MongoDBODMProxies\__CG__\Vietland\StoreBundle\Document;

use Doctrine\ODM\MongoDB\Persisters\DocumentPersister;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ODM. DO NOT EDIT THIS FILE.
 */
class JobConfiguration extends \Vietland\StoreBundle\Document\JobConfiguration implements \Doctrine\ODM\MongoDB\Proxy\Proxy
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

    public function setName($name)
    {
        $this->__load();
        return parent::setName($name);
    }

    public function getName()
    {
        $this->__load();
        return parent::getName();
    }

    public function setValue($value)
    {
        $this->__load();
        return parent::setValue($value);
    }

    public function getValue()
    {
        $this->__load();
        return parent::getValue();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'name', 'value');
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