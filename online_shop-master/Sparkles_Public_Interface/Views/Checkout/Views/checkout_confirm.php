
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
<script src="../../../Scripts/cartjs.js"></script>

<div class="col-md-9 col-sm-8 col-xs-12 pull-left">
<div class="row">
    <div class="container">

        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                    <p>Shipping Details</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                    <p>Confirm Order</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                    <p>Payment</p>
                </div>
            </div>
        </div>

        <form role="form" action="" method="post">
            <div class="row setup-content" id="step-1">
                <div class="col-xs-6">
                    <div class="col-md-12">
                        <h3>Change Billing Address</h3>
                        <div id="billingaddress" class="col-md-9 col-sm-6 col-xs-12">
                            <h2>Shipping Address</h2>

                            <?php
                            $cust_id=1;
                            $bill_add = getbilling_address($cust_id);

                            if(isset($_POST['newadd']))
                                if($_POST['newadd']!="")
                                {
                                    $bill_add[0] = $_POST['newadd'];
                                }?>

                            <form method="post" action="" >
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

                            
                        </div>
                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-2">
                <div class="col-xs-6">
                    <div class="col-md-12">

                        <h3> Confirm Order</h3>
                        <table id="checkoutcart" class="col-md-7 col-sm-8 col-xs-10">
                            <tr id="cart_header">
                                <th class="left" >Item</th>

                                <th class="right">Price</th>
                                <th class="right">Quantity</th>
                                <th class="right">Total</th>
                            </tr>
                            <?php foreach ($cart as $product_id => $item) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($item['name']); ?>
                                        <br/>
                                        <?php echo htmlspecialchars($item['description']); ?>
                                    </td>
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










                    </div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                </div>
            </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-6">
            <div class="col-md-12">
                <div class="col-md-10 col-sm-8 col-xs-12 pull-right">
                    <?php include('../../PromoCode/Views/Index.php');?>
                </div>


                <div class="col-md-10 col-sm-8 col-xs-12 pull-right">

                        <h2>Subtotal</h2>
                        <p class="right">
                            <?php
                            if(!isset($discount)) {
                                echo sprintf('$%.2f', $subtotal);

                            }
                            else {
                                echo sprintf('$%.2f', $subtotal-$discount);
                            }
                            if (isset($discount)){
?>
                    <h2>Discount</h2>
                    <p>

                        <?php echo "-".sprintf('$%.2f', $discount);} ?>
                    </p>

                        </p>

                    <?php
                    if(!isset($discount)) {
                        $discount=0;
                        $subtotal = $subtotal-$discount;

                    }
                    else {
                        $subtotal=$subtotal-$discount;
                    }
                    ?>


                </div>
<?php $subtotal_stripe = ($subtotal*100);?>
                <form method="post" action="checkout_payment.php" class="col-md-9 col-sm-8 col-xs-12 pull-right">
                    <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_hNOTamz7C1hySP4mJemYBbYp"
                        data-amount="<?php echo $subtotal_stripe?>"
                        data-name="Pay for Shopping Cart "
                        data-description="Amount : <?php echo $subtotal?>"
                        data-locale="auto">
                    </script>

                    <input type="hidden" name="new_subtotal" value="<?php echo $subtotal_stripe?>">
                    <input type="hidden" name="action" value="payment">
                </form>


           </div>
        </div>
    </div>
    </form>

</div>
    </div>
</div>

