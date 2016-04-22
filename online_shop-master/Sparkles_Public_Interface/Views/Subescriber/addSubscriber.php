<?php
require_once('../../Models/DbConnection.php');
require_once('../../Models/Subscriber.php');
require_once('../../Models/SubscriberDB.php');

//////This function generates a unique string code of any length you want
function randStrGen($len){
    $result = "";
    $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
    $charArray = str_split($chars);
    for($i = 0; $i < $len; $i++){
        $randItem = array_rand($charArray);
        $result .= "".$charArray[$randItem];
    }
    return $result;
}

if(isset($_GET['email'])){

    $email=$_GET['email'];
    $subscriber=new Subscriber($email);
    $subscriber->setCode(randStrGen(20));

    $row= SubscriberDB::addSubscriber($subscriber);
    if($row==1)
    {
        $message="You have successfully subscribed to our newsletter.";
    }
    else
    {
        $message="An error has occured.Please try again.";
    }
    $result=json_encode($message);
    header("Content-Type: application/json");
    echo $result;
}
