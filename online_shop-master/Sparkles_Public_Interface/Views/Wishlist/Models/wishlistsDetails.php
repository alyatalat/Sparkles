<?php
class wishlistsDetails
{
    private $wishid;
    private $wishlist_Id;
    private $Product_Id;

    public function __construct($wishlistId,$proId)
    {
        $this->wishlist_Id = $wishlistId;
        $this->Product_Id = $proId;
    }

    public function getWishid()
    {
        return $this->wishid;
    }

    public function setWishid($wishid)
    {
        $this->wishid = $wishid;
    }
    public function getWishlistId()
    {
        return $this->wishlist_Id;
    }

    public function setWishlistId($wishlist_Id)
    {
        $this->wishlist_Id = $wishlist_Id;
    }

    public function getProductId()
    {
        return $this->Product_Id;
    }

    public function setProductId($Product_Id)
    {
        $this->Product_Id = $Product_Id;
    }
}