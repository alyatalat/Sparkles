<?php
// Get the product data
$title = $_GET['title'];
$description = $_GET['description'];

$img_src = '..'.DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR.'Images'.DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR.'Gift_Card' .DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR.$_GET['filename'];
// Validate inputs
if (empty($title) || empty($description) || empty($img_src) ) {
    $error = "All the fields are required";
    header("location: add_promocode.php?error=$error");
    
} else {
    // If valid, add the product to the database
    require_once('../model/database.php');
    require_once('../model/giftcard_db.php');
    GiftCardDB::addGiftCard($title, $description, $img_src);
    // Display the Product List page
   header('location: Index.php');
}
?>