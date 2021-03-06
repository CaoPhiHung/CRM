<?php

namespace Aevitas\LevisBundle\Document;

use Doctrine\ODM\MongoDB\DocumentRepository;

/**
 * HotelRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ItemRepository extends DocumentRepository {

    public function getItems($page = 1, $limit = 20) {
        if (!(int) $page)
            $page = 1;
        if (!(int) $limit)
            $limit = 20;
        return $this->createQueryBuilder()
                        ->limit((int) $limit)
                        ->skip(((int) $page - 1) * (int) $limit)->sort('id', 'desc')
                        ->getQuery()
                        ->execute();
        ;
    }

    public function getCount() {
        return $this->createQueryBuilder()->count()->getQuery()->execute();
    }

}