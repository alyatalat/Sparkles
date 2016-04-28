<?php session_start();

$_SESSION['Order_Id']=$_POST['Order_Id'];
?>

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
require_once('../model/database.php');
require_once('../model/order_db.php');
$id = $_POST['Order_Id'];
$db = Database::getDB();

$sql = "SELECT * FROM orders WHERE Order_Id= '$id'";
$result = $db->query($sql);

$order_detail = $result->fetch();
?>
    <div id="main">
        <div id="header">
            <h1>Update an Order</h1>
        </div>

        <div id="main">

            <br />

            <form method="post" action="order_updated.php">
                <input type="hidden" name="Order_Id" value="<?php echo $order_detail['Order_Id'];?>"/>
                <label>Customer Id:</label>
                <input type="input" name="Cust_Id" value="<?php echo $order_detail['Cust_Id'];?>" />
                <br />

                <label>Date of Order:</label>
                <input type="input" name="Order_Date" value="<?php echo $order_detail['Order_Date'];?>"/>
                <br />

                <label>Total Amount:</label>
                <input type="input" name="Ship_Amount" value="<?php echo $order_detail['Ship_Amount'];?>"/>
                <br />

                <label>Ship Address:</label>
                <input type="input" name="Ship_Address" value="<?php echo $order_detail['Ship_Address'];?>"/>
                <br />
                <br/>
                <input type="submit" value="Update" name="Update">
            </form>
            <p><a href="admin_index.php">View Orders List</a></p>
        </div>


    </div><!-- end page -->

<?php
require_once("Layout/admin_footer.php");
?>
