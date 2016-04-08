<?php
require_once ('../../Loveleen Admin Features/Database.php');
require_once ('../Models/Products.php');
require_once ('../Models/RatingDB.php');
require_once ('../Models/Ratings.php');
require_once ('addRating.php');
if(isset($_POST["choice"])) {
    $choice = preg_replace('#[^0-9]#i', '', $_POST['choice']);
    if ($choice > 5) {
        echo "greater than 5 error";
        exit();
    } else if ($choice < 1) {
        echo "less than one error";
        exit();
    } else {
       $product = 1;
        $cust = 11;
        $rating = $_POST['choice'];
        $record = RatingDB::getRecords($product,$cust);
        if($record>0)
        {
            echo "Sorry, You can not rate this product. You have already rated this product :(";
            exit();
        }
        else
        {
            $Rating = new Ratings($product,$rating,$cust);
            $row_count = RatingDB::addRating($Rating);
            if($row_count==1)
                echo "Thank you! You have given this article the rating of $choice";
            else
                echo "Sorry, Some Error occurred :(";
            exit();
        }

    }
}

?>