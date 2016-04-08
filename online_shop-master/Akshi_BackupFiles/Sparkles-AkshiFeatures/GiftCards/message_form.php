<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Scripts/Gift_Card.css">

</head>
<?php
$error="";
if(isset($_POST['send'])) {

    $to = $_POST['email_to'];
    $msg=$_POST['message'];
    $amt=$_POST['amount'];
    $pay=$_POST['payment'];
    $id=$_POST['id'];

    if(empty($to)) {
    $error .= "<p style='color:red;'>Please enter an email. </p>";
    }
    else{
    if(!filter_var($to,FILTER_VALIDATE_EMAIL)){
    $error .= "<p style='color:red;'>Please enter a valid email. <br />";
    }
    }

    if(empty($error))
    {
        header("location: thankyougift.php?id=$id&to=$to&msg=$msg&amt=$amt&pay=$pay");
    }

}



?>


<body>
<?php require_once('../view/header.html');?>

<div id="gift_card_send">

</div>
<div id="gift_message">
    <?php
    echo "<b>$error</b>";
    ?>

    <form action="" method="post">

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
            <option value="visa">Visa</option>
            <option value="mastercard">Master Card</option>
            <option value="discover">Discover</option>
            <option value="stripe" selected>Stripe</option>
        </select><br/>

        <button type="submit" name="send">Pay</button>
    </form>




?>

<?php require_once('../view/footer.html');?>

</body>
</html>