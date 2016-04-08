<?php
$today=date("Y-m-d");
$festival=assign_festival($today);

function assign_festival($today)
{
    $date_compared=date("Y-m-d");
    $date_compared=date("2016-02-14");
    if($today<$date_compared)
    {
        $festival = "Valentine";
        return $festival;
    }
    $date_compared2=date("2016-03-27");
    if($today>$date_compared || $today<$date_compared2)
    {
        $festival="Easter";
        return $festival;
    }
    $date_compared3=date("2016-12-25");
    if($today>$date_compared2 || $today<$date_compared3)
    {
        $festival="Christmas";
        return $festival;
    }

}



?>
