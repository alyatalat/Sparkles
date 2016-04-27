<!--
    Sale Category of Products
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
              WHERE Sale = 'Yes'
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
    <div class="row sale-header-image">
        <h2 class="category-title"> Shop Sale </h2>
    </div>
</div>

<div id="wrapper" class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div id="sidebar-wrapper" class="col-md-3 col-sm-4">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Categories
                    </a>
                </li>
                <li>
                    <a href="#">Today's Deals</a>
                </li>
                <li>
                    <a href="#">Sort Products</a>
                </li>
                <li>
                    <a href="#">My Gift Cards</a>
                </li>
                <li>
                    <a href="#">My WishList</a>
                </li>
                <li>
                    <a href="#">Sale</a>
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
                            <li><a href="Sale.php">Sale</a></li>
                            <li class="active">Products</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- display a list of products -->
            <div class="container-fluid">
                <div class="row product-display">
                    <?php foreach ($products as $product) : ?>
                        <ul class="productlist">
                            <li><?php echo '<img src="../'. $product['Image'] .'" alt="product image" width="150" height="150"/>'; ?></li>
                            <li><?php echo $product['Product_Title']; ?></li>
                            <li><?php echo $product['Price_Id']; ?></li>
                            <li><form action= "Cart/Views" method="get"
                                      id="add_to_cart_form">
                                    <input type="hidden" name="action" value="add" />

                                    <input type="hidden" name="product_id" value=<?php echo $product['Product_Id']?> />
                                    <b>Quantity:</b>&nbsp;
                                    <input type="text" name="quantity" value="1"/>
                                    <input type="submit" value="Add to Cart" />
                                </form></li>
                            <li><a href="#">Add To Wishlist</a></li>
                            <li><a href="#">Rate this item</a></li>
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







