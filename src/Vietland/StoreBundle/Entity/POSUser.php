<?php

namespace Vietland\StoreBundle\Entity;

use Vietland\UserBundle\Document\User;

class POSUser {

    private $name;
    private $cellphone;
    private $LedgerID;
    private $AccountsName;
    private $Lastname;
    private $Gender;
    private $Address1;
    private $Address2;
    private $Address3;
    private $CellNo;
    private $Phone;
    private $Store;
    private $Email;
    private $BDay;
    private $Anniversary;
    private $AccountsType;
    private $CCode;
    private $BillIdNo;
    private $Billdate;
    private $Amount;
    public $start;
    public $end;

    public function __construct() {
        $now = new \DateTime('now');
        $this->end = $now->format('Y-m-d');
    }

    public function migrateData(User &$user) {
        if ("" == $this->getEmail() || is_null($this->getEmail()))
            $user->setEmail($this->getCellNo());
        $user->setCellphone($this->getCellNo())
                ->setCCode($this->getCCode())
                ->setStoreId($this->getStore())
                ->setLedgerID($this->getLedgerID())
                ->setDob($this->getBDay());
    }

    public function mergeData(User $user) {
        $this->setEmail($user->getEmail())
                ->setCellNo($user->getCellphone());
        ;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getLastname() {
        return $this->Lastname;
    }

    public function setLastname($Lastname) {
        $this->Lastname = $Lastname;
        return $this;
    }

    public function getCellphone() {
        return $this->cellphone;
    }

    public function setCellphone($cellphone) {
        $this->cellphone = $cellphone;
        return $this;
    }

    public function setData($data) {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
        $this->setBDay($this->BDay)->setAnniversary($this->Anniversary);
    }

    public function getLedgerID() {
        return $this->LedgerID;
    }

    public function setLedgerID($LedgerID) {
        $this->LedgerID = $LedgerID;
        return $this;
    }

    public function getAccountsName() {
        return $this->AccountsName;
    }

    public function setAccountsName($AccountsName) {
        $this->AccountsName = $AccountsName;
        return $this;
    }

    public function getGender() {
        return $this->Gender;
    }

    public function setGender($Gender) {
        if ('FEMALE' == $Gender)
            $this->Gender = User::FEMALE;
        else
            $this->Gender = User::MALE;
        return $this;
    }

    public function getAddress1() {
        return $this->Address1;
    }

    public function setAddress1($Address1) {
        $this->Address1 = $Address1;
        return $this;
    }

    public function getAddress2() {
        return $this->Address2;
    }

    public function setAddress2($Address2) {
        $this->Address2 = $Address2;
        return $this;
    }

    public function getAddress3() {
        return $this->Address3;
    }

    public function setAddress3($Address3) {
        $this->Address3 = $Address3;
        return $this;
    }

    public function getCellNo() {
        return $this->CellNo;
    }

    public function setCellNo($CellNo) {
        $this->CellNo = $CellNo;
        return $this;
    }

    public function getPhone() {
        return $this->Phone;
    }

    public function setPhone($Phone) {
        $this->Phone = $Phone;
        return $this;
    }

    public function getStore() {
        return $this->Store;
    }

    public function setStore($Store) {
        $this->Store = $Store;
        return $this;
    }

    public function getEmail() {
        return $this->Email;
    }

    public function setEmail($Email) {
        $this->Email = $Email;
        return $this;
    }

    public function getBDay() {
        return $this->BDay;
    }

    public function setBDay($BDay) {
        if (is_string($BDay))
            $this->BDay = new \DateTime($BDay);
        else
            $this->BDay = $BDay;
        return $this;
    }

    public function getAnniversary() {
        return $this->Anniversary;
    }

    public function setAnniversary($Anniversary) {
        if (is_string($Anniversary))
            $this->Anniversary = new \DateTime($Anniversary);
        else
            $this->Anniversary = $Anniversary;
        return $this;
    }

    public function getAccountsType() {
        return $this->AccountsType;
    }

    public function setAccountsType($AccountsType) {
        $this->AccountsType = $AccountsType;
        return $this;
    }

    public function getCCode() {
        return $this->CCode;
    }

    public function setCCode($CCode) {
        $this->CCode = $CCode;
        return $this;
    }

    public function getBillIdNo() {
        return $this->BillIdNo;
    }

    public function setBillIdNo($BillNo) {
        $this->BillIdNo = $BillNo;
        return $this;
    }

    public function getBilldate() {
        return $this->Billdate;
    }

    public function setBilldate($Billdate) {
        $this->Billdate = $Billdate;
        return $this;
    }

    public function getAmount() {
        return $this->Amount;
    }

    public function setAmount($Amount) {
        $this->Amount = $Amount;
    }

    public function getStart() {
        return $this->start;
    }

    public function setStart($start) {
        $this->start = $start;
    }

    public function getEnd() {
        return $this->end;
    }

    public function setEnd($end) {
        $this->end = $end;
    }

}