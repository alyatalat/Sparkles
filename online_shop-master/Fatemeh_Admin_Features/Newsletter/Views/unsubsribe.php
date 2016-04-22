<?php
require_once('../Models/DbConnection.php');
require_once('../Models/Subscriber.php');
require_once('../Models/SubscriberDB.php');

var_dump($_POST);
if(isset($_POST['unsubscribe'])){
    $id=$_POST['id'];
    $securityCode=$_POST['code'];
    $subDB=new SubscriberDB();
    $row=$subDB->unsubscribe($id,$securityCode);
    if($row==1)
    {
        echo "You have successfully unsubscribed.";
    }
    else
    {
        echo "An error has occured.Please try again.";
    }
}
