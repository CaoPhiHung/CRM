<?php


namespace Vietland\UserBundle\Document;

use Doctrine\ODM\MongoDB\DocumentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Vietland\UserBundle\Document\User;
use Vietland\UserBundle\Document\UserLog;

/**
 * HotelRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends DocumentRepository {

    private $count;

    public function findLastLogs() {
        return $this->createQueryBuilder()
                        ->field('action')->equals(UserLog::BUYITEM)
                        ->limit(5)
                        ->skip(0)->sort('id', 'desc')
                        ->getQuery()
                        ->execute();
        ;
    }

    public function findFromPos($email = '') {
        $qb = $this->createQueryBuilder()
                ->limit(1);
        $qb->field('posId')->exists(false);
        if ("" != $email) {
            $qb->addOr($qb->expr()->field('email')->equals($email));
            return $qb->getQuery()->execute();
        }
        return null;
    }

    public function findPage($uid = 155, $page = 1, $limit = 20) {
        if (!(int) $page)
            $page = 1;
        if (!(int) $limit)
            $limit = 20;
        return $this->createQueryBuilder()
                        ->field('uid')->equals((int) $uid)
                        ->limit((int) $limit)
                        ->skip(((int) $page - 1) * (int) $limit)->sort('id', 'desc')
                        ->getQuery()
                        ->execute();
        ;
    }

    public function findLastOrder($uid = 155, $page = 1, $limit = 20) {
        if (!(int) $page)
            $page = 1;
        if (!(int) $limit)
            $limit = 20;
        $qb = $this->createQueryBuilder()
                ->field('uid')->equals((int) $uid)
                ->field('action')->equals('buyitem')
                ->limit((int) $limit)
                ->skip(((int) $page - 1) * (int) $limit);
        $countQuery = clone $qb;
        $this->count = $countQuery->count()->getQuery()->execute();
        return $qb->getQuery()->execute();
    }

    public function getUsers($page = 1, $limit = 20) {
        if (!(int) $page)
            $page = 1;
        if (!(int) $limit)
            $limit = 20;
        $qb = $this->createQueryBuilder()
                ->field('enabled')->equals(true)
                ->where("function() { return this.roles.length == 0; }")
                ->limit((int) $limit)
                ->skip(((int) $page - 1) * (int) $limit);
        $countQuery = clone $qb;
        $this->count = $countQuery->count()->getQuery()->execute();
        return $qb->getQuery()->execute();
    }

    public function getStaffs($page = 1, $limit = 20) {
        if (!(int) $page)
            $page = 1;
        if (!(int) $limit)
            $limit = 20;
        $qb = $this->createQueryBuilder()
                ->field('enabled')->equals(true)
                ->where("function() { return this.roles.length > 0; }")
                ->limit((int) $limit)
                ->skip(((int) $page - 1) * (int) $limit);
        $countQuery = clone $qb;
        $this->count = $countQuery->count()->getQuery()->execute();
        return $qb->getQuery()->execute();
    }

    public function getCount() {
        return $this->count;
    }

    public function seekUsers($data) {
        $builder = $this->createQueryBuilder();
        $builder->field('enabled')->equals(true)->field('posId')->exists(true)->field('CCode')->exists(true);
        if (isset($data['name'])) {
            $builder->addOr($builder->expr()->field('firstname')->equals(new \MongoRegex('/' . $data['name'] . '/i')));
            $builder->addOr($builder->expr()->field('lastname')->equals(new \MongoRegex('/' . $data['name'] . '/i')));
        }
        $builder->where("function() { return this.roles.length == 0; }");
        if (isset($data['cellphone']))
            $builder->field('cellphone')->equals(new \MongoRegex('/^' . $data['cellphone'] . '/'));
        if (isset($data['CCode']) && $data['CCode'])
            $builder->field('CCode')->equals(new \MongoRegex('/^' . $data['CCode'] . '/'));
        if (isset($data['email']) && $data['email'])
            $builder->field('email')->equals($data['email']);
        if (isset($data['level']) && $data['level'])
            $builder->field('level')->equals((int) $data['level']);
        if (isset($data['fpoint']) && isset($data['spoint'])) {
            $builder->field('point')->lt((int) $data['fpoint'] + 1);
            $builder->field('point')->gt((int) $data['spoint'] - 1);
            $builder->field('point')->sort('desc');
        }

        if (!isset($data['export'])) {
            if (isset($data['amount']))
                $limit = $data['amount'];
            else
                $limit = 25;
            if (isset($data['page']))
                $page = $data['page'];
            else
                $page = 1;

            $builder->limit((int) $limit)
                    ->skip(((int) $page - 1) * (int) $limit)->sort('id', 'desc');
        }
        $countQuery = clone($builder);
        $this->count = $countQuery->count()->getQuery()->execute();
        return $builder
                        ->getQuery()
                        ->execute();
        ;
    }

    public function seekRedeemUsers($data) {
        $builder = $this->createQueryBuilder();
        $builder->field('status')->equals(true)->field('posId')->exists(true)->field('CCode')->exists(true);
        if (isset($data['name'])) {
            $builder->addOr($builder->expr()->field('firstname')->equals(new \MongoRegex('/' . $data['name'] . '/i')));
            $builder->addOr($builder->expr()->field('lastname')->equals(new \MongoRegex('/' . $data['name'] . '/i')));
        }
        $builder->where("function() { return this.roles.length == 0; }");
        if (isset($data['cellphone']))
            $builder->field('cellphone')->equals(new \MongoRegex('/^' . $data['cellphone'] . '/'));
        if (isset($data['CCode']) && $data['CCode'])
            $builder->field('CCode')->equals(new \MongoRegex('/^' . $data['CCode'] . '/'));
        if (isset($data['email']) && $data['email'])
            $builder->field('email')->equals($data['email']);
        if (isset($data['level']) && $data['level'])
            $builder->field('level')->equals((int) $data['level']);
        if (isset($data['fpoint']) && isset($data['spoint'])) {
            $builder->field('point')->lt((int) $data['fpoint'] + 1);
            $builder->field('point')->gt((int) $data['spoint'] - 1);
            $builder->field('point')->sort('desc');
        }
        $builder->field('status')->equals(true);
        if (!isset($data['export'])) {
            if (isset($data['amount']))
                $limit = $data['amount'];
            else
                $limit = 25;
            if (isset($data['page']))
                $page = $data['page'];
            else
                $page = 1;

            $builder->limit((int) $limit)
                    ->skip(((int) $page - 1) * (int) $limit)->sort('id', 'desc');
        }
        $countQuery = clone($builder);
        $this->count = $countQuery->count()->getQuery()->execute();
        return $builder
                        ->getQuery()
                        ->execute();
        ;
    }


    //get Total Bill
    public function getTotalBill($data,$number_day,$id){

        $lastdate = date('Y-m-d', strtotime("now -".$number_day." days") );
        $day = date("j", strtotime($lastdate));
        $month = date("n", strtotime($lastdate));
        $year = date("Y", strtotime($lastdate));
        
        $function = 'function(){
                        var rt = false;
                        var d = this.created;
                        if( this.action == "buyitem"){
                            if(d.getFullYear() > '.$year.'){
                                rt = true;
                            }
                            if(d.getFullYear() == '.$year.'){
                                if(d.getDate() >= '.($day).' &&  d.getMonth() == '.($month-1).'){
                                    rt = true;
                                }
                                if(d.getMonth() > '.($month-1).'){
                                    rt = true;
                                }
                            }
                        }
                        return rt;
                    }';
        $dm = $data['dm']->getManager();
        $mongo = new \MongoClient();
        $db = $dm->getConnection()->getConfiguration()->getDefaultDB();
        $col_log = $mongo->$db->aevitaslog;
        $aevitagslog = $col_log->find(array('$where' => $function))->sort(array('user.$id' => 1, "created" => 1));
        $bill_count = 0;
        if(!empty($aevitagslog)){
            $index = 0;
            $length_arr = count($aevitagslog);
            foreach ($aevitagslog as $doc) {
                $index++;
                if($doc['user']['$id'] == $id){
                    $bill_count++;
                }
                
            }
            return $bill_count;
        }     
        return 0;
    }

    // get Store Name
    public function getRegisteredStore($data,$id){
        $dm = $data['dm']->getManager();
            $mongo = new \MongoClient();
            $db = $dm->getConnection()->getConfiguration()->getDefaultDB();
            $col_log = $mongo->$db->aevitaslog;
            $aevitagslog = $col_log->find()->sort(array('user.$id' => 1, "created" => 1));

            foreach ($aevitagslog as $doc) {
                if($doc['user']['$id'] == $id){
                    if(isset($doc['schema']['0'])){
                        $t = $doc['schema']['0'];
                        $branch_name = $t['BranchName'];
                        return $branch_name;
                    }
            }
        }
            return "No Store";

    }

    //get total redeem poin
    public function getTotalRedeemPoint($data,$id){
        $dm = $data['dm']->getManager();
        $redeems = $dm->createQueryBuilder('AevitasLevisBundle:AbstractRedeem')
                    ->field('created')->sort('time', 'desc')->getQuery()->execute();
        $total_redeemed_point = 0;
        if(!empty($redeems)){                    
                    $index = 0;
                    $length_arr = count($redeems);
                    

                    foreach ($redeems as $obj) {
                        if (!is_object($obj->getUser())) {
                            continue;
                        }
                        
                        $index++;
                        if($obj->getUser()->getID() == $id){
                            $total_redeemed_point = $total_redeemed_point + $obj->getPoint();
                            //if($index == $length_arr){
                            //}
                        }

                    }
                    return $total_redeemed_point;
                }
        return 0;
    }

    //get Total Payment
    public function getTotalPayment($data,$number_day,$id){
        $lastdate = date('Y-m-d', strtotime("now -".$number_day." days") );
        $day = date("j", strtotime($lastdate));
        $month = date("n", strtotime($lastdate));
        $year = date("Y", strtotime($lastdate));
        
        $function = 'function(){
                        var rt = false;
                        var d = this.created;
                        if( this.action == "buyitem"){
                            if(d.getFullYear() > '.$year.'){
                                rt = true;
                            }
                            if(d.getFullYear() == '.$year.'){
                                if(d.getDate() >= '.($day).' &&  d.getMonth() == '.($month-1).'){
                                    rt = true;
                                }
                                if(d.getMonth() > '.($month-1).'){
                                    rt = true;
                                }
                            }
                        }
                        return rt;
                    }';
        $dm = $data['dm']->getManager();
        $mongo = new \MongoClient();
        $db = $dm->getConnection()->getConfiguration()->getDefaultDB();
        $col_log = $mongo->$db->aevitaslog;
        $aevitagslog = $col_log->find(array('$where' => $function))->sort(array('user.$id' => 1, "created" => 1));
        $totalPayemnt = 0;
        if(!empty($aevitagslog)){
            $index = 0;
            $length_arr = count($aevitagslog);
            foreach ($aevitagslog as $doc) {
                //$totalPayment = $doc['totalPayment'];
                if($doc['user']['$id'] == $id){
                    $totalPayemnt = $totalPayemnt + $doc['totalPayment'];
                }
                
            }
            //return $totalPayemnt;
        }     
        return $totalPayemnt;
    }
    // Advance Search
    public function advancedSeekUsers($data) {
        $builder = $this->createQueryBuilder();
        $builder->field('enabled')->equals(true)->field('posId')->exists(true)->field('CCode')->exists(true);
        if (!empty($data['name'])) {
            $builder->addOr($builder->expr()->field('firstname')->equals(new \MongoRegex('/' . $data['name'] . '/i')));
            $builder->addOr($builder->expr()->field('lastname')->equals(new \MongoRegex('/' . $data['name'] . '/i')));
        }
        $builder->where("function() { return this.roles.length == 0; }");        

        if (!empty($data['cellphone']))
            $builder->field('cellphone')->equals(new \MongoRegex('/^' . $data['cellphone'] . '/'));
        if (!empty($data['CCode']) && $data['CCode'])
            $builder->field('CCode')->equals(new \MongoRegex('/^' . $data['CCode'] . '/'));
        if (!empty($data['email']) && $data['email'])
            $builder->field('email')->equals($data['email']);
        if (!empty($data['level']) && $data['level'])
            $builder->field('level')->equals((int) $data['level']);
        if(!empty($data['not_active_day'])){
            $builder->field('lastbuy')->lte(new \DateTime($data['not_active_day']));
        }
            
        if (!empty($data['fcardno']) && !empty($data['tcardno'])) {
                $start=(int)$data['fcardno'];
                $end=(int)$data['tcardno'];
                $builder->field('CCode')->exists(true)
                            ->where("function() { var CCode = this.CCode,start=".$start.",end =".$end.", rt = false;
                if(typeof this.CCode != 'undefined'){
                    if(start <= Number(CCode) && Number(CCode) <= end) rt = true;
                };
                return rt;
                }")->sort('CCode', 'asc');
        }

        if(!empty($data['bday_month'])){
           $month = date("m",strtotime($data['bday_month']));
            $start = new \DateTime("".$month."/01/2015");
            $end = new \DateTime("".$month."/31/2015");
            $last = date('Y-m-t', mktime(0, 0, 0, (int) date('m'), 1, (int) date('Y')));
            $lastDate = new \DateTime($last);
            $lastDate->format('d');
            $builder->field('dob')->exists(true)
                            ->where("function() { var dob = this.dob, start = new Date('" . $start->format('Y-m-d') . "'), end = new Date('" . $end->format('Y-m-d') . ' 23:59:59' . "'), rt = false;
                if(typeof this.dob != 'undefined'){
                    dob.setFullYear('" . $start->format('Y') . "');
                    if(start.getTime() <= dob.getTime() && dob.getTime() <= end.getTime()) rt = true;
                };
                return rt;
                }")->sort('dob', 'asc');
        }

        //sex
        if(!empty($data['sex'])){
            $builder->field('sex')->equals((int) $data['sex']);
        }

        //City
        if (!empty($data['city'])){
            $builder->field('city')->equals(new \MongoRegex('/.*' . $data['city'] . '.*/i'));
        }

        //district
        if (!empty($data['district'])){
            $builder->field('district')->equals(new \MongoRegex('/.*' . $data['district'] . '.*/i'));
        }

        //married
        if(!empty($data['mari'])){
            $builder->field('mari')->equals((int) $data['mari']);
        }

        //status
        if(!empty($data['status']) || $data['status'] === '0'){
            $status = ($data['status'] == '1') ? true : false;
            $builder->field('status')->equals($status);
        }

        //triple day
        if(!empty($data['triple_point_dates'])){
            $filter_tr_date = new \DateTime($data['triple_point_dates']);
            $day = date("j", strtotime($data['triple_point_dates']));
            $month = date("n", strtotime($data['triple_point_dates']));
            $year = date("Y", strtotime($data['triple_point_dates']));
            $function = 'function(){
                var rt = false;
                if(typeof this.trdate != "undefined"){
                    
                    var arr = this.trdate;
                    for(var i = 0; i < arr.length; i++){
                        var obj = arr[i];
                        var d = obj.date;
                        if(d.getDate() == '.($day+1).' &&  d.getMonth() == '.($month-1).'){
                            rt = true;
                        }
                    }
                }
                return rt;
            }';            
            $builder->field('trdate')->exists(true)
                    ->where($function);
        }
        //Registration store
        if(!empty($data['registration_store'])){
            $dm = $data['dm']->getManager();
            $mongo = new \MongoClient();
            $db = $dm->getConnection()->getConfiguration()->getDefaultDB();
            $col_log = $mongo->$db->aevitaslog;
            $aevitagslog = $col_log->find()->sort(array('user.$id' => 1, "created" => 1));

            $str_uid = '';
            $uid_before = '';
            foreach ($aevitagslog as $doc) {
                if($doc['user']['$id'] !== $uid_before){
                    if(isset($doc['schema']['0'])){
                        $t = $doc['schema']['0'];
                        $branch_name = $t['BranchName'];
                        if(stristr($branch_name, $data['registration_store']) !== false){
                            $str_uid .= $doc['user']['$id'].',';
                        }
                    }                    
                }
                $uid_before = $doc['user']['$id'];
            }
            
            $builder->field('_id')->in(explode(',', $str_uid));

        }
        //Bill search
        if(!empty($data['bill'])){
            if($data['bill'] == '1'){
                $start = $data['fbill'];
                $end = $data['tbill'];
                $number_day = $data['lastdays'];
                $lastdate = date('Y-m-d', strtotime("now -".$number_day." days") );
                $day = date("j", strtotime($lastdate));
                $month = date("n", strtotime($lastdate));
                $year = date("Y", strtotime($lastdate));
                
                $function = 'function(){
                                var rt = false;
                                var d = this.created;
                                if(typeof this.totalPayment != "undefined"){
                                    if(d.getFullYear() > '.$year.'){
                                        rt = true;
                                    }
                                    if(d.getFullYear() == '.$year.'){
                                        if(d.getDate() >= '.($day+1).' &&  d.getMonth() == '.($month-1).'){
                                            rt = true;
                                        }
                                        if(d.getMonth() > '.($month-1).'){
                                            rt = true;
                                        }
                                    }
                                }
                                return rt;
                            }';
                $dm = $data['dm']->getManager();
                $mongo = new \MongoClient();
                $db = $dm->getConnection()->getConfiguration()->getDefaultDB();
                $col_log = $mongo->$db->aevitaslog;
                $aevitagslog = $col_log->find(array('$where' => $function))->sort(array('user.$id' => 1, "created" => 1));
                
                $str_uid = '';
                $uid_before = '';
                $bill_count = 1;
                if(!empty($aevitagslog)){
                    $index = 0;
                    $length_arr = count($aevitagslog);
                    foreach ($aevitagslog as $doc) {
                        $index++;
                        if($doc['user']['$id'] !== $uid_before){
                            if($bill_count >= $start && $bill_count <= $end){
                                if( $uid_before != ''){
                                    $str_uid .= $uid_before.',';
                                }   
                            }                                                  
                            $bill_count = 1;
                            if($index == $length_arr){
                                if($bill_count >= $start && $bill_count <= $end){
                                    $str_uid .= $doc['user']['$id'].',';
                                }
                            }
                        }else{
                            $bill_count++;
                            if($index == $length_arr && $bill_count >= $start && $bill_count <= $end){
                                $str_uid .= $uid_before.',';
                            }
                        }
                        $uid_before = $doc['user']['$id'];
                    }
                }
                $builder->field('_id')->in(explode(',', $str_uid));

            }else if($data['bill'] == '2'){
                $start = (int)$data['fbill'];
                $end = (int)$data['tbill'];
                $number_day = $data['lastdays'];
                $lastdate = date('Y-m-d', strtotime("now -".$number_day." days") );
                $day = date("j", strtotime($lastdate));
                $month = date("n", strtotime($lastdate));
                $year = date("Y", strtotime($lastdate));
                
                $function = 'function(){
                                var rt = false;
                                var d = this.created;
                                if(typeof this.totalPayment != "undefined"){
                                    if(d.getFullYear() > '.$year.'){
                                        rt = true;
                                    }
                                    if(d.getFullYear() == '.$year.'){
                                        if(d.getDate() >= '.($day+1).' &&  d.getMonth() == '.($month-1).'){
                                            rt = true;
                                        }
                                        if(d.getMonth() > '.($month-1).'){
                                            rt = true;
                                        }
                                    }
                                    
                                }
                                return rt;
                            }';
                $dm = $data['dm']->getManager();
                $mongo = new \MongoClient();
                $db = $dm->getConnection()->getConfiguration()->getDefaultDB();
                $col_log = $mongo->$db->aevitaslog;
                $aevitagslog = $col_log->find(array('$where' => $function))->sort(array('user.$id' => 1, "created" => 1));
                
                $str_uid = '';
                $uid_before = '';                
                if(!empty($aevitagslog)){                    
                    $totalPayment = 0;
                    $index = 0;
                    $length_arr = count($aevitagslog);
                    foreach ($aevitagslog as $doc) {
                        $index++;
                        if($doc['user']['$id'] !== $uid_before){
                            if($totalPayment >= $start && $totalPayment <= $end){
                                if( $uid_before != ''){
                                    $str_uid .= $uid_before.',';
                                }   
                            }                                                  
                            $totalPayment = $doc['totalPayment'];
                            if($index == $length_arr){
                                if($totalPayment >= $start && $totalPayment <= $end){
                                    $str_uid .= $doc['user']['$id'].',';
                                }
                            }
                        }else{
                            $totalPayment = $totalPayment + $doc['totalPayment'];
                            if($index == $length_arr && $totalPayment >= $start && $totalPayment <= $end){
                                $str_uid .= $uid_before.',';
                            }
                        }
                        $uid_before = $doc['user']['$id'];
                    }
                }
                $builder->field('_id')->in(explode(',', $str_uid));
            }
        }

        //Point
        if (!empty($data['point'])) {
            //Point Redeem
            if($data['point'] == '1'){
                $start = (int)$data['fpoint'];
                $end = (int)$data['tpoint'];

                $number_day = $data['p_lastdays'];
                $lastdate = date('Y-m-d', strtotime("now -".$number_day." days") );
                $date = new \DateTime($lastdate. ' 23:59:59');
                
                $dm = $data['dm']->getManager();
                $redeems = $dm->createQueryBuilder('AevitasLevisBundle:AbstractRedeem')
                                ->field('created')->gte($date)->sort('time', 'desc')->getQuery()->execute();
                $str_uid = '';
                $uid_before = '';
                if(!empty($redeems)){                    
                    $index = 0;
                    $length_arr = count($redeems);
                    $total_redeemed_point = 0;

                    foreach ($redeems as $obj) {
                        if (!is_object($obj->getUser())) {
                            continue;
                        }
                        
                        $index++;
                        if($obj->getUser()->getID() !== $uid_before){
                            if($total_redeemed_point >= $start && $total_redeemed_point <= $end){
                                if( $uid_before != ''){
                                    $str_uid .= $uid_before.',';
                                }  
                            }                                                  
                            $total_redeemed_point = $obj->getPoint();
                            if($index == $length_arr){
                                if($total_redeemed_point >= $start && $total_redeemed_point <= $end){
                                    $str_uid .= $obj->getUser()->getID().',';
                                }
                            }
                        }else{
                            $total_redeemed_point = $total_redeemed_point + $obj->getPoint();
                            if($index == $length_arr && $total_redeemed_point >= $start && $total_redeemed_point <= $end){
                                $str_uid .= $uid_before.',';
                            }
                        }
                        $uid_before = $obj->getUser()->getID();   
                    }
                }
                if($str_uid != ''){
                    $builder->field('_id')->in(explode(',', $str_uid));
                }
            }
            //Point Balance
            if($data['point'] == '2'){
                $builder->field('point')->gte((int) $data['fpoint']);
                $builder->field('point')->lte((int) $data['tpoint']);
                $builder->field('point')->sort('desc');
            }
        }

        //Joining day
        if(!empty($data['fjoiningdate']) && !empty($data['tjoiningdate'])){
            $builder->field('join')->gte(new \DateTime($data['fjoiningdate']));
            $builder->field('join')->lte(new \DateTime($data['tjoiningdate']));
        }

        //Bonus Point is expired on the date
        if(!empty($data['fexpireddate']) && !empty($data['texpireddate'])){
            $from_expired_date = date('Y-m-d', strtotime($data['fexpireddate']));
            $to_expired_date = date('Y-m-d', strtotime($data['texpireddate']));

            $function = 'function(){
                        var rt = false;
                        if(typeof this.bonusPoint != ""){                            
                            var arr = this.bonusPoint;
                            for(var i = 0; i < arr.length; i++){
                                var obj = arr[i];
                                var d = obj.expired_date;
                                if(d >= "'.$from_expired_date.'" && d <= "'.$to_expired_date.'" ){
                                    rt = true;
                                }
                            }
                        }
                        return rt;
                    }';
            $builder->field('bonusPoint')->exists(true)->where($function);
        }

        //field user_id
        if(!empty($data['list_uid'])){
            $builder->field('_id')->in(explode(',', $data['list_uid']));
        }        

        if (!isset($data['export'])) {
            if (isset($data['amount']))
                $limit = $data['amount'];
            else
                $limit = 25;
            if (isset($data['page']))
                $page = $data['page'];
            else
                $page = 1;

            $builder->limit((int) $limit)
                    ->skip(((int) $page - 1) * (int) $limit)->sort('id', 'desc');
        }
        $countQuery = clone($builder);
        $this->count = $countQuery->count()->getQuery()->execute();
        return $builder
                        ->getQuery()
                        ->execute();
        ;
    }



    public function advancedSeekUsers_bk($data) {
        $builder = $this->createQueryBuilder();
        $builder->field('enabled')->equals(true)->field('posId')->exists(true)->field('CCode')->exists(true);
        if (!empty($data['name'])) {
            $builder->addOr($builder->expr()->field('firstname')->equals(new \MongoRegex('/' . $data['name'] . '/i')));
            $builder->addOr($builder->expr()->field('lastname')->equals(new \MongoRegex('/' . $data['name'] . '/i')));
        }
        $builder->where("function() { return this.roles.length == 0; }");
        if (!empty($data['cellphone']))
            $builder->field('cellphone')->equals(new \MongoRegex('/^' . $data['cellphone'] . '/'));
        if (!empty($data['CCode']) && $data['CCode'])
            $builder->field('CCode')->equals(new \MongoRegex('/^' . $data['CCode'] . '/'));
        if (!empty($data['email']) && $data['email'])
            $builder->field('email')->equals($data['email']);
        if (!empty($data['level']) && $data['level'])
            $builder->field('level')->equals((int) $data['level']);
        if(!empty($data['not_active_day'])){
            $builder->field('lastbuy')->lte(new \DateTime($data['not_active_day']));
        }

        if (!isset($data['export'])) {
            if (isset($data['amount']))
                $limit = $data['amount'];
            else
                $limit = 25;
            if (isset($data['page']))
                $page = $data['page'];
            else
                $page = 1;

            $builder->limit((int) $limit)
                    ->skip(((int) $page - 1) * (int) $limit)->sort('id', 'desc');
        }
        $countQuery = clone($builder);
        $this->count = $countQuery->count()->getQuery()->execute();
        return $builder
                        ->getQuery()
                        ->execute();
        ;
    }

    public function findOneBy(array $criteria) {
        if (is_array(end($criteria))) {
            $qb = $this->createQueryBuilder();
            foreach ($criteria as $or) {
                if (is_array($or))
                    foreach ($or as $key => $value) {
                        $qb->addOr($qb->expr()->field($key)->equals($value));
                    }
            }
            return $qb->limit(1)
                            ->skip(0)
                            ->getQuery()
                            ->execute();
        } else
            return parent::findOneBy($criteria);
    }

}
