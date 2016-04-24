<?php

$gift_id = $_POST['PromoCode_Id'];

// Delete the product from the database
require_once('../model/database.php');
require_once('../model/promocode_db.php');
GiftCardDB::deleteGiftCard($gift_id);

header('location: Index.php');
?>