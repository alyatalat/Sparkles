<?php
header('Content-Type: application/json');

//var_dump($_POST);
$arg=($_POST["arguments"]);
if($arg == "USDCAD")
{
    function changePrice()
    {
        if(isset($_POST['currencies']))
            echo $_POST['currencies'];

        // Initialize CURL:
        $curl = curl_init('http://www.apilayer.net/api/live?access_key=313597109bd55b4c02e422d8a10f7540');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $page = curl_exec($curl);
        $exchange_rates = json_decode($page,true);
        curl_close($curl);
        echo $exchange_rates['quotes']['USDCAD'];
    }
    changePrice();
}
//1. Get Value From $_POST

//2. Valid Values

//3. Call the function and pass the validated value

//@todo : valid

else if($arg == "USDUSD")
{

    function changePrice()
    {

        if(isset($_POST['currencies']))
            echo $_POST['currencies'];

        // Initialize CURL:
        $curl = curl_init('http://www.apilayer.net/api/live?access_key=313597109bd55b4c02e422d8a10f7540');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $page = curl_exec($curl);
        $exchange_rates = json_decode($page,true);
        curl_close($curl);
        echo $exchange_rates['quotes']['USDUSD'];
    }
    changePrice();
}
?>