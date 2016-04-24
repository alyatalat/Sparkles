<?php
//fetched todays date
$today=date("Y-m-d");
//festival is returned for the upcoming dates
$festival=assign_festival($today);

//the function will take todays date as an input and will display the upcoming festival
function assign_festival($today)
{
    //date compared format
    $date_compared=date("Y-m-d");
    //date compared
    $date_compared=date("2016-02-14");
    //if today is before the above date it will return the festival else move to the next one
    if($today<$date_compared)
    {
        
        $festival = "Valentine";
        return $festival;
    }
    $date_compared2=date("2016-03-27");
    //if today is before the above date it will return the festival else move to the next one
    if($today>$date_compared && $today<$date_compared2)
    {
        
        $festival="Easter";
        return $festival;
    }

    $date_compared3=date("2016-05-08");
    if($today>$date_compared2 && $today<$date_compared3)
    {

        $festival="Mother's Day";
        return $festival;
    }

    $date_compared4=date("2016-06-19");
    if($today>$date_compared3 && $today<$date_compared4)
    {

        $festival="Father's Day";
        return $festival;
    }


    $date_compared5=date("2016-10-10");
    if($today>$date_compared4 && $today<$date_compared5)
    {

        $festival="Thanksgiving";
        return $festival;
    }


    $date_compared6=date("2016-10-31");
    if($today>$date_compared5 && $today<$date_compared6)
    {

        $festival="Halloween";
        return $festival;
    }


    $date_compared7=date("2016-12-25");
    if($today>$date_compared6 && $today<$date_compared7)
    {
        
        $festival="Christmas";
        return $festival;
    }




}



?>
