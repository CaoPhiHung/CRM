<?php

namespace Aevitas\PointBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Aevitas\PointBundle\Document\PointRule;
use Aevitas\PointBundle\Form\Type\PointRuleFormType;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Vietland\UserBundle\Document\User;
use Vietland\UserBundle\Document\UserLog;
use Vietland\AevitasBundle\Document\City;
use Symfony\Bundle\TwigBundle\Loader\FilesystemLoader;

class DefaultController extends Controller {

    /**
     * @Route("/backend/listpoint/{storeKw}", name="backend_point_rules_list")
     * @Secure(roles="ROLE_POINT")
     * @Template()
     */
    public function indexAction($storeKw=0)
    {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        if ($storeKw == 0){
            $rules = $dm->getRepository('AevitasPointBundle:PointRule')->findAll();
        }else{
            $qb = $dm->createQueryBuilder('AevitasPointBundle:PointRule');
            $qb->addOr($qb->expr()->field('store')->equals(new \MongoRegex("/{$storeKw}/i")));
            $rules = $qb->getQuery()->execute();
            //$rules = $dm->getRepository('AevitasPointBundle:PointRule')->findBy(array('store' => intval($storeId)));
        }
        $stores = $dm->getRepository('AevitasLevisBundle:Store')->findAll();
        //var_dump(array_merge(User::getLevelOptions($this->get('translator'))));exit;
        $levels = User::getLevelOptions($this->get('translator'));
        $levels[''] = '--';
        return array(
            'rules' => $rules,
            'pointSchema' => PointRule::$pointSchema,
            'actions' => array_merge(UserLog::getActionPoints(), array('' => '--')),
            'levels' => $levels,
            'stores' => $stores
        );
    }

    /**
     * @Route("/backend/point/addnew.html", name="backend_point_rules_addnew")
     * @Secure(roles="ROLE_POINT")
     * @Template()
     */
    public function addNewAction() {
        $dm = $this->get('database_manager');
        $cities = $dm->getRepository('VietlandAevitasBundle:City')->findAll();
        $stores = $dm->getRepository('AevitasLevisBundle:Store')->findAll();
        $rule = new PointRule();
        $type = new PointRuleFormType($this->get('translator'), UserLog::getActionPoints());
        $form = $this->createForm($type, $rule);

        $request = $this->getRequest();
        if ('POST' == $request->getMethod()) {
            $form->bind($request);
            if ($form->isValid()) {
                if (count($dm->getRepository('AevitasPointBundle:PointRule')->findBy(array('name' => $rule->getName()))) > 0) {
                    $this->getRequest()->getSession()->getFlashBag()->add('notice', 'point rule name already exists!');
                } else {
                    $checkValid = true;
                    
                    if ($rule->getStore() == null || $rule->getStore() == ''){
                        $rule->setStore('_');
                    }
                    
                    if ($request->get('select-city')!=0){
                        $rule->setCity($request->get('select-city'));
                        $rule->setDistrict($request->get('select-district'));
                        $rule->setLocate($request->get('district-name') . ' - ' . $request->get('city-name'));
                    }

                    ### add store from program to rule ###
                    #$rule->setStore($rule->getProgram()->getStore()->getOldId()); // disabled
                    ### end store ###
                    ### begin check interval date ###
                    /* $sDate = $rule->getProgram()->getStartDate();
                      $fDate = $rule->getProgram()->getEndDate();
                      $arrS = explode('/', $sDate);
                      $arrF = explode('/', $fDate);
                      $timeS = strtotime($arrS[0].'-'.$arrS[1].'-'.$arrS[2]);
                      $timeF = strtotime($arrF[0].'-'.$arrF[1].'-'.$arrF[2]);
                      if ($timeS <= strtotime('1-1-2013')){
                      $checkValid = false; //exit('2');
                      $this->getRequest()->getSession()->getFlashBag()->add('notice', 'start date much be after 01/01/2013');

                      }else if ($timeS > $timeF){
                      $checkValid = false; //exit('3');
                      $this->getRequest()->getSession()->getFlashBag()->add('notice', 'Finish time much be after From time');
                      }
                      $rule->setSDay($arrS[0] + $arrS[1]*31 + ($arrS[2]-2013)*12*31);
                      $rule->setFDay($arrF[0] + $arrF[1]*31 + ($arrF[2]-2013)*12*31);/* */
                    if ($checkValid && $request->get('turn-IntervalDate') == 'on') {
                        $sDate = $request->get('sDate');
                        $fDate = $request->get('fDate');
                        $DateRegex = '/^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/';
                        if (!preg_match($DateRegex, $sDate) || !preg_match($DateRegex, $fDate)) {
                            $checkValid = false; //exit('1');
                            $this->getRequest()->getSession()->getFlashBag()->add('notice', 'invalid time interval setting');
                        } else {
                            $arrS = explode('/', $sDate);
                            $arrF = explode('/', $fDate);
                            $timeS = strtotime($arrS[0] . '-' . $arrS[1] . '-' . $arrS[2]);
                            $timeF = strtotime($arrF[0] . '-' . $arrF[1] . '-' . $arrF[2]);
                            if ($timeS <= strtotime('1-1-2013')) {
                                $checkValid = false; //exit('2');
                                $this->getRequest()->getSession()->getFlashBag()->add('notice', 'start date much be after 01/01/2013');
                            } else if ($timeS > $timeF) {
                                $checkValid = false; //exit('3');
                                $this->getRequest()->getSession()->getFlashBag()->add('notice', 'Finish time much be after From time');
                            }
                            $rule->setSDay($arrS[0] + $arrS[1] * 31 + ($arrS[2] - 2013) * 12 * 31);
                            $rule->setFDay($arrF[0] + $arrF[1] * 31 + ($arrF[2] - 2013) * 12 * 31);
                        }
                    }else if ($rule->getBonus() == true){
                        $this->getRequest()->getSession()->getFlashBag()->add('notice', 'when set bonus check, you much set interval time for rule');
                        $checkValid = false;
                    }
                    ### end check interval date ###
                    ### begin check days of month ###
                    if ($checkValid && $request->get('turn-DayOfMonth') == 'on') {
                        $sDay = $request->get('sDayMonth');
                        $fDay = $request->get('fDayMonth');
                        $DayRegex = '/^([1-9]|[1-2][0-9]|3[0-1])$/';
                        if (!preg_match($DayRegex, $sDay) || !preg_match($DayRegex, $fDay)) {
                            $checkValid = false; //exit('1');
                            $this->getRequest()->getSession()->getFlashBag()->add('notice', 'invalid days of month setting');
                        } else if ($sDay > $fDay) {
                            $checkValid = false; //exit('2');
                            $this->getRequest()->getSession()->getFlashBag()->add('notice', 'The finish day much be after start day');
                        } else {
                            $rule->setSDayInMonth($sDay);
                            $rule->setFDayInMonth($fDay);
                        }
                    }
                    ### end check days of month ###
                    ### begin check days of week ###
                    if ($checkValid && $request->get('turn-DayOfWeek') == 'on') {
                        $arrDay = $request->get('sDayWeek');
                        $arrDayRegex = '/^[1-7\,]{1,13}$/';
                        if (!preg_match($arrDayRegex, $arrDay)) {
                            $checkValid = false; //exit('1');
                            $this->getRequest()->getSession()->getFlashBag()->add('notice', 'invalid days of week setting');
                        } else {
                            $rule->setArrDayInWeek($arrDay);
                        }
                    }
                    ### end check days of week ###
                    ### begin check hours of day ###
                    if ($checkValid && $request->get('turn-HourOfDay') == 'on') {
                        $sHour = $request->get('sHourDay');
                        $fHour = $request->get('fHourDay');
                        $HourRegex = '/^([0-9]|1[0-9]|2[0-3])$/';
                        if (!preg_match($HourRegex, $sHour) || !preg_match($HourRegex, $fHour)) {
                            $checkValid = false; //exit('1');
                            $this->getRequest()->getSession()->getFlashBag()->add('notice', 'invalid hours of day setting');
                        } else if ($sHour > $fHour) {
                            $checkValid = false; //exit('2');
                            $this->getRequest()->getSession()->getFlashBag()->add('notice', 'The finish hour much be after start hour');
                        } else {
                            $rule->setSHourInDay($sHour);
                            $rule->setFHourInDay($fHour);
                        }
                    }
                    ### end check hours of day ###

                    if ($checkValid && $request->get('turn-DayParity') == 'on') {
                        $rule->setDayParity($request->get('DayParity'));
                    }

                    if ($checkValid) {
                        //exit('ok');
                        $dm = $this->get('doctrine_mongodb')->getManager();
                        $dm->persist($rule);
                        $dm->flush();

                        $router = $this->get('router');
                        $this->getRequest()->getSession()->getFlashBag()->add('notice', 'New point rule has been created!');
                        return new RedirectResponse($router->generate('backend_point_rules_list'));
                    }
                    //exit('no');
                }
            } else {
                $this->getRequest()->getSession()->getFlashBag()->add('notice', 'form invalid!');
            }
        }

        return array(
            'form' => $form->createview(),
            'cities' => $cities,
            'stores' => $stores
        );
    }

    /**
     * @Route("/backend/point/edit/{ruleID}", name="backend_point_rules_edit")
     * @Secure(roles="ROLE_POINT")
     * @Template()
     */
    public function editAction($ruleID) {
        $dm = $this->get('database_manager');
        $cities = $dm->getRepository('VietlandAevitasBundle:City')->findAll();
        $stores = $dm->getRepository('AevitasLevisBundle:Store')->findAll();
        $rule = $dm->getRepository('AevitasPointBundle:PointRule')->find($ruleID);
        $type = new PointRuleFormType($this->get('translator'), UserLog::getActionPoints());
        //var_dump($type);exit;
        $form = $this->createForm($type, $rule);
        $form->setData($rule);

        $request = $this->getRequest();
        if ('POST' == $request->getMethod()) {
            $form->bind($request);
            if ($form->isValid()) {
                $checkValid = true;
                
                if ($rule->getStore() == null || $rule->getStore() == ''){
                    $rule->setStore('_');
                }
                
                if ($request->get('select-city')!=0){
                    $rule->setCity($request->get('select-city'));
                    if ($request->get('select-district') != ''){
                        $rule->setDistrict($request->get('select-district'));
                    }else{
                        $rule->setDistrict(null);
                    }
                    $rule->setLocate($request->get('district-name').' - '.$request->get('city-name'));
                }else{
                    $rule->setCity(null);
                    $rule->setDistrict(null);
                    $rule->setLocate('');
                }

                ### add store from program to rule ### disabled
                #$rule->setStore($rule->getProgram()->getStore()->getOldId());
                ### end store ###
                ### begin check interval date ###
                /* $sDate = $rule->getProgram()->getStartDate();
                  $fDate = $rule->getProgram()->getEndDate();
                  $arrS = explode('/', $sDate);
                  $arrF = explode('/', $fDate);
                  $timeS = strtotime($arrS[0].'-'.$arrS[1].'-'.$arrS[2]);
                  $timeF = strtotime($arrF[0].'-'.$arrF[1].'-'.$arrF[2]);
                  if ($timeS <= strtotime('1-1-2013')){
                  $checkValid = false; //exit('2');
                  $this->getRequest()->getSession()->getFlashBag()->add('notice', 'start date much be after 01/01/2013');

                  }else if ($timeS > $timeF){
                  $checkValid = false; //exit('3');
                  $this->getRequest()->getSession()->getFlashBag()->add('notice', 'Finish time much be after From time');
                  }
                  $rule->setSDay($arrS[0] + $arrS[1]*31 + ($arrS[2]-2013)*12*31);
                  $rule->setFDay($arrF[0] + $arrF[1]*31 + ($arrF[2]-2013)*12*31);/* */
                if ($checkValid && $request->get('turn-IntervalDate') == 'on') {
                    $sDate = $request->get('sDate');
                    $fDate = $request->get('fDate');
                    $DateRegex = '/^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/';
                    if (!preg_match($DateRegex, $sDate) || !preg_match($DateRegex, $fDate)) {
                        $checkValid = false; //exit('1');
                        $this->getRequest()->getSession()->getFlashBag()->add('notice', 'invalid time interval setting');
                    } else {
                        $arrS = explode('/', $sDate);
                        $arrF = explode('/', $fDate);
                        $timeS = strtotime($arrS[0] . '-' . $arrS[1] . '-' . $arrS[2]);
                        $timeF = strtotime($arrF[0] . '-' . $arrF[1] . '-' . $arrF[2]);
                        if ($timeS <= strtotime('1-1-2013')) {
                            $checkValid = false;
                            exit('2');
                            $this->getRequest()->getSession()->getFlashBag()->add('notice', 'start date much be after 01/01/2013');
                        } else if ($timeS > $timeF) {
                            $checkValid = false;
                            exit('3');
                            $this->getRequest()->getSession()->getFlashBag()->add('notice', 'Finish time much be after From time');
                        }
                        $rule->setSDay($arrS[0] + $arrS[1] * 31 + ($arrS[2] - 2013) * 12 * 31);
                        $rule->setFDay($arrF[0] + $arrF[1] * 31 + ($arrF[2] - 2013) * 12 * 31);
                    }
                }else {
                    $rule->setSDay(null);
                    $rule->setFDay(null);
                    if ($rule->getBonus() == true){
                        $this->getRequest()->getSession()->getFlashBag()->add('notice', 'when set bonus check, you much set interval time for rule');
                        $checkValid = false;
                    }
                }/**/
                ### end check interval date ###
                ### begin check days of month ###
                if ($checkValid && $request->get('turn-DayOfMonth') == 'on') {
                    $sDay = $request->get('sDayMonth');
                    $fDay = $request->get('fDayMonth');
                    $DayRegex = '/^([1-9]|[1-2][0-9]|3[0-1])$/';
                    if (!preg_match($DayRegex, $sDay) || !preg_match($DayRegex, $fDay)) {
                        $checkValid = false; //exit('1');
                        $this->getRequest()->getSession()->getFlashBag()->add('notice', 'invalid days of month setting');
                    } else if ($sDay > $fDay) {
                        $checkValid = false; //exit('2');
                        $this->getRequest()->getSession()->getFlashBag()->add('notice', 'The finish day much be after start day');
                    } else {
                        $rule->setSDayInMonth($sDay);
                        $rule->setFDayInMonth($fDay);
                    }
                }else{
                    $rule->setSDayInMonth(null);
                    $rule->setFDayInMonth(null);
                }
                ### end check days of month ###
                ### begin check days of week ###
                if ($checkValid && $request->get('turn-DayOfWeek') == 'on') {
                    $arrDay = $request->get('sDayWeek');
                    $arrDayRegex = '/^[1-7\,]{1,13}$/';
                    if (!preg_match($arrDayRegex, $arrDay)) {
                        $checkValid = false; //exit('1');
                        $this->getRequest()->getSession()->getFlashBag()->add('notice', 'invalid days of week setting');
                    } else {
                        $rule->setArrDayInWeek($arrDay);
                    }
                }else{
                    $rule->setArrDayInWeek(null);
                }
                ### end check days of week ###
                ### begin check hours of day ###
                if ($checkValid && $request->get('turn-HourOfDay') == 'on') {
                    $sHour = $request->get('sHourDay');
                    $fHour = $request->get('fHourDay');
                    $HourRegex = '/^([0-9]|1[0-9]|2[0-3])$/';
                    if (!preg_match($HourRegex, $sHour) || !preg_match($HourRegex, $fHour)) {
                        $checkValid = false; //exit('1');
                        $this->getRequest()->getSession()->getFlashBag()->add('notice', 'invalid hours of day setting');
                    } else if ($sHour > $fHour) {
                        $checkValid = false; //exit('2');
                        $this->getRequest()->getSession()->getFlashBag()->add('notice', 'The finish hour much be after start hour');
                    } else {
                        $rule->setSHourInDay($sHour);
                        $rule->setFHourInDay($fHour);
                    }
                }else{
                    $rule->setSHourInDay(null);
                    $rule->setFHourInDay(null);
                }
                ### end check hours of day ###

                if ($checkValid && $request->get('turn-DayParity') == 'on') {
                    $rule->setDayParity($request->get('DayParity'));
                }else{
                    $rule->setDayParity(null);
                }

                if ($checkValid) {
                    //exit('ok');
                    $dm = $this->get('doctrine_mongodb')->getManager();
                    $dm->persist($rule);
                    $dm->flush();

                    $router = $this->get('router');
                    $this->getRequest()->getSession()->getFlashBag()->add('notice', 'This point rule has been edited!');
                    return new RedirectResponse($router->generate('backend_point_rules_list'));
                }
                //exit('no');
            } else {
                $this->getRequest()->getSession()->getFlashBag()->add('notice', 'form invalid!');
            }
        }

        if (!is_null($rule->getSDay())) {
            $SDate = self::MyDateConvert($rule->getSDay());
            $FDate = self::MyDateConvert($rule->getFDay());
        } else {
            $SDate = $FDate = '';
        }
        return array(
            'form' => $form->createview(),
            'sdate' => $SDate,
            'fdate' => $FDate,
            'rule' => $rule,
            'cities' => $cities,
            'stores' => $stores
        );
    }

    /**
     * @Route("/backend/point/delete/{ruleID}", name="backend_point_rules_delete")
     * @Secure(roles="ROLE_POINT")
     * @Template()
     */
    public function deleteAction($ruleID) {
        if (isset($ruleID)) {
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $rule = $dm->getRepository('AevitasPointBundle:PointRule')->find($ruleID);
            $dm->remove($rule);
            $dm->flush();
            $router = $this->get('router');
            $this->getRequest()->getSession()->getFlashBag()->add('notice', 'The point rule has been deleted!');
            return new RedirectResponse($router->generate('backend_point_rules_list'));
        }

        $this->getRequest()->getSession()->getFlashBag()->add('notice', 'has an error!');
        return array();
    }

    static function MyDateConvert($val) {
        $TimeY = floor($val / (31 * 12));
        $val -= $TimeY * (31 * 12);
        $TimeM = floor($val / 31);
        $TimeD = (int) $val - (int) $TimeM * 31;

        if ($TimeD == 0) {
            $TimeD = 31;
            $TimeM -= 1;
        }

        return ((($TimeD < 10) ? '0' : '') . $TimeD . '/' . (($TimeM < 10) ? '0' : '') . $TimeM . '/' . ($TimeY + 2013));
    }

    /**
     * @Route("/backend/point/test.html", name="backend_point_rules_test")
     * @Secure(roles="ROLE_POINT")
     * @Template()
     */
    public function testAction() {
        ##### start demo point.rule service
        $rt = $this->get('point.rule')
                ->setDm($this->get('doctrine.odm.mongodb.document_manager'))
                ->setSchema(array(
                    'store' => 43,
                    'action' => UserLog::BUYITEM
                ));
        var_dump($this->get('point.rule')->redeemgold);exit;
        echo '<pre style="width:100%;white-space: pre-wrap;white-space: -moz-pre-wrap;white-space: -pre-wrap;white-space: -o-pre-wrap;word-wrap: break-word;">';
        
        echo '<b>Schema:</b>'.chr(13).chr(10).'   '.$rt->getSchema().chr(13).chr(10);
        
        echo chr(13).chr(10).'<b>List results ('.count($rt->getRules()).'):</b>'.chr(13).chr(10);
        $ii=1;
        foreach ($rt->getRules() as $rule){
            echo '   '.($ii++).'/ <i>'.$rule->getName().'</i> - schema: <i>'.$rule->getSchema().'</i>'.' - stores list: '.$rule->getStore().chr(13).chr(10);
        }
        echo '</pre>';
        exit;
        ##### end demo point.rule service
    }

}
