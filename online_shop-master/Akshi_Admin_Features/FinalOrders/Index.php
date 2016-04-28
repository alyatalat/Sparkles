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
require_once('../model/order_db.php');

$db = Database::getDB();
$orders = getall_orders();


?>
<!--include the table with details of the gift cards like title, description and image source-->
    <div id="main">
    <h1 id="heading">Manage Orders</h1>
<table id="table-view"><tr>
    <th>Customer Id</th>
    <th>Order Date</th>
    <th>Total Amount</th>
        <th>Ship Address</th>
    </tr>
        <?php foreach ($orders as $gc) :?>
    <tr>
        <td><?php echo $gc['Cust_Id'];?></td>
        <td><?php echo $gc['Order_Date'];?></td>
        <td><?php echo $gc['Ship_Amount'];?></td>
        <td><?php echo $gc['Ship_Address'];?></td>
        <td>
<!--            when the user clicks on update the id is sent as a hidden field-->
            <form action="update_order.php" method="post"
                  id="update_order">
                <input type="hidden" name="Order_Id"
                       value="<?php echo $gc['Order_Id']; ?>" />
                <input type="submit" value="Edit" />
            </form>
        </td>
        <td>
            <!--when the user clicks on delete the id is sent as a hidden field-->
            <form action="delete_order.php" method="post" id="delete_order">
                <input type="hidden" name="Order_Id"
                       value="<?php echo $gc['Order_Id']; ?>" />
                <input type="submit" value="Delete" />
            </form>

        </td>
    </tr>
    <?php endforeach; ?>
</table>
<p><a href="add_order.php">Add Order</a></p>
<?php include "../view/admin_footer.php";