<?php
require_once('/../Models/DbConnection.php');
require_once('/../Models/DealProduct.php');
require_once('/../Models/DealDB.php');

if(isset($_GET['category'])){

    $cat=$_GET['category'];

$products=DealDB::getCatDeals($cat);

$result=json_encode($products);
//var_dump($result);
header("Content-Type: application/json");
echo $result;
}