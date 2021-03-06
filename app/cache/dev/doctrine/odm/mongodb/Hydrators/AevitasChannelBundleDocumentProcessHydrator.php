<?php

namespace Hydrators;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\ClassMetadata;
use Doctrine\ODM\MongoDB\Hydrator\HydratorInterface;
use Doctrine\ODM\MongoDB\UnitOfWork;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ODM. DO NOT EDIT THIS FILE.
 */
class AevitasChannelBundleDocumentProcessHydrator implements HydratorInterface
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

        /** @Field(type="int") */
        if (isset($data['time'])) {
            $value = $data['time'];
            $return = (int) $value;
            $this->class->reflFields['time']->setValue($document, $return);
            $hydratedData['time'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['type'])) {
            $value = $data['type'];
            $return = (string) $value;
            $this->class->reflFields['type']->setValue($document, $return);
            $hydratedData['type'] = $return;
        }

        /** @EmbedOne */
        if (isset($data['template'])) {
            $embeddedDocument = $data['template'];
            $className = $this->dm->getClassNameFromDiscriminatorValue($this->class->fieldMappings['template'], $embeddedDocument);
            $embeddedMetadata = $this->dm->getClassMetadata($className);
            $return = $embeddedMetadata->newInstance();

            $embeddedData = $this->dm->getHydratorFactory()->hydrate($return, $embeddedDocument, $hints);
            $this->unitOfWork->registerManaged($return, null, $embeddedData);
            $this->unitOfWork->setParentAssociation($return, $this->class->fieldMappings['template'], $document, 'template');

            $this->class->reflFields['template']->setValue($document, $return);
            $hydratedData['template'] = $return;
        }

        /** @Field(type="int") */
        if (isset($data['mode'])) {
            $value = $data['mode'];
            $return = (int) $value;
            $this->class->reflFields['mode']->setValue($document, $return);
            $hydratedData['mode'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['date'])) {
            $value = $data['date'];
            $return = (string) $value;
            $this->class->reflFields['date']->setValue($document, $return);
            $hydratedData['date'] = $return;
        }

        /** @Field(type="int") */
        if (isset($data['delay'])) {
            $value = $data['delay'];
            $return = (int) $value;
            $this->class->reflFields['delay']->setValue($document, $return);
            $hydratedData['delay'] = $return;
        }

        /** @Field(type="int") */
        if (isset($data['delayType'])) {
            $value = $data['delayType'];
            $return = (int) $value;
            $this->class->reflFields['delayType']->setValue($document, $return);
            $hydratedData['delayType'] = $return;
        }

        /** @EmbedOne */
        if (isset($data['rule'])) {
            $embeddedDocument = $data['rule'];
            $className = $this->dm->getClassNameFromDiscriminatorValue($this->class->fieldMappings['rule'], $embeddedDocument);
            $embeddedMetadata = $this->dm->getClassMetadata($className);
            $return = $embeddedMetadata->newInstance();

            $embeddedData = $this->dm->getHydratorFactory()->hydrate($return, $embeddedDocument, $hints);
            $this->unitOfWork->registerManaged($return, null, $embeddedData);
            $this->unitOfWork->setParentAssociation($return, $this->class->fieldMappings['rule'], $document, 'rule');

            $this->class->reflFields['rule']->setValue($document, $return);
            $hydratedData['rule'] = $return;
        }

        /** @Field(type="int") */
        if (isset($data['status'])) {
            $value = $data['status'];
            $return = (int) $value;
            $this->class->reflFields['status']->setValue($document, $return);
            $hydratedData['status'] = $return;
        }

        /** @Field(type="int") */
        if (isset($data['job'])) {
            $value = $data['job'];
            $return = (int) $value;
            $this->class->reflFields['job']->setValue($document, $return);
            $hydratedData['job'] = $return;
        }
        return $hydratedData;
    }
}