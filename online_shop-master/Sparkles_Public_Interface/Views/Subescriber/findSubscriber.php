<?php
require_once('../../Models/DbConnection.php');
require_once('../../Models/Subscriber.php');
require_once('../../Models/SubscriberDB.php');

if(isset($_GET['email'])){
    $email=$_GET['email'];
    $subscriber = new SubscriberDB();

    $find = $subscriber->findSubscriberByEmail($email);
    $result=json_encode($find);
    header("Content-Type: application/json");
    echo $result;
}

