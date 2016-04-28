<script
    src="https://code.jquery.com/jquery-2.2.2.min.js"
    integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
    crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" href="Layout/Style/admin.css" />

<link rel="stylesheet" href="Layout/Style/main.css" />
<link rel="stylesheet" href="Layout/Style/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="Layout/Style/dataTables.bootstrap.min.css" />
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="Layout/Scripts/sorttable.js"></script>
<script src="Layout/Scripts/dataTables.bootstrap.js"></script>
<script src="Layout/Scripts/jquery.dataTables.js"></script>


<?php
require_once("Layout/admin_header.php");
?>


<?php
require_once('../model/database.php');
require_once('../model/order_db.php');


$db = Database::getDB();
$final_order = getall_orders();


?>
<!--include the table with details of the gift cards like title, description and image source-->
    <div id="main">
    <h1 id="heading">Manage Orders</h1>
<table id="table-view"><tr>
    <th>Customer Id</th>
    <th>Order Date</th>
    <th>Ship Amount</th>
        <th>Ship Address</th>
    </tr>
        <?php foreach ($final_order as $gc) :?>
    <tr>
        <td><?php echo $gc['Cust_Id'];?></td>
        <td><?php echo $gc['Order_Date'];?></td>
        <td><?php echo $gc['Ship_Amount'];?></td>
        <td><?php echo $gc['Ship_Address'];?></td>
        </tr>
<!--            when the user clicks on update the id is sent as a hidden field-->
            <form action="update_order.php" method="post"
                  id="update_order">
                <input type="hidden" name="Order_Id"
                       value="<?php echo $gc['Order_Id']; ?>" />
                <input type="submit" value="Edit" />
            </form>
        </tr>
        <td>
            <!--when the user clicks on delete the id is sent as a hidden field-->
            <form action="delete_order.php" method="post"
                  id="delete_order">
                <input type="hidden" name="Order_Id"
                       value="<?php echo $gc['Order_Id']; ?>" />
                <input type="submit" value="Delete" />
            </form>

        </td>
    </tr>
    <?php endforeach; ?>
</table>
<p><a href="add_order.php">Add Order</a></p>
<?php include "Layout/admin_footer.php";