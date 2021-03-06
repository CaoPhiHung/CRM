<?php

namespace Hydrators;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\ClassMetadata;
use Doctrine\ODM\MongoDB\Hydrator\HydratorInterface;
use Doctrine\ODM\MongoDB\UnitOfWork;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ODM. DO NOT EDIT THIS FILE.
 */
class AevitasLevisBundleDocumentGiftLogHydrator implements HydratorInterface
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

        /** @Field(type="int_id") */
        if (isset($data['_id'])) {
            $value = $data['_id'];
            $return = (int) $value;
            $this->class->reflFields['id']->setValue($document, $return);
            $hydratedData['id'] = $return;
        }

        /** @ReferenceOne */
        if (isset($data['user'])) {
            $reference = $data['user'];
            if (isset($this->class->fieldMappings['user']['simple']) && $this->class->fieldMappings['user']['simple']) {
                $className = $this->class->fieldMappings['user']['targetDocument'];
                $mongoId = $reference;
            } else {
                $className = $this->dm->getClassNameFromDiscriminatorValue($this->class->fieldMappings['user'], $reference);
                $mongoId = $reference['$id'];
            }
            $targetMetadata = $this->dm->getClassMetadata($className);
            $id = $targetMetadata->getPHPIdentifierValue($mongoId);
            $return = $this->dm->getReference($className, $id);
            $this->class->reflFields['user']->setValue($document, $return);
            $hydratedData['user'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['action'])) {
            $value = $data['action'];
            $return = (string) $value;
            $this->class->reflFields['action']->setValue($document, $return);
            $hydratedData['action'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['subject'])) {
            $value = $data['subject'];
            $return = (string) $value;
            $this->class->reflFields['subject']->setValue($document, $return);
            $hydratedData['subject'] = $return;
        }

        /** @Field(type="date") */
        if (isset($data['created'])) {
            $value = $data['created'];
            if ($value instanceof \MongoDate) { $return = new \DateTime(); $return->setTimestamp($value->sec); } elseif (is_numeric($value)) { $return = new \DateTime(); $return->setTimestamp($value); } else { $return = new \DateTime($value); }
            $this->class->reflFields['created']->setValue($document, clone $return);
            $hydratedData['created'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['md5'])) {
            $value = $data['md5'];
            $return = (string) $value;
            $this->class->reflFields['md5']->setValue($document, $return);
            $hydratedData['md5'] = $return;
        }

        /** @Field(type="int") */
        if (isset($data['uid'])) {
            $value = $data['uid'];
            $return = (int) $value;
            $this->class->reflFields['uid']->setValue($document, $return);
            $hydratedData['uid'] = $return;
        }
        return $hydratedData;
    }
}