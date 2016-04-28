<?php
class MessageDB {
	//use category and product class
	//four static method
    public static function getMessages() {
        $db = Database::getDB();
        $query = 'SELECT * FROM gift_message INNER JOIN gift_card ON gift_message.Card_Id = gift_card.GiftCard_Id';
        $result = $db->query($query);
        $products = array();
        foreach ($result as $row)
        {
            $category = new Category($row['categoryID'],
                                     $row['categoryName']);
            $product = new Product($category,
                                   $row['productCode'],
                                   $row['productName'],
                                   $row['listPrice']);
            $product->setId($row['productID']);
            $products[] = $product;
        }
        return $products;
    }

    //get categoryid
    //uses categorydb method getcategory
    public static function getProductsByCategory($category_id) {
        $db = Database::getDB();

        $category = CategoryDB::getCategory($category_id);
	//select product in category
        $query = "SELECT * FROM products
                  WHERE categoryID = '$category_id'
                  ORDER BY productID";
        $result = $db->query($query);
        //create product array
        $products = array();
        //for each row in the result, create product object
        foreach ($result as $row) {
            $product = new Product($category, //store category object
                                   $row['productCode'],
                                   $row['productName'],
                                   $row['listPrice']);
            $product->setId($row['productID']);
            //apend the product object to product array
            $products[] = $product;
        }
        return $products;
    }

    //accept product id
    public static function getProduct($product_id) {
        $db = Database::getDB();
        $query = "SELECT * FROM products
                  WHERE productID = '$product_id'";
        $result = $db->query($query);
        //convert result into array
        $row = $result->fetch();
        //cretaes category object
        $category = CategoryDB::getCategory($row['categoryID']);
        $product = new Product($category,
                               $row['productCode'],
                               $row['productName'],
                               $row['listPrice']);
        $product->setID($row['productID']);
        return $product;
    }

    public static function deleteProduct($product_id) {
        $db = Database::getDB();
        $query = "DELETE FROM products
                  WHERE productID = '$product_id'";
        $row_count = $db->exec($query);
        return $row_count;
    }

    public static function addProduct($product) {
        $db = Database::getDB();

        $category_id = $product->getCategory()->getID();
        $code = $product->getCode();
        $name = $product->getName();
        $price = $product->getPrice();

        $query =
            "INSERT INTO products
                 (categoryID, productCode, productName, listPrice)
             VALUES
                 ('$category_id', '$code', '$name', '$price')";

        $row_count = $db->exec($query);
        return $row_count;
    }
}
?>