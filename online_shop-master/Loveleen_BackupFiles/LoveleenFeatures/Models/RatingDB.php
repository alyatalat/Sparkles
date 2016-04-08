<?php
class RatingDB
{
    public function getProduct($productId)
    {
        $db = Database::getDB();
        $query = "SELECT Product_Id,Product_Title,Category,Average_Rating,Product_Description,Image FROM products WHERE product_Id = '$productId'";
        $result = $db->query($query);
        $row = $result->fetch();
        $product = new Products(
            $row['Product_Title'],
            $row['Average_Rating'],
            $row['Product_Description'],
            $row['Image']
        );
        $product->setId($row['Product_Id']);
        return $product;
    }
    public static function addRating($productRating)
    {
        $db = Database::getDB();
        $product_id = $productRating->getProductId();
        $rate = $productRating->getRating();
        $customer = $productRating->getCustomerId();
        $query = "INSERT INTO products_ratings(Product_Id,Newsletter,Customer_Id)
                 VALUES('$product_id',$rate,$customer)";
        $row_count = $db->exec($query);
        return $row_count;
    }
    public function getRecords($prod_id,$cust_id)
    {
        $db = database::getDB();
        $sql = "SELECT COUNT(*) FROM products_ratings WHERE Product_Id = '$prod_id' AND Customer_Id = '$cust_id'";
        $res = $db->query($sql);
        $records = $res->fetchColumn() ;
        return $records;
    }
    public static function getAverage($id)
    {
        $db = database::getDB();
        $query = "SELECT Product_Id,AVG(Newsletter) AS rate FROM products_ratings where Product_Id = '$id'";
        $result = $db->query($query);
        $rate = $result->fetch();
        return $rate;
    }
    public static function getcount($Id)
    {
        $db = database::getDB();
        $prod_Id = $Id;
        $query = "SELECT COUNT(*) FROM products_ratings WHERE Product_Id = '$prod_Id' AND Newsletter IS NOT NULL ";
        $res = $db->query($query);
        $records = $res->fetchColumn() ;
        return $records;
    }
}
?>

