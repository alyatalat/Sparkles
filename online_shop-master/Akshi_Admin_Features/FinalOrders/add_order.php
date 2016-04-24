<?php

require_once('../model/database.php');
$db = Database::getDB();

$action = '';
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

include("../view/admin_header.php");
?>

    <div id="main">

    <div id="heading">
        <h1>Add an Order</h1>
    </div>
    <div id="main">
        <h1>Order Details</h1>
<?php
if(isset($_GET['error']))
{
    $error =$_GET['error'];
    $error ="All fields are required, please fill them all";
    echo $error;
}
?>


<!--        form for the gift card-->
<form action="order_added.php" method="GET">
    <label>Customer ID:</label>
        <input type="input" name="cust_id" />
        <br />
        <label>Order Date:</label>
        <input type="input" name="orderdate" />
        <br />
        <label>Ship Amount:</label>
        <input type="input" name="shipamount"/>
    <br />
    <label>Ship Address:</label>
    <input type="input" name="shipaddress"/>
    <br/>
    <input type="submit" value="Add"/> <br/>
</form>

        <p><a href="Index.php">View Orders List</a></p>
    </div>
</div><!-- end page -->
<?php
include("../view/admin_footer.php");
?>
