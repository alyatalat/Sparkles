<?php
require_once('../Controller/database.php');
$category = $_POST['category'];
if(isset($category)) {
    echo $category;
    $query = "SELECT * FROM products
                              WHERE Category = $category
                              ORDER BY Product_Id";
    //   $products = $db->query($query);
}
else{
    $query = "SELECT * FROM products ORDER BY Product_Id";
}
$products = $db->query($query);
?>