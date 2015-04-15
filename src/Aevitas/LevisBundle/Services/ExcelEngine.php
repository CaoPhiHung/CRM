<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExcelEngine
 *
 * @author paulaan
 */

namespace Aevitas\LevisBundle\Services;

use \PHPExcel_IOFactory as IOFactory;
use Symfony\Bridge\Monolog\Logger;
use \PHPExcel_Cell;
use FOS\UserBundle\Model\UserManager;
use Doctrine\ODM\MongoDB\LoggableCursor;

class ExcelEngine {

    /**
     *
     * @var Symfony\Bridge\Monolog\Logger
     */
    private $logger;

    /**
     * @var \PHPExcel
     */
    private $phpexcel;

    /**
     *
     * @var int
     */
    private $row;
    private $excelObject;
    private $title;
    private $subject;
    private $dataObject;
    private $mailer;
    private $templating;
    private $sms;

    public function __construct($phpexcel, $logger, $mailer, $sms, $templating) {
        $this->phpexcel = $phpexcel;
        $this->row = 1;
        $this->logger = $logger;
        $this->mailer = $mailer;
        $this->templating = $templating;
        $this->sms = $sms;
    }

    protected function getObject() {
        if (!is_object($this->excelObject))
            $this->excelObject = $this->phpexcel->createPHPExcelObject();
        return $this->excelObject;
    }

    public function openFile(\Symfony\Component\HttpFoundation\File\UploadedFile $file) {
        $file->move($this->getUploadRootDir(), date('Y-m-d') . $file->getClientOriginalName());
        $this->excelObject = $this->phpexcel->load($this->getUploadRootDir() . DIRECTORY_SEPARATOR . date('Y-m-d') . $file->getClientOriginalName());
        return $this;
    }

    public function writeTitle($title) {
        $this->title = $title;
        $excelObject = $this->getObject();
        $excelObject->setActiveSheetIndex(0)
                ->setCellValue('A' . $this->row, 'Title');
        $excelObject->setActiveSheetIndex(0)
                ->setCellValue('B' . $this->row, $title);
        $this->row += 1;
        $excelObject->getActiveSheet()->setTitle($title);
        return $this;
    }

    public function writeSubject($subject) {
        $this->subject = $subject;
        $excelObject = $this->getObject();
        $excelObject->setActiveSheetIndex(0)
                ->setCellValue('A' . $this->row, 'Subject');
        $excelObject->setActiveSheetIndex(0)
                ->setCellValue('B' . $this->row, $subject);
        $this->row += 1;
        return $this;
    }

    public function writeAuthor($author) {
        $excelObject = $this->getObject();
        $excelObject->setActiveSheetIndex(0)
                ->setCellValue('A' . $this->row, 'Author');
        $excelObject->setActiveSheetIndex(0)
                ->setCellValue('B' . $this->row, $author);
        $this->row += 1;
        return $this;
    }

    /**
     * @param array $header
     */
    public function writeHeader($header = array()) {
        $this->row += 2;
        $styleArray = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => '000000')
            )
        );
        $this->writeRowData($header, $styleArray);
        return $this;
    }

    public function writeRowData($data, $style = array()) {
        $row = $this->row;
        $excelObject = $this->getObject();
        $horizontalIndex = range('A', 'Z');
        $index = 0;
        if (!empty($data))
            array_map(function($title)use(&$excelObject, &$index, $horizontalIndex, &$row, $style) {
                if ($index > 26) {
                    $frame = floor($index / 26);
                    $pointer = $horizontalIndex[$frame - 1] . $horizontalIndex[($index % 26) - 1];
                } else
                    $pointer = $horizontalIndex[$index];
                if (!empty($style))
                    $excelObject->setActiveSheetIndex(0)
                            ->setCellValue($pointer . $row, $title)->getStyle($pointer . $row)->applyFromArray($style);
                else
                    $excelObject->setActiveSheetIndex(0)
                            ->setCellValue($pointer . $row, $title);
                $index++;
            }, $data);
        $row++;
        $this->row = $row;
        return $this;
    }

    public function getResponse() {
        // create the writer
        $writer = $this->phpexcel->createWriter($this->getObject(), 'Excel5');
        // create the response
        $response = $this->phpexcel->createStreamedResponse($writer);
        // adding headers
        $response->headers->set('Content-Type', 'application/x-msexcel; charset=utf-8');
        $response->headers->set('Content-Disposition', 'attachment;filename=NewExport.xlsx');
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');

        return $response;
    }

    public function importToObject($file, $manager, $object) {
        $this->openFile($file);
        $this->dataObject = $object;

        $objPHPExcel = $this->getObject();
        $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
        $highestRow = $objWorksheet->getHighestRow();
        $highestColumn = $objWorksheet->getHighestColumn();
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

        $headerAttributes = array();
        for ($headerIndex = 0; $headerIndex < $highestColumnIndex; ++$headerIndex) {
            if ($value = $objWorksheet->getCellByColumnAndRow($headerIndex, 1)->getValue())
                $headerAttributes[] = $value;
        }
        @set_time_limit(1800);
        try {
            for ($row = 2; $row <= $highestRow; ++$row) {
                $dataObject = null;
                $dataObject = new $this->dataObject;
                $valid = false; // to avoid empty row 
                for ($col = 0; $col < count($headerAttributes); ++$col) {
                    $value = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
                    if (is_object($value))
                        $value = $value->getPlainText();
                    if ($col == 0 && !$value) {
                        break; // reach empty row
                    }
                    if ($value) {
                        if (class_exists($this->dataObject)) {
                            $setter = 'set' . ucfirst($headerAttributes[$col]);
                            if (preg_match('/_/', $headerAttributes[$col])) {
                                $extractName = explode('_', $headerAttributes[$col]);
                                if (property_exists($dataObject, $extractName[0])) {
                                    $setter = 'set' . ucfirst($extractName[0]);
                                    $dataObject->{$setter}($value);
                                }
                            } else if (property_exists($dataObject, $headerAttributes[$col])) {
                                $dataObject->{$setter}($value);
                            }
                        } else
                            $this->logger->warn('attribute ' . $headerAttributes[$col] . ' does not exist for this class or setter is not accessible.');
                    }
                    $valid = true;
                }
                if (!$valid)
                    break;
                if ($manager instanceof UserManager) {
                    $checkUser = $manager->findUserBy(array(array('email' => $dataObject->getEmail()), array('CCode' => $dataObject->getCCode()), array('cellphone' => $dataObject->getCellphone())));
                    if ($checkUser->count()) {
                        $currentUser = $checkUser->getNext();
                        foreach ($headerAttributes as $value) {
                            $setter = 'set' . ucfirst($value);
                            if (preg_match('/_/', $value)) {
                                $extractName = explode('_', $value);
                                $setter = 'set' . ucfirst($extractName[0]);
                            }
                            if ($dataObject->$value) {
                                $currentUser->{$setter}($dataObject->$value);
                            }
                        }
                        $dataObject = $currentUser;
                    } else {
                        $dataObject->setEnabled(true);
                        $dataObject->setPlainPassword($dataObject->getFirstname());
                        if ($dataObject->getCCode())
                            $dataObject->setUsername($dataObject->getCCode());
                        else
                            $dataObject->setUsername($dataObject->getFirstname() . $dataObject->getLastname());
                        if (!$dataObject->getEmail()) {
                            $dataObject->setEmail($dataObject->getUsername() . '@vietnam.com');
                        }
                        $this->mailUser($dataObject);
                        $manager->updateCanonicalFields($dataObject);
                        $manager->updatePassword($dataObject);
                    }
                    try {
                        $manager->updateUser($dataObject);
                    } catch (\Exception $e) {
                        unset($dataObject);
                        $this->logger->error('Importing ' . $row . ' with error:' . $e->getMessage());
                    }
                } else {
                    $manager->persist($dataObject);
                    $manager->flush();
                }
                $this->logger->info('Finish import row ' . $row);
            }
        } catch (\Exception $e) {
            $this->logger->err('Import process matching this error:' . $e->getMessage());
        }
    }

    private function mailUser($user) {
//        if ($user->getCellphone()) {
//            $sms = $this->sms;
//            $sms->setPhone($user->getCellphone())
//                    ->setSms('Go to www.starclubvn.com to activate you account by this code: ' . $user->getRegcode())
//                    ->send();
//        }
        //subcribe mailchimp list
//        $mc = $this->mailchimp;
//        $data = $mc->getList()
//                ->addMerge_vars(
//                        array(
//                            'FNAME' => $user->getFirstname(),
//                            'LNAME' => $user->getLastname()
//                ))
//                ->subscribe($user->getEmail(), 'html', false);
        $mailer = $this->mailer;
        //send email
//        $message = \Swift_Message::newInstance()
//                ->setSubject('New Account for you')
//                ->setFrom('info@starclubvn.com', 'TBF Star Club')
//                ->setTo($user->getEmail())
//                ->setBody($this->templating->render('GplGplBundle:User:email/newuser.html.twig', array('user' => $user, 'password' => $user->getPlainPassword(), 'username' => $user->getUsername())), 'text/html', 'utf8');
//                    var_dump($message);exit;
//        $mailer->send($message); // send password session to user
    }

    protected function getUploadRootDir() {
        // the absolute directory path where uploaded documents should be saved
        return getcwd() . DIRECTORY_SEPARATOR . $this->getUploadDir();
    }

    public function getMediaDir() {
        return __DIR__ . '/../../../../../web';
    }

    protected function getUploadDir() {
        return 'mediafile' . DIRECTORY_SEPARATOR . 'import';
    }

}
