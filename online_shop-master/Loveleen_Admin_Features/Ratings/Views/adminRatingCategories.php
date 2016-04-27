<?php
require_once '../Models/Database.php';
$db = Database::getDB();
$sql = "SELECT DISTINCT category FROM products";
$result = $db->query($sql);

$category = $result->fetchAll();

$jcat = json_encode($category);

header("Content-Type: application/json");
echo $jcat;

?>