<script
    src="https://code.jquery.com/jquery-2.2.2.min.js"
    integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
    crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" href="../Views/Layout/Style/admin.css" />
<link rel="stylesheet" href="../Scripts/Gift_Card.css"/>
<?php
require_once("../Views/Layout/admin_header.php");
?>

<?php

// Get the product data
$order_id = $_POST['Order_Id'];
$cust_id = $_POST['Cust_Id'];
$order_date = $_POST['Order_Date'];

$ship_address = $_POST['Ship_Address'];
$ship_amount = $_POST['Ship_Amount'];


// Validate inputs
if (empty($cust_id) || empty($order_date) || empty($ship_address)|| empty($ship_amount) ) {
    $error = "All fields are required. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, add the product to the database
    require_once('../model/database.php');
    require_once('../model/order_db.php');
    updateOrder($order_id,$cust_id, $order_date,$ship_amount, $ship_address);


echo ("succesfully updated");
    // Display the Product List page
//    header('location: admin_index.php');
  //  unset($_SESSION['Order_id']);
}
?>