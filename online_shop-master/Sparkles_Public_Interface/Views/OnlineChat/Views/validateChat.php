<?php
require_once('../Validation/validation.php');

$valid=new validation();
$error="";
    if(isset($_GET['name'])&& isset($_GET['question'])){
        $name=$_GET['name'];
        $question=$_GET['question'];
        if($valid->isEmpty($name))
            $error.=$valid->getError();
        else if ($valid->isEmpty($question))
            $error.=$valid->getError();
    }
$result=json_encode($error);
header("Content-Type: application/json");
echo $result;