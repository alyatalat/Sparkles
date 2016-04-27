<?php
class GiftCardDB {
    public static function getGiftCards() {
        $db = Database::getDB();
        $query = 'SELECT * FROM gift_cards
                  ORDER BY Gift_Id';
        $result = $db->query($query);
        //return $result;
        $giftcards = array();
        foreach ($result as $row) {
            $giftcard = new GiftCard($row['Gift_Id'], $row['Title'], $row['Description'], $row['Image_src']);
            //return $giftcard;
            $giftcards[] = $giftcard;
        }
        return $giftcards;
    }

    public static function getGifts() {
        $db = Database::getDB();
        $query = 'SELECT * FROM gift_cards
                  ORDER BY Gift_Id';
        $result = $db->query($query);
        return $result;

    }

    public static function getGiftId($id){
        $db=Database::getDB();
        $query='select Image_src from gift_cards where Gift_Id='.$id;
        $result = $db->query($query);
        $result_back=$result->fetch();
        return $result_back;
    }

    public static function addGiftCard($title, $description, $img_src){
        //query to insert in the gift cards table
        $db = Database::getDB();
        $query = "INSERT INTO gift_cards
                 (Title, Description, Image_src)
              VALUES
                 ('$title', '$description', '$img_src')";
        $db->exec($query);

    }

    public static function updateGiftCard($id,$title, $description, $img_src){

        $db = Database::getDB();
        $query = "UPDATE gift_cards
                SET title ='$title',
                description = '$description',
                image_src ='$img_src'
                WHERE Gift_Id='$id'";

        $db->exec($query);
    }

public static  function deleteGiftCard($gift_id)
{
    $db = Database::getDB();
    $query = "DELETE FROM gift_cards
          WHERE Gift_Id = '$gift_id'";
    $db->exec($query);
}
}
?>