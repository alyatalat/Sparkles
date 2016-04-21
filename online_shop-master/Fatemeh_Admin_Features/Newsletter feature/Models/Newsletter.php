<?php

class Newsletter {
    private $Newsletter_Id;
    private $Title;
    private $Body;
    private $DateReleased;

    public function __construct($title,$Body) {
        $this->Body = $Body;
        $this->Title = $title;
    }

    public function getID() {
        return $this->Newsletter_Id;
    }

    public function setID($value) {
        $this->Newsletter_Id = $value;
    }
    public function getTitle() {
        return $this->Title;
    }

    public function setTitle($value) {
        $this->Title = $value;
    }
    public function getBody() {
        return $this->Body;
    }

    public function setBody($value) {
        $this->Body = $value;
    }
    public function getDateReleased() {
        return $this->DateReleased;
    }

    public function setDateReleased($value) {
        $this->DateReleased = $value;
    }
} 