<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
require_once('../model/database.php');

$db = Database::getDB();
$id= $_POST['GiftCard_Id'];

$sql = "SELECT * FROM gift_cards WHERE Gift_Id= '$id'";
$result = $db->query($sql);
$gift_detail = $result->fetch();
?>
<head>
    <title>Update Gift Card</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Scripts/Gift_Card.css">

</head>

<body>
<div id="page">
    <div id="header">
        <h1>Update a Gift Card</h1>
    </div>

    <div id="main">

        <?php $image_src = $gift_detail['Image_src'];

        $image_src = addslashes($image_src);


        ?>

        <form action="gift_updated.php" method="post"
              id="gift_update_form">
            <input type="hidden" name="gift_id" value="<?php echo $id;?>"/>
            <label>Title:</label>
            <input type="input" name="title" value="<?php echo $gift_detail['Title'];?>" />
            <br />

            <label>Description:</label>
            <input type="input" name="description" value="<?php echo $gift_detail['Description'];?>"/>
            <br />

            <label>Image Source:</label>
            <input type="input" name="image_src" value="<?php echo $image_src;?>"/>
            <br />

            <input type="submit" value="Update" />
            <br />
        </form>
        <p><a href="Index.php">View Gift Card List</a></p>
    </div>

    <?php include ('../View/footer.php');?>
</div><!-- end page -->
</body>
</html>