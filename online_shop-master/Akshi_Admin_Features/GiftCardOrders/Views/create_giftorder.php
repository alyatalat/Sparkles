<script
    src="https://code.jquery.com/jquery-2.2.2.min.js"
    integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
    crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" href="../View/Layout/Style/admin.css" />
<link rel="stylesheet" href="../../Scripts/Gift_Card.css"/>
<?php
require_once("../View/Layout/admin_header.php");
?>


<?php

require_once('../model/database.php');

$db = Database::getDB();


?>

    <div id="main">

    <div id="heading">
        <h1>Create a Gift Card Order</h1>
    </div>
    <div id="main">
        <h1>Gift Card Order Details</h1>
<?php
if(isset($_GET['error']))
{
    $error =$_GET['error'];
    $error ="All fields are required, please fill them all";
    echo $error;
}
?>
<form action="giftorder_added.php" method="GET">
    <label>Customer Id</label>
        <input type="input" name="cust_id" />
        <br />
    <label>Gift Id</label>
    <input type="input" name="gift_id" />
    <br />

    <label>Sent To Email:</label>
        <input type="input" name="sent_to" />
        <br />
        <label>Amount:</label>
        <input type="input" name="amt" />

    <br/>
    <label>Message</label>
    <input type="input" name="msg" />
    <br />
    <label>Payment Mode</label>
    <input type="input" name="mode" />
    <br />

    <input type="submit" value="Add"/> <br/>
</form>

        <p><a href="Index.php">View Orders List</a></p>
    </div>
</div><!-- end page -->
    </div>
<?php
require_once("../View/Layout/admin_footer.php");
?>