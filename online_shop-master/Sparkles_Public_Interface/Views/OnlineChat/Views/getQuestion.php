<?php
require_once('../Models/DbConnection.php');
require_once('../Models/Chat.php');
require_once('../Models/ChatDB.php');

if(isset($_GET['chatId'])){
    $chatId=$_GET['chatId'];

    $chatDB=new ChatDB();
    $row =  $chatDB->getQuestion($chatId);
    $result=json_encode($row);
    header("Content-Type: application/json");
    echo $result;
}
