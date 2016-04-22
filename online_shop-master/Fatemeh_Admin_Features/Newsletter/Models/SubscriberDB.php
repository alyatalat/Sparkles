<?php
require_once('Subscriber.php');
class SubscriberDB {

///////////////getting all the subscribers from database
    public static function getSubscribers() {
        $db = DbConnection::getDB();
        $query = 'SELECT * FROM subscribers';
        $result = $db->query($query);
        $subscribers = array();
        foreach ($result as $row) {
            $subscriber = new Subscriber(
                $row['Email'],
                $row['Active']
            );
            $subscriber->setID($row['Id']);
            $subscribers[] = $subscriber;
        }
        return $subscribers;
    }
/////////////Get active subscribers
    public static function getActiveSubscribers() {
        $db = DbConnection::getDB();
        $query = "SELECT * FROM subscribers WHERE  Active = 1";
        $result = $db->query($query);
        $subscribers = array();
        foreach ($result as $row) {
            $subscriber = new Subscriber($row['Email'],$row['SecurityCode'] );
            $subscriber->setActive( $row['Active']);
            $subscriber->setID($row['Id']);
            $subscribers[] = $subscriber;
        }
        return $subscribers;
    }

/////////////////Unsubscribe a subscriber
    public static function unsubscribe($id,$code){
        $db = DbConnection::getDB();
        $query = "UPDATE subscribers SET
                  Active=0
             WHERE
                 Id = $id AND SecurityCode='$code'";

        $row_count = $db->exec($query);
        return $row_count;
    }
//Insert a subscriber into database
    public static function addSubscriber($subscriber) {
        $db = DbConnection::getDB();

        $email = $subscriber->getEmail();
        $active = $subscriber->getActive();
        $code=$subscriber->getCode();
        $query =
            "INSERT INTO subscribers
                 (Email, Active, SecurityCode)
             VALUES
                 ('$email', '$active','$code')";

        $row_count = $db->exec($query);
        return $row_count;
    }
/////////////////////Search for a subscriber by email address
    public static function findSubscriberByEmail($email) {
        $db = DbConnection::getDB();
        $query = "SELECT * FROM subscribers WHERE Email = '$email'";
        $result = $db->query($query);
        //convert result into array
        $row = $result->fetch();

       if(isset($row['Id'])){
           return $row;
       }
        else
           return false;
   }
//////////////////////Activate a subscriber
    public static function ActivateSubscriber($email) {
        $db = DbConnection::getDB();
        $query = "UPDATE subscribers SET
                  Active=1
             WHERE
                  Email = '$email'";

        $row_count = $db->exec($query);
        return $row_count;
    }
}
/*require_once('DbConnection.php');
require_once('Subscriber.php');
$subs=SubscriberDB::getActiveSubscribers();
foreach($subs as $sub){
    echo $sub->getID();
}*/
