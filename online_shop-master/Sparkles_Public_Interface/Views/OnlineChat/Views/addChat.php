<?php
require_once('../Models/DbConnection.php');
require_once('../Models/Chat.php');
require_once('../Models/ChatDB.php');

if(isset($_POST['name']) && isset($_POST['question'])){
    $name=$_POST['name'];
    $question=$_POST['question'];

    $chat = new Chat($name,$question);
    $startedDate=date("m.d.y");
    $chat->setStartedDate($startedDate);
    $chat->setStaff_Id(1);
    $chatDB=new ChatDB();
    $row =  $chatDB->addChat($chat);
    if($row==1){
        $chatId=$chatDB->getChatId($name,$question);
        if($chatId!=false)
        header("location: startChat.php?chatId=$chatId&question=$question");
    }
else
    header("location: addChat.php");

}
