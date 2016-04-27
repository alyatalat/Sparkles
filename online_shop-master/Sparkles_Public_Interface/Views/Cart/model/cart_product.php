<?php

function get_product($product_id) {
    $db = Database::getDB();
    $query = "SELECT * FROM products WHERE Product_Id = $product_id";
    try
    {
        $statement = $db->query($query);
        $statement->execute();
        $result = $statement->fetch();
        return $result;
    }
    catch (PDOException $e)
    {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}


function get_userdetails($user_id)
{
    $db = Database::getDB();
    $query = "SELECT * FROM customer WHERE Customer_Id = $user_id";
    try
    {
        $statement = $db->query($query);
        $statement->execute();
        $result = $statement->fetch();
        return $result;
    }
    catch (PDOException $e)
    {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}