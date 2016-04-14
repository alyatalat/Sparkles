<!-- Customer Login / Sign up Page
    Author: Alya Talat
-->

<?php
session_start(); // start a session
require_once("../Layout/header.html");
require_once("Customerlogin/Models/customer.php"); // require the classes to be used for login
$login = new customer(); // create an instance of customer class before we can use it
if($login->is_loggedin()!="")
{
    $URL="Customerlogin/customerHome.php";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
} // if customer is logged in then go to customer home page
// When customer clicks login button, get the information from the form
if(isset($_POST['btn-login']))
{
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);

    // if login successful
    if($login->doLogin($email,$password)){
        $URL="Customerlogin/customerHome.php";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
    // otherwise show error message
    else
    {
        $error = "Username and Password are incorrect or do not match";
    }
}
?>
<link rel="stylesheet" href="Customerlogin/Stylesheets/customerlogin.css">
<main class="containter">
<div class="row">
    <div class="col-md-6 content">
        <h2>Login to your account</h2>
        <h5>Existing Sparkles Customer</h5>
        <hr/>
        <form role="form" id="login" method="post" >
            <div class="">
                <label for="email">Email address:</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <br/>
            <div class="">
                <label for="pwd">Password:</label>
                <input type="password" name="password" class="form-control" id="pwd">
            </div>
            <br/>
            <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
            </div>
            <br/>
            <button type="submit" name="btn-login" class="btn btn-default">Login</button>
        </form>
        <div id="error">
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
    </div>
    <div class="col-md-6 content">
        <h2>Create a new account</h2>
        <h5>New Sparkles Customer</h5>
        <hr/>
        <form role="form" id="signup" method="post" action="signup.php">
            <div class="">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email">
            </div>
            <br/>
            <div class="">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd">
            </div>
            <br/>
            <div class="">
                <label for="confirmpwd">Confirm Password:</label>
                <input type="password" class="form-control" id="confirmpwd">
            </div>
            <br/>
            <button type="submit" name="btn-login" class="btn btn-default">Sign Up</button>
        </form>
    </div>
</div>
</main>
<?php
require_once("../Layout/footer.html");
?>
