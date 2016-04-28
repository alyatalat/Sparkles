<?php

require_once('../model/database.php');
require_once('../model/cart.php');
require_once('../model/cart_product.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'view';
    }
}

switch ($action) {
    case 'view':
        $cart = cart_get_items();
        break;
    case 'add':
        $product_id = filter_input(INPUT_GET, 'product_id', FILTER_VALIDATE_INT);
        $quantity = filter_input(INPUT_GET, 'quantity');
        

        cart_add_item($product_id, $quantity);
        $cart = cart_get_items();
        break;
    case 'clear':
        clear_cart();
        break;
    case 'update':
        $items = $_POST['items'];
        
        foreach ( $items as $product_id => $quantity ) {
            if ($quantity == 0)
            {
                cart_remove_item($product_id);
            } else
            {
                cart_update_item($product_id, $quantity);
            }
        }
        $cart = cart_get_items();
        break;

    case 'delete':
              $productid = filter_input(INPUT_GET, 'productid', FILTER_VALIDATE_INT);
              cart_remove_item($productid);
        $cart = cart_get_items();
        break;



default:
        //add_error("Unknown cart action: " . $action);
        break;
}
?>

<script
    src="https://code.jquery.com/jquery-2.2.2.min.js"
    integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
    crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" href="../../../Stylesheets/echo-index.css" />
<link rel="stylesheet" href="../../../Stylesheets/cart.css" />
<div class="container-fluid">
    <div class="row">
        <?php
        require_once("../Layout/header.html");
        ?>
    </div>
</div>

<!-- main -->
<div class="container-fluid">
    <div class="row cart-header-image">
        <h2 class="category-title"> Shopping Cart </h2>
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
                            <li><a href=".">Shopping Cart</a></li>

                        </ul>
                    </div>
                </div>
            </div>
<div class="container-fluid">
    <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="row">
                    <?php if (cart_product_count() == 0) : ?>
                <p>There are no products in your cart.</p>
            <?php else: ?>

                <form action="" method="post">
                    <input type="hidden" name="action" value="update">
                    <table id="cart" class="col-md-5 col-sm-8 col-xs-10">
                        <tr id="cart_header">
                            <th class="left">Item</th>
                            <th class="right">Price</th>
                            <th class="right">Quantity</th>
                            <th class="right">Total</th>
                        </tr>
                        <?php foreach ($cart as $item) : ?>
                            <tr id="cart-row">
                                <td><strong><?php echo $item['name']; ?></strong>
                                <br/>
                                    <small><?php echo $item['description']; ?></small>
                                </td>
                                <td class="right">
                                    <?php echo $item['list_price']; ?>
                                </td>
                                <td class="right">

                                    <input type="text" size="3" class="right"
                                           name="items[<?php echo $item['id']; ?>]"
                                           value="<?php echo $item['quantity']; ?>">


                                </td>
                                <td class="right">
                                    <?php echo $item['total'];?>
                                </td>
                                <td>
                                    <a href="?action=delete&productid=<?php echo $item['id'];?>" class="glyphicon glyphicon-remove"></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr id="cart_footer" >
                            <td></td>
                            <td colspan="2" class="right" ><b>Subtotal</b></td>
                            <td class="right">
                                <?php echo sprintf('$%.2f', cart_subtotal()); ?>
                            </td>
                        </tr>


                    </table>
                    <div class="col-md-1 col-sm-2 col-xs-10 pull-right">
                        <?php if (cart_product_count() > 0) : ?>
                            <p>
                                <a href="?action=clear">Clear All</a>
                            </p>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 pull-right">
                        <input type="submit" value="Update Cart">
                    </div>
                </form>

            <?php endif; ?>

</div></div></div>

                <br/>
                <br/>
<div class="col-md-9 col-sm-3 col-xs-12 pull-right">
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12 pull-left">
        <?php if (cart_product_count() > 0) : ?>
            <p>
                <a href="../../HomeIndex.php">Go Back</a>
            </p>
        <?php endif; ?>
        </div>
    <div class="col-md-2 col-sm-6 col-xs-6 pull-right">
                <?php if (cart_product_count() > 0) : ?>
                <p>
                    Proceed to: <a href="../../checkout/Views">Checkout</a>
                </p>
            <?php endif; ?>
    </div>
</div>
        </div>
        </div>
        </div>
        </div>



    </div>
<div class="col-md-10 col-sm-8 col-xs-12 pull-right">
    <?php include('../../PromoCode/Views/Index.php');?>
</div>

            </div>



<div class="container-fluid">
    <div class="row">
        <?php
        require_once("../Layout/footer.html");
        ?>
    </div>
</div>

