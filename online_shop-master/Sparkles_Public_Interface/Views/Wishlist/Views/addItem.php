<?php
require_once('../Models/Database.php');
require_once('../Models/Products.php');
require_once ('../Models/Wishlists.php');
require_once('../Models/wishlistsDB.php');
require_once ('../Models/wishlistsDetails.php');
require_once('../Models/wishlistDetailsDB.php');


if(isset($_POST["id"])) {
    $productId = $_POST["id"];
}
if(isset($_POST["choice"])) {
    $choice = $_POST['choice'];
}
$wishlistDetail = new wishlistsDetails($choice,$productId);
$row_count = wishlistsDetailsDB::addWishlistProduct($choice,$productId);
if($row_count==1) {
     $result = wishlistsDB::getWishlistName($choice);
    $board = $result['wishlist_Name'];
    echo "Saved to your $board wishlist :)";
}
    else
    {
        echo "Sorry, Some Error occurred :(";
        exit();
    }