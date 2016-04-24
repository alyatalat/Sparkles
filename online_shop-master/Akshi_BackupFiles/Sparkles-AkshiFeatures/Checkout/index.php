<?php
require_once('../model/database.php');
require_once('../model/validation.php');
require_once('../model/cart.php');
require_once('../model/order_db.php');
require_once('../model/promocode_db.php');

?>

<div id="main">

<?php
/*

if (!isset($_SESSION['user'])) {
    $_SESSION['checkout'] = true;
    $url='../account';
    header("Location: " . $url);
    exit();
}
 */
//$cust_id= $_SESSION['user_id'];
$cust_id = 1;
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {        
        $action = 'confirm';
    }
}

switch ($action) {
    
//    case 'editaddress':
//        $db = Database::getDB();
//        $query ='select BillingAddress from customer where Customer_Id = '. $cust_id;
//        $add = $db->query($query);
//
//        $billing_address = $add->fetch();
//        $newadd= $_POST['newadd'];
//        if($newadd!=$billing_address)
//        {
//
//        }


    case 'confirm':
        $cart = cart_get_items();
        if (cart_product_count() == 0) {
            redirect('../cart');
        }
        $subtotal = cart_subtotal();
        $item_count = cart_item_count();
        $total = $subtotal;
        if(isset($_POST['promocode'])) {
            $code = $_POST['promocode'];
            $discount = PromoCodeDB::getDiscountPromoCode($code);
        }
        include 'checkout_confirm.php';
        include '../PromoCode/Index.php';

        break;

    case 'payment':
        include 'checkout_payment.php';
        $order_id = add_order($subtotal,$billing_address);

        foreach($cart as $product_id => $item) {
            $item_price = $item['list_price'];
            $discount = $item['discount_amount'];
            $quantity = $item['quantity'];
            add_order_item($order_id, $product_id,
                           $item_price, $discount, $quantity);
        }
        clear_cart();
        redirect('../account?action=view_order&order_id=' . $order_id);
        break;

    default:
        display_error('Unknown cart action: ' . $action);
        break;
}
?>
                </div>


            </div>
