<?php
require_once('../model/database.php');


    require_once('Stripe/lib/Stripe.php');
    Stripe::setApiKey("secret_key_here"); //Replace with your Secret Key

    $charge = Stripe_Charge::create(array(
        "amount" => 1500,
        "currency" => "usd",
        "card" => $_POST['stripeToken'],
        "description" => "Charge for Facebook Login code."
    ));


$db = Database::getDB();

$sent_to =$_GET['to'];
$message =$_GET['msg'];
$amount =$_GET['amt'];
$payment =$_GET['pay'];
//$customer_id =$_SESSION['customer_id'];
$customer_id =1;
$gift_id =$_GET['id'];


$query ="INSERT INTO giftcard_sent
(Customer_Id,Gift_Id,SentTo_Email,Amount,Message,Payment_Mode)
VALUES
($customer_id,$gift_id,'$sent_to',$amount,'$message','$payment');";

$db->exec($query);

?>
<h4>Thank you for buying the gift cart for the value <?php echo $amount?>, we will deliver your gift card to <?php echo $sent_to?>
    in 2 to 3 business days.</h4>


