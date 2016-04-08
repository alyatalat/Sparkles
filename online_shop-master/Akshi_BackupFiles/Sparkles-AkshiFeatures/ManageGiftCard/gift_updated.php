<?php
// Get the product data
$title = $_POST['title'];
$description = $_POST['description'];
$img_src = $_POST['image_src'];
$id = $_POST['gift_id'];
preg_replace('\\', '\\\\',$img_src);


var_dump($img_src);

// Validate inputs
if (empty($title) || empty($description) || empty($img_src) ) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, add the product to the database
    require_once('../model/database.php');

    $db = Database::getDB();
    $query = "UPDATE gift_cards
                SET title ='$title',
                description = '$description',
                image_src ='$img_src'
                WHERE Gift_Id='$id'";

    $db->exec($query);

    // Display the Product List page
    header('location: Index.php');
}
?>