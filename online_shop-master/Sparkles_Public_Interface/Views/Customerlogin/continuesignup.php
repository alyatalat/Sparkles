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

?>

<link rel="stylesheet" href="Layout/customerlogin.css">

<main class="containter">
    <div class="row content">
 Thank you for Signing up.
    </div>
</main>
<?php
require_once("Layout/footer.html");
?>
