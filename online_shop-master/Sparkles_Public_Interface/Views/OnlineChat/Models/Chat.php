<?php

class Chat {
    private $ChatId;
    private $Staff_Id;
    private $Name;
    private $Question;
    private $StartedDate;
    private $FinishedDate;

    public function __construct($name,$question) {
        $this->Name=$name;
        $this->Question=$question;
    }

    public function getID() {
        return $this->ChatId;
    }

    public function setID($value) {
        $this->ChatId = $value;
    }

    public function getStaff_Id() {
        return $this->Staff_Id;
    }

    public function setStaff_Id($value) {
        $this->Staff_Id = $value;
    }
    public function getName() {
        return $this->Name;
    }
    public function setName($value) {
        $this->Name = $value;
    }
    public function getQuestion() {
        return $this->Question;
    }
    public function setQuestion($value) {
        $this->Question = $value;
    }
    public function getStartedDate() {
        return $this->StartedDate;
    }
    public function setStartedDate($value) {
        $this->StartedDate = $value;
    }
    public function getFinishedDate() {
        return $this->FinishedDate;
    }
    public function setFinishedDate($value) {
        $this->FinishedDate = $value;
    }
} 