
<main>
    <h1>Confirm Order</h1>
    <table id="cart">
        <tr id="cart_header">
            <th class="left" >Item</th>
            <th class="right">Price</th>
            <th class="right">Quantity</th>
            <th class="right">Total</th>
        </tr>
        <?php foreach ($cart as $product_id => $item) : ?>
            <tr>
                <td><?php echo htmlspecialchars($item['name']); ?></td>
                <td class="right">
                    <?php echo sprintf('$%.2f', $item['list_price']); ?>
                </td>
                <td class="right">
                    <?php echo $item['quantity']; ?>
                </td>
                <td class="right">
                    <?php echo sprintf('$%.2f', $item['list_price']); ?>
                </td>
            </tr>
        <?php endforeach; ?>
<?php if(isset($_POST['promocode'])){?>
        <tr id="cart_footer">
            <td colspan="3" class="right"><b>Discount</b></td>
            <td class="right">

                <?php echo "-".sprintf('$%.2f', $discount); ?>
            </td>
        </tr>
<?php } ?>

        <tr id="cart_footer">
            <td colspan="3" class="right"><b>Subtotal</b></td>
            <td class="right">
                <?php
            if(!isset($discount)) {
                echo sprintf('$%.2f', $subtotal);

            }
                else {
                    echo sprintf('$%.2f', $subtotal-$discount);
                }
                ?>


            </td>
        </tr>
        <tr>
        </tr>
        <tr>
        </tr>
            <tr>

        </tr>
</table>
    <h2>Billing Address</h2>

<?php
$cust_id=1;
    $bill_add = getbilling_address($cust_id);
    
    if(isset($_POST['newadd']))
    if($_POST['newadd']!="")
    {
    $bill_add[0] = $_POST['newadd'];
    }?>

    <form method="post" action="">
        <label>Billing Address:</label>
        <?php echo $bill_add[0]; ?>
        <?php if (isset($_POST['edit'])){?>
            <br/>
      <form method="post" action="">
            <input type="text" name="newadd"/>
            <input type="submit" name="edit" value="Save">

      </form>
        <?php
         
        }
    ?>
        <input type="submit" name="edit" value="Edit Address">
    </form>
    <p>
        <form method="post" action="checkout_payment.php">
        <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="pk_test_hNOTamz7C1hySP4mJemYBbYp"
            data-amount="<?php $subtotal?>"
            data-name="Shopping on Sparkles"
            data-description="Total Amount : $". <?php $subtotal?>
            data-locale="auto">
        </script>
    </form>
    </p>
</main>
