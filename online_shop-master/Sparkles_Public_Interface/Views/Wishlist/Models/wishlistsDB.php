<?php
class wishlistsDB{
    public static function getWishlists()
    {
        $db = Database::getDB();
        $query = "SELECT * FROM wishlists";
        $result = $db->query($query);
        $wishlists = array();
        foreach($result as$row)
        {
            $wishlist = new Wishlists(
                $row['wishlist_Name'],
                $row['Customer_Id'],
                $row['wishlist_Note'],
                $row['wishlist_Date']
            );
            $wishlist->setWishlistId($row['wishlist_Id']);
            $wishlists[]=$wishlist;
        }
        return $wishlists;
    }

    public static function getWishlistsByCustomer($cid)
    {
        $db = Database::getDB();
        $query = "SELECT * FROM wishlists WHERE Customer_Id = '$cid'";
        $result = $db->query($query);
        $wishlists = array();
        foreach($result as$row)
        {
            $wishlist = new Wishlists(
                $row['wishlist_Name'],
                $row['Customer_Id'],
                $row['wishlist_Note'],
                $row['wishlist_Date']
            );
            $wishlist->setWishlistId($row['wishlist_Id']);
            $wishlists[]=$wishlist;
        }
        return $wishlists;
    }
    public static function addNewWishlist($wishlist)
    {
        $db = Database::getDB();
        $wishlistName  = $wishlist->getWishlistName();
        $custId = $wishlist->getCustomerId();
        $wishNote = $wishlist->getWishlistNote();
        $wishDate = $wishlist->getWishlistDate();
        $query =
            "INSERT INTO wishlists
                 (wishlist_Name, Customer_Id,  wishlist_Note,wishlist_Date)
             VALUES
                 ('$wishlistName', '$custId', '$wishNote','$wishDate')";

        $row_count = $db->exec($query);
        if($row_count === 1)
        {
            $last_id = $db->lastInsertId();
                return $last_id;
        }
        else
        {
            return "some error occured in creating new wishlist";
        }
    }
    public static function getProduct($id)
    {
        $db = Database::getDB();
        $query = "SELECT Product_Id,Product_Title,Product_Description,Image FROM products WHERE product_Id = '$id'";
        $result = $db->query($query);
        $row = $result->fetch();
        $product['id']=$row['Product_Id'];
        $product['title'] = $row['Product_Title'];
        $product['description'] = $row['Product_Description'];
        $product['image']= $row['Image'];
        return $product;
    }
    public static function getWishlistName($choice)
    {
        $db=Database::getDB();
        $query="SELECT wishlist_Name FROM wishlists WHERE wishlist_Id='$choice'";
        $result = $db->query($query);
        $row = $result->fetch();
        return $row;
    }
    public static function deleteWishlistById($wid)
    {
        $db = Database::getDB();
        $query="DELETE FROM wishlists WHERE wishlist_Id='$wid'";
        $row_count = $db->exec($query);
        if($row_count === 1)
        {
            return $row_count;
        }
        else
        {
           return "Can not delete. Some error occurs.Try Again!";
        }

    }
    public static function renameWishlist($wname,$wid)
    {
        $db = Database::getDB();
        $sql = "UPDATE wishlists SET wishlist_Name='$wname' WHERE wishlist_Id='$wid'";
        $row=$db->exec($sql);
        return $row;
    }

}

