<?php
require_once('/../Models/DbConnection.php');
require_once('/../Models/DealProduct.php');
require_once('/../Models/DealDB.php');
require_once('/../Validation/validation.php');

$valid=new validation();
$error="";
if(isset($_POST['Deal'])){
    if(isset($_POST['Id']))
        $id=$_POST['Id'];
    if(isset($_POST['Discount'])){

        $discount=$_POST['Discount'];
        if($valid->isEmpty($discount))
            $error="Please enter a discount amount.";
        else if(!($valid->isFloat($discount)))
            $error="Invalid discount amount.Please enter a float number.";
    }
if($error==""){
    $product=new Product();
    $product->setID($id);
    $product->setDiscountAmount($discount);
    $todayDate=date('Y-m-d');
    $product->setDealDate($todayDate);
    $row= DealDB::editDeal($product);
    if($row==1)
        header("location:../Views/admin_index.php");
    else
        header("location: addDeal.php");
}
else
    header("location:../Views/admin_index.php?error=$error");
}
