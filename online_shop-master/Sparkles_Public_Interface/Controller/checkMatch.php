<?php

    $searchWord =  $_POST['search'];

    require_once('database.php');

    $query = "SELECT * FROM products WHERE Product_Title = :searchWord ;";
    $statement = $db->prepare($query);
    $statement -> bindValue(':searchWord', $searchWord);
    $statement->execute();
    $words = $statement->fetch();
    $statement->closeCursor();



    if(count($words) == 0){
        header('Location: ../Views/SearchError.php?word=' . $searchWord);
    }

    else{
        header('Location: ../Views/' . $words['Category'] . '.php?word=' . $searchWord);
    }


?>