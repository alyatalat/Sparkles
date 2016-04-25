
<?php
// Get the product data
$error = "";
$id = $_POST['id'];
$username=$_POST['username'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$status=$_POST['status'];


//echo $error. " " . $category . " " . $descripton . " " . $quantity . " " . $name . " " . $price . " " . $image;

// Validate inputs
if (empty($fname) || empty($lname)){
    $error.="<br/> Name Field Missing <br/>";
}
if(empty($email)){
    $error.="<br/> Email Missing <br/>";
}
if(empty($phone)){
    $error.= "<br/> Phone Missing <br/>";
}
if (empty($address)){
    $error.="<br/> Address Field Missing <br/>";
}
if(empty($status)){
    $error.="<br/> Status Missing <br/>";
}
if(empty($username)){
    $error.= "<br/> Username Missing <br/>";
}



if(empty($error)){
    require_once('database.php');
    $query = "UPDATE customer
                    SET FirstName = '$fname',
                        LastName = '$lname',
                        Email = '$email',
                        PhoneNumber = '$phone',
                        BillingAddress = '$address',
                        UserName = '$username',
                        Status = '$status'

              WHERE Customer_Id = $id ";


    $db->exec($query);

    // Display the Customer List page
    header('location: ../Views/admin_index.php');
} else {
    header("location: ../Views/update_account.php?error=$error&fname=$fname&lname=$lname&email=$email&username=$username&phone=$phone&address=$address&status=$status&id=$id");
}
?>

