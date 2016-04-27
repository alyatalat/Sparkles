<?php
require_once('checkout_confirm.php');
require_once('../Stripe/init.php');
\Stripe\Stripe::setApiKey('sk_test_D9304X01pM2xqrv7Zkr3E48t');

// Get the credit card details submitted by the form
$token = $_POST['stripeToken'];

// Create the charge on Stripe's servers - this will charge the user's card
try {
$charge = \Stripe\Charge::create(array(
"amount" => $subtotal,
"currency" => "cad",
"source" => $token,
"description" => "Shopping Subtotal Customer"

));
    echo "Your card has been charged";
} catch(\Stripe\Error\Card $e) {
$e = "Your card has been declined, please enter a valid card";
echo $e;
}

