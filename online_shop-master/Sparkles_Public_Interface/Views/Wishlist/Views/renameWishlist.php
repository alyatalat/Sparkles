<?php
require_once ('../Models/Database.php');
require_once ('../Models/wishlistsDB.php');
if(isset($_POST['choice']))
{
    $wishId=$_POST['choice'];
    if(isset($_POST['wname']))
        $name=$_POST['wname'];
    $row = wishlistsDB::renameWishlist($name,$wishId);
    if($row === 1)
    {
        echo "Your wishlist's name is successfully updated to $name";
    }
    else
    {
        echo "Some error occured. Please try again!";
    }
}