<?php
require_once('/../Models/DbConnection.php');
require_once('/../Models/DealProduct.php');
require_once('/../Models/DealDB.php');

$products=DealDB::getAllDeals();

$result=json_encode($products);
//var_dump($result);
header("Content-Type: application/json");
echo $result;
?>