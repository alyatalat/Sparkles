<!-- Customer Home Page After Login
    Author: Alya Talat
-->
<?php
session_start();
require_once("Models/customer.php");
$auth_user = new customer();
if(!$auth_user->is_loggedin())
{
    $URL="../CustomerLogin.php";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}
require_once("Layout/header.html");
$user_id = $_SESSION['user_session'];
$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>


<main>


    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Your Account</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="../HomeIndex.php">Back to Shopping</a></li>
                    <li><a href="../Wishlist.php">My WishList</a></li>
                    <li><a href="#">My Orders</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-user"></span>&nbsp;Hello <?php echo $userRow['user_email']; ?>&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>
                            <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<div class="clearfix"></div>
<div class="container-fluid" style="margin-top:80px;">
    <div class="container">
        <label class="h5">welcome : <?php echo($userRow['user_email']); ?></label>
        <hr />
        <h1>
            <a href="customerHome.php"><span class="glyphicon glyphicon-home"></span> Your Account</a> &nbsp;
        <hr />
        <p class="h4">User Home Page</p>
        <p class="blockquote-reverse" style="margin-top:200px;"></p>
    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</main>
<?php
require_once("Layout/footer.html");
?>