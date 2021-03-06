<?php

namespace Hydrators;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\ClassMetadata;
use Doctrine\ODM\MongoDB\Hydrator\HydratorInterface;
use Doctrine\ODM\MongoDB\UnitOfWork;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ODM. DO NOT EDIT THIS FILE.
 */
class AevitasPointBundleDocumentPointRuleHydrator implements HydratorInterface
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

        /** @Field(type="string") */
        if (isset($data['name'])) {
            $value = $data['name'];
            $return = (string) $value;
            $this->class->reflFields['name']->setValue($document, $return);
            $hydratedData['name'] = $return;
        }

        /** @Field(type="int") */
        if (isset($data['point'])) {
            $value = $data['point'];
            $return = (int) $value;
            $this->class->reflFields['point']->setValue($document, $return);
            $hydratedData['point'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['action'])) {
            $value = $data['action'];
            $return = (string) $value;
            $this->class->reflFields['action']->setValue($document, $return);
            $hydratedData['action'] = $return;
        }

        /** @Field(type="int") */
        if (isset($data['gender'])) {
            $value = $data['gender'];
            $return = (int) $value;
            $this->class->reflFields['gender']->setValue($document, $return);
            $hydratedData['gender'] = $return;
        }

        /** @Field(type="boolean") */
        if (isset($data['anniversary'])) {
            $value = $data['anniversary'];
            $return = (bool) $value;
            $this->class->reflFields['anniversary']->setValue($document, $return);
            $hydratedData['anniversary'] = $return;
        }

        /** @Field(type="boolean") */
        if (isset($data['birthday'])) {
            $value = $data['birthday'];
            $return = (bool) $value;
            $this->class->reflFields['birthday']->setValue($document, $return);
            $hydratedData['birthday'] = $return;
        }

        /** @Field(type="boolean") */
        if (isset($data['bonus'])) {
            $value = $data['bonus'];
            $return = (bool) $value;
            $this->class->reflFields['bonus']->setValue($document, $return);
            $hydratedData['bonus'] = $return;
        }

        /** @Field(type="int") */
        if (isset($data['operation'])) {
            $value = $data['operation'];
            $return = (int) $value;
            $this->class->reflFields['operation']->setValue($document, $return);
            $hydratedData['operation'] = $return;
        }

        /** @Field(type="int") */
        if (isset($data['level'])) {
            $value = $data['level'];
            $return = (int) $value;
            $this->class->reflFields['level']->setValue($document, $return);
            $hydratedData['level'] = $return;
        }

        /** @ReferenceOne */
        if (isset($data['program'])) {
            $reference = $data['program'];
            if (isset($this->class->fieldMappings['program']['simple']) && $this->class->fieldMappings['program']['simple']) {
                $className = $this->class->fieldMappings['program']['targetDocument'];
                $mongoId = $reference;
            } else {
                $className = $this->dm->getClassNameFromDiscriminatorValue($this->class->fieldMappings['program'], $reference);
                $mongoId = $reference['$id'];
            }
            $targetMetadata = $this->dm->getClassMetadata($className);
            $id = $targetMetadata->getPHPIdentifierValue($mongoId);
            $return = $this->dm->getReference($className, $id);
            $this->class->reflFields['program']->setValue($document, $return);
            $hydratedData['program'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['store'])) {
            $value = $data['store'];
            $return = (string) $value;
            $this->class->reflFields['store']->setValue($document, $return);
            $hydratedData['store'] = $return;
        }

        /** @Field(type="int") */
        if (isset($data['city'])) {
            $value = $data['city'];
            $return = (int) $value;
            $this->class->reflFields['city']->setValue($document, $return);
            $hydratedData['city'] = $return;
        }

        /** @Field(type="int") */
        if (isset($data['district'])) {
            $value = $data['district'];
            $return = (int) $value;
            $this->class->reflFields['district']->setValue($document, $return);
            $hydratedData['district'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['locate'])) {
            $value = $data['locate'];
            $return = (string) $value;
            $this->class->reflFields['locate']->setValue($document, $return);
            $hydratedData['locate'] = $return;
        }

        /** @Field(type="int") */
        if (isset($data['sDayInMonth'])) {
            $value = $data['sDayInMonth'];
            $return = (int) $value;
            $this->class->reflFields['sDayInMonth']->setValue($document, $return);
            $hydratedData['sDayInMonth'] = $return;
        }

        /** @Field(type="int") */
        if (isset($data['fDayInMonth'])) {
            $value = $data['fDayInMonth'];
            $return = (int) $value;
            $this->class->reflFields['fDayInMonth']->setValue($document, $return);
            $hydratedData['fDayInMonth'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['arrDayInWeek'])) {
            $value = $data['arrDayInWeek'];
            $return = (string) $value;
            $this->class->reflFields['arrDayInWeek']->setValue($document, $return);
            $hydratedData['arrDayInWeek'] = $return;
        }

        /** @Field(type="int") */
        if (isset($data['sHourInDay'])) {
            $value = $data['sHourInDay'];
            $return = (int) $value;
            $this->class->reflFields['sHourInDay']->setValue($document, $return);
            $hydratedData['sHourInDay'] = $return;
        }

        /** @Field(type="int") */
        if (isset($data['fHourInDay'])) {
            $value = $data['fHourInDay'];
            $return = (int) $value;
            $this->class->reflFields['fHourInDay']->setValue($document, $return);
            $hydratedData['fHourInDay'] = $return;
        }

        /** @Field(type="int") */
        if (isset($data['DayParity'])) {
            $value = $data['DayParity'];
            $return = (int) $value;
            $this->class->reflFields['DayParity']->setValue($document, $return);
            $hydratedData['DayParity'] = $return;
        }

        /** @Field(type="int") */
        if (isset($data['sDay'])) {
            $value = $data['sDay'];
            $return = (int) $value;
            $this->class->reflFields['sDay']->setValue($document, $return);
            $hydratedData['sDay'] = $return;
        }

        /** @Field(type="int") */
        if (isset($data['fDay'])) {
            $value = $data['fDay'];
            $return = (int) $value;
            $this->class->reflFields['fDay']->setValue($document, $return);
            $hydratedData['fDay'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['schema'])) {
            $value = $data['schema'];
            $return = (string) $value;
            $this->class->reflFields['schema']->setValue($document, $return);
            $hydratedData['schema'] = $return;
        }
        return $hydratedData;
    }
}