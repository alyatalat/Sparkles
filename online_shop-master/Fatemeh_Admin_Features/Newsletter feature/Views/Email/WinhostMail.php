<html>
<head><title>Test email via php</title></head>
<body>
<?php
require_once "WinhostMail.php";
$from = "Sender <sparkles@fatemehabdizadeh.com>";
$recipients="<abdizadeh.fatemeh@gmail.com>,<fatemeh.abdizadeh@yahoo.com>";
$to = "Recipient ".$recipients;
$subject = "This is a test email sent via php";
$body = "This is a test email";
$host = "mail.fatemehabdizadeh.com";
$username = "sparkles@fatemehabdizadeh.com";
$password = "f@temeh1930";
$headers = array ('From' => $from,
    'To' => $to,
    'Subject' => $subject);
$smtp = Mail::factory('smtp',
    array ('host' => $host,
        'auth' => true,
        'username' => $username,
        'password' => $password));
$mail = $smtp->send($to, $headers, $body);
echo "Result: " .$mail;
?>
</body>
</html> 