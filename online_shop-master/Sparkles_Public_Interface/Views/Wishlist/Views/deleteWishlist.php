<?php
require_once ('../Models/Database.php');
require_once('../Models/wishlistsDB.php');
if(isset($_POST["choice"])) {
    $choice = $_POST['choice'];
    $row = wishlistsDB::deleteWishlistById($choice);
if($row == '1') {
    echo "successfully deleted";
}
    else {
        echo "some error occured.Try Again";
    }
}

