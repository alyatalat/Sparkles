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
require_once('../model/database.php');

$db = Database::getDB();


$error="";
//validation for the values coming from post

$sent_to=$_POST['email_to'];
$message=$_POST['message'];
$amount=$_POST['amount'];
$payment=$_POST['payment'];

$id=$_POST['id'];

    if(empty($sent_to)) {
        $error .= "<p style='color:red;'>Please enter an email. </p>";
    }
    else{
        if(!filter_var($sent_to,FILTER_VALIDATE_EMAIL)){
            $error .= "<p style='color:red;'>Please enter a valid email. <br />";
        }
    }

    if(empty(!$error))
    {
        header("location: message_form.php?error=$error");
    }

//$db = Database::getDB();
//$customer_id =$_SESSION['customer_id'];
$customer_id =1;
$gift_id=$_POST['id'];
//required strip manually included
require_once('../Stripe/init.php');
\Stripe\Stripe::setApiKey('sk_test_D9304X01pM2xqrv7Zkr3E48t');

// Get the credit card details submitted by the form
$token = $_POST['stripeToken'];

// Create the charge on Stripe's servers - this will charge the user's card
try {
    $charge = \Stripe\Charge::create(array(
        "amount" => 1000, // amount in cents, again
        "currency" => "cad",
        "source" => $token,
        "description" => "Example charge"
    ));
} catch(\Stripe\Error\Card $e) {
    $e = "Your card has been declined, please enter a valid card";
}


//insert into the giftcard_sent table
$query ="INSERT INTO giftcard_sent
(Customer_Id,Gift_Id,SentTo_Email,Amount,Message,Payment_Mode)
VALUES
($customer_id,$gift_id,'$sent_to',$amount,'$message','$payment');";

$db->exec($query);

?>

<div id="main">
<!--thank you message on the page-->

<p>Thank you for buying the gift cart for the value $ <?php echo $amount?>, we will deliver your gift card to <?php echo $sent_to; ?>
    in 2 to 3 business days.</p>
</div> <!-- This closing tag must be at the end of your main content!! -->
</div>
<?php
require_once("../View/Layout/admin_footer.php");
?>
