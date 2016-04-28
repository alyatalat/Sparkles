
<script
    src="https://code.jquery.com/jquery-2.2.2.min.js"
    integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
    crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" href="../../../Stylesheets/echo-index.css" />
<link rel="stylesheet" href="../../../Stylesheets/cart.css" />
<script src="../../../Scripts/cartjs.js"></script>



<?php
require_once("../Layout/header.php");
$subtotal=$_POST['new_subtotal'];
$subtotal_new = $subtotal*100;


//required strip manually included
require_once('../../Stripe/init.php');
\Stripe\Stripe::setApiKey('sk_test_D9304X01pM2xqrv7Zkr3E48t');

// Get the credit card details submitted by the form
$token = $_POST['stripeToken'];

// Create the charge on Stripe's servers - this will charge the user's card
try {
    $charge = \Stripe\Charge::create(array(
        "amount" => $subtotal_new, // amount in cents, again
        "currency" => "cad",
        "source" => $token,
        "description" => "Shopping Cart"
    ));
} catch(\Stripe\Error\Card $e) {
    $e = "Your card has been declined, please enter a valid card";
}
?>



<h2>Your order number has been placed and will be send within 2-3 working days</h2>


<?php
require_once("../Layout/footer.php");
?>
