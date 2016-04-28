<?php

// Get the product data
$cust_id = $_POST['Cust_Id'];
$order_date = $_POST['Order_Date'];
$ship_amount = $_POST['Ship_Amount'];
$ship_address=$_POST['Ship_Address'];
$id = $_POST['Order_Id'];



// Validate inputs
if (empty($cust_id) || empty($order_date) || empty($ship_amount) || empty($ship_address) ) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, add the product to the database
    require_once('../model/database.php');
    require_once('../model/order_db.php');
    updateOrder($cust_id, $order_date,$ship_amount,$ship_address);

    // Display the Product List page
    //header('location: admin_index.php');
    unset($_SESSION['Order_Id']);
}
?>