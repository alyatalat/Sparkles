<?php
session_start();

require_once('Models/customer.php');
$session = new customer();

if(!$session->is_loggedin())
{

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