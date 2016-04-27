<?php

require_once '../Models/Database.php';
$category = $_GET['cat'];
$db = Database::getDB();

$sql = "SELECT p.Product_Id,p.Product_Title,p.Product_Description, AVG(Rating) AS Rating,COUNT(pr.Product_Id) AS Votes
        FROM products p JOIN products_ratings pr
        ON p.Product_Id = pr.Product_Id
        WHERE category = '$category'
        GROUP BY pr.Product_Id";
$result = $db->query($sql);

$products = $result->fetchAll();
//var_dump($products);
$jproducts = json_encode($products);

header("Content-Type: application/json");
echo $jproducts;