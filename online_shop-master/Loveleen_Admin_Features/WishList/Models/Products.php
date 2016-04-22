<?php
class products
{
    private $Product_Id;
    private $Product_Title;
    private $Average_Rating;
    private $Product_Description;
    private $Image;

    public function __construct($title,$avg_rating,$description,$img)
    {
        $this->Product_Title = $title;
        $this->Average_Rating = $avg_rating;
        $this->Product_Description = $description;
        $this->Image = $img;
    }
    public function getId()
    {
        return $this->Product_Id;
    }
    public function setId($value)
    {
        $this->Product_Id = $value;
    }
    public function getTitle()
    {
        return $this->Product_Title;
    }
    public function setTitle($value)
    {
        $this->Product_Title = $value;
    }

    public function getRating()
    {
        return $this->Average_Rating;
    }

    public function setRating($value)
    {
        $this->Average_Rating = $value;
    }

    public function getDescription()
    {
        return $this->Product_Description;
    }

    public function setDescription($value)
    {
        $this->Product_Description = $value;
    }

    public function getImage()
    {
        return $this->Image;
    }

    public function setImage($value)
    {
        $this->Image = $value;
    }
}