<?php
require_once '../Models/Database.php';
require_once '../Models/AdminDB.php';
$pid = $_POST['productId'];
$cid = $_POST['Customer_Id'];
$db = Database::getDB();
$results = AdminDB::DeleteRating($pid,$cid);
if ($results == 1) {
    echo "Deleted Successfully";
    header('Location: ../Views/Index.php');
}