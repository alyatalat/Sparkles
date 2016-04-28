<?php

class DBObject
{


    public function getCategories($catid)
    {
        $db = Database::getDB();
        // Get name for all the categories
        $query = "SELECT * FROM image_slider WHERE image_category = :category ORDER BY image_order ASC";
        $statement = $db -> prepare($query);
        $statement -> bindValue(':category', $catid);
        $statement->execute();
        $categories = $statement->fetchAll();
        return $categories;
    }


    public function updateImage($order, $imageid)
    {
        $db = Database::getDB();
        $query = "UPDATE image_slider SET image_order = :order WHERE image_id = :imageid";
        $statement = $db->prepare($query);
        $statement -> bindValue(':order', $order);
        $statement -> bindValue(':imageid', $imageid);
        $statement -> execute();
    }

    public function addImage($f, $order, $cat)
    {
        $db = Database::getDB();
            $query = "INSERT INTO image_slider
                            (image_file, image_order, image_category)
                            VALUES
                            (:name, :order, :category)";
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $f);
        $statement->bindValue(':order', $order);
        $statement->bindValue(':category', $cat);
        $statement->execute();

    }
    public function deleteImage($iid)
    {
        $db = Database::getDB();
        $query = 'DELETE FROM image_slider WHERE image_id = :questionid';
        $statement = $db -> prepare($query);
        $statement -> bindValue(':questionid', $iid);
        $sucess = $statement -> execute();
        return $sucess;
    }


    public function getImages()
    {
        $db = Database::getDB();
        $query = "SELECT * FROM image_slider ORDER BY image_category ASC, image_order ASC";
        $statement = $db->query($query);
        $statement->execute();
        $categories = $statement->fetchAll();
        return $categories;
    }


    public function getImage($iid)
    {
        $db = Database::getDB();
        $query = "SELECT * FROM image_slider WHERE image_id = :categoryid";
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryid', $iid);
        $statement->execute();
        $category = $statement->fetch();
        return $category;

    }

}


?>