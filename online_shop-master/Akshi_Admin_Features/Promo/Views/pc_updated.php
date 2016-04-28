<?php

// Get the product data
$code = $_POST['Code'];
var_dump($code);
$exp_date = $_POST['Exp_Date'];
var_dump($exp_date);
$amount = $_POST['Amount'];
var_dump($amount);
$id = $_POST['Promocode_id'];
var_dump($id);

// Validate inputs
if (empty($code) || empty($exp_date) || empty($amount) ) {
    $error = "Invalid promo code data. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, add the product to the database
    require_once('../model/database.php');
    require_once('../model/promocode_db.php');

    PromoCodeDB::updatePromoCode($id,$code,$exp_date,$amount);



    // Display the Product List page
    header('location: admin_index.php');
    unset($_SESSION['Promocode_id']);
}
?>