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
require_once('../model/giftcardorder.php');
require_once('../model/giftcardorder_db.php');

$db = Database::getDB();
$gift_order = GiftCardOrderDB::getGiftOrders();


?>

<div id="main">
    <h1 id="heading">Manage Gift Orders</h1>
    <div class=" add text-center">
    <button class="btn btn-md btn-primary"><a id="add" href="create_giftorder.php">Create New Order</a></button>
        <br/>
</div>

    <table class="table table-hover table-condensed text-left">
        <tr>

<!--include the table with details of the gift cards like title, description and image source-->



    <th>Customer</th>
    <th>Gift_Id</th>
    <th>Sent To</th>
        <th>Amount</th>
        <th>Message</th>
        <th>Payment</th>
    </tr>
        <?php foreach ($gift_order as $gc) :?>
    <tr>

        <td><?php echo $gc['Customer_Id'];?></td>
        <td><?php echo $gc['Gift_Id'];?></td>
        <td><?php echo $gc['SentTo_Email'];?></td>
        <td><?php echo $gc['Amount'];?></td>
        <td><?php echo $gc['Message'];?></td>
        <td><?php echo $gc['Payment_Mode'];?></td>
        <td>
<!--            when the user clicks on update the id is sent as a hidden field-->
            <form action="update_giftorder.php" method="post"
                  id="update_giftorder">
                <input type="hidden" name="GiftSent_Id"
                       value="<?php echo $gc['GiftSent_Id']; ?>" />
                <button type="submit" class="btn btn-sm btn-default">
                    <span class="glyphicon glyphicon-edit"></span>
                </button>
            </form>
        </td>
        <td>
            <!--when the user clicks on delete the id is sent as a hidden field-->
            <form action="delete_giftorder.php" method="post"
                  id="delete_giftorder">
                <input type="hidden" name="GiftSent_Id"
                       value="<?php echo $gc['GiftSent_Id']; ?>" />
                <button type="submit" class="delete btn btn-sm btn-default">
                    <span class="glyphicon glyphicon-remove"></span>
                </button>
            </form>

        </td>
    </tr>
    <?php endforeach; ?>
</table>
<p><a href="create_giftorder.php">Create GiftCard Order</a></p>

    </div> <!-- This closing tag must be at the end of your main content!! -->

</div>
<?php
require_once("../View/Layout/admin_footer.php");
?>
