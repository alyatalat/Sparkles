<?php
require_once('../model/database.php');
require_once('../model/order_db.php');
session_start();

$_SESSION['Order_Id']=$_POST['Order_Id'];
$id = $_POST['Order_Id'];
$db = Database::getDB();

$sql = "SELECT * FROM orders WHERE Order_Id= '$id'";
$result = $db->query($sql);

$order_detail = $result->fetch();
var_dump($order_detail);
include "../view/admin_header.php";
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
            <p><a href="Index.php">View Orders List</a></p>
        </div>


    </div><!-- end page -->
<?php include "../view/admin_footer.php";?>