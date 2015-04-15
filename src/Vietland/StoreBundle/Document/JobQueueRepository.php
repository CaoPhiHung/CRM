<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JobQueueRepository
 *
 * @author TruongLD
 */

namespace Vietland\StoreBundle\Document;

use Doctrine\ODM\MongoDB\DocumentRepository;

class JobQueueRepository extends DocumentRepository {

    private $count;

    public function getJobs($page = 1, $limit = 25)
    {
        if (!(int) $page)
            $page = 1;
        if (!(int) $limit)
            $limit = 20;
        $qb = $this->createQueryBuilder()
                ->sort('status', 'ASC')
                ->limit((int) $limit)
                ->skip(((int) $page - 1) * (int) $limit);
        $countQuery = clone $qb;
        $this->count = $countQuery->count()->getQuery()->execute();
        $results = $qb->getQuery()->execute();
        // Job queue
        return $results;
    }

    public function getCount() {
        return $this->count;
    }
}
