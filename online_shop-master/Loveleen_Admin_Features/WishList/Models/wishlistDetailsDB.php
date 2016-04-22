<?php
class wishlistsDetailsDB{
    public static function addWishlistProduct($wid,$pid)
    {

        $db = Database::getDB();
        $query =
            "INSERT INTO wishlist_details
                (wishlist_Id, Product_Id)
                VALUES
                ('$wid','$pid')";
        $row_count = $db->exec($query);
        return $row_count;
    }
    public static function checkWishlist($cust_Id)
    {
        $db = Database::getDB();
        $sql = "SELECT DISTINCT wishlist_details.wishlist_Id,wishlist_details.Product_Id
                FROM wishlists JOIN wishlist_details
                ON wishlists.wishlist_Id = wishlist_details.wishlist_Id
                WHERE wishlists.Customer_Id='$cust_Id'";
        $getProducts = $db->prepare($sql);
        $getProducts->execute();
        $products = $getProducts->fetchAll();
        return $products;
    }
    public static function showProducts($wid)
    {
        $db = Database::getDB();
        $sql = "SELECT DISTINCT wishlist_details.Product_Id,products.Product_Title,products.Product_Description,products.Image
                FROM wishlist_details JOIN products
                ON wishlist_details.Product_Id = products.Product_Id
                WHERE wishlist_details.wishlist_Id = '$wid'";
        $stmt = $db->query($sql);
        return $stmt->fetchAll();
    }
    public static function topProducts()
    {
        $db=Database::getDB();
        $sql="SELECT DISTINCT Product_Id,COUNT(*) AS 'Frequency' FROM wishlist_details GROUP BY Product_Id order by count(*) DESC";
        $stmt = $db->query($sql);
        return $stmt->fetchAll();
    }
}