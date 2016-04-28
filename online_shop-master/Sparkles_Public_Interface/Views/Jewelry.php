<!--
    Jewelry Category of Products
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

if (isset($_GET['word'])) {
    $searchWord = $_GET['word'];

    $query = "SELECT * FROM products WHERE Product_Title = :searchWord AND Category LIKE CONCAT('Jewelry');";
    $statement = $db->prepare($query);
    $statement->bindValue(':searchWord', $searchWord);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
} else {


// Get products for selected category
    $query = "SELECT * FROM products
              WHERE Category='Jewelry'
              ORDER BY Product_Id";
    $products = $db->query($query);
}



$query = "SELECT * FROM image_slider
            WHERE image_category='JEWERLY'
            ORDER BY image_order";
$statement = $db->prepare($query);
$statement->execute();
$images = $statement->fetchAll();
$statement->closeCursor();

$imageArray = array();

foreach($images as $image){

    $pos = strpos($image['image_file'], "Images");
    $pos = substr($image['image_file'], $pos+7);
    $pos = "../../Soo-Ah_Admin_Features/ImageSlider/Views/Images/" . $pos;
    $imageArray[] = $pos;
}





?>
<div class="container-fluid">
    <div class="row">
        <?php
        require_once("../Layout/header.html");
        ?>
    </div>
</div>


<style>

    .carousel-control.left, .carousel-control.right{
        background-image: none !important;
    }
</style>





<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php if(count($imageArray) > 1) { ?>
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <?php } ?>
        <?php
        for($i = 1; $i < count($imageArray); $i++) {
            ?>
            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>"></li>
        <?php } ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="<?php echo $imageArray[0];?>" id="firstImage" style="width:100%; height: 200px;">
        </div>
        <?php

        for($i = 1; $i < count($imageArray); $i++) {

            ?>

            <div class="item">
                <img src="<?php echo $imageArray[$i]; ?>" style="width:100%; height: 200px;"  >
            </div>
        <?php } ?>

    </div>

    <!-- Controls -->
    <?php if(count($imageArray) > 1) { ?>
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    <?php } ?>
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
                    <a href="TodaysDeal.php">Today's Deals</a>
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
                            <li><a href="Jewelry.php">Jewelry</a></li>
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
                            <div class="ProductPrice"><?php echo $product['Price'];?></div>
                            <li><form action= "Cart/Views" method="get"
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





