<?php
require_once('../Models/DbConnection.php');
require_once('../Models/Chat.php');
require_once('../Models/ChatDB.php');

if(isset($_GET['chatId'])&& isset($_GET['conversation'])){
    $chatId=$_GET['chatId'];
    $conversation=$_GET['conversation'];
    $chatDB=new ChatDB();

    $row =  $chatDB->editChat($chatId,$conversation);
    $result=json_encode($row);
    header("Content-Type: application/json");
    echo $result;
}

