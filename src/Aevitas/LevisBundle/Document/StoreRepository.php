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

namespace Aevitas\LevisBundle\Document;

use Doctrine\ODM\MongoDB\DocumentRepository;
use Aevitas\LevisBundle\Document\Store;

class StoreRepository extends DocumentRepository {

    private $count;

    public function findByIDs($arrID) {
        return $this->createQueryBuilder()
                        ->field('id')->in($arrID)
                        ->getQuery()
                        ->execute()
        ;
    }

    public function getItems($page = 1, $limit = 25) {
        if (!(int) $page)
            $page = 1;
        if (!(int) $limit)
            $limit = 25;
        $bd = $this->createQueryBuilder();
        $countBd = clone $bd;
        $this->count = $countBd->count()->getQuery()->execute();
        return $bd->limit((int) $limit)
                        ->skip(((int) $page - 1) * (int) $limit)->sort('id', 'desc')
                        ->getQuery()
                        ->execute();
        ;
    }

    public function getStoreFilter($data, $page = 1, $limit = 25) {
        if (!(int) $page)
            $page = 1;
        if (!(int) $limit)
            $limit = 25;
        $bd = $this->createQueryBuilder()->field('name')->equals(new \MongoRegex('/' . $data['name'] . '/i'));
        $countBd = clone $bd;
        $this->count = $countBd->count()->getQuery()->execute();
        return $bd->limit((int) $limit)
                ->skip(((int) $page - 1) * (int) $limit)->sort('id', 'desc')
                ->getQuery()
                ->execute();
    }

    public function getCount() {
        return $this->count;
    }

}