<?php

class DealDB {
////Getting all the products from database
    public static function getProducts() {
        $db = DbConnection::getDB();
        $query = 'SELECT * FROM products';
        $result = $db->query($query);
        $products = array();
        foreach ($result as $row) {
            $product = new Product();
            $product->setID($row['Product_Id']);
            $product->setImage($row['Image']);
            $product->setTitle($row['Product_Title']);
            $product->setCategory($row['Category']);
            $product->setProduct_Description($row['Product_Description']);
            $product->setQuantity($row['Quantity']);
            $product->setPrice($row['Price']);
            $product->setDeal($row['Deal']);
            $product->setDiscountAmount($row['DiscountAmount']);
            $product->setDealDate($row['DealDate']);
            $products[] = $product;
        }
        return $products;
    }
////////////////Make a deal for a product
    public static function editDeal($deal) {
        $db = DbConnection::getDB();

        $id = $deal->getID();
        $amount = $deal->getDiscountAmount();
        $date=$deal->getDealDate();
        $query =
            "UPDATE products SET
                  Deal=1, DiscountAmount=$amount,DealDate='$date'
             WHERE
                   Product_Id = $id";
        $row_count = $db->exec($query);
        return $row_count;
    }
//////////////////Get Today's Deals
    public static function getAllDeals() {
        $db = DbConnection::getDB();
        $todayDate=date('Y-m-d');
        $query = "SELECT * FROM products WHERE DealDate='$todayDate'";
        $result = $db->query($query);
        return $result->fetchAll();
    }
//////////////////Get Deals for a category
    public static function getCatDeals($category) {
        $db = DbConnection::getDB();
        $todayDate=date('Y-m-d');
        $query = "SELECT * FROM products WHERE DealDate='$todayDate' AND Category='$category'";
        $result = $db->query($query);
        return $result->fetchAll();
    }
}
/*require_once('/DbConnetcion.php');
require_once('/DealProduct.php');
$products=DealDB::getAllDeals();
var_dump($products);*/