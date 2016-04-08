<?php

$gift_id = $_POST['GiftCard_Id'];

// Delete the product from the database
require_once('../model/database.php');

$db = Database::getDB();
$query = "DELETE FROM gift_cards
          WHERE Gift_Id = '$gift_id'";
$db->exec($query);

header('location: Index.php');
?>