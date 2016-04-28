

<?php
// Get the product data
$custid = $_GET['cust_id'];
$orderdate = $_GET['orderdate'];
$shipamount = $_GET['shipamount'];
$shipaddress = $_GET['shipaddress'];


// Validate inputs
if (empty($custid) || empty($orderdate) || empty($shipaddress) ||empty($shipamount) ) {
    $error = "All the fields are required";
    header("location: add_order.php?error=$error");
    
} else {
    // If valid, add the product to the database
    require_once('../model/database.php');
    require_once('../model/order_db.php');

    addOrder($custid,$orderdate,$shipamount, $shipaddress);
    // Display the Orders List page
   header('location: admin_index.php');
}
?>