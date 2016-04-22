<?php
require_once('../../Models/DbConnection.php');
require_once('../../Models/Newsletter.php');
require_once('../../Models/NewsletterDB.php');
require_once('../../Models/Subscriber.php');
require_once('../../Models/SubscriberDB.php');
require_once('gmail.php');


if(isset($_POST['send'])){
    $newsId=$_POST['newsId'];
    $news=NewsletterDB::getNewsletter($newsId);

    $title=$news->getTitle();
    $body=$news->getBody();
    $date=$news->getDateReleased();

    $newsletter="<!doctype html><html><head><title>Sparkles Newsletter</title></head><body><h2>".$title."</h2><h4>Date Realeased: ".$date."</h4><div>".$body;
    $subs=SubscriberDB::getActiveSubscribers();
    foreach($subs as $sub){
        $id=$sub->getID();
        $securityCode=$sub->getCode();
        $email=$sub->getEmail();

        $unsubscribe="<form action='http://localhost/PHP/Newsletter%20feature/Views/Subescriber/unsubsribe.php' method='post'>
<input type='hidden' name='id' value='$id' />
<input type='hidden' name='code' value='$securityCode'/><input type='submit' name='unsubscribe' value='Click for Unsubscribing' /></form>";

        $newsletter="</div>".$unsubscribe."</body></html>";
       echo  sendenailgmail($email,$newsletter);
    }

}
