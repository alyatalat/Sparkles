<!--
    Apparel Category of Products
    Author: Alya Talat
-->
<?php
session_start();
require_once("Customerlogin/Models/customer.php");
$auth_user = new customer();
if($auth_user->is_loggedin())
{
    $user_id = $_SESSION['user_session'];
    $stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
    $stmt->execute(array(":user_id"=>$user_id));
    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<?php
require_once('../Controller/database.php');

// Get products for selected category
$query = "SELECT * FROM products
              WHERE Category='Apparel'
              ORDER BY Product_Id";
$products = $db->query($query);
?>
<div class="container-fluid">
    <div class="row">
        <?php
        require_once("../Layout/header.html");
        ?>
    </div>
</div>


<!-- main -->
<div class="container-fluid">
    <div class="row header-image">
        <h2 class="category-title"> Shop Apparel </h2>
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
                        <a href="GiftCards.php">My Gift Cards</a>
                    </li>
                    <li>
                        <a href="Wishlist/Views/Wishlist.php">My WishList</a>
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

    <div id="page-content-wrapper" class="col-md-9 col-sm-8 col-xs-12">
        <div class="container-fluid">
            <div class="row">
                <div class="nav">
                    <ul class="breadcrumb">
                        <li><a href="HomeIndex.php">Home</a></li>
                        <li><a href="Apparel.php">Apparel</a></li>
                        <li class="active">Products</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- display a list of products -->
        <div class="container-fluid">
            <div class="row">
                <?php foreach ($products as $product) : ?>
                    <ul class="productlist">
                        <li><?php echo '<img src="../'. $product['Image'] .'" alt="product image" width="150" height="150"/>'; ?></li>
                        <li><?php echo $product['Product_Title']; ?></li>

                        <!-- code by Loveleen Anand for currency exchange -->

                      <div class="ProductPrice"><?php echo $product['Price'];?></div>
                        <li><form action= "Cart" method="get"
                                  id="add_to_cart_form">
                                <input type="hidden" name="action" value="add" />

                                <input type="hidden" name="product_id" value=<?php echo $product['Product_Id']?> />
                                <b>Quantity:</b>&nbsp;
                                <input type="text" name="quantity" value="1"/>
                                <input type="submit" value="Add to Cart" />
                            </form></li>
                        <li><a href="Wishlist/Views/Wishlist.php?id=<?php echo $product['Product_Id']; ?>">Add To Wishlist</a></li>
                        <li><a href="Ratings/Views/Rating.php?id=<?php echo $product['Product_Id']; ?>">Rate this item</a>
                    </ul>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <?php
        require_once("../Layout/footer.html");
        ?>
    </div>
</div>
<script>
    var returnedvalue;
    var price;
    var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)currency\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    function getCookieValue() {
        var currencySelected = cookieValue;
        if (currencySelected === "USD") {
            $.ajax({
                type: "POST",
                url: "getCurrency.php",
                cache: false,

                success: function(result) {
                    returnedvalue = result;
                    var USPrice = returnedvalue;
                    USPrice = Math.round(USPrice * 100) / 100;
                    $.each($('.ProductPrice'), function(key, value){
                        var price = $(value).text();
                        var total = price*USPrice;
                        total = Math.round(total*100)/100;
                        total = "USD $"+total;
                        $(value).text(total);
                      //  $(value).text(price*USPrice);
                    });
                }
            });
        }
        else if(currencySelected === "CAD")
        {
            $.each($('.ProductPrice'), function(key, value){
                var price = $(value).text();
                $(value).text("CAD $"+price);
            });

        }
    }
    getCookieValue();
</script>






