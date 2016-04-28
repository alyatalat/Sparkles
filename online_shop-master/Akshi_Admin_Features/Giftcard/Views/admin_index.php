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
require_once('../model/giftcard.php');
require_once('../model/giftcard_db.php');

$db = Database::getDB();
$gift_card = GiftCardDB::getGifts();

?>
<!--include the table with details of the gift cards like title, description and image source-->
<div id="main">
    <a href="../../GiftCardOrders/Views/admin_index.php">Manage Gift Orders</a>
    <h1 id="heading">Manage Gift Cards</h1>
    <table class="table table-hover table-condensed text-left">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Image Source</th>
        </tr>
        <?php foreach ($gift_card as $gc) :?>
            <tr>
                <td><?php echo $gc['Title'];?></td>
                <td><?php echo $gc['Description'];?></td>
                <td><?php echo $gc['Image_src'];?></td>
                <td>
                    <!--            when the user clicks on update the id is sent as a hidden field-->
                    <form action="update_giftcard.php" method="post"
                          id="update_giftcard">
                        <input type="hidden" name="GiftCard_Id"
                               value="<?php echo $gc['Gift_Id']; ?>" />
                        <input type="submit" value="Edit" />
                    </form>
                </td>
                <td>
                    <!--when the user clicks on delete the id is sent as a hidden field-->
                    <form action="delete_giftcard.php" method="post"
                          id="delete_giftcard">
                        <input type="hidden" name="GiftCard_Id"
                               value="<?php echo $gc['Gift_Id']; ?>" />
                        <input type="submit" value="Delete" />
                    </form>

                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="add_giftcard.php">Add Gift Card</a></p>
</div>
</div>
<?php
require_once("Layout/admin_footer.php");
?>
