<?php
// Get the product data
$Code = $_GET['Code'];
$Exp_Date = $_GET['Exp_Date'];
$Amount=$_GET['Amount'];


// Validate inputs
if (empty($Code) || empty($Exp_Date) || empty($Amount) ) {
    $error = "All the fields are required";
    header("location: add_promocode.php?error=$error");
    
} else {
    // If valid, add the product to the database
    require_once('../model/database.php');
    require_once('../model/promocode_db.php');
    PromoCodeDB::addPromoCode($Code,$Exp_Date,$Amount);

    // Display the Product List page
   //header('location: Index.php');
}
?>