<?php
session_start();

require_once('Models/customer.php');
$session = new customer();

// if user session is not active(not loggedin) this page will help 'home.php and profile.php' to redirect to login page
// put this file within secured pages that users (users can't access without login)

if(!$session->is_loggedin())
{
    // session no set redirects to login page
    $URL="../HomeIndex.php";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}

$user_logout = new customer();

if($user_logout->is_loggedin()!="")
{
    $URL="customerHome.php";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}
if(isset($_GET['logout']) && $_GET['logout']=="true")
{
    $user_logout->doLogout();
    $URL="../HomeIndex.php";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}

?>