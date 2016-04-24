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
        var_dump($items);
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
<link rel="stylesheet" href="../View/Layout/Style/admin.css" />
<link rel="stylesheet" href="../Scripts/Gift_Card.css"/>
<?php
require_once("../View/Layout/admin_header.php");
?>


<!-- main -->
    <div id="main">

        <h1>Your Cart</h1>
        <h2>Welcome Customer Name</h2>

        <?php if (cart_product_count() == 0) : ?>
            <p>There are no products in your cart.</p>
        <?php else: ?>
            <p>To remove an item from your cart, change its quantity to 0.</p>
            <form action="" method="post">
                <input type="hidden" name="action" value="update">
                <table id="cart">
                    <tr id="cart_header">
                        <th class="left">Item</th>
                        <th class="right">Price</th>
                        <th class="right">Quantity</th>
                        <th class="right">Total</th>
                    </tr>
                    <?php foreach ($cart as $item) : ?>
                        <tr>
                            <td><?php echo $item['name']; ?></td>
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
                        </tr>
                    <?php endforeach; ?>
                    <tr id="cart_footer" >
                        <td colspan="3" class="right" ><b>Subtotal</b></td>
                        <td class="right">
                            <?php echo sprintf('$%.2f', cart_subtotal()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="right">
                            <input type="submit" value="Update Cart">
                        </td>
                    </tr>
                </table>
            </form>

        <?php endif; ?>


        <?php if (cart_product_count() > 0) : ?>
            <p>
                Proceed to: <a href="../checkout">Checkout</a>
            </p>
        <?php endif; ?>

                    <?php if (cart_product_count() > 0) : ?>
                        <p>
                            <a href="?action=clear">Clear All</a>
                        </p>
                    <?php endif; ?>

                </div>


            </div>

        </div>
        <?php
        require_once("../View/Layout/admin_footer.php");
        ?>
