
<!DOCTYPE html>
<html>
<head>
    <title>Sparkles</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script
        src="https://code.jquery.com/jquery-2.2.2.min.js"
        integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
        crossorigin="anonymous"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <link rel="stylesheet" href="../Style/echo-index.css" />
    <link rel="stylesheet" href="../Style/Feedback.css"/>
    <link rel="stylesheet" href="../Style/Gift_Card.css"/>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <?php
        require_once ('../../../Layout/header.html');
        ?>
    </div>
</div>

<div class="container-fluid">
    <div class="row gift-header-image">
        <h2 class="category-title"> GIFT CARD </h2>
    </div>
</div>

<?php

require_once('../model/database.php');
require_once('../model/giftcard_db.php');
require_once('../model/giftcard.php');

$giftcard = GiftCardDB::getGiftCards();

?>

<div id="main">
    <div class="container-fluid">
        <div class="row">
<!--the upcoming festival is fetched and the theme is updated-->
    <?php require('festival.php');?>

    <?php include('giftcard_intro.php');?>

<!--create gift cards-->
<div id="gift_cards" class="col-md-9 pull-right">

<?php foreach($giftcard as $gc) :?>

    <div id="gift_card">
        <form action="message_form.php" method="post">
<!--        image of the gift card-->
        <img name="Image_src" src="<?php echo $gc->getImageSrc();?>" alt="gift card" />
<!--            Title for the gift card-->
        <h3><?php echo $gc->getTitle();?></h3>
<!--            description of the gift card-->
        <p><?php echo $gc->getDescription();?></p>
<!--            hidden id to store the gift_id-->
        <input type="hidden" name="gift_id" value="<?php echo $gc->getID();?>"> </input>
<!--            submit button that redirects to the message_form-->
        <input id="btn_add" type="submit" value="Add to Cart" class="col-md-5">
        </form>

    </div>
<?php endforeach; ?>


</div>
<div id="gift_card_last">
    <p>Send love to your loved ones in form of a gift card and we will make sure it gets delivered in the right </p>
</div>

</div> <!-- This closing tag must be at the end of your main content!! -->
</div>
<?php
require_once("../Layout/footer.php");
?>
    </div>
</div>
</body>