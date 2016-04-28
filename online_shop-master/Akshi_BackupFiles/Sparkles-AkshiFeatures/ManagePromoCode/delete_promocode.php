<?php

$pc_id = $_POST['Promocode_id'];

// Delete the product from the database
require_once('../model/database.php');
require_once('../model/promocode_db.php');

PromoCodeDB::deletePromoCode($pc_id);


header('location: Index.php');
?>