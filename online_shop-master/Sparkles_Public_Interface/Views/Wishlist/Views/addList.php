<?php
require_once ('../Models/Database.php');
require_once ('../Models/Wishlists.php');
require_once ('../Models/wishlistsDB.php');
require_once ('../Models/wishlistDetailsDB.php');
if(isset($_POST['btnSubmit']))
{
    if(isset($_POST['wishlistName']))
    {
        $wishName = $_POST['wishlistName'];
    }
    if($_POST['wishlistDesc'])
    {
        $wishDesc = $_POST['wishlistDesc'];
    }
    $proId = $_POST['productId'];
    // change customer id here also
    $cid=1;
    $today=date("Y-m-d");
    $wishlist = new Wishlists($wishName,$cid,$wishDesc,$today);
    $row= wishlistsDB::addNewWishlist($wishlist);
    $row_count = wishlistsDetailsDB::addWishlistProduct($row,$proId);
    if($row_count==1)
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    else
        echo "failure";
}

?>
