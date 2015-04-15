<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PointRuleRepository
 *
 * @author TruongLD
 */
namespace Aevitas\PointBundle\Document;

use Doctrine\ODM\MongoDB\DocumentRepository;
use Aevitas\PointBundle\Document\PointRule;

class PointRuleRepository extends DocumentRepository {
    public function findByProgram($programID){
        return $this->createQueryBuilder()
                ->field('program.id')->equals($programID)
                ->getQuery()
                ->execute()
        ;
    }
}

?>
