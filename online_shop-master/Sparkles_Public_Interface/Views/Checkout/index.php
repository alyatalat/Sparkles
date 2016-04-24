<?php
require_once('../../model/database.php');
require_once('../../model/validation.php');
require_once('../../model/cart.php');
require_once('../../model/order_db.php');
require_once('../../model/promocode_db.php');

?>

<script
    src="https://code.jquery.com/jquery-2.2.2.min.js"
    integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
    crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" href="../../Stylesheets/echo-index.css" />
<link rel="stylesheet" href="../../Stylesheets/cart.css" />
<div class="container-fluid">
    <div class="row">
        <?php
        require_once("../../Layout/header.php");
        ?>
    </div>
</div>

<!-- main -->
<div class="container-fluid">
    <div class="row cart-header-image">
        <h2 class="category-title"> Checkout </h2>
    </div>
</div>

<div id="wrapper" class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div id="sidebar-wrapper" class="col-md-3 col-sm-4 ">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Categories
                    </a>
                </li>
                <li>
                    <a href="Deals.php">Today's Deals</a>
                </li>
                <li>
                    <a href="#">Sort Products</a>
                </li>
                <li>
                    <a href="GiftCards">My Gift Cards</a>
                </li>
                <li>
                    <a href="Wishlist.php">My WishList</a>
                </li>
                <li>
                    <a href="Sale.php">Sale</a>
                </li>
                <li>
                    <a href="Feedback/Views/Feedback.php">Feedback</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
        <div class="container-fluid">
            <div class="col-md-9 col-sm-8 col-xs-12">

                <div class="row">
                    <div class="nav">
                        <ul class="breadcrumb">
                            <li><a href="HomeIndex.php">Home</a></li>
                            <li><a href="../Cart">Shopping Cart</a></li>
                            <li><a href=".">Checkout</a></li>
                        </ul>
                    </div>
                </div>
            </div>



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
    case 'confirm':
        $cart = cart_get_items();
        $subtotal = cart_subtotal();
        $item_count = cart_item_count();
        $total = $subtotal;
        if(isset($_POST['promocode'])) {
            $code = $_POST['promocode'];
            $discount = PromoCodeDB::getDiscountPromoCode($code);
        }
        include_once ('checkout_confirm.php');
        break;

    case 'payment':

        $subtotal=$_POST['new_subtotal'];

        $billing_address=$_POST['billing_address'];

        $cart = cart_get_items();

        $order_id = add_order($subtotal,$billing_address);
        echo $order_id;
        foreach($cart as $product_id => $item) {
            $item_price = $item['list_price'];
            $discount=0;
            $quantity = $item['quantity'];
            add_order_item($order_id, $product_id, $item_price, $discount, $quantity);
            }
        include "order_placed.php";
            
            clear_cart();

            break;

            default:
          //  display_error('Unknown cart action: ' . $action);
            break;
            }
            ?>
                </div>


            </div>
</div>
