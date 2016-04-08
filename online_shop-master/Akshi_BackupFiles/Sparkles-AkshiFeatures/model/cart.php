<?php
require_once ('cart_product.php');
session_start();
// Create an empty cart if it doesn't exist
if (!isset($_SESSION['cart']) ) {
    $_SESSION['cart'] = array();

}

// Add an item to the cart
function cart_add_item($product_id, $quantity) {
    $oldcart = $_SESSION['cart'];
    $newitem = array();
    $newitem[$product_id]= round($quantity,0);
    $_SESSION['cart'] = $newitem+$oldcart;
}

// Update an item in the cart
function cart_update_item($product_id, $quantity) {
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] = round($quantity, 0);
    }
}

// Remove an item from the cart
function cart_remove_item($product_id) {
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }
}

// Get an array of items for the cart
function cart_get_items() {
    $items = array();
    foreach ($_SESSION['cart'] as $product_id => $quantity ) {
        // Get product data from db
        $product = get_product($product_id);
        $list_price = $product['Price_Id'];
        $quantity = intval($quantity);

        $line_price = round($list_price * $quantity, 2);

        // Store data in items array
        $items[$product_id]['id']=$product['Product_Id'];
        $items[$product_id]['name'] = $product['Product_Title'];
        $items[$product_id]['description'] = $product['Product_Description'];
        $items[$product_id]['list_price'] = $list_price;
        $items[$product_id]['quantity'] = $quantity;
        $items[$product_id]['line_price'] = $line_price;
    }
    return $items;
}

// Get the number of products in the cart
function cart_product_count() {
    return count($_SESSION['cart']);
}

// Get the number of items in the cart
function cart_item_count () {
    $count = 0;
    $cart = cart_get_items();
    foreach ($cart as $item) {
        $count += $item['quantity'];
    }
    return $count;
}

// Get the subtotal for the cart
function cart_subtotal () {
    $subtotal = 0;
    $cart = cart_get_items();
    foreach ($cart as $item) {
        $subtotal += $item['list_price'] * $item['quantity'];
    }
    return $subtotal;
}

// Remove all items from the cart
function clear_cart() {
    $_SESSION['cart'] = array();
}

// Set the product for the last item added to the cart
function set_last_product($product_id, $product_name) {
    $_SESSION['last_product_id'] = $product_id;
    $_SESSION['last_product_name'] = $product_name;
}

?>