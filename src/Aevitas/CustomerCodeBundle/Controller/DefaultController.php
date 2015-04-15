<?php

namespace Aevitas\CustomerCodeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Aevitas\CustomerCodeBundle\Form\TransferFormType;

class DefaultController extends Controller {

    /**
     * @Route("/backend/customercode/list", name="backend_customer_code_list")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function indexAction() {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $codes = $dm->getRepository('AevitasCustomerCodeBundle:CustomerCode')->findAll();
        return array(
            'codes' => $codes
        );
    }

    /**
     * @Route("/backend/customercode/create", name="backend_customer_code_create")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function createAction() {
        $trans = $this->get('translator');
        $formType = new \Aevitas\CustomerCodeBundle\Form\CustomerCodeFormType($trans);
        $customerCode = new \Aevitas\CustomerCodeBundle\Document\CustomerCode();
        $form = $this->createForm($formType, $customerCode);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                if ($customerCode->getStart() >= $customerCode->getEnd()) {
                    $this->getRequest()->getSession()->getFlashBag()->add('notice', $trans->trans('the end number must be large than or equal as start number'));
                } else {
                    try {
                        $dm = $this->get('database_manager');
                        $dm->persist($customerCode);
                        $dm->flush();
                        if ($customerCode->getId()) {
                            $router = $this->get('router');
                            $this->getRequest()->getSession()->getFlashBag()->add('notice', $trans->trans('New customer codes has been created.'));
                            return new RedirectResponse($router->generate('backend_customer_code_list'));
                        }
                    } catch (\Exception $e) {
                        $this->getRequest()->getSession()->getFlashBag()->add('notice', $trans->trans('this prefix is duplicated!'));
                    }
                }
            }
        }
        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/backend/customercode/edit/{id}", name="backend_customer_code_edit")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function editAction($id) {
        $dm = $this->get('database_manager');
        $trans = $this->get('translator');
        $formType = new \Aevitas\CustomerCodeBundle\Form\CustomerCodeFormType($trans);
        $customerCode = $dm->getRepository('AevitasCustomerCodeBundle:CustomerCode')->find($id);
        $form = $this->createForm($formType, $customerCode);
        $form->setData($customerCode);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                if ($customerCode->getStart() > $customerCode->getEnd()) {
                    $this->getRequest()->getSession()->getFlashBag()->add('notice', $trans->trans('the end number must be large than start number'));
                } else {
                    $dm->persist($customerCode);
                    $dm->flush();
                    if ($customerCode->getId()) {
                        $router = $this->get('router');
                        $this->getRequest()->getSession()->getFlashBag()->add('notice', $trans->trans('the row has been edited.'));
                        return new RedirectResponse($router->generate('backend_customer_code_list'));
                    }
                }
            }
        }
        return array(
            'form' => $form->createView(),
            'trans' => $customerCode->getTrans()
        );
    }

    /**
     * @Route("/backend/customercode/delete/{id}", name="backend_customer_code_delete")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function deleteAction($id) {
        $router = $this->get('router');
        if (isset($id)) {
            $dm = $this->get('database_manager');
            $customerCode = $dm->getRepository('AevitasCustomerCodeBundle:CustomerCode')->find($id);
            $dm->remove($customerCode);
            $dm->flush();
            $this->getRequest()->getSession()->getFlashBag()->add('notice', 'The row has been deleted!');
            return new RedirectResponse($router->generate('backend_customer_code_list'));
        }
        $this->getRequest()->getSession()->getFlashBag()->add('notice', 'has an error!');
        return new RedirectResponse($router->generate('backend_customer_code_list'));
    }

    /**
     * @Route("/backend/customercode/download/{id}", name="backend_customer_code_download")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function downloadAction($id) {
        $router = $this->get('router');
        if (isset($id)) {
            $dm = $this->get('database_manager');
            $customerCode = $dm->getRepository('AevitasCustomerCodeBundle:CustomerCode')->find($id);
            $LN = chr(13) . chr(10);
            $prefix = $customerCode->getPrefix();
            $numberDigit = 4;
            $rt = '"customer code"';
            for ($i = $customerCode->getStart(); $i < $customerCode->getEnd(); $i++) {
                $rt .= $LN . str_replace(' ', '0', sprintf('"%s%' . $numberDigit . 'd"', $prefix, $i));
            }

            ##### download file
            $file = $this->getHomeDirectory() . '/customer_code_' . $prefix . '_' . time() . '.csv';
            file_put_contents($file, $rt);
            header('Content-Description: File Transfer');
            header("Content-Type: text/csv");
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            exit;
        }
        $this->getRequest()->getSession()->getFlashBag()->add('notice', 'has an error!');
        return new RedirectResponse($router->generate('backend_customer_code_list'));
    }

    public function getHomeDirectory() {
        $physicalWebDir = getcwd();
        if (!is_dir($physicalWebDir . '/export')) {
            mkdir($physicalWebDir . '/export', 0644);
        }
        return $physicalWebDir . '/export';
    }

    /**
     * @Route("/backend/addtransfer/{formid}.{_format}", name="form_add_transfer", defaults={"_format"="json","formid"="0"})
     */
    public function createTransferAction($formid, $_format) {
        $formManagement = $this->get('doctrine.odm.mongodb.document_manager')
                        ->getRepository('AevitasCustomerCodeBundle:CustomerCode')->find((int) $formid);
        $transfer = $formManagement->createNewTransfer();
        $fType = new TransferFormType($this->get('translator'));
        $form = $this->createForm($fType, $transfer);
        $content = $this->renderView('AevitasCustomerCodeBundle:Default:createTransfer.html.twig', array('form' => $form->createView(), 'formid' => $formid));
        exit(json_encode(array('html' => $content)));
    }

    /**
     * @Route("/backend/savetransfer/{formid}.{_format}", name="form_save_transfer", defaults={"_format"="json","formid"="0"})
     */
    public function saveTransferAction($formid, $_format) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $formManagement = $dm->getRepository('AevitasCustomerCodeBundle:CustomerCode')->find((int) $formid);
        $transfer = new \Aevitas\CustomerCodeBundle\Document\Transfer();
        $fType = new TransferFormType($this->get('translator'));
        $form = $this->createForm($fType, $transfer);
        $request = $this->getRequest();
        if ('POST' == $request->getMethod()) {
            $form->bind($request);
            if ($form->isValid()) {
                $success = $formManagement->addTransfer($transfer);
                if ($success) {
                    $dm->persist($formManagement);
                    $dm->flush();
                }
                exit(json_encode(array('status' => $success, 'start' => $transfer->start, 'end' => $transfer->end, 'created' => $transfer->created->format('m/d/Y'))));
            }
        }
    }

}
