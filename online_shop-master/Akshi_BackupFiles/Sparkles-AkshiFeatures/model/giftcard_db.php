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


}
?>