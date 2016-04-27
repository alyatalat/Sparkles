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
<?php
require_once('../model/database.php');
require_once('../model/giftcard_db.php');
require_once('../model/giftcard.php');
require_once("../Layout/header.php");

$id = $_POST['gift_id'];
$giftcard_img = GiftCardDB::getGiftId($id);
?>
<div class="container-fluid">
    <div class="row gift-header-image">
        <h2 class="category-title"> GIFT CARD </h2>
    </div>
</div>


<div id="gift_card_send" class="container-fluid">
    <?php require('festival.php');?>
<?php include "giftcard_intro.php" ?>
    <!--if the error is set then error will be displayed-->
<div id="gift_message" class="row">
    <?php
    if (isset ($_GET['error']))
    {
        $error = $_GET['error'];
        echo "<b>$error</b>";
    }

    ?>
    <div class="col-md-5" id="giftimage">
        <img src="<?php echo $giftcard_img[0]; ?>">
    </div>



    <form action="thankyougift.php" method="post" class="col-md-5 pull-right">
        <input type="hidden" name="id" value="<?php echo $_POST['gift_id'];?>"/>
        <fieldset class="form-group">
            <label for="exInputEmail1">To :</label>
            <input type="email" name="email_to" class="form-control" placeholder="Enter email">
            <small class="text-muted">We'll send a digital gift card to your loved ones.</small>
        </fieldset>
        <fieldset class="form-group">
            <label for="exTextarea">Message :</label>
            <textarea name="message" class="form-control" rows="5"></textarea>
        </fieldset>

        <fieldset class="form-group">
            <label for="exPayment">Payment By :</label>
            <input type="email" name="payment" class="form-control" value="Card">
            
        </fieldset>



        <fieldset class="form-group">
            <label for="exSelect">Amount :</label>
            <select  class="form-control" name="amount">
                <option value="10" selected>10$</option>
                <option value="25">25$</option>
                <option value="50">50$</option>
                <option value="100">100$</option>
            </select>
        </fieldset>

        <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="pk_test_hNOTamz7C1hySP4mJemYBbYp"
            data-amount="<?php $_POST['amount']?>"
            data-name="Pay for Gift Card"
            data-description="Gift Card"
            data-locale="auto">
        </script>
    </form>

<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!--    <form action="thankyougift.php" method="post" class="col-md-5 pull-right">-->
<!--<!--hidden label for gift id-->-->
<!--        <input type="hidden" name="id" value="--><?php //echo $_POST['gift_id'];?><!--"/>-->
<!--        <div class="col-md-12">-->
<!--        <label>To :</label>-->
<!--        <input type="text" name="email_to" placeholder="Enter email address"><br/>-->
<!--        </div>-->
<!--        <div class="col-md-12">-->
<!--        <label>Message :</label>-->
<!--        <input type="text" name="message" placeholder="Enter a message"><br/>-->
<!--        </div>-->
<!--        <div class="col-md-12">-->
<!--        <label>Amount :</label>-->
<!--        <select name="amount">-->
<!--            <option value="10" selected>10$</option>-->
<!--            <option value="25">25$</option>-->
<!--            <option value="50">50$</option>-->
<!--            <option value="100">100$</option>-->
<!--        </select><br/>-->
<!--        </div>-->
<!--        <div class="col-md-12">-->
<!--        <label>Payment Type :</label>-->
<!--        <select name="payment">-->
<!--            <option value="card" selected>Card</option>-->
<!--        </select><br/>-->
<!--        </div>-->
<!--        <div class="col-md-12">-->
<!--<!--script for the button to run stripe-->-->
<!--         <script-->
<!--                src="https://checkout.stripe.com/checkout.js" class="stripe-button"-->
<!--                data-key="pk_test_hNOTamz7C1hySP4mJemYBbYp"-->
<!--                data-amount="--><?php //$_POST['amount']?><!--"-->
<!--                data-name="Pay for Gift Card"-->
<!--                data-description="Gift Card"-->
<!--                data-locale="auto">-->
<!--         </script>-->
<!--        </div>-->
<!--    </form>-->


</div> <!-- This closing tag must be at the end of your main content!! -->
</div>
<?php
require_once("../Layout/footer.php");
?>
