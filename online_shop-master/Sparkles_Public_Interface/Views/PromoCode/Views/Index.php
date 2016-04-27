<?php
//require ("../model/database.php");
//require ("../model/promocode_db.php");
//$db = Database::getDB();


if (isset($_POST['apply']))
{

    if(empty($_POST['promocode']))
    {
        $error = "Please enter a promo code";
    }
    else
    {
        $code = $_POST['promocode'];
        $error = PromoCodeDB::getMessagePromoCode($code);
        $discount_rate = PromoCodeDB::getDiscountPromoCode($code);
    }
}

?>


<form method="post" action="">
<h2>Promo Code :</h2><br/><br/>
<input type="text" name="promocode"><br/><br/>
<input type="submit" name="apply" value="Apply">
<br/>
    <?php

    if(isset($error)) {

        echo $error;
    }?>
</form>

