<?php

namespace Hydrators;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\ClassMetadata;
use Doctrine\ODM\MongoDB\Hydrator\HydratorInterface;
use Doctrine\ODM\MongoDB\UnitOfWork;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ODM. DO NOT EDIT THIS FILE.
 */
class FOSUserBundleDocumentUserHydrator implements HydratorInterface
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

        /** @Field(type="string") */
        if (isset($data['username'])) {
            $value = $data['username'];
            $return = (string) $value;
            $this->class->reflFields['username']->setValue($document, $return);
            $hydratedData['username'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['usernameCanonical'])) {
            $value = $data['usernameCanonical'];
            $return = (string) $value;
            $this->class->reflFields['usernameCanonical']->setValue($document, $return);
            $hydratedData['usernameCanonical'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['email'])) {
            $value = $data['email'];
            $return = (string) $value;
            $this->class->reflFields['email']->setValue($document, $return);
            $hydratedData['email'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['emailCanonical'])) {
            $value = $data['emailCanonical'];
            $return = (string) $value;
            $this->class->reflFields['emailCanonical']->setValue($document, $return);
            $hydratedData['emailCanonical'] = $return;
        }

        /** @Field(type="boolean") */
        if (isset($data['enabled'])) {
            $value = $data['enabled'];
            $return = (bool) $value;
            $this->class->reflFields['enabled']->setValue($document, $return);
            $hydratedData['enabled'] = $return;
        }

        /** @Field(type="boolean") */
        if (isset($data['status'])) {
            $value = $data['status'];
            $return = (bool) $value;
            $this->class->reflFields['status']->setValue($document, $return);
            $hydratedData['status'] = $return;
        }

        /** @Field(type="date") */
        if (isset($data['modifyStatusDate'])) {
            $value = $data['modifyStatusDate'];
            if ($value instanceof \MongoDate) { $return = new \DateTime(); $return->setTimestamp($value->sec); } elseif (is_numeric($value)) { $return = new \DateTime(); $return->setTimestamp($value); } else { $return = new \DateTime($value); }
            $this->class->reflFields['modifyStatusDate']->setValue($document, clone $return);
            $hydratedData['modifyStatusDate'] = $return;
        }

        /** @Field(type="date") */
        if (isset($data['downgradeDate'])) {
            $value = $data['downgradeDate'];
            if ($value instanceof \MongoDate) { $return = new \DateTime(); $return->setTimestamp($value->sec); } elseif (is_numeric($value)) { $return = new \DateTime(); $return->setTimestamp($value); } else { $return = new \DateTime($value); }
            $this->class->reflFields['downgradeDate']->setValue($document, clone $return);
            $hydratedData['downgradeDate'] = $return;
        }

        /** @Field(type="date") */
        if (isset($data['upgradeDate'])) {
            $value = $data['upgradeDate'];
            if ($value instanceof \MongoDate) { $return = new \DateTime(); $return->setTimestamp($value->sec); } elseif (is_numeric($value)) { $return = new \DateTime(); $return->setTimestamp($value); } else { $return = new \DateTime($value); }
            $this->class->reflFields['upgradeDate']->setValue($document, clone $return);
            $hydratedData['upgradeDate'] = $return;
        }

        /** @Field(type="date") */
        if (isset($data['updateLevel'])) {
            $value = $data['updateLevel'];
            if ($value instanceof \MongoDate) { $return = new \DateTime(); $return->setTimestamp($value->sec); } elseif (is_numeric($value)) { $return = new \DateTime(); $return->setTimestamp($value); } else { $return = new \DateTime($value); }
            $this->class->reflFields['updateLevel']->setValue($document, clone $return);
            $hydratedData['updateLevel'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['reason'])) {
            $value = $data['reason'];
            $return = (string) $value;
            $this->class->reflFields['reason']->setValue($document, $return);
            $hydratedData['reason'] = $return;
        }

        /** @Field(type="collection") */
        if (isset($data['bonusPoint'])) {
            $value = $data['bonusPoint'];
            $return = $value;
            $this->class->reflFields['bonusPoint']->setValue($document, $return);
            $hydratedData['bonusPoint'] = $return;
        }

        /** @Field(type="int") */
        if (isset($data['totalExtraPoint'])) {
            $value = $data['totalExtraPoint'];
            $return = (int) $value;
            $this->class->reflFields['totalExtraPoint']->setValue($document, $return);
            $hydratedData['totalExtraPoint'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['registerStore'])) {
            $value = $data['registerStore'];
            $return = (string) $value;
            $this->class->reflFields['registerStore']->setValue($document, $return);
            $hydratedData['registerStore'] = $return;
        }

        /** @Field(type="int") */
        if (isset($data['totalBill'])) {
            $value = $data['totalBill'];
            $return = (int) $value;
            $this->class->reflFields['totalBill']->setValue($document, $return);
            $hydratedData['totalBill'] = $return;
        }

        /** @Field(type="int") */
        if (isset($data['totalPayment'])) {
            $value = $data['totalPayment'];
            $return = (int) $value;
            $this->class->reflFields['totalPayment']->setValue($document, $return);
            $hydratedData['totalPayment'] = $return;
        }

        /** @Field(type="int") */
        if (isset($data['totalRedeemPoint'])) {
            $value = $data['totalRedeemPoint'];
            $return = (int) $value;
            $this->class->reflFields['totalRedeemPoint']->setValue($document, $return);
            $hydratedData['totalRedeemPoint'] = $return;
        }

        /** @Field(type="int") */
        if (isset($data['pointToNextLevel'])) {
            $value = $data['pointToNextLevel'];
            $return = (int) $value;
            $this->class->reflFields['pointToNextLevel']->setValue($document, $return);
            $hydratedData['pointToNextLevel'] = $return;
        }

        /** @Field(type="int") */
        if (isset($data['lastMonthBillNo'])) {
            $value = $data['lastMonthBillNo'];
            $return = (int) $value;
            $this->class->reflFields['lastMonthBillNo']->setValue($document, $return);
            $hydratedData['lastMonthBillNo'] = $return;
        }

        /** @Field(type="int") */
        if (isset($data['noDayDeactive'])) {
            $value = $data['noDayDeactive'];
            $return = (int) $value;
            $this->class->reflFields['noDayDeactive']->setValue($document, $return);
            $hydratedData['noDayDeactive'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['salt'])) {
            $value = $data['salt'];
            $return = (string) $value;
            $this->class->reflFields['salt']->setValue($document, $return);
            $hydratedData['salt'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['password'])) {
            $value = $data['password'];
            $return = (string) $value;
            $this->class->reflFields['password']->setValue($document, $return);
            $hydratedData['password'] = $return;
        }

        /** @Field(type="date") */
        if (isset($data['lastLogin'])) {
            $value = $data['lastLogin'];
            if ($value instanceof \MongoDate) { $return = new \DateTime(); $return->setTimestamp($value->sec); } elseif (is_numeric($value)) { $return = new \DateTime(); $return->setTimestamp($value); } else { $return = new \DateTime($value); }
            $this->class->reflFields['lastLogin']->setValue($document, clone $return);
            $hydratedData['lastLogin'] = $return;
        }

        /** @Field(type="boolean") */
        if (isset($data['locked'])) {
            $value = $data['locked'];
            $return = (bool) $value;
            $this->class->reflFields['locked']->setValue($document, $return);
            $hydratedData['locked'] = $return;
        }

        /** @Field(type="boolean") */
        if (isset($data['expired'])) {
            $value = $data['expired'];
            $return = (bool) $value;
            $this->class->reflFields['expired']->setValue($document, $return);
            $hydratedData['expired'] = $return;
        }

        /** @Field(type="date") */
        if (isset($data['expiresAt'])) {
            $value = $data['expiresAt'];
            if ($value instanceof \MongoDate) { $return = new \DateTime(); $return->setTimestamp($value->sec); } elseif (is_numeric($value)) { $return = new \DateTime(); $return->setTimestamp($value); } else { $return = new \DateTime($value); }
            $this->class->reflFields['expiresAt']->setValue($document, clone $return);
            $hydratedData['expiresAt'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['confirmationToken'])) {
            $value = $data['confirmationToken'];
            $return = (string) $value;
            $this->class->reflFields['confirmationToken']->setValue($document, $return);
            $hydratedData['confirmationToken'] = $return;
        }

        /** @Field(type="date") */
        if (isset($data['passwordRequestedAt'])) {
            $value = $data['passwordRequestedAt'];
            if ($value instanceof \MongoDate) { $return = new \DateTime(); $return->setTimestamp($value->sec); } elseif (is_numeric($value)) { $return = new \DateTime(); $return->setTimestamp($value); } else { $return = new \DateTime($value); }
            $this->class->reflFields['passwordRequestedAt']->setValue($document, clone $return);
            $hydratedData['passwordRequestedAt'] = $return;
        }

        /** @Field(type="collection") */
        if (isset($data['roles'])) {
            $value = $data['roles'];
            $return = $value;
            $this->class->reflFields['roles']->setValue($document, $return);
            $hydratedData['roles'] = $return;
        }
        return $hydratedData;
    }
}