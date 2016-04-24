<?php
// Get the product data
$cust_id = $_GET['cust_id'];
$gift_id = $_GET['gift_id'];
$sent_to = $_GET['sent_to'];
$amt = $_GET['amt'];
$msg = $_GET['msg'];
$mode = $_GET['mode'];
var_dump($cust_id);
var_dump($gift_id);
// Validate inputs
if (empty($cust_id) || empty($gift_id) || empty($sent_to) || empty($mode) ||empty($amt)) {
    $error = "All the fields are required";
    header("location: create_giftorder.php?error=$error");
    
} else {
    // If valid, add the product to the database
    require_once('../model/database.php');
    require_once('../model/giftcardorder_db.php');
    var_dump("here");
    GiftCardOrderDB::addGiftCardOrder($cust_id,$gift_id,$sent_to, $amt, $msg, $mode);

    // Display the Product List page
   header('location: Index.php');
}
?>