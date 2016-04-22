<?php
class Wishlists
{
    private $wishlist_Id;
    private $wishlist_Name;
    private $Customer_Id;
    private $wishlist_Note;
    private $wishlist_Date;

    public function __construct($wishname,$cid,$wishnote,$wishdate)
    {
        $this->wishlist_Name=$wishname;
        $this->Customer_Id=$cid;
        $this->wishlist_Note=$wishnote;
        $this->wishlist_Date=$wishdate;
    }

    public function getWishlistId()
    {
        return $this->wishlist_Id;
    }

    public function setWishlistId($wishlist_Id)
    {
        $this->wishlist_Id = $wishlist_Id;
    }

    public function getWishlistName()
    {
        return $this->wishlist_Name;
    }

    public function setWishlistName($wishlist_Name)
    {
        $this->wishlist_Name = $wishlist_Name;
    }

    public function getCustomerId()
    {
        return $this->Customer_Id;
    }

    public function setCustomerId($Customer_Id)
    {
        $this->Customer_Id = $Customer_Id;
    }

    public function getWishlistNote()
    {
        return $this->wishlist_Note;
    }

    public function setWishlistNote($wishlist_Note)
    {
        $this->wishlist_Note = $wishlist_Note;
    }

    public function getWishlistDate()
    {
        return $this->wishlist_Date;
    }

    public function setWishlistDate($wishlist_Date)
    {
        $this->wishlist_Date = $wishlist_Date;
    }
}