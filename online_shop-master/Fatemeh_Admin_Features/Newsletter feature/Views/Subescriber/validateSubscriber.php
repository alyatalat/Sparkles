<?php
require_once('../../Validation/validation.php');

$valid=new validation();
$error="";
    if(isset($_GET['email'])){
        $email=$_GET['email'];

        if($valid->isEmpty($email))
            $error.=$valid->getError();
        else if (!($valid->valid_email($email)))
            $error.=$valid->getError();
    }
$result=json_encode($error);
header("Content-Type: application/json");
echo $result;