<?php
require_once('../Models/Database.php');
require_once ('../Models/Price_Convert.php');
require_once ('../Models/ConversionDB.php');
if(isset($_POST["arguments"]))
{
    $rate = $_POST["arguments"];
    //var_dump($rate);
    $today = date('Y-m-d H:i:s');
    $conversion = new price_convert($today,$rate);
    $row_count = ConversionDB::addConversionRate($conversion);
    if($row_count==1)
        echo "Conversion Value Inserted";
    else
        echo "Sorry, Some Error occurred :(";
    exit();
}
