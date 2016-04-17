

<?php
require_once('../Controller/database.php');

//get the q parameter from URL
$q=$_GET["q"];

$hint="";


$query = "SELECT * FROM products WHERE Product_Title LIKE CONCAT(:searchword,'%');";
$statement = $db->prepare($query);
$statement -> bindValue(':searchword', $q);
$statement->execute();
$words = $statement->fetchAll();
$statement->closeCursor();

foreach($words as $word){
    $hint .= "<span class='matchedwords' style='display:block;'>";
    for($j = 0; $j < strlen($word['Product_Title']); $j++) {

        if($j == 0){
            $hint .= "<span style='color:red; font-weight: bold'>" . $word['Product_Title'][$j] ;
        }

        elseif($j < strlen($q)) {
            $hint .= $word['Product_Title'][$j] ;
        }
        elseif($j == strlen($q)) {
            $hint .= "</span><span style='color:black'>" . $word['Product_Title'][$j] ;
        }
        elseif($j == strlen($word['Product_Title'])-1){
            $hint .= $word['Product_Title'][$j] . "</span><br>";
        }
        else{
            $hint .= $word['Product_Title'][$j] ;
        }
    }
    $hint .= "</span>";
}



// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
    $response= "No Suggestion";
} else {
    $response=$hint;
}


//output the response
echo $response;
?>