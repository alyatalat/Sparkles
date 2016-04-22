<?php
require_once ('Wishlist/Models/Database.php');
class Currency{
    public static function getConversionRate()
    {
        $db = Database::getDB();
        $today = date("Y-m-d");
        $result = $db->query("SELECT DISTINCT convert_US_Rate FROM price_convert WHERE convert_Date = '$today'");
        $result = $result->fetch();
        echo $result["convert_US_Rate"];
    }
}
Currency::getConversionRate();