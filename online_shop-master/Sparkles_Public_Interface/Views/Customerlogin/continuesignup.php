<!-- Customer Login / Sign up Page
    Author: Alya Talat
-->

<?php
session_start(); // start a session
require_once("Layout/header.html");
require_once("Models/customer.php"); // require the classes to be used for login
$newuser = new customer(); // create an instance of customer class before we can use it
/*if($login->is_loggedin()!="")
{
    $URL="Customerlogin/customerHome.php";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}*/

if(isset($_POST['btn-continue']))
{
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);

    if($email=="")	{
        $error = "Please enter an email address";
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))	{
        $error = 'Please enter a valid email address';
    }
    else if($password=="")	{
        $error = "Please enter a password";
    }
    else if(strlen($password) < 8){
        $error = "Password must be at least 8 characters";
    }
    else
    {
        try
        {

            $stmt = $newuser->runQuery("SELECT user_email FROM users WHERE user_email=:email");
            $stmt->execute(array(":email"=>$email));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            if($row['user_email']==$email) {
                $error = "Email already registered";
            }
            else
            {
                if($newuser->register($email,$password)){
                    $URL="Customerlogin/continuesignup.php";
                    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}

?>

<link rel="stylesheet" href="Layout/customerlogin.css">

<main class="containter">
    <div class="row content">
 Thank you
    </div>
</main>
<?php
require_once("Layout/footer.html");
?>
