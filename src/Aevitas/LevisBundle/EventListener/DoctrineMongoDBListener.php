<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DoctrineMongoDBListener
 *
 * @author paulaan
 */

namespace Aevitas\LevisBundle\EventListener;

use Doctrine\ODM\MongoDB\Event\LifecycleEventArgs;

class DoctrineMongoDBListener {

    public function prePersist(LifecycleEventArgs $event) {
        // LOINT
        return;
        $document = $event->getDocument();
        $dm = $event->getDocumentManager();
        
        if($document instanceof \Vietland\UserBundle\Document\User && !$document->getId()){
            $check = $dm->getRepository("VietlandUserBundle:User")->findOneByCellphone($document->getCellphone());
            if(is_object($check))
                throw new \Exception("Duplicate cellphone");
            $check = $dm->getRepository("VietlandUserBundle:User")->findOneByEmail($document->getEmail());
            if(is_object($check))
                throw new \Exception("Duplicate email");
        }
    }

}
