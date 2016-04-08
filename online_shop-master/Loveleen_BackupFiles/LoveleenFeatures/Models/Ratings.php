<?php
class Ratings
{
    private $Rating_Id;
    private $Product_Id;
    private $Rating;
    private $Customer_Id;

    public function __construct($product_Id,$rating,$cust_id)
    {
        $this->Product_Id=$product_Id;
        $this->Rating=$rating;
        $this->Customer_Id = $cust_id;
    }
    public function getRatingId()
    {
        return $this->Rating_Id;
    }
    public function setRatingId($value)
    {
        $this->Rating_Id = $value;
    }
    public function getProductId()
    {
        return $this->Product_Id;
    }
    public function setProductId($value)
    {
        $this->Product_Id = $value;
    }
    public function getRating()
    {
        return $this->Rating;
    }
    public function setRating($value)
    {
        $this->Rating = $value;
    }
    public function getCustomerId()
    {
        return $this->Customer_Id;
    }
    public function setCustomerId($value)
    {
        $this->Customer_Id = $value;
    }
}