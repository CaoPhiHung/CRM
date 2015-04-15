<?php

/**
 * Description of Post
 *
 * @author paulaan
 */

namespace Vietland\AevitasBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @MongoDB\MappedSuperclass
 * @MongoDB\Document(collection="aevitaslog")
 * @MongoDB\InheritanceType("SINGLE_COLLECTION")
 * @MongoDB\DiscriminatorMap({"user"="Vietland\UserBundle\Document\UserLog"})
 */
class Log {

    /**
     * @MongoDB\Id(strategy="increment")
     */
    protected $id;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Vietland\UserBundle\Document\User", inversedBy="logs")
     */
    protected $user;

    /**
     * @MongoDB\String
     */
    protected $action;

    /**
     * @MongoDB\String
     */
    protected $subject;

    /**
     * @MongoDB\Date
     */
    protected $created;

    /**
     * @MongoDB\String
     * @MongoDB\Index(unique=true,background=true, order="asc")
     */
    protected $md5;
    
    /**
     * @MongoDb\Int
     */
    protected $uid;

    public function __construct() {
        $this->created = new \DateTime('now');
        $this->md5 = time().rand(10000,99999);
    }

    public function getMd5() {
        return $this->md5;
    }

    public function setMd5($md5) {
        $this->md5 = $md5;
        return $this;
    }

    /**
     * Get id
     *
     * @return custom_id $id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param Vietland\UserBundle\Document\User $user
     * @return \MessageLog
     */
    public function setUser(\Vietland\UserBundle\Document\User $user) {
        $this->user = $user;
        $this->uid = $user->getId();
        return $this;
    }

    /**
     * Get user
     *
     * @return Vietland\UserBundle\Document\User $user
     */
    public function getUser() {
        return $this->user;
    }
    
    public function getUid(){
        return $this->uid;
    }

    /**
     * Set action
     *
     * @param string $action
     * @return \MessageLog
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
     * Set subject
     *
     * @param string $subject
     * @return \MessageLog
     */
    public function setSubject($subject) {
        $this->subject = $subject;
        return $this;
    }

    /**
     * Get subject
     *
     * @return string $subject
     */
    public function getSubject() {
        return $this->subject;
    }

    /**
     * Set created
     *
     * @param date $created
     * @return \MessageLog
     */
    public function setCreated($created) {
        $this->created = $created;
        return $this;
    }

    /**
     * Get created
     *
     * @return date $created
     */
    public function getCreated() {
        return $this->created;
    }

    public function prePersist() {
        // Add your code here
    }

    public function postUpdate() {
        // Add your code here
    }

    public function postLoad() {
        // Add your code here
    }

}
