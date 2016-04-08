<?php
session_start();
require_once('../model/database.php');
require_once('../model/giftcard_db.php');
require_once('../model/giftcard.php');

$giftcard = GiftCardDB::getGiftCards();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Scripts/Gift_Card.css">
</head>
<body>
<?php require_once('../view/header.html');?>
<?php include ('festival.php');?>
<?php include ('../View/giftcard_intro.php');?>

<div id="gift_cards">

<?php foreach($giftcard as $gc) :?>

    <div id="gift_card">
        <form action="message_form.php" method="post">
        <img src="<?php echo $gc->getImageSrc();?>" alt="gift card"/>
        <h3><?php echo $gc->getTitle();?></h3>
        <p><?php echo $gc->getDescription();?></p>
        <input type="hidden" name="gift_id" value="<?php echo $gc->getID();?>"> </input>
        <input type="submit" value="Add to Cart">
        </form>

    </div>
<?php endforeach; ?>


</div>
<div id="gift_card_last">
    <p>Send love to your loved ones in form of a gift card and we will make sure it gets delivered in the right </p>
</div>

<?php require_once('../view/footer.html');?>

</body>
</html>