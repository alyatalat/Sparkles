<script
    src="https://code.jquery.com/jquery-2.2.2.min.js"
    integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
    crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" href="../View/Layout/Style/admin.css" />
<link rel="stylesheet" href="../Scripts/Gift_Card.css"/>
<?php
require_once("../View/Layout/admin_header.php");
?>

<div id="gift_card_send">

</div>
<!--if the error is set then error will be displayed-->
<div id="gift_message">
    <?php
    if (isset ($_GET['error']))
    {
        $error = $_GET['error'];
        echo "<b>$error</b>";
    }

    ?>

    <form action="thankyougift.php" method="post">
<!--hidden label for gift id-->
        <input type="hidden" name="id" value="<?php echo $_POST['gift_id'];?>"/>

        <label>To :</label>
        <input type="text" name="email_to" placeholder="Enter email address"><br/>

        <label>Message :</label>
        <input type="text" name="message" placeholder="Enter a message"><br/>

        <label>Amount :</label>
        <select name="amount">
            <option value="10" selected>10$</option>
            <option value="25">25$</option>
            <option value="50">50$</option>
            <option value="100">100$</option>
        </select><br/>

        <label>Payment Type :</label>
        <select name="payment">
            <option value="card" selected>Card</option>
        </select><br/>
        
<!--script for the button to run stripe-->
         <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="pk_test_hNOTamz7C1hySP4mJemYBbYp"
                data-amount="<?php $_POST['amount']?>"
                data-name="Pay for Gift Card"
                data-description="Gift Card"
                data-locale="auto">
         </script>

    </form>


</div> <!-- This closing tag must be at the end of your main content!! -->
</div>
<?php
require_once("../View/Layout/admin_footer.php");
?>
