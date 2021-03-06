<?php

namespace Hydrators;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\ClassMetadata;
use Doctrine\ODM\MongoDB\Hydrator\HydratorInterface;
use Doctrine\ODM\MongoDB\UnitOfWork;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ODM. DO NOT EDIT THIS FILE.
 */
class AevitasLevisBundleDocumentTrippleDateHydrator implements HydratorInterface
{
    private $dm;
    private $unitOfWork;
    private $class;

    public function __construct(DocumentManager $dm, UnitOfWork $uow, ClassMetadata $class)
    {
        $this->dm = $dm;
        $this->unitOfWork = $uow;
        $this->class = $class;
    }

    public function hydrate($document, $data, array $hints = array())
    {
        $hydratedData = array();

        /** @Field(type="date") */
        if (isset($data['date'])) {
            $value = $data['date'];
            if ($value instanceof \MongoDate) { $return = new \DateTime(); $return->setTimestamp($value->sec); } elseif (is_numeric($value)) { $return = new \DateTime(); $return->setTimestamp($value); } else { $return = new \DateTime($value); }
            $this->class->reflFields['date']->setValue($document, clone $return);
            $hydratedData['date'] = $return;
        }

        /** @Field(type="boolean") */
        if (isset($data['used'])) {
            $value = $data['used'];
            $return = (bool) $value;
            $this->class->reflFields['used']->setValue($document, $return);
            $hydratedData['used'] = $return;
        }

        /** @Field(type="int_id") */
        if (isset($data['_id'])) {
            $value = $data['_id'];
            $return = (int) $value;
            $this->class->reflFields['id']->setValue($document, $return);
            $hydratedData['id'] = $return;
        }
        return $hydratedData;
    }
}