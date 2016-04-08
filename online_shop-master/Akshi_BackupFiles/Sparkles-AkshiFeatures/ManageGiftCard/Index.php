<?php

require_once('../model/database.php');

$db = Database::getDB();
$query='select * from gift_cards';

$gift_card = $db->query($query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>
    <title>Manage Gift Card</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Scripts/Gift_Card.css">

</head>


<body id="page-wrapper">
<h1 id="heading">Manage Gift Cards</h1>
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
            <form action="update_giftcard.php" method="post"
                  id="update_giftcard">
                <input type="hidden" name="GiftCard_Id"
                       value="<?php echo $gc['Gift_Id']; ?>" />
                <input type="submit" value="Edit" />
            </form>
        </td>
        <td>
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
<?php include ('../View/footer.php');?>
</body>
</html>
