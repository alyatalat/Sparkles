<?php
require_once('../Controller/database.php');
$query = "SELECT * FROM products ORDER BY Product_Id";
$products = $db->query($query);
?>

<div class="container-fluid">
    <div class="row">
        <?php
        require_once("../Layout/admin_header.php");
        ?>
    </div>
</div>

<!-- the body section -->

<div id="page-container">
    <?php
    require_once("../Layout/admin_sidebar.php");
    ?>

    <div id="main">

            <!-- display a table of products -->
        <h3 class="text-center title">Product Inventory Management System</h3>
        <br/>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Filter Results</h3>
            </div>
            <div class="panel-body">
                <form action="" method="post" id="filter_product_form" >
                <div class="row">
                    <div class="col-md-2 col-sm-6">
                        Category
                        <div class="checkbox">
                            <label><input type="checkbox" name="category" value="Apparel">Apparel</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="category" value="Jewelry">Jewelry</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="category" value="Shoes">Shoes</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="category" value="All">Select All</label>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        Price
                        <div class="checkbox">
                            <label><input type="checkbox" value="">Under $25</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="">$26 - $50</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="">$51-$100</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="">Over $100</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="">Select All</label>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        Quantity
                        <div class="checkbox">
                            <label><input type="checkbox" value="">Less than 25</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="">26 - 50</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="">51-100</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="">More than 100</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="">Select All</label>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        Rating
                        <div class="checkbox">
                            <label><input type="checkbox" value="">Not Rated</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="">1 star</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="">2 stars</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="">3 stars</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="">4 stars</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="">5 stars</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="">Select All</label>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        In Stock?
                        <div class="radio">
                            <label><input type="radio" name="stock">Yes</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="stock">No</label>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        On Sale?
                        <div class="radio">
                            <label><input type="radio" name="sale">Yes</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="sale">No</label>
                        </div>
                    </div>

                </div>
                <div class="row text-right results">
                    <button class="btn btn-md" type="submit"><a href="">Show Results</a></button>
                </div>
                </form>
            </div>
        </div>

            <div class=" add text-center">
                <button class="btn btn-md btn-primary"><a id="add" href="add_product_form.php">Add New Product</a></button>
            </div>

            <div >
                <table class="table table-hover table-condensed text-left">
                    <tr>
                        <th>ID</th>
                        <th>Thumbnail</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price CAD</th>
                        <th>Quantity</th>
                        <th>Rating</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                    <?php foreach ($products as $product) : ?>
                        <tr>
                            <td><?php echo $product['Product_Id']; ?></td>
                            <td><?php echo '<img class="thumbnail" src="../../'. $product['Image'] .'" alt="thumbnail" />'; ?></td>
                            <td><?php echo $product['Category']; ?></td>
                            <td><?php echo $product['Product_Title']; ?></td>
                            <td><?php echo $product['Product_Description']; ?></td>
                            <td><?php echo $product['Price']; ?></td>
                            <td><?php echo $product['Quantity']; ?></td>
                            <td><?php echo $product['Average_Rating']; ?></td>
                            <td>
                                <form action="../Controller/delete_product.php" method="post"
                                      id="delete_product_form">
                                    <input type="hidden" name="product_id"
                                           value="<?php echo $product['Product_Id']; ?>" />
                                    <button type="submit" class="delete btn btn-sm btn-default">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </button>

                                </form>
                            </td>
                            <td>
                                <form action="update_product_form.php" method="post"
                                      id="update_product_form">
                                    <input type="hidden" name="Product_Id"
                                           value="<?php echo $product['Product_Id']; ?>" />
                                    <button type="submit" class="btn btn-sm btn-default">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>


            </div>

    </div> <!-- end main -->

</div>

<div class="container-fluid">
    <div class="row">
        <?php
        require_once("../Layout/admin_footer.php");
        ?>
    </div>
</div>

</div><!-- end page -->

</html>