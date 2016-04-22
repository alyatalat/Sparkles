<?php
require_once ('../Models/Database.php');
require_once ('../Models/wishlistDetailsDB.php');
if(isset($_POST["prod"])) {
    $product = $_POST['prod'];
    if(isset($_POST['wishid']))
        $wishlist = $_POST['wishid'];
    $row = wishlistsDetailsDB::removeProduct($product,$wishlist);
    if($row === 1){
        echo "Product successfully removed from the wishlist";
    }
    else
    {
        echo "Error occured while deleting product from your wishlist. try Again!";
    }
}
