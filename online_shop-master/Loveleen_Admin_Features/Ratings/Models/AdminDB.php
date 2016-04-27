<?php
class AdminDB
{
    public function getRatings($pId)
    {
        $db = Database::getDB();
        $productId = $pId;
        $query = "SELECT products.Product_Id, products.Product_title, products_ratings.Rating,
                  products_ratings.Customer_Id
                  from products Join products_ratings
                  ON products.Product_Id = products_ratings.Product_Id
                   WHERE products.product_Id = '$productId'";
        $result = $db->query($query);
        $result = $result->fetchAll();
        return $result;


    }
    public function DeleteRating($prid,$cuid)
    {
        $pid = $prid;
        $cid= $cuid;
        $db = Database::getDB();
        $query = "DELETE from products_ratings WHERE Product_Id = '$pid' AND Customer_Id = '$cid'";
        $row_count = $db->exec($query);
        return $row_count;
    }
}