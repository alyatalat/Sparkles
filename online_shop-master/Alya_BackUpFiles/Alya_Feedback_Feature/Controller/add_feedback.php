<?php
// Get the product data

$error = "";
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$Message_Date = date('Y-m-d');
$department = $_POST['department'];

var_dump($name,$email,$subject,$message,$Message_Date,$department);
// Validate inputs
if (empty($name)){
    $error.="<br/> Name Field Missing <br/>";
}
if(empty($email)){
    $error.="<br/> Email Missing <br/>";
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error.="<br/> Wrong Email Format <br/>";
}
if(empty($subject)) {
    $error .= "<br/> Subject Missing <br/>";
}
if (empty($message)){
    $error.="<br/> Message Missing <br/>";
}

if(empty($error)){
    require_once('../Controller/database.php');
    $query = "INSERT INTO feedback
                 ( Customer_Name, Customer_Email, Subject, Message, Message_Date, Department )
              VALUES
                 ('$name', '$email', '$subject', '$message', '$Message_Date','$department')";

    $db->exec($query);
    // Go to thank you page
    header('location: ../View/Thankyou.php');
} else {
    header("location: ../View/feedback.php?error=$error&name=$name&email=$email&subject=$subject&message=$message&department=$department");
}
?>
