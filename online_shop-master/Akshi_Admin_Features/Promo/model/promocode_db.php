<?php
class PromoCodeDB {

    public static function getPromoCode() {
        $db = Database::getDB();
        $query = 'SELECT * FROM promo_code';

        $result = $db->query($query);
        return $result;

    }

    public static function addPromoCode($code, $exp_date, $amount){
        //query to insert in the gift cards table
        $db = Database::getDB();
        $query = "INSERT INTO promo_code
                 (Code, Exp_Date, Amount, Percentage)
              VALUES
                 ('$code', '$exp_date', '$amount' ,'')";
        var_dump($query);
        $db->exec($query);

    }

    public static function updatePromoCode($id,$code, $exp_date, $amount){

        $db = Database::getDB();
        $query = "UPDATE promo_code
                SET Code ='$code',
                Exp_Date = '$exp_date',
                Amount ='$amount'
                WHERE Promocode_id='$id'";

        $db->exec($query);
    }

    public static  function deletePromoCode($code_id)
    {
        $db = Database::getDB();
        $query = "DELETE FROM promo_code
          WHERE Promocode_id = '$code_id'";
        $db->exec($query);
    }

    public static function getMessagePromoCode($code)
    {
        
        if(isset($code))
        {
            $db = Database::getDB();
            $query = "select * from promo_code where Code = '" . $code."'";
            $result = $db->query($query);
            $code_q = $result->fetchAll();

            if($code_q!=[]){
                foreach ($code_q as $row)
                {
                    if ($row['Amount'])
                    {
                        $discount_amt = $row['Amount'];
                    }
                    else{
                        $discount_per = $row['Percentage'];
                    }

                    if ($row['Code'] == $code){
                        if(isset($discount_amt)){
                            $discount = $discount_amt. " Amount";
                        }
                        else if (isset($discount_per))
                        {
                            $discount= $discount_per . " Percent";
                        }
                        $error= "<strong>".$code.  "</strong> Promo code has been applied. You get a discount of ". $discount;
                    }

                }
            }
            else{

                $error= $code . " is not a valid promo code";
                $discount =0;
            }
            return $error;
        }

    }



    public static function getDiscountPromoCode($code)
    {

        if(isset($code))
        {
            $db = Database::getDB();
            $query = "select * from promo_code where Code = '" . $code."'";
            $result = $db->query($query);
            $code_q = $result->fetchAll();
$discount=0;
            if($code_q!=[]){
                foreach ($code_q as $row)
                {
                    if ($row['Amount'])
                    {
                        $discount_amt = $row['Amount'];
                    }
                    else{
                        $discount_per = $row['Percentage'];
                    }

                    if ($row['Code'] == $code){
                        if(isset($discount_amt)){
                            $discount = $discount_amt. " Amount";
                        }
                        else if (isset($discount_per))
                        {
                            $discount= $discount_per . " Percent";
                        }
                        $error= "<strong>".$code.  "</strong> Promo code has been applied. You get a discount of ". $discount;
                    }

                }
            }
            else{

                $error= $code . " is not a valid promo code";

            }
            return $discount;
        }

    }

}
?>