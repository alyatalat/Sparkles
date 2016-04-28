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
require_once("../Views/Layout/admin_header.php");
?>



<?php

require_once('../model/database.php');
$db = Database::getDB();

$action = '';
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
}


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
include("Layout/admin_footer.php");
?>
