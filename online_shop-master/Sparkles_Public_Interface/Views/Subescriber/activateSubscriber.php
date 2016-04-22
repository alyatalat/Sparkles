<?php
require_once('../../Models/DbConnection.php');
require_once('../../Models/Subscriber.php');
require_once('../../Models/SubscriberDB.php');

if(isset($_GET['email'])){

    $email=$_GET['email'];

    $row= SubscriberDB::ActivateSubscriber($email);
    if($row==1)
    {
        $message="You have successfully subscribed to our newsletter again.";
    }
    else
    {
        $message="An error has occured.Please try again.";
    }
    $result=json_encode($message);
    header("Content-Type: application/json");
    echo $result;
}