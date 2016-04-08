<?php
// Get the product data
$title = $_GET['title'];
$description = $_GET['description'];

$img_src = '..'.DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR.'Images'.DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR.'Gift_Card' .DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR.$_GET['filename'];
var_dump($title);
var_dump($description);
var_dump($img_src);
// Validate inputs
if (empty($title) || empty($description) || empty($img_src) ) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, add the product to the database
    require_once('../model/database.php');

    $db = Database::getDB();
    $query = "INSERT INTO gift_cards
                 (Title, Description, Image_src)
              VALUES
                 ('$title', '$description', '$img_src')";
    $db->exec($query);

    // Display the Product List page
   header('location: Index.php');
}
?>