<?php

class ChatDB {
///////////////getting all chats from database
    public static function getChats() {
        $db = DbConnection::getDB();
        $query = 'SELECT * FROM chats';
        $result = $db->query($query);
        $chats = array();
        foreach ($result as $row) {
            $chat = new Chat(
                $row['Name'],
                $row['Question']
            );
            $chat->setID($row['ChatId']);
            $chat->setStaff_Id($row['Staff_Id']);
            $chat->setStartedDate($row['StartedDate']);
            $chat->setFinishedDate($row['FinishedDate']);
            $chats[] = $chat;
        }
        return $chats;
    }
    ///////////////////////Delete a chat
    public static function deleteChat($chat_id) {
        $db = DbConnection::getDB();
        $id=$chat_id;
        $query = "DELETE FROM chats
                  WHERE  ChatId = $id";
        $row_count = $db->exec($query);
        return $row_count;
    }
    /////////////////////////Insert a chat
    public static function addChat($chat) {
        $db = DbConnection::getDB();
        $staffId=$chat->getStaff_Id();
        $name=$chat->getName();
        $question=$chat->getQuestion();
        $startedDate=$chat->getStartedDate();
        $query =
            "INSERT INTO chats
                 (Staff_Id, Name, Question , StartedDate)
             VALUES
                 ($staffId, '$name' ,'$question','$startedDate')";

        $row_count = $db->exec($query);
        return $row_count;
    }
    /////////////////////Update question
    public static function editChat($chatId,$question) {
        $db = DbConnection::getDB();
        $query = "UPDATE chats SET
                  Question='$question'
             WHERE
                  ChatId = $chatId";

        $row_count = $db->exec($query);
        return $row_count;
    }
    /////////////////////Get chat Id
    public static function getChatId($name,$question) {
        $db = DbConnection::getDB();
        $query = "SELECT ChatId FROM chats WHERE Name = '$name' AND Question ='$question' AND FinishedDate IS NULL";
        $result = $db->query($query);
        //convert result into array
        $row = $result->fetch();

        if(isset($row['ChatId'])){
            return $row['ChatId'];
        }
        else
            return false;
    }
    /////////////////////Get question
    public static function getQuestion($chatId) {
        $db = DbConnection::getDB();
        $query = "SELECT Question FROM chats WHERE ChatId = $chatId";
        $result = $db->query($query);
        //convert result into array
        $row = $result->fetch();

        if(isset($row['Question'])){
            return $row['Question'];
        }
        else
            return false;
    }
}
