<?php
require_once('/../Models/DbConnection.php');
require_once('/../Models/DealProduct.php');
require_once('/../Models/DealDB.php');
$error="";
if(isset($_GET['error'])){
    $error=$_GET['error'];
}
?>
<script
    src="https://code.jquery.com/jquery-2.2.2.min.js"
    integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
    crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" href="Layout/Style/admin.css" />
<?php
require_once("Layout/admin_header.php");
?>

<div id="main">
    <?php echo $error; ?>
    <h3 class="page-header">Products List</h3>
    <table style="font-size: 12px;" class="table table-striped">
        <tr>
            <td style="padding: 10px;"><b>Id</b></td>
            <td style="padding: 10px;"><b>Thumbnail</b></td>
            <td style="padding: 10px;"><b>Name</b></td>
            <td style="padding: 10px;"><b>Category</b></td>
            <td style="padding: 10px;"><b>Quantity</b></td>
            <td style="padding: 10px;"><b>Price</b></td>
<!--            <td style="padding: 10px;"><b>Deal</b></td>-->
            <td style="padding: 10px;"><b>Discount</b></td>
            <td style="padding: 10px;"><b>Deal Date</b></td>
        </tr>
        <?php
        $products=DealDB::getProducts();
        foreach($products as $product){
            $id=$product->getID();
            echo "<tr>";
            echo "<td>".$product->getID()."</td>";
            echo "<td><img style='width:100px;height:auto;padding:1px;' src='Layout/".$product->getImage()."' alt='thumbnail' /></td>";

            echo "<td>".$product->getTitle()."</td>";
            echo "<td>".$product->getCategory()."</td>";
            echo "<td>".$product->getQuantity()."</td>";
            echo "<td>".$product->getPrice()."</td>";
//            echo "<td>".$product->getDeal()."</td>";
            echo "<td>".$product->getDiscountAmount()." % </td>";
            echo "<td>".$product->getDealDate()."</td>";
            echo "<td style='padding: 5px'>
        <form action='addDeal.php' method='post' id='deal'>
            <input  type='hidden' name='Id' value="."'$id'"."/>
             <input type='text' name='Discount' style='width:50px;' />%
             <input type='submit' name='Deal' value='Add Deal' class='btn btn-primary' />
         </form>
        </td>";
            echo "</tr>";
        }
        ?>
    </table>

    <div class="container-fluid">
        <div class="row">
            <?php
            require_once("Layout/admin_footer.php");
            ?>
        </div>
    </div>
</div><!-- This closing tag must be at the end of your main content!! -->

