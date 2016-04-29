<?php
require_once('../Models/DbConnection.php');
require_once('../Models/Chat.php');
require_once('../Models/ChatDB.php');

if(isset($_GET['chatId'])){
    $chatId=$_GET['chatId'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Live Chat</title>
</head>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
$(document).ready(function(){
    var chatId=$('#chatId').val();
    $.getJSON('getQuestion.php',{chatId : chatId}, function (data) {
        $('#conversation').html(data);
    });
    $('#sessionChat').submit(function(event){
        event.preventDefault();
        var response=$('#response').val();
        $.getJSON('getQuestion.php',{chatId : chatId}, function (data) {
                var conversation=data+response;
                 $('#conversation').html(conversation);
            $.getJSON('updateChat.php',{chatId : chatId,conversation:conversation}, function (data) {
                                    if(data==1){
                                        $.getJSON('getQuestion.php',{chatId : chatId}, function (data) {
                                            $('#conversation').html(data);
                                        });
                                        }
            });
         });
    });
});
</script>
<body>
<form action="" method="post" id="sessionChat">
    <textarea id="conversation" name="conversation"></textarea><br/>
    <textarea id="response" name="response"></textarea><br/>
    <input type="submit" id="Send" name="Send" value="Send"/>
    <input type="hidden" id="chatId" value="<?php echo $chatId; ?>"/>
    <span id="message"></span>
</form>
</body>
</html>