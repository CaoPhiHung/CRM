<?php

namespace Aevitas\LevisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Vietland\UserBundle\Document\User;
use Vietland\UserBundle\Document\UserLog;

class ReportController extends Controller {

    /**
     * @Route("/_proxy/render/useractive", name="render_user_active")
     * @Cache(expires="3600s", public="true")
     * @Template()
     */
    public function renderReportUserActiveAction() {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $queryBuilder = $dm->createQueryBuilder("VietlandUserBundle:User")
                        ->field('CCode')->exists(true)
                        ->field('posId')->exists(true)
                        ->field('qlf')->gt(0);
        $map = 'function(){if(this.lastLogin) login = "active"; else login = "inactive"; emit(login, {count: 1})}';
        $reduce = 'function(key, values){results = {count: 0}; results.count = values.length; return results;}';
        $result = $queryBuilder->map($map)->reduce($reduce)->getQuery()->execute();
        $statistic = array();
        array_map(function($item)use(&$statistic) {
                    $statistic[] = '["' . $item['_id'] . '", ' . $item['value']['count'] . ']';
                }, $result->toArray());
        return array('stat' => implode(',', $statistic));
    }

    /**
     * @Route("/_proxy/render/userprofile", name="render_user_profile")
     * @Cache(expires="3600s", public="true")
     * @Template()
     */
    public function renderReportUserProfileAction() {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $queryBuilder = $dm->createQueryBuilder("VietlandUserBundle:User")->field('qlf')->gt(0);
        $edit = array('praddress1' => 0, 'prdob' => 0, 'pranniversary' => 0,
            'prcity' => 0, 'prdistrict' => 0, 'prfirstname' => 0, 'prlastname' => 0, 'prsex' => 0,
            'prmari' => 0, 'procpu' => 0, 'princo' => 0, 'prkids' => 0, 'pranni' => 0, 'prfone' => 0);
//        $map = 'function(){
//            edit = this.edt.split("-");
//            results = {total: 1, address: parseFloat(edit[0]), dob: parseFloat(edit[1]), city: parseFloat(edit[3]), district: parseFloat(edit[4]), firstname: parseFloat(edit[5]), lastname: parseFloat(edit[6]), sex: parseFloat(edit[7]), married: parseFloat(edit[8]), occupation: parseFloat(edit[9]), income: parseFloat(edit[10]), anni: parseFloat(edit[11]), fone: parseFloat(edit[12])};
//            emit("profile", results);
//            }';
//        $reduce = 'function(key, values){
//            results = {total: 0, address: 0, dob: 0,  city: 0, district: 0, firstname: 0, lastname: 0, sex: 0, married: 0, occupation: 0, income: 0, anni: 0, fone: 0};
//            values.forEach(function(val){
//            results.address += val.address;
//            results.dob += val.dob;
//            results.city += val.city;
//            results.district += val.district;
//            results.firstname += val.firstname;
//            results.lastname += val.lastname;
//            results.married += val.married;
//            results.occupation += val.occupation;
//            results.sex += val.sex;
//            results.fone += val.fone;
//            results.total += val.total;
//            });
//            return results;}';
//        $result = $queryBuilder->map($map)->reduce($reduce)->getQuery()->execute();
//        $data = $result->toArray();
//        $label = '[\'' . implode("','", array_keys($data[0]['value'])) . '\']';
//        $total = (int) $data[0]['value']['total'];
//        $extractData = array();
//        unset($data[0]['value']['total']);
//        array_map(function($item)use($total, &$extractData) {
//                    $extractData[] = round($item * 100 / $total, 2);
//                }, $data[0]['value']);
//        $gdata = '[\'Customer Profile Statistic\',' . implode(',', $extractData) . ']';
        return array('label' => 'pingle', 'gdata' => '[\'Customer Profile\', 0,0,0]');
    }

    /**
     * @Route("/download/user/report/", name="customer_report_download")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function indexAction() {
        $excelService = $this->get('xls.service_xls5');
        $excelService->excelObj->getProperties()->setCreator("Vietland JSC")
                ->setLastModifiedBy("Vietland JSC")
                ->setTitle("Vietland JSC exports report for Levis")
                ->setSubject("Customer Report")
                ->setDescription("This document helps marketing operator make decission accordingly on users statistic.")
                ->setKeywords("office 2005 openxml php")
                ->setCategory("Test result file");

        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $users = $dm->createQueryBuilder("VietlandUserBundle:User")->field('enabled')->equals(true)->field('posId')->exists(true)->getQuery()->execute();
        $index = 5;
        $range = range('A', 'V');
        // $excelService->excelObj->setActiveSheetIndex(0);
        $translator = $this->get('translator');
        $styleArray = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => 'ff0000')
            )
        );
        // $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A1', 'Date Report')->getStyle('A1')->applyFromArray($styleArray);
        // $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B1', date('m-d-Y'));
        foreach ($users as $user) {
            $attributes = $user->getReportAttributes();
            $loop = 0;
            $valuable = 0;
            foreach ($attributes as $key => $value) {
                if ($index == 5) {//Write Header
                    $excelService->excelObj->setActiveSheetIndex(0)
                            ->setCellValue($range[$loop] . ($index - 1), $translator->trans($key))
                            ->getStyle($range[$loop] . ($index - 1))->applyFromArray($styleArray);
                }
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue($range[$loop] . $index, $value);
                if ($value)
                    $valuable++;
                $loop++;
            }
            // $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('V' . $index, (($valuable - 2) / (count($range) - 2)) * 100);
            $loop = 0;
            $index++;
        }
        // $excelService->excelObj->getActiveSheet()->setTitle('User Accounts');
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        // $excelService->excelObj->setActiveSheetIndex(0);

        //create the response
        $response = $excelService->getResponse();
        $response->headers->set('Content-type', 'application/ms-excel; charset=utf-8');
        $response->headers->set('Content-Disposition', 'attachment; filename="user-statistic.xls"');

        // If you are using a https connection, you have to set those two headers and use sendHeaders() for compatibility with IE <9
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');
        $response->sendHeaders();
        return $response;
        return array();
    }

    /**
     * @Route("/form/download/report", name="form_download_report_account")
     * @Template()
     */
    public function downloadReportCustomerPurchaseAction() {
        $form = $this->createFormBuilder()->add('start', 'text', array('required' => true, 'attr' => array('class' => 'datetime')))
                ->add('end', 'text', array('required' => true, 'attr' => array('class' => 'datetime')))
                ->add('level', 'choice', array('required' => false, 'empty_value' => 'Choose an Level', 'choices' => User::getLevelOptions($this->get('translator'))))
                ->add('spoint', 'text', array('required' => false, 'label' => 'from point'))
                ->add('fpoint', 'text', array('required' => false, 'label' => 'to point'))
                ->getForm();
        return array('form' => $form->createView());
    }

    /**
     * @Route("/download/report/account", name="download_report_account")
     */
    public function memberPurchaseAction() {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $request = $this->getRequest();
        $queryBuilder = $dm->createQueryBuilder("VietlandUserBundle:UserLog")->field('action')->equals('buyitem');

        $form = $this->createFormBuilder()->add('start', 'text', array('required' => true, 'attr' => array('class' => 'datetime')))
                ->add('end', 'text', array('required' => true, 'attr' => array('class' => 'datetime')))
                ->add('level', 'choice', array('required' => false, 'empty_value' => 'Choose an Level', 'choices' => User::getLevelOptions($this->get('translator'))))
                ->add('spoint', 'text', array('required' => false, 'label' => 'from point'))
                ->add('fpoint', 'text', array('required' => false, 'label' => 'to point'))
                ->getForm();
        $form->bind($request);
//        var_dump($form->isValid());exit;
        $fdata = $form->getData();
        if ($form->isValid()) {
            $start = new \DateTime($fdata['start']);
            $end = new \DateTime($fdata['end']);
        }
        $map = 'function(){
                var start = new Date("' . $start->format("M d, Y") . ' 00:00:00"), end = new Date("' . $end->format("M d, Y") . ' 23:59:59"), now = this.created;
                var results = {no_cashmem_report_period: 0, no_cashmem_report_total: 1, no_cashmem_sixmoth: 0, no_item_report_period: 0, no_item_report_total: 0, total_net_purchase_report_period: 0, total_net_report: 0, average_ticket_value: 0, no_item_tickets_total: 0};
                info = this.schema[0];
                items = this.schema[1]["items"];
                for(key in items){
                    results.no_item_report_total += parseInt(items[key].Qty);
                }
                
                results.total_net_report = info.Amount;
               if(start <= now && now <= end){
                results.no_cashmem_report_period = 1;
                for (var value in items) {
                    results.no_item_report_period += parseInt(items[value].Qty);
                };
                results.total_net_purchase_report_period = info.Amount;
               }
               results.average_ticket_value = info.Amount;
               results.no_item_tickets_total = 1;
               emit(this.uid, results);
            }';

        $reduce = 'function(key, values){
                var results = {no_cashmem_report_period: 0, no_cashmem_report_total: 0, no_cashmem_sixmoth: 0, no_item_report_period: 0, no_item_report_total: 0, total_net_purchase_report_period: 0, total_net_report: 0, average_ticket_value: 0, no_item_tickets_total: 0};
                values.forEach(function(v){
                    results.total_net_purchase_report_period += parseFloat(v.total_net_purchase_report_period);
                    results.average_ticket_value += parseFloat(v.average_ticket_value);
                    results.no_item_tickets_total += parseFloat(v.no_item_tickets_total);
                    results.no_item_report_period += parseFloat(v.no_item_report_period);
                    results.no_cashmem_report_period += parseFloat(v.no_cashmem_report_period);
                    results.total_net_report += parseFloat(v.total_net_report);
                    results.no_item_report_total += parseFloat(v.no_item_report_total);
                    results.no_cashmem_report_total += parseFloat(v.no_cashmem_report_total);
                });
                if(results.no_item_report_total) results.average_ticket_value = results.total_net_report/results.no_item_report_total;
                if(results.no_cashmem_report_total) results.no_item_tickets_total = results.no_item_report_total/results.no_cashmem_report_total;
                return results;
            }';
        $results = $queryBuilder->map($map)->reduce($reduce)->getQuery()->execute();
        $statistic = $results->toArray();
        $data = array();
        array_map(function($item)use(&$data) {
                    $data[$item['_id']] = $item['value'];
                }, $statistic);
//        echo '<pre>';
//        var_dump($data);
//        exit('</pre>');
        $users = $dm->getRepository('VietlandUserBundle:User')->findBy(array('enabled' => true));
        $reports = array();
//        var_dump(get_class($users));exit;

        $excelService = $this->get('xls.service_xls5');
        $excelService->excelObj->getProperties()->setCreator("Vietland JSC")
                ->setLastModifiedBy("Vietland JSC")
                ->setTitle("Vietland JSC exports report for Levis")
                ->setSubject("Customer Report")
                ->setDescription("This document helps marketing operator make decission accordingly on users statistic.")
                ->setKeywords("office 2005 openxml php")
                ->setCategory("Test result file");

        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $userBuilder = $dm->createQueryBuilder("VietlandUserBundle:User")->field('posId')->exists(true);

        if (isset($fdata['level']))
            $userBuilder->field('level')->equals((int) $fdata['level']);
        if (isset($fdata['spoint']))
            $userBuilder->field('point')->gte((int) $fdata['spoint']);
        if (isset($fdata['fpoint']))
            $userBuilder->field('point')->lte((int) $fdata['fpoint']);
        $users = $userBuilder->getQuery()->execute();
        $range = range('A', 'T');
        $store = array(); //hold user's registered store
        $excelService->excelObj->setActiveSheetIndex(0);
        $translator = $this->get('translator');
        $styleArray = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => 'ff0000')
            )
        );
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A1', 'Member Purchase Analysis Report')->getStyle('A1')->applyFromArray($styleArray);
        $index = 10;
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A4', 'GeneRated  On ' . date('d/m/Y H:i:s'))->getStyle('A2')->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A5', 'Report period ' . $start->format("M d, Y") . ' - ' . $end->format("M d, Y"))->getStyle('A3')->applyFromArray($styleArray);
        foreach ($users as $user) {
            $attributes = $user->getReportAttributes();
            $loop = 0;
            if ($index == 10) {//Write Header
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A' . ($index - 1), 'Card No')->getStyle('A' . ($index - 1))->applyFromArray($styleArray);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B' . ($index - 1), 'Customer Name')->getStyle('B' . ($index - 1))->applyFromArray($styleArray);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('C' . ($index - 1), 'Store Name')->getStyle('C' . ($index - 1))->applyFromArray($styleArray);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('D' . ($index - 1), 'Date Joining')->getStyle('D' . ($index - 1))->applyFromArray($styleArray);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('E' . ($index - 1), 'Current Level')->getStyle('E' . ($index - 1))->applyFromArray($styleArray);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('F' . ($index - 1), 'No Of Cash Memos for report period')->getStyle('F' . ($index - 1))->applyFromArray($styleArray);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('G' . ($index - 1), 'No Of Cash Memos for Total period')->getStyle('G' . ($index - 1))->applyFromArray($styleArray);
//                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('G' . ($index - 1), 'Cash memo no. in last 6 month')->getStyle('G' . ($index - 1))->applyFromArray($styleArray);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('H' . ($index - 1), 'No Of Qty for report period')->getStyle('H' . ($index - 1))->applyFromArray($styleArray);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('I' . ($index - 1), 'No Of Qty for Total period')->getStyle('I' . ($index - 1))->applyFromArray($styleArray);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('J' . ($index - 1), 'Total Net Purchase Amount  of Customer as on Report To date')->getStyle('J' . ($index - 1))->applyFromArray($styleArray);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('K' . ($index - 1), 'Total Net Purchase Amount  of Customer ')->getStyle('K' . ($index - 1))->applyFromArray($styleArray);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('L' . ($index - 1), 'Total earned point')->getStyle('L' . ($index - 1))->applyFromArray($styleArray);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('M' . ($index - 1), 'Redeemed point')->getStyle('M' . ($index - 1))->applyFromArray($styleArray);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('N' . ($index - 1), 'Current Point')->getStyle('N' . ($index - 1))->applyFromArray($styleArray);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('O' . ($index - 1), 'ATV Total')->getStyle('O' . ($index - 1))->applyFromArray($styleArray);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('P' . ($index - 1), 'UPT Total')->getStyle('P' . ($index - 1))->applyFromArray($styleArray);
//                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('Q' . ($index - 1), 'Store')->getStyle('Q' . ($index - 1))->applyFromArray($styleArray);
            }
            if (isset($data[$user->getId()])) {
                $stat = $data[$user->getId()];
                $cCode = $user->getCCode();
                $userSignup = $dm->getRepository('VietlandUserBundle:UserLog')->findOneBy(array('uid' => $user->getId()));
                if (!is_object($userSignup))
                    $userSignup = $dm->getRepository('VietlandUserBundle:UserLog')->findOneBy(array('uid' => $user->getId(), 'action' => 'signuponline'));
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A' . $index, $user->getCCode());
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B' . $index, $user->getName());
                //get store
                if (strlen($cCode) == 10) {
                    $prefix = substr($cCode, 0, 2);
                } else if (strlen($cCode) > 10)
                    $prefix = substr($cCode, 0, 3);
                if (!isset($store[$prefix]))
                    $customerCode = $dm->getRepository('AevitasCustomerCodeBundle:CustomerCode')->findOneBy(array('prefix' => (int) $prefix));
                else
                    $customerCode = $store[$prefix];
                if (is_object($customerCode))
                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('C' . ($index), $customerCode->getStore()->getName());
                if (is_object($userSignup))
                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('D' . $index, $userSignup->getCreated()->format('Y-m-d'));
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('E' . $index, $user->getLevel());
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('F' . $index, $stat['no_cashmem_report_period']);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('G' . $index, $stat['no_cashmem_report_total']);
//                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('G' . $index, $stat['no_cashmem_sixmoth']);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('H' . $index, $stat['no_item_report_period']);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('I' . $index, $stat['no_item_report_total']);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('J' . $index, $stat['total_net_purchase_report_period']);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('K' . $index, $stat['total_net_report']);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('L' . $index, $user->getTotalPoint());
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('M' . $index, $user->getUsedPoint());
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('N' . $index, $user->getPoint());
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('O' . $index, $stat['average_ticket_value']);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('P' . $index, $stat['no_item_tickets_total']);
//                if(is_object($userSignup)) $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('Q' . $index, $userSignup->getSubject());
//            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A' . $index, $value);
                $index++;
            }
        }
        $excelService->excelObj->getActiveSheet()->setTitle('User Purchase Memo');
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $excelService->excelObj->setActiveSheetIndex(0);

        //create the response
        $response = $excelService->getResponse();
        $response->headers->set('Content-type', 'application/ms-excel; charset=utf-8');
        $response->headers->set('Content-Disposition', 'attachment; filename="user-purchase-memo-' . time() . '.xls"');

        // If you are using a https connection, you have to set those two headers and use sendHeaders() for compatibility with IE <9
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');
        $response->sendHeaders();
        return $response;
    }

    /**
     * @Route("/backend/user/exportadvancedseeking", name="backend_user_exportadvancedseeking")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function exportAdvancedSearchAction() {
        $c=set_time_limit(10000);
        function castutf8($str)
        {
            return utf8_encode(utf8_decode($str));
        }
        \PHPExcel_Settings::setZipClass(\PHPExcel_Settings::ZIPARCHIVE);
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $repo = $dm->getRepository('VietlandUserBundle:User');
        $request = $this->getRequest();
        $data = $request->query->all();
        $data['export'] = true;
        $data['dm'] = $this->get('doctrine_mongodb');
        $users = $repo->advancedSeekUsers($data);

        $excelService = $this->get('xls.service_xls5');
        $excelService->excelObj->getProperties()->setCreator("Vietland JSC")
                ->setLastModifiedBy("Vietland JSC")
                ->setTitle("Vietland JSC exports report for Levis")
                ->setSubject("Customer Report")
                ->setDescription("This document helps marketing operator make decission accordingly on users statistic.")
                ->setKeywords("office 2005 openxml php")
                ->setCategory("Test result file");
        $styleArray = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => 'ff0000')
            )
        );
        $index = 1;
        $store = array();
        // $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A1', 'Member Detail Report Report')->getStyle('A1')->applyFromArray($styleArray);
        // $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A2', 'GeneRated  On ' . date('d/m/Y H:i:s'))->getStyle('A2')->applyFromArray($styleArray);

        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A' . ($index), 'Email Address')->getStyle('A' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B' . ($index), 'First Name')->getStyle('B' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('C' . ($index), 'Middle Name')->getStyle('C' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('D' . ($index), 'Last Name')->getStyle('D' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('E' . ($index), 'Username')->getStyle('E' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('F' . ($index), 'Status')->getStyle('F' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('G' . ($index), 'Reason')->getStyle('G' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('H' . ($index), 'Disabled Date')->getStyle('H' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('I' . ($index), 'Sex')->getStyle('I' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('J' . ($index), 'Birthday')->getStyle('J' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('K' . ($index), 'Marial status')->getStyle('K' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('L' . ($index), 'Registered Code')->getStyle('L' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('M' . ($index), 'CCode')->getStyle('M' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('N' . ($index), 'Cellphone')->getStyle('N' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('O' . ($index), 'Address')->getStyle('O' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('P' . ($index), 'District')->getStyle('P' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('Q' . ($index), 'City')->getStyle('Q' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('R' . ($index), 'Joining date')->getStyle('R' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('S' . ($index), 'Registered Store')->getStyle('S' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('T' . ($index), 'Total Bills')->getStyle('T' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('U' . ($index), 'Total Payment')->getStyle('U' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('V' . ($index), 'Total Point')->getStyle('V' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('W' . ($index), 'Total Redeemed point')->getStyle('W' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('X' . ($index), 'Total Extra Point')->getStyle('X' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('Y' . ($index), 'Expiration Days')->getStyle('Y' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('Z' . ($index), 'Current Level')->getStyle('Z' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('AA' . ($index), 'Next Level')->getStyle('AA' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('AB' . ($index), 'Point to next Level')->getStyle('AB' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('AC' . ($index), 'Last buy')->getStyle('AC' . ($index))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('AE' . ($index), 'Days From Deactivated')->getStyle('AD' . ($index))->applyFromArray($styleArray);

        $cities = array();
        $districts = array();
        foreach ($users as $user) {
           // if($user->getTotalRedeemPoint() == 1){
           //     $user->setTotalRedeemPoint(0);
           //     $dm->persist($user);
           //     $dm->flush();
           // }
            // if($user->getTotalRedeemPoint() == 0 ){
            //     $total_bill = $repo->getTotalRedeemPoint($data,$user->getId());
            //     $user->setTotalRedeemPoint($total_bill);
            //     if($total_bill == 0){
            //         $user->setTotalRedeemPoint(1);
            //     }
            //     //$total_bill = $repo->getRegisteredStore($data,$user->getId());
                
            //     $dm->persist($user);
            //     $dm->flush();

            // }


            //totalBill
            // if($user->getTotalBill() == 0 ){
            //     $total_bill = $repo->getTotalBill($data,"",$user->getId());
            //     $user->setTotalBill($total_bill);
            //     $dm->persist($user);
            //     $dm->flush();
            // }

            //totalPayment
            // if($user->getTotalPayment() == 0 ){
            //     $total_bill = $repo->getTotalPayment($data,"",$user->getId());
            //     $user->setTotalPayment($total_bill);
            //     $dm->persist($user);
            //     $dm->flush();
            // }

            //registerStore
            // if($user->getRegisterStore() == "" ){
            //     $total_bill = $repo->getRegisteredStore($data,$user->getId());
            //     $user->setRegisterStore($total_bill);
            //     $dm->persist($user);
            //     $dm->flush();
            // }

            $cCode = $user->getCCode();

            $email= (string)$user->getEmail();
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A' . ($index + 1), $email);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B' . ($index + 1), castutf8($user->getFirstname()));
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('C' . ($index + 1), castutf8($user->getMiddlename()));
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('D' . ($index + 1), castutf8($user->getLastname()));
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('E' . ($index + 1), castutf8($user->getUsername()));

            $now = new \DateTime(date('Y-m-d'));

            $disabledDate =  $user->getModifyStatusDate()->format('Y-m-d');
            // (int) ((dt2.getTime() - dt1.getTime()) / (1000 * 60 * 60 * 24));
            $datediff=  (strtotime($now->format('Y-m-d')) - strtotime($disabledDate))/(60*60*24);

            $reason = castutf8($user->getReason());
            $status = "Disabled";
            if($user->getStatus() == TRUE){
                $status = "Enabled";
                $datediff= '';
                $reason='';
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('G' . ($index + 1), '');
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('H' . ($index + 1), '');
            }


            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('F' . ($index + 1), $status);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('G' . ($index + 1), $reason);          
            
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('I' . ($index + 1), $user->getSexLabel());
            if (is_object($user->getDob()))
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('J' . ($index + 1), $user->getDob()->format('Y-m-d'));
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('K' . ($index + 1), $user->getMarriageLabel());
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('L' . ($index + 1), $user->getRegcode());
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('M' . ($index + 1), (string)$cCode);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('N' . ($index + 1), $user->getCellphone());
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('O' . ($index + 1), $user->getAddress1());
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('P' . ($index + 1), $user->getDistrict());
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('Q' . ($index + 1), $user->getCity());
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('R' . ($index + 1), $user->getJoined());
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('S' . ($index + 1), $user->getRegisterStore());
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('T' . ($index + 1), $user->getTotalBill());
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('U' . ($index + 1), $user->getTotalPayment());
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('V' . ($index + 1), (string)$user->getPoint());
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('W' . ($index + 1),  $user->getTotalRedeemPoint());
            //$excelService->excelObj->setActiveSheetIndex(0)->setCellValue('X' . ($index + 1), $user->getTotalExtraPoint());
            //$excelService->excelObj->setActiveSheetIndex(0)->setCellValue('Y' . ($index + 1), $user->getExpriationsDay()->format('Y-m-d'));
            $level = $user->getLevel();
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('Z' . ($index + 1), $level);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('AA' . ($index + 1), $user->getNextLevel());
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('AB' . ($index + 1), $user->pointToNextLevel($user->getTotalPayment()));
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('AC' . ($index + 1), $user->getLastbuy()->format('Y-m-d'));
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('AD' . ($index + 1), $datediff);

            $index++;
            
        }
        $excelService->excelObj->getActiveSheet()->setTitle('User List Filter');
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $excelService->excelObj->setActiveSheetIndex(0);

        //create the response
        $response = $excelService->getResponse();
        $response->headers->set('Content-Type', 'application/ms-excel; charset=utf-8');
        $response->headers->set('Content-Disposition', 'attachment; filename="member-detail-' . time() . '.xls"');
        // If you are using a https connection, you have to set those two headers and use sendHeaders() for compatibility with IE <9
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');
        $response->sendHeaders();

        return $response;
    }


    /**
     * @Route("/backend/user/exportseeking", name="backend_user_exportseeking")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function exportSearchAction() {
        $c=set_time_limit(10000);
        function castutf8($str)
        {
            return utf8_encode(utf8_decode($str));
        }
        \PHPExcel_Settings::setZipClass(\PHPExcel_Settings::ZIPARCHIVE);
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $repo = $dm->getRepository('VietlandUserBundle:User');
        $request = $this->getRequest();
        $data = $request->query->all();
        $data['export'] = true;
        $users = $repo->seekUsers($data);

        $excelService = $this->get('xls.service_xls5');
        $excelService->excelObj->getProperties()->setCreator("Vietland JSC")
                ->setLastModifiedBy("Vietland JSC")
                ->setTitle("Vietland JSC exports report for Levis")
                ->setSubject("Customer Report")
                ->setDescription("This document helps marketing operator make decission accordingly on users statistic.")
                ->setKeywords("office 2005 openxml php")
                ->setCategory("Test result file");
        $styleArray = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => 'ff0000')
            )
        );
        $index = 2;
        $store = array();
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A1', 'Member Detail Report Report')->getStyle('A1')->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A2', 'GeneRated  On ' . date('d/m/Y H:i:s'))->getStyle('A2')->applyFromArray($styleArray);

        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A' . ($index + 3), 'First Name')->getStyle('A' . ($index + 3))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B' . ($index + 3), 'Last Name')->getStyle('B' . ($index + 3))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('C' . ($index + 3), 'Email')->getStyle('C' . ($index + 3))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('D' . ($index + 3), 'Purchased point')->getStyle('D' . ($index + 3))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('E' . ($index + 3), 'Total Point')->getStyle('E' . ($index + 3))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('F' . ($index + 3), 'Customer Code')->getStyle('F' . ($index + 3))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('G' . ($index + 3), 'Current Level')->getStyle('G' . ($index + 3))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('H' . ($index + 3), 'Store')->getStyle('H' . ($index + 3))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('I' . ($index + 3), 'City')->getStyle('I' . ($index + 3))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('J' . ($index + 3), 'District')->getStyle('J' . ($index + 3))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('K' . ($index + 3), 'Address')->getStyle('K' . ($index + 3))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('L' . ($index + 3), 'Sex')->getStyle('L' . ($index + 3))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('M' . ($index + 3), 'Marial status')->getStyle('M' . ($index + 3))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('N' . ($index + 3), 'Joining date')->getStyle('N' . ($index + 3))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('O' . ($index + 3), 'Birthday')->getStyle('O' . ($index + 3))->applyFromArray($styleArray);
        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('P' . ($index + 3), 'Cellphone')->getStyle('P' . ($index + 3))->applyFromArray($styleArray);
        $cities = array();
        $districts = array();
        foreach ($users as $user) {
            $cCode = $user->getCCode();
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A' . ($index + 4), castutf8($user->getFirstname()));
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B' . ($index + 4), castutf8($user->getLastname()));
            
            $email= (string)$user->getEmail();
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('C' . ($index + 4), $email);
            
            $qfpoint =$user->getQualifyPoint();
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('D' . ($index + 4), $qfpoint);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('E' . ($index + 4), (string)$user->getPoint());
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('F' . ($index + 4), (string)$cCode);
            $level = $user->getLevel();
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('G' . ($index + 4), $level);
            // //get store
            if (strlen($cCode) == 10) {
                $prefix = substr($cCode, 0, 2);
            } else if (strlen($cCode) > 10)
                $prefix = substr($cCode, 0, 3);
            if (!isset($store[$prefix]))
                $customerCode = $dm->getRepository('AevitasCustomerCodeBundle:CustomerCode')->findOneBy(array('prefix' => (int) $prefix));
            else
                $customerCode = $store[$prefix];
            if (is_object($customerCode))
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('H' . ($index + 4), $customerCode->getStore()->getName());
            //get city and district
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('I' . ($index + 4), $user->getCity());
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('J' . ($index + 4), $user->getDistrict());
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('K' . ($index + 4), $user->getAddress1());
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('L' . ($index + 4), $user->getSexLabel());
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('M' . ($index + 4), $user->getMarriageLabel());
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('N' . ($index + 4), $user->getJoined());
            if (is_object($user->getDob()))
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('O' . ($index + 4), $user->getDob()->format('Y-m-d'));
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('P' . ($index + 4), $user->getCellphone());
            $index++;
            
        }
        // die();
        $excelService->excelObj->getActiveSheet()->setTitle('User List Filter');
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $excelService->excelObj->setActiveSheetIndex(0);

        //create the response
        $response = $excelService->getResponse();
        $response->headers->set('Content-Type', 'application/ms-excel; charset=utf-8');
        $response->headers->set('Content-Disposition', 'attachment; filename="member-detail-' . time() . '.xls"');
        // If you are using a https connection, you have to set those two headers and use sendHeaders() for compatibility with IE <9
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');
        $response->sendHeaders();

        return $response;
    }

    /**
     * @Route("/backend/newmber/report", name="backend_report_newmember")
     * @Template()
     * @Secure(roles="ROLE_ADMIN, ROLE_REPORT")
     */
    public function newMemberReportAction() {
        $request = $this->getRequest();
        $form = $this->createFormBuilder()->add('start', 'text', array('required' => true, 'attr' => array('class' => 'datetime')))->add('end', 'text', array('required' => true, 'attr' => array('class' => 'datetime')))->getForm();
        $form->bind($request);
//        var_dump($form->isValid());exit;
        $data = array_filter($form->getData());
        if ($form->isValid() && !empty($data)) {
            $start = new \DateTime($data['start'] . ' 0:0:0');
            $end = new \DateTime($data['end'] . ' 23:59:59');

            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $queryBuilder = $dm->createQueryBuilder('VietlandUserBundle:User');
            $queryBuilder->field('join')->gte($start)
                    ->field('join')->lte($end)
                    ->field('enabled')->equals(true)
                    ->field('posId')->exists(true);
            $results = $queryBuilder->getQuery()->execute();
            $excelService = $this->get('xls.service_xls5');
            $excelService->excelObj->getProperties()->setCreator("Vietland JSC")
                    ->setLastModifiedBy("Vietland JSC")
                    ->setTitle("Vietland JSC exports report for Levis")
                    ->setSubject("Customer Report")
                    ->setDescription("This document helps marketing operator make decission accordingly on users statistic.")
                    ->setKeywords("office 2005 openxml php")
                    ->setCategory("Test result file");
            $styleArray = array(
                'font' => array(
                    'bold' => true,
                    'color' => array('rgb' => 'ff0000')
                )
            );
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A1', 'New Member Report')->getStyle('A1')->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A2', 'Report Date')->getStyle('A2')->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B2', date('Y-m-d'))->getStyle('B2')->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A3', 'Report period')->getStyle('A3')->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B3', $data['start'] . '/' . $data['end'])->getStyle('B3')->applyFromArray($styleArray);
            $index = 5;
            $cities = array();
            $districts = array();
            $store = array();
            $range = range('A', 'Y');
            $translator = $this->get('translator');
            foreach ($results as $user) {
                try {
                    //get store
                    $cCode = $user->getCCode();
                    if (strlen($cCode) == 10) {
                        $prefix = substr($cCode, 0, 2);
                    } else if (strlen($cCode) > 10)
                        $prefix = substr($cCode, 0, 3);
                    if (!isset($store[$prefix]))
                        $customerCode = $dm->getRepository('AevitasCustomerCodeBundle:CustomerCode')->findOneBy(array('prefix' => (int) $prefix));
                    else
                        $customerCode = $store[$prefix];

                    $attributes = $user->getReportAttributes();
                    $loop = 0;
                    $valuable = 0;
                    foreach ($attributes as $key => $value) {
                        if ($index == 5) {//Write Header
                            $excelService->excelObj->setActiveSheetIndex(0)
                                    ->setCellValue($range[$loop] . ($index - 1), $translator->trans($key))
                                    ->getStyle($range[$loop] . ($index - 1))->applyFromArray($styleArray);
                        }
                        if ($value)
                            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue($range[$loop] . $index, $value);
                        if ($value)
                            $valuable++;
                        $loop++;
                    }
                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('W' . $index, $user->getCity());
                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('X' . $index, $user->getDistrict());
                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('Y' . $index, round((($valuable - 2) / (count($range) - 2)) * 100, 2));
                    $loop = 0;
                    $index++;
                } catch (\Exception $e) {
                    continue;
                    ;
                }
            }
            $excelService->excelObj->getActiveSheet()->setTitle('User List Filter');
            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $excelService->excelObj->setActiveSheetIndex(0);

            //create the response
            $response = $excelService->getResponse();
            $response->headers->set('Content-type', 'application/ms-excel; charset=utf-8');
            $response->headers->set('Content-Disposition', 'attachment; filename="newmember-report-' . time() . '.xls"');

            // If you are using a https connection, you have to set those two headers and use sendHeaders() for compatibility with IE <9
            $response->headers->set('Pragma', 'public');
            $response->headers->set('Cache-Control', 'maxage=1');
            $response->sendHeaders();
            return $response;
        }
        return array('form' => $form->createView());
    }

    /**
     * @Route("/backend/birthday/report", name="backend_report_birthday")
     * @Template()
     * @Secure(roles="ROLE_ADMIN, ROLE_REPORT")
     */
    public function birthdayReportAction() {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $request = $this->getRequest();
        $form = $this->createFormBuilder()->add('start', 'text', array('required' => true, 'attr' => array('class' => 'datetime')))->add('end', 'text', array('required' => true, 'attr' => array('class' => 'datetime')))->getForm();
        $form->bind($request);
//        var_dump($form->isValid());exit;
        $data = array_filter($form->getData());
        if (!empty($data)) {
            $start = new \DateTime($data['start']);
            $end = new \DateTime($data['end']);
            $last = date('Y-m-t', mktime(0, 0, 0, (int) date('m'), 1, (int) date('Y')));
            $lastDate = new \DateTime($last);
            $lastDate->format('d');
            $users = $dm->createQueryBuilder('VietlandUserBundle:User')
                            ->field('dob')->exists(true)
                            ->where("function() { var dob = this.dob, start = new Date('" . $start->format('Y-m-d') . "'), end = new Date('" . $end->format('Y-m-d') . ' 23:59:59' . "'), rt = false;
                if(typeof this.dob != 'undefined'){
                    dob.setFullYear('" . $start->format('Y') . "');
                    if(start.getTime() <= dob.getTime() && dob.getTime() <= end.getTime()) rt = true;
                };
                return rt;
                }")->sort('dob', 'asc')->getQuery()->execute();
            $index = 0;
            $excelService = $this->get('xls.service_xls5');
            $excelService->excelObj->getProperties()->setCreator("Vietland JSC")
                    ->setLastModifiedBy("Vietland JSC")
                    ->setTitle("Vietland JSC exports report for Levis")
                    ->setSubject("Customer Report")
                    ->setDescription("This document helps marketing operator make decission accordingly on users statistic.")
                    ->setKeywords("office 2005 openxml php")
                    ->setCategory("Test result file");
            $styleArray = array(
                'font' => array(
                    'bold' => true,
                    'color' => array('rgb' => 'ff0000')
                )
            );
            $cities = array();
            $districts = array();
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A1', 'Birth Day Report Period')->getStyle('A1')->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B1', $data['start'] . ' - ' . $data['end'])->getStyle('B1')->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A2', 'Report Date')->getStyle('A2')->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B2', date('Y-m-d'))->getStyle('B2')->applyFromArray($styleArray);

            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A' . ($index + 3), 'Card No')->getStyle('A' . ($index + 3))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B' . ($index + 3), 'Name')->getStyle('B' . ($index + 3))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('C' . ($index + 3), 'Birth Day')->getStyle('C' . ($index + 3))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('D' . ($index + 3), 'Member Level')->getStyle('D' . ($index + 3))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('E' . ($index + 3), 'City/Province')->getStyle('E' . ($index + 3))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('F' . ($index + 3), 'District')->getStyle('F' . ($index + 3))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('G' . ($index + 3), 'Address')->getStyle('G' . ($index + 3))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('H' . ($index + 3), 'Cellphone')->getStyle('H' . ($index + 3))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('I' . ($index + 3), 'Email')->getStyle('I' . ($index + 3))->applyFromArray($styleArray);
            foreach ($users as $user) {
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A' . ($index + 4), $user->getCCode());
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B' . ($index + 4), $user->getName());
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('C' . ($index + 4), $user->getDob()->format('Y-m-d'));
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('D' . ($index + 4), $user->getLevel());
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('E' . ($index + 4), $user->getCity());
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('F' . ($index + 4), $user->getDistrict());

                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('G' . ($index + 4), $user->getAddress1());
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('H' . ($index + 4), $user->getCellphone());
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('I' . ($index + 4), $user->getEmail());
                $index++;
            }
            $excelService->excelObj->getActiveSheet()->setTitle('User List Filter');
            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $excelService->excelObj->setActiveSheetIndex(0);

            //create the response
            $response = $excelService->getResponse();
            $response->headers->set('Content-type', 'application/ms-excel; charset=utf-8');
            $response->headers->set('Content-Disposition', 'attachment; filename="birthday-report-' . time() . '.xls"');

            // If you are using a https connection, you have to set those two headers and use sendHeaders() for compatibility with IE <9
            $response->headers->set('Pragma', 'public');
            $response->headers->set('Cache-Control', 'maxage=1');
            $response->sendHeaders();
            return $response;
        }
        return array('form' => $form->createView());
    }

    /**
     * @Route("/backend/anniversary/report", name="backend_report_anniversary")
     * @Template()
     * @Secure(roles="ROLE_ADMIN, ROLE_REPORT")
     */
    public function anniversarydayReportAction() {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $request = $this->getRequest();
        $form = $this->createFormBuilder()->add('start', 'text', array('required' => true, 'attr' => array('class' => 'datetime')))->add('end', 'text', array('required' => true, 'attr' => array('class' => 'datetime')))->getForm();
        $form->bind($request);
//        var_dump($form->isValid());exit;
        $data = array_filter($form->getData());
        if (!empty($data)) {
            $start = new \DateTime($data['start']);
            $end = new \DateTime($data['end']);
            $last = date('Y-m-t', mktime(0, 0, 0, (int) date('m'), 1, (int) date('Y')));
            $lastDate = new \DateTime($last);
            $lastDate->format('d');
            $users = $dm->createQueryBuilder('VietlandUserBundle:User')
                            ->field('anni')->exists(true)
                            ->where("function() { var anni = this.anni, start = new Date('" . $start->format('Y-m-d') . "'), end = new Date('" . $end->format('Y-m-d') . ' 23:59:59' . "'), rt = false;
                for (i in anni){
                    if(typeof anni[i].date != 'undefined'){
                        anni[i].date.setFullYear('" . $start->format('Y') . "');
                        if(start.getTime() <= anni[i].date.getTime() && anni[i].date.getTime() <= end.getTime()) rt = true;
                    }
                }
                
                return rt;
                }")->sort('lastname', 'asc')->getQuery()->execute();
            $index = 0;
            $excelService = $this->get('xls.service_xls5');
            $excelService->excelObj->getProperties()->setCreator("Vietland JSC")
                    ->setLastModifiedBy("Vietland JSC")
                    ->setTitle("Vietland JSC exports report for Levis")
                    ->setSubject("Customer Report")
                    ->setDescription("This document helps marketing operator make decission accordingly on users statistic.")
                    ->setKeywords("office 2005 openxml php")
                    ->setCategory("Test result file");
            $styleArray = array(
                'font' => array(
                    'bold' => true,
                    'color' => array('rgb' => 'ff0000')
                )
            );
            $cities = array();
            $districts = array();
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A1', 'Anniversary Day Report Period')->getStyle('A1')->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B1', $data['start'] . ' - ' . $data['end'])->getStyle('B1')->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A2', 'Report Date')->getStyle('A2')->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B2', date('Y-m-d'))->getStyle('B2')->applyFromArray($styleArray);

            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A' . ($index + 3), 'Card No')->getStyle('A' . ($index + 3))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B' . ($index + 3), 'Name')->getStyle('B' . ($index + 3))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('C' . ($index + 3), 'Anniversary Day')->getStyle('C' . ($index + 3))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('D' . ($index + 3), 'Member Level')->getStyle('D' . ($index + 3))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('E' . ($index + 3), 'City/Province')->getStyle('E' . ($index + 3))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('F' . ($index + 3), 'District')->getStyle('F' . ($index + 3))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('G' . ($index + 3), 'Address')->getStyle('G' . ($index + 3))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('H' . ($index + 3), 'Cellphone')->getStyle('H' . ($index + 3))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('I' . ($index + 3), 'Email')->getStyle('I' . ($index + 3))->applyFromArray($styleArray);
            foreach ($users as $user) {
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A' . ($index + 4), $user->getCCode());
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B' . ($index + 4), $user->getName());
                // get list anniversary
                $listAnni = $user->getAnniversary();
                $strAnni = '';
                foreach ($listAnni as $anni) {
                    $strAnni .= $anni->getName() . ':' . $anni->getDate()->format('Y-m-d') . ' , ';
                }
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('C' . ($index + 4), $strAnni);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('D' . ($index + 4), $user->getLevel());
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('E' . ($index + 4), $user->getCity());
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('F' . ($index + 4), $user->getDistrict());

                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('G' . ($index + 4), $user->getAddress1());
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('H' . ($index + 4), $user->getCellphone());
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('I' . ($index + 4), $user->getEmail());
                $index++;
            }
            $excelService->excelObj->getActiveSheet()->setTitle('User List Filter');
            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $excelService->excelObj->setActiveSheetIndex(0);

            //create the response
            $response = $excelService->getResponse();
            $response->headers->set('Content-type', 'application/ms-excel; charset=utf-8');
            $response->headers->set('Content-Disposition', 'attachment; filename="anniversary-report-' . time() . '.xls"');

            // If you are using a https connection, you have to set those two headers and use sendHeaders() for compatibility with IE <9
            $response->headers->set('Pragma', 'public');
            $response->headers->set('Cache-Control', 'maxage=1');
            $response->sendHeaders();
            return $response;
        }
        return array('form' => $form->createView());
    }

    /**
     * @Route("/backend/notshopped/report", name="backend_report_notshopped")
     * @Secure(roles="ROLE_ADMIN, ROLE_REPORT")
     * @Template()
     */
    public function notShoppedReportAction() {
        $request = $this->getRequest();
        $form = $this->createFormBuilder()->add('start', 'text', array('required' => true, 'attr' => array('class' => 'datetime')))->add('end', 'text', array('required' => true, 'attr' => array('class' => 'datetime')))->getForm();
        $form->bind($request);
        $data = array_filter($form->getData());
        if (!empty($data)) {
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $queryBuilder = $dm->createQueryBuilder("VietlandUserBundle:UserLog")
                            ->field('action')->equals('buyitem')
                            ->field('uid')->exists(true)
                            ->field('created')->lt(new \DateTime($data['end'] . ' 23:59:59'))
                            ->field('created')->gt(new \DateTime($data['start']));
            $map = 'function(){emit(this.uid, {count: 1})}';
            $reduce = 'function(key, values){results = {count: values.length};return results;}';
            $result = $queryBuilder->map($map)->reduce($reduce)->getQuery()->execute();
            $uids = array();
            array_map(function($item) use(&$uids) {
                        $uids[] = $item['_id'];
                    }, $result->toArray());
            if (!empty($uids)) {
                $users = $dm->createQueryBuilder("VietlandUserBundle:User")
                                ->field('id')->notIn($uids)
                                ->field('posId')->exists(true)
                                ->field('lastbuy')->exists(true)
                                ->field('enabled')->equals(true)
                                ->getQuery()->execute();

                $excelService = $this->get('xls.service_xls5');
                $excelService->excelObj->getProperties()->setCreator("Vietland JSC")
                        ->setLastModifiedBy("Vietland JSC")
                        ->setTitle("Vietland JSC exports report for Levis")
                        ->setSubject("Customer Report")
                        ->setDescription("This document helps marketing operator make decission accordingly on users statistic.")
                        ->setKeywords("office 2005 openxml php")
                        ->setCategory("Test result file");
                $styleArray = array(
                    'font' => array(
                        'bold' => true,
                        'color' => array('rgb' => 'ff0000')
                    )
                );
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A1', 'Not Shopped Report')->getStyle('A1')->applyFromArray($styleArray);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A2', 'Report Date')->getStyle('A2')->applyFromArray($styleArray);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B2', date('Y-m-d'));
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A3', 'Report Period')->getStyle('A3')->applyFromArray($styleArray);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B3', $data['start'] . ' - ' . $data['end'])->getStyle('B3')->applyFromArray($styleArray);
                $index = 1;
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A' . ($index + 3), 'Card No')->getStyle('A' . ($index + 3))->applyFromArray($styleArray);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B' . ($index + 3), 'Name')->getStyle('B' . ($index + 3))->applyFromArray($styleArray);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('C' . ($index + 3), 'Joining Date')->getStyle('C' . ($index + 3))->applyFromArray($styleArray);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('D' . ($index + 3), 'Level/Status')->getStyle('D' . ($index + 3))->applyFromArray($styleArray);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('E' . ($index + 3), 'Mobile')->getStyle('E' . ($index + 3))->applyFromArray($styleArray);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('F' . ($index + 3), 'Email')->getStyle('F' . ($index + 3))->applyFromArray($styleArray);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('G' . ($index + 3), 'Last buy')->getStyle('G' . ($index + 3))->applyFromArray($styleArray);
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('H' . ($index + 3), 'Not Shopped days')->getStyle('H' . ($index + 3))->applyFromArray($styleArray);

                foreach ($users as $user) {

                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A' . ($index + 4), $user->getCCode());
                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B' . ($index + 4), $user->getName());
                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('C' . ($index + 4), $user->getJoined());
                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('D' . ($index + 4), $user->getLevel());
                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('E' . ($index + 4), $user->getCellphone());
                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('F' . ($index + 4), $user->getEmail());
                    $now = new \DateTime('now');
                    $lastTime = $user->getLastbuy();
                    $dateInterval = $now->diff($lastTime);
                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('G' . ($index + 4), $lastTime->format('Y-m-d'));
                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('H' . ($index + 4), $dateInterval->format('%a days'));
                    $index++;
                }
                $excelService->excelObj->getActiveSheet()->setTitle('User List Filter');
                // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                $excelService->excelObj->setActiveSheetIndex(0);

                //create the response
                $response = $excelService->getResponse();
                $response->headers->set('Content-type', 'application/ms-excel; charset=utf-8');
                $response->headers->set('Content-Disposition', 'attachment; filename="not-shopped-report-' . time() . '.xls"');

                // If you are using a https connection, you have to set those two headers and use sendHeaders() for compatibility with IE <9
                $response->headers->set('Pragma', 'public');
                $response->headers->set('Cache-Control', 'maxage=1');
                $response->sendHeaders();
                return $response;
            }
        }
        return array('form' => $form->createView());
    }

    /**
     * @Route("/backend/user/user_statement/{id}", name="backend_report_userstatement")
     * @Secure(roles="ROLE_ADMIN, ROLE_REPORT")
     * @Template()
     */
    public function userStatementAction($id) {
        $request = $this->getRequest();
        $form = $this->createFormBuilder()
        ->add('start', 'text', array('required' => true, 'attr' =>
                         array(
                            'class' => 'datetime'
                            )))
        ->add('end', 'text', array('required' => true, 'attr'
                     => array(
                        'class' => 'datetime'
                        )))
        ->getForm();
        $form->bind($request);
        $data = array_filter($form->getData());
        if (!empty($data)) {
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $user = $dm->getRepository('VietlandUserBundle:User')->find($id);
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $queryBuilder = $dm->createQueryBuilder("VietlandUserBundle:UserLog")
                            ->field('uid')->equals((int) $id)
                            ->field('created')->lt(new \DateTime($data['end'] . ' 23:59:59'))
                            ->field('created')->gt(new \DateTime($data['start']))
                            ->field('created')->sort('desc');
            $logs = $queryBuilder->getQuery()->execute();
            /* foreach ($logs as $log){
              echo $log->getUid().' , '.$log->getCreated()->format('h:i:s d/m/Y').', '.$log->getAction().', '.$log->getPoint();
              echo '<br/>';
              }
              exit;/* */
            $index = 6;
            $point = $user->getPoint();
            $excelService = $this->get('xls.service_xls5');
            $excelService->excelObj->getProperties()->setCreator("Vietland JSC")
                    ->setLastModifiedBy("Vietland JSC")
                    ->setTitle("Vietland JSC exports report for Levis")
                    ->setSubject("Customer Report")
                    ->setDescription("This document helps marketing operator make decission accordingly on users statistic.")
                    ->setKeywords("office 2005 openxml php")
                    ->setCategory("Test result file");
            $styleArray = array(
                'font' => array(
                    'bold' => true,
                    'color' => array('rgb' => 'ff0000')
                )
            );
            $cityArr = array();
            $districtArr = array();
            $cities = $dm->getRepository('VietlandAevitasBundle:City')->findAll();
            $districts = $dm->getRepository('VietlandAevitasBundle:District')->findAll();
            foreach ($cities as $city) {
                $cityArr[$city->getMap()] = $city->getName();
            }
            foreach ($districts as $district) {
                $districtArr[$district->getId()] = $district->getName();
            }

            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A1', 'MEMBER STATEMENT')->getStyle('A1')->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A2', 'Report Date');
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B2', date('Y-m-d'))->getStyle('B2')->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A3', 'Report Period');
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B3', $data['start'] . ' / ' . $data['end'])->getStyle('B3')->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A4', 'Customer');
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B4', $user->getName())->getStyle('B4')->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('D4', 'Joined');
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('E4', $user->getJoined())->getStyle('E4')->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('C4', $user->getSexLabel())->getStyle('C4')->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A5', 'Cellphone');
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B5', $user->getCellphone());
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A6', $user->getAddress1());
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A8', 'Card Number')->getStyle('A8')->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B8', $user->getCCode());
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('D8', 'Current Level')->getStyle('B8')->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('E8', $user->getLevel());

            if (strpos($user->getEmail(), '@') !== false) {
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B6', $user->getEmail())->getStyle('B6')->applyFromArray($styleArray);
            }
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A7', $user->getDistrict());
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B7', $user->getCity());

            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A9', 'Total of bill');
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B9', count($logs))->getStyle('B9')->applyFromArray($styleArray);

            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A' . ($index + 4), 'Store')->getStyle('A' . ($index + 4))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B' . ($index + 4), 'Bill Number')->getStyle('B' . ($index + 4))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('C' . ($index + 4), 'TransDate')->getStyle('C' . ($index + 4))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('D' . ($index + 4), 'Action')->getStyle('D' . ($index + 4))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('E' . ($index + 4), 'Cash Memo No')->getStyle('E' . ($index + 4))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('F' . ($index + 4), 'Net Purchase Amount')->getStyle('F' . ($index + 4))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('G' . ($index + 4), 'Point')->getStyle('G' . ($index + 4))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('H' . ($index + 4), 'Current Point')->getStyle('H' . ($index + 4))->applyFromArray($styleArray);
            $prevTime = '';
            $point = 0;
            foreach ($logs as $log) {

                if ($log->getPoint() == null && $log->getSubject() == 0) {
                    continue;
                }
                if ($log->getAction() == UserLog::BUYITEM) {
                    $schema = $log->getSchema();
                    $branch = (isset($schema[0])) ? $schema[0]['BranchName'] : '';
                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A' . ($index + 5), $branch);
                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B' . ($index + 5), isset($schema[0]['BillNo']) ? $schema[0]['BillNo'] : $schema[0]['BillIDNo']);
                } else if ($log->getAction() == UserLog::REDEEM_POINTS) {
                    $schema = $log->getSchema();
                    if (isset($schema) && isset($schema[0]['BillNo'])){
                        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B' . ($index + 5), $schema[0]['BillNo']);
                    }else{
                        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B' . ($index + 5), '');
                    }
                } else {
                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A' . ($index + 5), '');
                }
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('C' . ($index + 5), $log->getCreated()->format('Y-m-d'));
                
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('D' . ($index + 5), $log->getAction());
                if ($log->getAction() == UserLog::BUYITEM) {
                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('E' . ($index + 5), $log->getMd5());
                } else {
                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('E' . ($index + 5), '');
                }

                if ($log->getAction() == UserLog::BUYITEM) {
                    $net = (isset($schema[0])) ? $schema[0]['Amount'] : '';
                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('F' . ($index + 5), $net);
                } else {
                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('F' . ($index + 5), '');
                }

                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('G' . ($index + 5), $log->getPoint());

                if ($log->getPoint()) {
                    $point += (float) $log->getPoint();
                }
                // point
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('H' . ($index + 5), $point);
                $index++;
            }

            $start = new \DateTime('2015-01-01' . ' 23:59:59');
            $end = new \DateTime($data['end'] . ' 23:59:59');
            $redeems = $dm->createQueryBuilder('AevitasLevisBundle:AbstractRedeem')
                            ->field('created')->lte($end)
                            ->field('created')->gte($start)->sort('time', 'desc')->getQuery()->execute();
            
            foreach ($redeems as $obj) {
                if($obj->getUser()->getName() == $user->getName() && $obj->getBPoint() != ""){
                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A' . ($index + 5), $obj->getStore()->getName());
                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('C' . ($index + 5), $obj->getCreated()->format('Y-m-d h:i:s'));
                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('G' . ($index + 5), $obj->getPoint());
                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('D' . ($index + 5), "redeemed");
                    $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('H' . ($index + 5), $obj->getUser()->getPoint());
                        $index++;
                }

                if (!is_object($obj->getStore()) || !is_object($obj->getUser())) {
                    continue;
                }
            }

            //sadas
        $lastdate = date('Y-m-d', strtotime("now -".""." days") );
        $day = date("j", strtotime($lastdate));
        $month = date("n", strtotime($lastdate));
        $year = date("Y", strtotime($lastdate));
        
        $function = 'function(){
                        var rt = false;
                        var d = this.created;
                        if( this.action == "upprofile"){
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



        $mongo = new \MongoClient();
        $db = $dm->getConnection()->getConfiguration()->getDefaultDB();
        $col_log = $mongo->$db->aevitaslog;
        $aevitagslog = $col_log->find(array('$where' => $function))->sort(array('user.$id' => 1, "created" => 1));

                foreach ($aevitagslog as $doc) {
                    if($doc['user']['$id'] == $id && $doc['point'] > 0){
                        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('D' . ($index + 5), "upprofile");
                        $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('G' . ($index + 5), $doc['point']);
                        $index++;
                    }
                
            }

            $excelService->excelObj->getActiveSheet()->setTitle('Member Statement');
            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $excelService->excelObj->setActiveSheetIndex(0);

            //create the response
            $response = $excelService->getResponse();
            $response->headers->set('Content-type', 'application/ms-excel; charset=utf-8');
            $response->headers->set('Content-Disposition', 'attachment; filename="member-statement-report.xls"');

            // If you are using a https connection, you have to set those two headers and use sendHeaders() for compatibility with IE <9
            $response->headers->set('Pragma', 'public');
            $response->headers->set('Cache-Control', 'maxage=1');
            $response->sendHeaders();
            return $response;
        }
        return array('form' => $form->createView());
    }

    /**
     * @Route("/backend/reddemption/report", name="backend_report_redeemption")
     * @Secure(roles="ROLE_ADMIN, ROLE_REPORT")
     * @Template()
     */
    public function redeemptionReportAction() {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $request = $this->getRequest();
        $form = $this->createFormBuilder()->add('start', 'text', array('required' => true, 'attr' => array('class' => 'datetime')))->add('end', 'text', array('required' => true, 'attr' => array('class' => 'datetime')))->getForm();
        $form->bind($request);
        $data = array_filter($form->getData());
        if (!empty($data)) {
            $start = new \DateTime($data['start']);
            $end = new \DateTime($data['end'] . ' 23:59:59');
            $redeems = $dm->createQueryBuilder('AevitasLevisBundle:AbstractRedeem')
                            ->field('created')->lte($end)
                            ->field('created')->gte($start)->sort('time', 'desc')->getQuery()->execute();
            $index = 2;
            $excelService = $this->get('xls.service_xls5');
            $excelService->excelObj->getProperties()->setCreator("Vietland JSC")
                    ->setLastModifiedBy("Vietland JSC")
                    ->setTitle("Vietland JSC exports report for Levis")
                    ->setSubject("Customer Report")
                    ->setDescription("This document helps marketing operator make decission accordingly on users statistic.")
                    ->setKeywords("office 2005 openxml php")
                    ->setCategory("Test result file");
            $styleArray = array(
                'font' => array(
                    'bold' => true,
                    'color' => array('rgb' => 'ff0000')
                )
            );
            $cities = array();
            $districts = array();
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A1', 'Redeemption Report')->getStyle('A1')->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A2', 'Report Date');
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B2', date('Y-m-d'))->getStyle('B2')->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A3', 'Report Period');
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B3', $data['start'] . '/' . $data['end'])->getStyle('B3')->applyFromArray($styleArray);

            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A' . ($index + 3), 'Confirmation Code')->getStyle('A' . ($index + 3))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B' . ($index + 3), 'Store')->getStyle('B' . ($index + 3))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('C' . ($index + 3), 'Custommer')->getStyle('C' . ($index + 3))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('D' . ($index + 3), 'Card No')->getStyle('D' . ($index + 3))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('E' . ($index + 3), 'Point Before')->getStyle('E' . ($index + 3))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('F' . ($index + 3), 'Redeemed Point')->getStyle('F' . ($index + 3))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('G' . ($index + 3), 'Point After')->getStyle('G' . ($index + 3))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('H' . ($index + 3), 'Current Point')->getStyle('H' . ($index + 3))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('I' . ($index + 3), 'Information')->getStyle('I' . ($index + 3))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('J' . ($index + 3), 'Date')->getStyle('J' . ($index + 3))->applyFromArray($styleArray);
            $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('K' . ($index + 3), 'Type')->getStyle('K' . ($index + 3))->applyFromArray($styleArray);
            foreach ($redeems as $obj) {
                if (!is_object($obj->getStore()) || !is_object($obj->getUser())) {
                    continue;
                }
                if($obj->getBPoint() != ""){
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('A' . ($index + 4), $obj->getHash());
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('B' . ($index + 4), $obj->getStore()->getName());
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('C' . ($index + 4), $obj->getUser()->getName());
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('D' . ($index + 4), $obj->getUser()->getCCode());
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('E' . ($index + 4), $obj->getBPoint());
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('F' . ($index + 4), $obj->getPoint());
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('G' . ($index + 4), $obj->getAPoint());
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('H' . ($index + 4), $obj->getUser()->getPoint());
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('I' . ($index + 4), $obj->getData());
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('J' . ($index + 4), $obj->getCreated()->format('h:i:s d/m/Y'));
                $excelService->excelObj->setActiveSheetIndex(0)->setCellValue('K' . ($index + 4), $obj->getType());
                $index++;
                }
            }
            $excelService->excelObj->getActiveSheet()->setTitle('Redeemption Report');
            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $excelService->excelObj->setActiveSheetIndex(0);

            //create the response
            $response = $excelService->getResponse();
            $response->headers->set('Content-type', 'application/ms-excel; charset=utf-8');
            $response->headers->set('Content-Disposition', 'attachment; filename="redeemption-report-' . time() . '.xls"');

            // If you are using a https connection, you have to set those two headers and use sendHeaders() for compatibility with IE <9
            $response->headers->set('Pragma', 'public');
            $response->headers->set('Cache-Control', 'maxage=1');
            $response->sendHeaders();
            return $response;
        }
        return array('form' => $form->createView());
    }

}
