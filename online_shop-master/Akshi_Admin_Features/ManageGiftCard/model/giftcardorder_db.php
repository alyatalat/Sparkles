<?php
class GiftCardOrderDB {
    public static function getGiftOrders() {
        $db = Database::getDB();
        $query = 'SELECT * FROM giftcard_sent';
        $result = $db->query($query);

        return $result;
    }

    public static function getGiftOrd() {
        $db = Database::getDB();
        $query = 'SELECT * FROM gift_cards
                  ORDER BY Gift_Id';
        $result = $db->query($query);
        return $result;

    }

    public static function addGiftCardOrder($cust_id, $gift_id, $sent_to, $amt, $msg, $mode){
        //query to insert in the gift orders table
        $db = Database::getDB();
        $query = " INSERT INTO giftcard_sent (Customer_Id, Gift_Id, SentTo_Email, Amount, Message, Payment_Mode)
                  VALUES
                  ('$cust_id', '$gift_id', '$sent_to', '$amt', '$msg', '$mode')";
        var_dump($query);
        $db->exec($query);


    }

    public static function updateGiftOrder($id,$cust_id, $gift_id, $sent_to, $amt, $msg, $mode){

        $db = Database::getDB();
        $query = "UPDATE giftcard_sent
SET
Customer_Id = '$cust_id',
Gift_Id = '$gift_id',
SentTo_Email = '$sent_to',
Amount = $amt,
Message = '$msg',
Payment_Mode = '$mode'
WHERE GiftSent_Id = $id;
";
var_dump($query);
        $db->exec($query);
    }

public static  function deleteGiftOrder($gift_id)
{
    $db = Database::getDB();
    $query = "DELETE FROM giftcard_sent
          WHERE GiftSent_Id = '$gift_id'";
    $db->exec($query);
}
}
?>