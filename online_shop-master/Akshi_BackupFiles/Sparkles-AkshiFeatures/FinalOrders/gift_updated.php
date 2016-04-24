<?php

// Get the product data
$title = $_POST['title'];
$description = $_POST['description'];
$file = $_POST['image_src'];
$img_src = '..'.DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR.'Images'.DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR.'Gift_Card' .DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR.$file;
$id = $_POST['GiftCard_Id'];
preg_replace('\\', '\\\\',$img_src);


// Validate inputs
if (empty($title) || empty($description) || empty($img_src) ) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, add the product to the database
    require_once('../model/database.php');
    require_once('../model/giftcard_db.php');
    GiftCardDB::updateGiftCard($id,$title, $description, $img_src);


    // Display the Product List page
   header('location: Index.php');
    unset($_SESSION['gift_id']);
}
?>