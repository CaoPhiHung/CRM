<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PointRule
 *
 * @author truongld
 */

namespace Aevitas\PointBundle\Services;

use Aevitas\PointBundle\Document\PointRule;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;
use Vietland\UserBundle\Document\User;
use Vietland\UserBundle\Document\UserLog;

class PointRuleService extends BaseController {

    private $schemaRegex;
    private $dm;
    private $store;
    private $action;
    protected $container;

    public function __construct($dm, $container) {
        $this->container = $container;
        $this->dm = $dm;
    }

    public function __get($name) {
        if (isset($this->$name))
            return $this->$name;

        try {
            return $this->container->getParameter($name);
        } catch (\Exception $e) {
            return null;
        }
        return null;
    }

    public function __call($name, $args) {
        if (preg_match("/get/i", $name)) {
            //Set the entire method name to lowercase so we don't have to mess around with
            //anything incase camel case or C# like method names are being used.
            $name = strtolower($name);
            //Find the start and length of the get / set in the method.
            $pos = strpos($name, "get") + strlen("get");
            //Strip the get / set from the getter / setter method.
            $name = substr($name, $pos, strlen($name) - $pos);

            return $this->__get($name);
        }
    }

    public function getReferralPoint() {
        return $this->ref;
    }

    public function getCanculateLevel($point) {
        if ($point < $this->gold)
            return User::SILVER;
        else if ($point < $this->platin)
            return User::GOLD;
        else
            return User::PLATIN;
    }

    public function getPointForNextLevel($point) {
        if ($point == 0)
            return 0;
        if ($point < $this->gold)
            return $this->gold - $point;
        else if ($point < $this->platin)
            return $this->platin - $point;
        else
            return -1;
    }

    public function checkLoyaltyStatusExpired(User &$user) {
//        if (!$this->isUserExpired($user))
//            return false;
//        if ($user->getLevel() == User::GOLD) {
//            if ($user->getKeepingPoint() >= $this->goldlimit)
//                return false;
//            else {
//                $user->turnLevelDown();
//                $user->updateKeepingPoint(0, true);
//                $userLogTurnDown = new UserLog();
//                $userLogTurnDown->setUser($user)->setAction('td_lev')->setSubject($user->getLevel());
//                $this->dm->persist($userLogTurnDown);
//                return true;
//            }
//        } else if ($user->getLevel() == User::PLATIN) {
//            if ($user->getKeepingPoint() >= $this->platinlimit)
//                return false;
//            else {
//                $user->turnLevelDown();
//                $user->updateKeepingPoint(0, true);
//                $userLogTurnDown = new UserLog();
//                $userLogTurnDown->setUser($user)->setAction('td_lev')->setSubject($user->getLevel());
//                $this->dm->persist($userLogTurnDown);
//                return true;
//            }
//        } else if ($user->getLevel() == User::SILVER) {
//            $user->setUpLevel(new \DateTime('now'));
//            return true;
//        }
    }

    public function getPointConfig() {
        return array('address1' => $this->praddress1, 'anni' => $this->pranni, 'dob' => $this->prdob, 'city' => $this->prcity,
            'district' => $this->prdistrict, 'firstname' => $this->prfirstname, 'lastname' => $this->prlastname,
            'kids' => $this->prkids, 'sex' => $this->prsex, 'mari' => $this->prmari, 'ocpu' => $this->procpu,
            'inco' => $this->princo, 'anni' => $this->pranni, 'fone' => $this->prfone, 'email' => $this->premail);
    }

    public function setDm($dm) {
        $this->dm = $dm;
        return $this;
    }

    public function setSchema($arrAttributes) {
        $schema = '';
        $ii = 1;
        //parameter for store
        if (isset($arrAttributes['store'])) {
            $this->store = $arrAttributes['store'];
        } else {
            $this->store = false;
        }
        //parameter for action
        if (isset($arrAttributes['action'])) {
            $this->action = $arrAttributes['action'];
        } else {
            $this->action = false;
        }
        foreach (PointRule::$pointSchema as $key => $value) {
            if (isset($arrAttributes[$key])) {
                if ($key == 'action') {
                    $rkey = true;
                    reset($this->actions);
                    while (true) {
                        if ($arrAttributes[$key] == current($this->actions))
                            break;
                        if (next($this->actions) === FALSE) {
                            $rkey = false;
                            break;
                        }
                    }
                    if ($rkey) {
                        $schema .= '(' . key($this->actions) . '|_)';
                    } else {
                        $schema .= '(.*)';
                    }
                } else {
                    $schema .= '(' . $arrAttributes[$key] . '|_)';
                }
            } else {
                if (!isset($arrAttributes['time'])) {
                    $day = date('j', time());
                    $date = $day + date('n', time()) * 31 + (date('Y', time()) - 2013) * 12 * 31;
                    $hour = date('G', time());
                    $dayweek = date('N', time());
                } else {
                    $optTime = $arrAttributes['time']->getTimestamp();
                    $day = date('j', $optTime);
                    $date = $day + date('n', $optTime) * 31 + (date('Y', $optTime) - 2013) * 12 * 31;
                    $hour = date('G', $optTime);
                    $dayweek = date('N', $optTime);
                }
                switch ($key) {
                    case 'interval-time':
                        $schema .= '(_|(' . self::genRegexLessThan($date) . '):(' . self::genRegexMoreThan($date) . '))';
                        break;
                    case 'day-month':
                        $schema .= '(_|(' . self::genRegexLessThan($day) . '):(' . self::genRegexMoreThan($day) . '))';
                        break;
                    case 'day-week':
                        if ($dayweek == 7)
                            $schema .= '(_|(.*)1(.*))';
                        else
                            $schema .= '(_|(.*)' . ($dayweek + 1) . '(.*))';
                        break;
                    case 'hour':
                        $schema .= '(_|(' . self::genRegexLessThan($hour) . '):(' . self::genRegexMoreThan($hour) . '))';
                        break;
                    case 'parity':
                        $schema .= '(_|3|' . ($day % 2 + 1) . ')';
                        break;
                    case 'city':
                        $schema .= '_';
                        break;
                    case 'district':
                        $schema .= '_';
                        break;
                    default:
                        $schema .= '(.*)';
                        break;
                }
            }
            if (($ii++) < count(PointRule::$pointSchema)) {
                $schema .= '&';
            }
            //echo $schema.'<br/>';
        };

        $this->schemaRegex = $schema;
        return $this;
    }

    public function getSchema() {
        return $this->schemaRegex;
    }

    public function getBaseRate($level) {
        $baseRateLevel = array(User::SILVER => $this->prbssilver, User::GOLD => $this->prbsgold, User::PLATIN => $this->prbsplatin);
        return (float) $baseRateLevel[$level];
    }

    public function getBaseRateRedeem($level) {
        $baseRateLevel = array(User::SILVER => $this->redeemsilver, User::GOLD => $this->redeemgold, User::PLATIN => $this->redeemplatinum);
        return (float) $baseRateLevel[$level];
    }

    public function isUserExpired($user) {
        $now = new \DateTime('now');
        $endup = $user->getUpLevelDate();
        if ($user->getCurrentLevel() == User::SILVER)
            return false;
        $endup->add(new \DateInterval('P' . $this->getExpiredRange($user->getCurrentLevel()) . 'D'));
        if ($endup->getTimestamp() < $now->getTimestamp()) {
            return true;
        } else
            return false;
    }

    public function getExpiredRange($level) {
        $baseRateLevel = array(User::SILVER => $this->expiredsilver, User::GOLD => $this->expiredgold, User::PLATIN => $this->expiredplatinum);
        return (float) $baseRateLevel[$level];
    }

    public function getRules() {
        $qb = $this->dm->createQueryBuilder('AevitasPointBundle:PointRule');
        $qb->field('schema')->equals(new \MongoRegex("/^{$this->schemaRegex}$/"));
        //query for store
        if ($this->store !== false) {
            $qb->field('store')->equals(new \MongoRegex("/_|(.*)_" . $this->store . "_(.*)/"));
        }
        //query for action
        if ($this->action !== false) {
            $qb->field('action')->equals($this->action);
        }
        $rule = $qb->getQuery()->execute();
        return $rule;
    }

    public function getUserLevelInterval($totalPayment) {
        if ($totalPayment > $this->goldinterval && $totalPayment < $this->platinuminterval)
            return User::GOLD;
        else if ($totalPayment > $this->platinuminterval)
            return User::PLATIN;
        else
            return false;
    }

    static function Number2Array($n) {
        if ($n == 0)
            return array(0);
        $rs = array();
        while ($n > 0) {
            $rs[] = $n % 10;
            $n = floor($n / 10);
        }
        return array_reverse($rs);
    }

    static function genRegexLessThan($n) {
        if ($n < 2) {
            return "[1]";
        } else if ($n < 10) {
            return "[1-$n]";
        }
        $pre = '';
        $arrNum = self::Number2Array($n);
        $cnt = count($arrNum);
        $isDo = false;
        $rs = "$n";
        for ($i = 0; $i < $cnt; $i++) {
            if ($i == 0) {
                $st = 1;
            } else {
                $st = 0;
                if (!$isDo) {
                    $isDo = true;
                    if ($cnt - $i - 1 == 0) {
                        $rs .= '|[1-9]';
                    } else {
                        $rs .= '|[1-9][0-9]';
                        $rs .= '{0,' . ($cnt - $i - 1) . '}';
                    }
                }
            }
            //continue;
            if ($st == $arrNum[$i]) {
                $pre .= $arrNum[$i];
                continue;
            }

            if ($st == $arrNum[$i] - 1) {
                $bf = $st;
            } else {
                $bf = '[' . $st . '-' . ($arrNum[$i] - 1) . ']';
            }
            if ($cnt - $i - 1 == 0) {
                $rs .= '|' . $pre . $bf;
            } else {
                $rs .= '|' . $pre . $bf . '[0-9]';
                if ($cnt - $i - 1 > 1) {
                    $rs .= '{' . ($cnt - $i - 1) . '}';
                }
            }
            $pre .= $arrNum[$i];
        }

        return $rs;
    }

    static function genRegexMoreThan($n) {
        if ($n < 9) {
            return "[$n-9]|[1-9][0-9]{1,10}";
        }
        if ($n == 9) {
            return "9|[1-9][0-9]{1,10}";
        }

        $pre = '';
        $arrNum = self::Number2Array($n);
        $cnt = count($arrNum);
        //$rs = "/^($n";
        $rs = $n . '|[1-9][0-9]{' . $cnt . ',10}';
        for ($i = 0; $i < $cnt; $i++) {
            if ($arrNum[$i] == 9)
                continue;
            if ($cnt - $i - 1 > 0) {
                $rs .= '|' . $pre . '[' . ($arrNum[$i] + 1) . '-9][0-9]{' . ($cnt - $i - 1) . '}';
            } else {
                $rs .= '|' . $pre . '[' . ($arrNum[$i] + 1) . '-9]';
            }
            $pre .= $arrNum[$i];
        }
        //$rs .= ")$/";

        return $rs;
    }

}
