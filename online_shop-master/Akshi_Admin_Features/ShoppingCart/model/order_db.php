<?php
$db = Database::getDB();


function getbilling_address($cust_id)
{
    global $db;
    $query ='select BillingAddress from customer where Customer_Id = '. $cust_id;
    $add = $db->query($query);
    $billing_address = $add->fetch();

    return $billing_address;
}

function add_order($amount, $shipAddress){
    global $db;
    $customer_id = $_SESSION['cust_id'];
    $order_date = date("Y-m-d H:i:s");
    $amount = $amount;
    $billing_add = $shipAddress;
    $query = 'INSERT INTO orders(Cust_Id,Order_Date,Ship_Amount,Ship_Address)
              VALUES (:customer_id, :order_date, :ship_amount, :billing_add)';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->bindValue(':order_date', $order_date);
    $statement->bindValue(':ship_amount', $amount);
    $statement->bindValue(':billing_add', $billing_add);
    $statement->execute();
    $order_id = $db->lastInsertId();
    $statement->closeCursor();
    return $order_id;
}

function add_order_item($order_id, $product_id,
                        $item_price, $discount, $quantity) {
    global $db;
    $query = '
        INSERT INTO OrderItems (orderID, productID, itemPrice,
                                discountAmount, quantity)
        VALUES (:order_id, :product_id, :item_price, :discount, :quantity)';
    $statement = $db->prepare($query);
    $statement->bindValue(':order_id', $order_id);
    $statement->bindValue(':product_id', $product_id);
    $statement->bindValue(':item_price', $item_price);
    $statement->bindValue(':discount', $discount);
    $statement->bindValue(':quantity', $quantity);
    $statement->execute();
    $statement->closeCursor();
}

function get_order($order_id) {
    global $db;
    $query = 'SELECT * FROM orders WHERE orderID = :order_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':order_id', $order_id);
    $statement->execute();
    $order = $statement->fetch();
    $statement->closeCursor();
    return $order;
}

function get_order_items($order_id) {
    global $db;
    $query = 'SELECT * FROM OrderItems WHERE orderID = :order_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':order_id', $order_id);
    $statement->execute();
    $order_items = $statement->fetchAll();
    $statement->closeCursor();
    return $order_items;
}

function get_orders_by_customer_id($customer_id) {
    global $db;
    $query = 'SELECT * FROM orders WHERE customerID = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $order = $statement->fetchAll();
    $statement->closeCursor();
    return $order;
}


function delete_order($order_id) {
    global $db;
    $query = 'DELETE FROM orders WHERE Order_Id = :order_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':order_id', $order_id);
    $statement->execute();
    $statement->closeCursor();
}


function getall_orders(){
    global $db;
    $query = 'SELECT * FROM orders';
    $statement = $db->prepare($query);
    $statement->execute();
    $orders = $statement->fetchAll();
    $statement->closeCursor();
    return $orders;
}





function addOrder ($cust_id, $order_date, $shipamount, $shipaddress)
{   global $db;
    $db = Database::getDB();
    $query = "
    INSERT INTO orders(Cust_Id,Order_Date,Ship_Amount,Ship_Address)
              VALUES ('$cust_id', '$order_date', '$shipamount', '$shipaddress')";
    $db->exec($query);


}

function updateOrder($order_id,$cust_id, $order_date, $shipamount, $shipaddress){

    global $db;
    $query = "UPDATE orders
                SET Cust_Id ='$cust_id',
                Order_Date = '$order_date',
                Ship_Amount ='$shipamount',
                Ship_Address='$shipaddress'
                WHERE Order_Id='$order_id'";
var_dump($query);
    $db->exec($query);
}

function deleteOrder($order_id)
{
    global $db;
    $query = "DELETE FROM orders
          WHERE Order_Id = '$order_id'";
    $db->exec($query);
}
?>