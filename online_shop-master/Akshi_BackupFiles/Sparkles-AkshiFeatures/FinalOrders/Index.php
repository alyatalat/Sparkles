<?php
require_once('../model/database.php');
require_once('../model/giftcard.php');
require_once('../model/giftcard_db.php');

$db = Database::getDB();
$gift_card = GiftCardDB::getGifts();

include "../view/admin_header.php";
?>
<!--include the table with details of the gift cards like title, description and image source-->
    <div id="main">
    <h1 id="heading">Manage Orders</h1>
<table id="table-view"><tr>
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
<?php include "../view/admin_footer.php";