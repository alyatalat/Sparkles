<?php
ini_set("SMTP","mail.fatemehabdizadeh.com");
//ini_set("SMTP","localhost");
//ini_set("smtp_port", "25");
ini_set("sendmail_from","postmaster@fatemehabdizadeh.com");


$to ="abdizadeh.fatemeh@gmail.com";
$from = "sparkles@fatemehabdizadeh.com";
$subject ="this bb@bb.comis test mail";
$message = "<a href=''>this is the message</a>";
$message = wordwrap($message, 70, '\r\n');
$headers = "Content-type: text/html;charset-iso-8859-1\r\nFrom:$from\r\nCc:dd@email.com\r\n";


$send = mail($to,$subject,$message,$headers);
echo $send;
?>

