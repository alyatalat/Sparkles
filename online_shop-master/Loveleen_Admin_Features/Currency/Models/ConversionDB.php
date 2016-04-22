<?php
require_once ('Database.php');
class ConversionDB
{
    public static function addConversionRate($conversionValue)
    {
        $db = Database::getDB();
        $today = $conversionValue->getConvertDate();
        $rate = $conversionValue->getConvertUSRate();
        $query = "INSERT INTO price_convert(convert_Date,convert_US_Rate) VALUES ('$today','$rate')";
        $row_count = $db->exec($query);
        return $row_count;
    }

    public static function getConversionRate()
    {
        $db = Database::getDB();
        $today = date("Y-m-d");
        $result = $db->query("SELECT DISTINCT convert_US_Rate FROM price_convert WHERE convert_Date = '$today'");
        $result = $result->fetch();
        return $result["convert_US_Rate"];
    }
}
