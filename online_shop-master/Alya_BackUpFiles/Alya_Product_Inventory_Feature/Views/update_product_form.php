
<?php
require_once('../Controller/database.php');
require_once ('../Models/dbclass.php');

$db = Dbclass::getDB();


if(isset($_POST['Product_Id'])){
    $id= $_POST['Product_Id'];
}
elseif(isset($_GET['id'])) {
    $id= $_GET['id'];
    $category=$_GET['category'];
    $name=$_GET['name'];
    $description=$_GET['description'];
}else{
    $id=0;
    echo'<script>
        alert("No Product Chosen");
    </script>';
}


$sql = "SELECT * FROM products WHERE Product_Id = '$id'";
$result = $db->query($sql);
$product = $result->fetch();


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
                <h3 class="panel-title">Update Product Information</h3>
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
                    <form action="../Controller/update_product.php" method="post" enctype="multipart/form-data"
                          id="update_product_form" >
                        <div class="col-md-6">
                            <p>Select image to upload:</p>
                            <p>For best results make sure the image is of size 150px x 150px</p>
                            <input type="file" name="fileToUpload" id="fileToUpload" onchange="PreviewImage();">
                            <br/>
                            <img id="previewimg" src="
                            <?php
                                $picture = '../../'. $product['Image'] .'';
                                echo $picture;
                            ?>
                        " alt="upload image" width="150" height="150" /> <br/><br/>
                        </div>

                        <div class="col-md-6">
                            <table>
                                <tbody>
                                <tr>
                                    <td><label>Product ID:</label></td>
                                    <td><label><?php echo $id; ?></label></td>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                </tr>
                                <tr>
                                    <td><label>Product Name:</label></td>
                                    <td class="addbody"><input type="input" name="name" value="<?php
                                        if(isset($_GET['name'])) {
                                         echo $_GET['name'];
                                        }else {
                                            echo $product['Product_Title'];
                                        }
                                    ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Product Description:</label></td>
                                    <td class="addbody"><input type="input" name="description" value="<?php
                                        if(isset($_GET['description'])) {
                                            echo $_GET['description'];
                                        }else {
                                            echo $product['Product_Description'];
                                        } ?>"/></td>
                                </tr>
                                <tr>
                                    <td><label>Product Price:</label></td>
                                    <td class="addbody"><input type="input" name="price" value="<?php
                                        if(isset($_GET['price'])) {
                                            echo $_GET['price'];
                                        }else {
                                            echo $product['Price'];
                                        } ?>"/></td>
                                </tr>
                                <tr>
                                    <td><label>Product Quantity:</label></td>
                                    <td class="addbody"><input type="input" name="quantity" value="<?php
                                        if(isset($_GET['quantity'])) {
                                            echo $_GET['quantity'];
                                        }else {
                                            echo $product['Quantity'];
                                        } ?>"/></td>
                                </tr>
                                <tr>
                                    <td><label>Product Category:</label></td>
                                    <td class="addbody"><input type="input" name="category" value="<?php
                                        if(isset($_GET['category'])) {
                                            echo $_GET['category'];
                                        }else {
                                            echo $product['Category'];
                                        }?>"/></td>
                                    <input type = "hidden" name="image" value="<?php
                                        if(isset($_GET['image'])) {
                                            echo $_GET['image'];
                                        }else {
                                            echo $product['Image'];
                                        }?>"
                                </tr>
                                </tbody>
                            </table> <br/><br/>
                            <div class="text-right">
                                <button class="btn btn-md btn-primary" type="submit">Update Product</button>
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
