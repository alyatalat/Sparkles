<?php
// Get ID
$product_id = $_POST['product_id'];

// Delete the product from the database
require_once('database.php');
$query = "DELETE FROM products
          WHERE Product_Id = '$product_id'";
$db->exec($query);

// display the Product List page
header('location: ../Views/display_product.php');
?>