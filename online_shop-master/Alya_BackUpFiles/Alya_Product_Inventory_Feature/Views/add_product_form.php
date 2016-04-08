<?php
require_once('../Controller/database.php');
?>
<script src="../Scripts/previewimage.js"></script>

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

        <h3 class="text-center title">Product Inventory Management System</h3>
        <br/>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add New Product</h3>
                <?php
                if(isset($_GET['error'])){
                    echo
                    "
                    <div class='row' style='
                                        color:crimson;
                                        font-weight: 500;'>
                    <hr/>
                    <p style='padding-left: 1rem;'>Please Fix The Following Errors:</p>
                    <p style='padding-left: 4rem;'>{$_GET['error']}</p>
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
                                    $file=$_GET['image'];
                                }
                                else {
                                    $file='Images/Uploads/placeholder.png';
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
                                    <td class="addbody"><input type="input" name="description" /></td>
                                </tr>
                                <tr>
                                    <td><label>Product Price:</label></td>
                                    <td class="addbody"><input type="input" name="price" /></td>
                                </tr>
                                <tr>
                                    <td><label>Product Quantity:</label></td>
                                    <td class="addbody"><input type="input" name="quantity" /></td>
                                </tr>
                                <tr>
                                    <td><label>Product Category:</label></td>
                                    <td class="addbody"><input type="input" name="category" /></td>
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
        <p><a href="display_product.php">Back to Product Listing</a></p>


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











