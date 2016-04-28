<?php

require('../Controller/database.php');
require_once ('../Models/DBObject.php');

$db = Database::getDB();

$tempo = new DBObject();

$imageid = $_GET['image_id'];
$order = $_POST['sort_order'];
$categoryname = $_GET['category'];
$originalorder = $_POST['orig_order'];



$tempo->updateImage($order, $imageid);


$categories = $tempo->getCategories($categoryname);



if($originalorder != $order) {

    if($originalorder > $order){
        foreach($categories as $category){

            if($category['image_id'] != $imageid && $category['image_order'] < $originalorder && $category['image_order'] >= $order ) {

                $query = "UPDATE image_slider SET image_order = :order WHERE image_id = :imageid";
                $statement = $db->prepare($query);
                $statement->bindValue(':order', ($category['image_order'] + 1));
                $statement->bindValue(':imageid', $category['image_id']);
                $statement->execute();
                $statement->closeCursor();
            }
        }

    }
    else{
        foreach($categories as $category){

            if($category['image_id'] != $imageid && $category['image_order'] > $originalorder && $category['image_order'] <= $order ) {

                $query = "UPDATE image_slider SET image_order = :order WHERE image_id = :imageid";
                $statement = $db->prepare($query);
                $statement->bindValue(':order', ($category['image_order'] - 1));
                $statement->bindValue(':imageid', $category['image_id']);
                $statement->execute();
                $statement->closeCursor();
            }
        }
    }


}

?>

<script><?php echo("location.href = 'image_list.php?category=" . $categoryname . "';");?></script>
