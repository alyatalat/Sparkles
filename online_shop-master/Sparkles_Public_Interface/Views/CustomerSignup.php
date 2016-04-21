<!-- Customer Login / Sign up Page
    Author: Alya Talat
-->

<?php
session_start(); // start a session
require_once("../Layout/header.html");
require_once("Customerlogin/Models/customer.php"); // require the classes to be used for login
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

<link rel="stylesheet" href="Customerlogin/Layout/customerlogin.css">

<main class="containter">
    <div class="row content">
        <div class="main-nav">
            <h1>Login or Create an Account</h1>
            <ul id="nav" class="nav nav-tabs">
                <li><a href="CustomerLogin.php">Existing Customer</a></li>
                <li class="active"><a href="CustomerSignup.php">New Customer</a></li>
            </ul>

        </div>
            <div id="error">
                <br/>
                <?php
                if(isset($error))
                {
                    ?>
                    <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="col-md-6 content">
                <h2>Create a new account</h2><br/>
                <form role="form" id="signup" method="post" action="CustomerSignup.php">
                    <div class="">
                        <label for="email">Email address:</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <br/>
                    <div class="">
                        <label for="pwd">Password:</label>
                        <input type="password" name="password" class="form-control" id="pwd" placeholder="Password should be at least 8 characters long">
                    </div>
                    <br/>
                    <div class="">
                        <label for="confirmpwd">Confirm Password:</label>
                        <input type="password" name="confirmpassword" class="form-control" id="confirmpwd">
                    </div>
                    <br/>
                    <button type="submit" name="btn-continue" class="btn btn-default">Continue</button>
                </form>
            </div>
    </div>
</main>
<?php
require_once("../Layout/footer.html");
?>
