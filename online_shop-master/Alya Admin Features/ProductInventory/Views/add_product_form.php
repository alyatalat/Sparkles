
<?php
require_once("Layout/admin_header.php");
require_once('../Controller/database.php');
?>
<script src="Layout/Scripts/previewimage.js"></script>
<script
    src="https://code.jquery.com/jquery-2.2.2.min.js"
    integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
    crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" href="Layout/Style/admin.css" />
<link rel="stylesheet" href="Layout/Style/main.css" />

<!-- the body section -->

    <div id="main">

        <h3 class="text-center title">Product Inventory Management System</h3>
        <br/>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add New Product</h3>
                <?php
                if(isset($_GET['error'])){
                    echo
                    "
                    <div class='alert alert-danger row'>
                    <hr/>
                    <p>Please Fix The Following Errors:</p>
                    <p>{$_GET['error']}</p>
                    <hr/>
                    </div>

                    ";
                }
                ?>
            </div>
            <div class="panel-body">
                <div class="row">
                    <form action="../Controller/add_product.php" method="post" enctype="multipart/form-data"
                          id="add_product_form" >
                        <div class="col-md-6">
                            <p>Select image to upload:</p>
                            <p>For best results make sure the image is of size 150px x 150px</p>
                            <input type="file" name="fileToUpload" id="fileToUpload" onchange="PreviewImage();">
                            <br/>
                            <img id="previewimg" src=
                            "
                            <?php
                                if (isset($_GET['image'])&&!empty($_GET['image'])){
                                    $file="ProductInventory/Views/Layout/".$_GET['image'];
                                }
                                else {
                                    $file='ProductInventory/Views/Layout/Images/Uploads/placeholder.png';
                                }
                                $image = '../../' . $file;
                                echo $image;
                            ?>

                            " alt="Uploading...." style="width: 150px;height: 150px"/>

                        </div>

                        <div class="col-md-6">
                            <table>
                                <tbody>
                                <tr>
                                    <td><label>Product Name:</label></td>
                                    <td class="addbody"><input type="input" name="name" value="<?php
                                        if(isset($_GET['name'])){
                                            echo "{$_GET['name']}";
                                        }
                                        ?>"/></td>
                                </tr>
                                <tr>
                                    <td><label>Product Description:</label></td>
                                    <td class="addbody"><input type="input" name="description" value="<?php
                                        if(isset($_GET['description'])){
                                            echo "{$_GET['description']}";
                                        }
                                        ?>" /></td>
                                </tr>
                                <tr>
                                    <td><label>Product Price:</label></td>
                                    <td class="addbody"><input type="input" name="price" value="<?php
                                        if(isset($_GET['price'])){
                                            echo "{$_GET['price']}";
                                        }
                                        ?>"/></td>
                                </tr>
                                <tr>
                                    <td><label>Product Quantity:</label></td>
                                    <td class="addbody"><input type="input" name="quantity" value="<?php
                                        if(isset($_GET['quantity'])){
                                            echo "{$_GET['quantity']}";
                                        }
                                        ?>"/></td>
                                </tr>
                                <tr>
                                    <td><label>Product Category:</label></td>
                                    <td class="addbody"><input type="input" name="category" value="<?php
                                        if(isset($_GET['category'])){
                                            echo "{$_GET['category']}";
                                        }
                                        ?>"/></td>
                                    <input type="hidden" name="image" value="<?php echo 'Images/Uploads/' . $file_name;?>">
                                </tr>
                                </tbody>
                            </table> <br/><br/>
                            <div class="text-right">
                                <button class="btn btn-md btn-primary" type="submit">Add Product</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
        <p><a href="admin_index.php">Back to Product Listing</a></p>


    </div> <!-- end main -->

</div>

<?php
require_once("Layout/admin_footer.php");
?>

<!--
</div>

<div class="container-fluid">
    <div class="row">
        <?php
/*        require_once("../Layout/admin_footer.php");
        */?>
    </div>
</div>

</div><!-- end page -->

</html>-->











