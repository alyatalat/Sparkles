

<script
    src="https://code.jquery.com/jquery-2.2.2.min.js"
    integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
    crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" href="../Views/Layout/Style/admin.css" />
<link rel="stylesheet" href="../Scripts/Gift_Card.css"/>
<?php
require_once("Layout/admin_header.php");
?>

<?php
// Get the product data
$custid = $_GET['cust_id'];
$orderdate = $_GET['orderdate'];
$shipamount = $_GET['shipamount'];
$shipaddress = $_GET['shipaddress'];


// Validate inputs
if (empty($custid) || empty($orderdate) || empty($shipaddress) ||empty($shipamount) ) {
    $error = "All the fields are required";
    echo ("some error");

} else {
    // If valid, add the product to the database
    require_once('../model/database.php');
    require_once('../model/order_db.php');

    addOrder($custid,$orderdate,$shipamount, $shipaddress);
    // Display the Orders List page
    echo("successfully added");
}
?>