<?php

$gift_id = $_POST['GiftCard_Id'];

// Delete the product from the database
require_once('../model/database.php');
require_once('../model/giftcard_db.php');
GiftCardDB::deleteGiftCard($gift_id);

header('location: admin_index.php');
?>