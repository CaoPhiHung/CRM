<?php

namespace Vietland\AevitasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Vietland\AevitasBundle\Document\SolrDocument;
use Vietland\AevitasBundle\Helper\MailerTemplate;
use Vietland\AevitasBundle\Form\EmailTemplate;
use Symfony\Component\HttpFoundation\Request;

class AevitasController extends Controller {

    protected function addDocument(SolrDocument $post) {
        try {
            $client = $this->get('solarium.client');
            // get an update query instance
            $update = $client->createUpdate();

            // create a new document for the data
            $doc = $update->createDocument();
            $post->parseSolrDocument($doc);
            $update->addDocument($doc);
            $update->addCommit();
            $result = $client->update($update);
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            exit;
        }
    }

    protected function removeDocument(SolrDocument $post) {
        try {
            $client = $this->get('solarium.client');
// get an update query instance
            $update = $client->createUpdate();

// add the delete query and a commit command to the update query
            $update->addDeleteQuery('id:' . $post->getType() . '_' . $post->getId());
            $update->addCommit();

// this executes the query and returns the result
            $result = $client->update($update);
        } catch (\Exception $e) {
            
        }
    }

    /**
     * @Route("/backend/edit/{type}/{action}", name="edit_email_template")
     * @Template("VietlandAevitasBundle:Mailer:editor.html.twig")
     */
    public function editEmailTemplateAction($type, $action) {
        $mailHandler = new MailerTemplate($this->get('twig.loader'));
        $mailHandler->setAction($action);
        $form = $this->createForm(new EmailTemplate($this->get('translator')), $mailHandler);
        $mailHandler->setController($this);
        $request = $this->getRequest();
        if ('POST' == $request->getMethod()) {
            $form->bind($request);
            if ($form->isValid()) {
                $mailHandler->writeTemplateSource();
            }
            else
                exit($form->getErrorsAsString());
        }
        return array('form' => $form->createView(), 'action' => $action);
    }

    public function sendEmailByAction($action, $data) {
        $message = \Swift_Message::newInstance()
                ->setSubject($this->get('translator')->trans('You received an invitation to Atipso'))
                ->setFrom('crm@thanbacgroup.com', 'Thanh Bac Fashion')
                /*                         ->setReplyTo('getsocial@atipso.com', 'Atipso Team') */
                ->setTo('crm@thanbacgroup.com')
                ->setBody($this->renderView('::' . $action . '.html.twig', $data), 'text/html', 'utf8');
        $this->get('mailer')->send($message);
    }

    protected function invalidate($route, $parameters = array()) {
        $url = $this->get('router')->generate($route, $parameters, true);
//        if (preg_match('/_proxy*/', $url)) {
//            preg_match('/\/\/(?<domain>[^\/]+)\//i', $url, $domain);
//            if (isset($domain['domain']))
//                $url .= str_replace($domain['domain'], '127.0.0.1', $url);
//        }
        $context = stream_context_create(array('http' => array('method' => 'PURGE')));
        $stream = fopen($url, 'r', false, $context);
        fclose($stream);
    }

}
