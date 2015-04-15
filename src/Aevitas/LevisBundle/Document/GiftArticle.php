<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of giftArticle
 *
 * @author RYANTRAN
 */

namespace Aevitas\LevisBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vietland\AevitasBundle\Model\Media;
use Symfony\Component\Validator\Constraints as Assert;
use Vietland\AevitasBundle\Logger\AevitasLogger;
use Vietland\AevitasBundle\Logger\LoggerInterface as Log;
use Vietland\AevitasBundle\Helper\Slug;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @MongoDB\Document(repositoryClass="Aevitas\LevisBundle\Document\GiftArticleRepository")
 */
class GiftArticle extends Media implements Log {

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
    protected $path;

    /**
     * @MongoDB\String 
     */
    protected $description;

    /**
     * @MongoDB\String 
     */
    protected $excerpt;

    /**
     * @MongoDB\Date
     */
    protected $created;

    /**
     * @MongoDB\Int 
     */
    protected $point;

    /**
     * @MongoDB\String
     */
    protected $slug;

    /**
     * @Assert\File(maxSize="502400000k",mimeTypes={"image/jpeg","image/png"})
     */
    public $file;

    /**
     * @MongoDB\Int
     * @return type 
     */
    protected $isActive;

    /**
     * @MongoDB\Int
     */
    protected $gender;

    /**
     * @MongoDB\Int
     */
    protected $inventory;

    /**
     * @MongoDB\Int
     */
    protected $DeliveryType;

    const StorePickup = 1;
    const PostalDelivery = 2;

    /**
     * @MongoDB\Int
     */
    protected $catid;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Categories")
     */
    protected $cg;

    /**
     * @MongoDB\String
     */
    protected $cat;

    /**
     * @MongoDB\Collection
     */
    protected $tags = array();

    /**
     * @MongoDB\Collection
     */
    protected $images = array();
    private $tmpFiles;
    private $dm;

    public function __construct() {
        $this->created = new \DateTime('now');
        $this->images = array();
        $this->tags = array();
        $this->tmpFiles = new ArrayCollection();
    }

    public function getImages() {
        return implode(';', $this->images);
    }

    public function getImagesUrlArray() {
        $images = array();
        foreach ($this->images as $img) {
            $images[] = $this->getThumbnail(360, 430, $img);
        }
        return $images;
    }

    public function setImages($images) {
        $this->images = array_filter(explode(';', $images));
        $name = '/(' . implode('|', $this->images) . ')/';
        $this->tmpFiles = new ArrayCollection();
        try {
            $finder = new Finder();
            $iterator = $finder
                    ->files()
                    ->name($name)
                    ->depth(0)
                    ->in($this->getTmpFolder());
            foreach ($iterator as $file) {
                $file = new File($file->getRealpath());
                $this->tmpFiles->add($file);
            }
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
        return $this;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($Id) {
        $this->id = $Id;
        return $this;
    }

    public function setDm($dm) {
        $this->dm = $dm;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        $this->slug = Slug::generateSlug($name);
        return $this;
    }

    public function getFile() {
        return $this->file;
    }

    public function setFile(UploadedFile $file = null) {
        $this->file = $file;
        if (is_object($this->file)) {
            $this->path = $this->file->getClientOriginalName();
        }
    }

    public function getImage() {
        return $this->getWebPath($this->path);
    }

    /**
     * @MongoDB\PrePersist 
     */
    public function prePersist() {
        $this->slug = Slug::generateSlug($this->name);
        if (is_object($this->dm)) {
            $category = $this->dm->getRepository('AevitasLevisBundle:Categories')->find($this->catid);
            $this->cg = $category;
        }
    }

    public function getUploadFolder() {
        return $this->getWebPath();
    }

    /**
     * @MongoDB\PostPersist
     * @MongoDB\PostUpdate 
     */
    public function afterFlush() {
        // check if we have an old image path
        if (is_object($this->file)) {
            $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());
            unset($this->file);
        }
        if (is_object($this->tmpFiles) && $this->tmpFiles->count()) {
            foreach ($this->tmpFiles as $file) {
                $file->move($this->getUploadRootDir());
            }
//            $this->tmpFiles->map(function($file)use($to) {
//                        var_dump($to . DIRECTORY_SEPARATOR . $file->getFilename());
//                        //$file->move($that->getUploadDir().DIRECTORY_SEPARATOR.$file->getFilename());
//                    });
            unset($this->tmpFiles);
        }
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
        return $this;
    }

    public function getCreated() {
        return $this->created;
    }

    public function setCreated($created) {
        $this->created = $created;

        return $this;
    }

    public function getPoint() {
        return $this->point;
    }

    public function setPoint($point) {
        $this->point = $point;
        return $this;
    }

    public function getIsActive() {
        return $this->isActive;
    }

    public function setIsActive($isActive) {
        $this->isActive = $isActive;
        return $this;
    }

    public function getCategories() {
        return $this->catid;
    }

    public function setCategories($catid) {
        $this->catid = $catid;
        return $this;
    }

    public function getCategory() {
        try {
            return $this->cg;
        } catch (\Exception $e) {
            $cate = new Categories();
            $cate->setName('Not found');
            return $cate;
        }
    }

    public function getGender() {
        return $this->gender;
    }

    public function setGender($gender) {
        $this->gender = $gender;
        return $this;
    }

    public function getInventory() {
        return $this->inventory;
    }

    public function setInventory($inventory) {
        $this->inventory = $inventory;
        return $this;
    }

    public function getDeliveryType() {
        return $this->DeliveryType;
    }

    public function setDeliveryType($DeliveryType) {
        $this->DeliveryType = $DeliveryType;
        return $this;
    }

    static function getDeliveryTypeOption() {
        return array(
            self::StorePickup => 'Store-Pickup',
            self::PostalDelivery => 'Postal Delivery'
        );
    }

    public function getPath() {
        return $this->path;
    }

    public function setPath($path) {
        $this->path = $path;
        return $this;
    }

    public function getCat() {
        return $this->cat;
    }

    public function setCat($cat) {
        $this->cat = $cat;
        return $this;
    }

    public function getSlug() {
        return $this->slug;
    }

    public function setSlug($slug) {
        $this->slug = $slug;
        return $this;
    }

    public function getCatid() {
        return $this->catid;
    }

    public function getTags() {
        return implode(',', $this->tags);
    }

    public function setTags($tags) {
        $this->tags = array_filter(explode(',', $tags));
        return $this;
    }

    public function getTagsArray() {
        return $this->tags;
    }

    public function getExcerpt() {
        return $this->excerpt;
    }

    public function setExcerpt($excerpt) {
        $this->excerpt = $excerpt;
        return $this;
    }

    public function getThumbnail($w = 64, $h = 64, $thumb = null) {
        if (is_null($thumb)) {
            if (!empty($this->images))
                return parent::getThumbnail($w, $h, $this->images[0]);
            else
                return 'images/noimage.jpg';
        }
        return parent::getThumbnail($w, $h, $thumb);
    }

    protected function getType() {
        return 'gift';
    }

    public function getTmpFolder() {
        return getcwd() . DIRECTORY_SEPARATOR . 'media' . DIRECTORY_SEPARATOR . 'gift' . DIRECTORY_SEPARATOR . 'tmp';
    }

    /**
     * @MongoDB\PostLoad
     */
    public function postLoad() {
        try {
            $cat = $this->cg;
        } catch (\Exception $e) {
            $cat = new Categories();
            $cat->setName('not found');
            $this->cg = $cat;
        }
    }

}

