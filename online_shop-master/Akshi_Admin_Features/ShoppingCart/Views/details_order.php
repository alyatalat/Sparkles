

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
$order_id=$_POST['Order_Id'];
$db = Database::getDB();
$orders = get_order_items($order_id);


?>
<!--include the table with details of the gift cards like title, description and image source-->
<div id="main">
    <h1 id="heading">Order Item Details</h1>
    <table id="table-view"><tr>
            <th>Order Id</th>
            <th>Product Id</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        <?php foreach ($orders as $gc) :?>
            <tr>
                <td><?php echo $gc['Order_Id'];?></td>
                <td><?php echo $gc['Product_Id'];?></td>
                <td><?php echo $gc['Item_Price'];?></td>
                <td><?php echo $gc['Quantity'];?></td>


            </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="admin_index.php">Back to Orders List</a></p>

    <?php
    require_once("Layout/admin_footer.php");
    ?>
