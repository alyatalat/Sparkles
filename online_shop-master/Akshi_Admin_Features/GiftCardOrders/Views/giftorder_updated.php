
<?php

// Get the product data
$cust_id = $_POST['cust_id'];
$gift_id = $_POST['gift_id'];
$sent_to = $_POST['sent_to'];
$amt = $_POST['amt'];
$msg = $_POST['msg'];
$mode = $_POST['mode'];
$id = $_POST['GiftSent_Id'];

// Validate inputs
if (empty($cust_id) || empty($gift_id) || empty($sent_to) || empty($amt) || empty($msg) || empty($mode)) {
    $error = "Invalid order data. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, add the product to the database
    require_once('../model/database.php');
    require_once('../model/giftcardorder_db.php');
    GiftCardOrderDB::updateGiftOrder($id,$cust_id,$gift_id,$sent_to,$amt,$msg,$mode);

   // unset($_SESSION['GiftSent_Id']);
    // Display the Product List page
   header('location: Index.php');
}
?>


