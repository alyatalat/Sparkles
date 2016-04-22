<?php

class Subscriber {
    private $Id;
    private $Email;
    private $Active=1;
    private $SecurityCode;
    public function __construct($email,$securityCode) {
        $this->Email = $email;
        $this->SecurityCode = $securityCode;
    }

    public function getID() {
        return $this->Id;
    }

    public function setID($value) {
        $this->Id = $value;
    }

    public function getEmail() {
        return $this->Email;
    }

    public function setEmail($value) {
        $this->Email = $value;
    }
    public function getActive() {
        return $this->Active;
    }

    public function setActive($value) {
        $this->Active = $value;
    }
    public function getCode() {
        return $this->SecurityCode;
    }

    public function setCode($value) {
        $this->SecurityCode= $value;
    }
}