<?php

class Product {
    private $Product_Id;
    private $Product_Title;
    private $Category;
    private $Average_Rating;
    private $Product_Description;
    private $Quantity;
    private $Price;
    private $Color;
    private $Sale;
    private $Image;
    private $Deal;
    private $DiscountAmount;
    private $DealDate;

    public function __construct() {
    }

    public function getID() {
        return $this->Product_Id;
    }

    public function setID($value) {
        $this->Product_Id = $value;
    }
    public function getTitle() {
        return $this->Product_Title;
    }

    public function setTitle($value) {
        $this->Product_Title = $value;
    }
    public function getCategory() {
        return $this->Category;
    }

    public function setCategory($value) {
        $this->Category = $value;
    }
    public function getAverage_Rating() {
    return $this->Average_Rating;
}

    public function setAverage_Rating($value) {
        $this->Average_Rating= $value;
    }
    public function getProduct_Description() {
        return $this->Product_Description;
    }

    public function setProduct_Description($value) {
        $this->Product_Description= $value;
    }
    public function getQuantity() {
        return $this->Quantity;
    }

    public function setQuantity($value) {
        $this->Quantity= $value;
    }
    public function getPrice() {
        return $this->Price;
    }

    public function setPrice($value) {
        $this->Price= $value;
    }
    public function getColor() {
        return $this->Color;
    }

    public function setColor($value) {
        $this->Color= $value;
    }
    public function getSale() {
        return $this->Sale;
    }

    public function setSale($value) {
        $this->Sale= $value;
    }
    public function getImage() {
        return $this->Image;
    }

    public function setImage($value) {
        $this->Image= $value;
    }
    public function getDeal() {
        return $this->Deal;
    }

    public function setDeal($value) {
        $this->Deal= $value;
    }
    public function getDiscountAmount() {
        return $this->DiscountAmount;
    }

    public function setDiscountAmount($value) {
        $this->DiscountAmount= $value;
    }
    public function getDealDate() {
        return $this->DealDate;
    }

    public function setDealDate($value) {
        $this->DealDate= $value;
    }
} 