<?php

/**
 * Description of U-Matrix
 *
 * @author U-Matrix
 */

namespace Aevitas\ChannelBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\EmbeddedDocument 
 */
class RuleOption {

    /**
     * @MongoDB\Int
     */
    protected $type;

    /**
     * @MongoDB\String
     */
    protected $name;

    /**
     * @MongoDB\String
     */
    protected $value;

    /**
     * @MongoDB\Id(strategy="increment")
     */
    protected $id;

    const TYPE_EQUAL = 1;
    const TYPE_LIKE = 2;
    const TYPE_BETWEEN = 3;
    const TYPE_BOOLEAN = 4;

    const TYPE_EQUAL_LABEL = "Equal";
    const TYPE_LIKE_LABEL = "Like";
    const TYPE_BETWEEN_LABEL = "Between";

    const TYPE_DATE = 1;
    const TYPE_DAYS = 2;
    const TYPE_EACH_MONTH = 3;
    const TYPE_EACH_WEEK = 4;

    const TYPE_SEX_MALE = 1;
    const TYPE_SEX_FEMALE = 2;

    public function __construct()
    {
        $this->type = self::TYPE_EQUAL;
    }


    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getValue(){
        return $this->value;
    }

    public function setValue($value) {
        $this->value = $value;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public static function getOptionTypeLabels($trans) {
        $option_type = array(self::TYPE_EQUAL => $trans->trans('Equal'), self::TYPE_LIKE => $trans->trans('Like'));
        return $option_type;
    }
    public static function getAutoTimeType($trans) {
        $option_type = array(self::TYPE_DATE =>$trans->trans('On Choosen Date'), self::TYPE_DAYS => $trans->trans('Delay( Days )'),self::TYPE_EACH_MONTH => $trans->trans('On {date} each month'),self::TYPE_EACH_WEEK => $trans->trans('On {date} each week'));
        return $option_type;
    }

    public static function getSexOptionType($trans) {
        $option_type = array(self::TYPE_SEX_MALE =>$trans->trans('Male'), self::TYPE_SEX_FEMALE => $trans->trans('Female'));
        return $option_type;
    }

}
