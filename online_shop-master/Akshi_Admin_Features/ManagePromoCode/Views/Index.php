<script
    src="https://code.jquery.com/jquery-2.2.2.min.js"
    integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
    crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" href="Layout/Style/admin.css" />
<link rel="stylesheet" href="../Scripts/Gift_Card.css"/>
<?php
require_once("Layout/admin_header.php");
?>

<?php
require_once('../model/database.php');
require_once('../model/promocode_db.php');


$db = Database::getDB();
$promocode=PromoCodeDB::getPromoCode();


?>
<!--include the table with details of the gift cards like title, description and image source-->
    <div id="main">
    <h1 id="heading">Manage Promo Code</h1>
<table id="table-view"><tr>
    <th>Code</th>
    <th>Exp_Date</th>
    <th>Amount</th>
    </tr>
        <?php foreach ($promocode as $gc) :?>
    <tr>
        <td><?php echo $gc['Code'];?></td>
        <td><?php echo $gc['Exp_Date'];?></td>
        <td><?php echo $gc['Amount'];?></td>
        <td>
<!--            when the user clicks on update the id is sent as a hidden field-->
            <form action="update_promocode.php" method="post"
                  id="update_giftcard">
                <input type="hidden" name="Promocode_id"
                       value="<?php echo $gc['Promocode_id']; ?>" />
                <input type="submit" value="Edit" />
            </form>
        </td>
        <td>
            <!--when the user clicks on delete the id is sent as a hidden field-->
            <form action="delete_promocode.php" method="post"
                  id="delete_promocode">
                <input type="hidden" name="Promocode_id"
                       value="<?php echo $gc['Promocode_id']; ?>" />
                <input type="submit" value="Delete" />
            </form>

        </td>
    </tr>
    <?php endforeach; ?>
</table>
<p><a href="add_promocode.php">Add Promo Card</a></p>
    </div> <!-- This closing tag must be at the end of your main content!! -->

</div>
<?php
require_once("Layout/admin_footer.php");
?>
