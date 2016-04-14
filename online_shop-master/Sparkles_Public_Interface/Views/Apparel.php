<!--
    Apparel Category of Products
    Author: Alya Talat
-->

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
                        <li><?php echo "CAD".$product['Price']; ?></li>
                        <li><button>Add To Cart</button></li>
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







