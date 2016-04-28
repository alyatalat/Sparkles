<?php session_start(); ?>
<script
    src="https://code.jquery.com/jquery-2.2.2.min.js"
    integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
    crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" href="../View/Layout/Style/admin.css" />
<link rel="stylesheet" href="../Scripts/Gift_Card.css"/>
<?php
require_once("../View/Layout/admin_header.php");
?>



<?php
require_once('../model/database.php');

$_SESSION['GiftSent_Id']=$_POST['GiftSent_Id'];
$id = $_SESSION['GiftSent_Id'];
$db = Database::getDB();
//id card for the gift details
    $id = $_POST['GiftSent_Id'];

    $sql = "SELECT * FROM giftcard_sent WHERE GiftSent_Id= '$id'";
    $result = $db->query($sql);
    $gift_order = $result->fetch();


?>
<div id="main">
    <div id="header">
        <h1>Update a Gift Card Order</h1>
    </div>

    <div id="main">

            <br />
<!--description of the gift card-->
        </form>
            <form method="post" action="giftorder_updated.php">
            <input type="hidden" name="GiftSent_Id" value="<?php echo $id;?>"/>

                <label>Customer Id</label>
                <input type="input" name="cust_id" value="<?php echo $gift_order['Customer_Id'];?>"/>
                <br />
                <label>Gift Id</label>
                <input type="input" name="gift_id" value="<?php echo $gift_order['Gift_Id'];?>"/>
                <br />

                <label>Sent To Email:</label>
                <input type="input" name="sent_to" value="<?php echo $gift_order['SentTo_Email'];?>"/>
                <br />
                <label>Amount:</label>
                <input type="input" name="amt" value="<?php echo $gift_order['Amount'];?>"/>

                <br/>
                <label>Message</label>
                <input type="input" name="msg" value="<?php echo $gift_order['Message'];?>"/>
                <br />
                <label>Payment Mode</label>
                <input type="input" name="mode" value="<?php echo $gift_order['Payment_Mode'];?>"/>
                <br />


            <input type="submit" value="Update" name="Update">
        </form>
        <p><a href="Index.php">View Gift Card List</a></p>
    </div>

</div>
</div>
<?php
require_once("../View/Layout/admin_footer.php");
?>