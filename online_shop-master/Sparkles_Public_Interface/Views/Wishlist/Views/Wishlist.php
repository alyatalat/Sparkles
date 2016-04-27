<?php
require_once('../Models/Database.php');
require_once('../Models/Wishlists.php');
require_once('../Models/wishlistsDB.php');
require_once ('../Models/wishlistDetailsDB.php');
$db = Database::getDB();
//Get the product id selected
if(isset($_GET['id']))
{
    $id =(int)$_GET['id'];
}
$product[] = wishlistsDB::getProduct($id);

session_start();
require_once("../../Customerlogin/Models/customer.php");
$auth_user = new customer();
if(isset($_SESSION['user_session'])) {

    $user_id = $_SESSION['user_session'];
    $stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
    $stmt->execute(array(":user_id" => $user_id));
    $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
    var_dump("user exists". $user_id );
}
else{
    var_dump("error");
}

?>
<div class="container-fluid">
    <div class="row">
        <?php
        require_once("../Layout/header.html");
        ?>
    </div>
</div>
<!DOCTYPE html>
<html>
<head>
    <title>Sparkles</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script>
        $(document).ready(function(){

            $('#form1').hide();

        });
    </script>

</head>
<body>
<div class="container">
<!-- Display the selected product's details -->
<div id="product-selected" style="float: left;margin-right: 30px;">
    <img src="<?php echo $product[0]['image'] ?>" style="width: 350px; height: auto;"/>
    <h3><?php echo $product[0]['title']; ?></h3>
    <h5><?php echo $product[0]['description']; ?></h5>
</div>
<!-- Display the wishlists owned by that customer-->
<!-- change the customer id here -->
<div id="wishlists-selected">
    <?php
    $id =(int)$_GET['id'];
    $cid=1;
    checkProduct($id,$cid);
    displayWishLists();
    ?>
</div>
<!-- Form the new create wishlist -->
<form action="addList.php" method="post" name="form1" id="form1">

    <label>Enter Name for your wishlist:</label>
    <input type="text" name="wishlistName" value=""/>

    <label>Enter Description:</label>
    <input type="text" name="wishlistDesc" value=""/>
    <input type="submit" name="btnSubmit" class="btn btn-default" value="Add New Wishlist"/>
    <input type="hidden" name="productId" value="<?php echo $id; ?>"/>

</form>

<br/>
<div id="showAll">
    <form action="showWishlists.php" method="post">
        <input type="submit" name="btnShowAll" class="btn btn-default" value="Show All Wishlists"/>
        <input type="hidden" name="customerId" value="<?php echo $cid; ?>"/>
    </form>
</div>
    <div id="status" style="font-size: 16px;color: red;text-align: center;"></div><br/>
</div>
</body>


<script type="text/javascript">
    function addtoList(wid)
    {
        var x = new XMLHttpRequest();
        var url="addItem.php";
        var id = '<?php echo $id; ?>';
        var a=wid;
        var vars="choice="+a+"&id="+id;
        x.open("POST",url,true);
        x.setRequestHeader("content-type","application/x-www-form-urlencoded");
        x.onreadystatechange = function () {
            if(x.readyState == 4 && x.status == 200){
                var return_data = x.responseText;
               alert(return_data);
                document.getElementById("status").innerHTML=return_data;
            }
        }
        x.send(vars);
        document.getElementById("status").innerHTML="processing...";
    }
    function newList()
    {
        $('#form1').show();
    }
</script>
</html>


<?php
function checkProduct($id,$cid)
{
    $results = wishlistsDetailsDB::checkWishlist($cid);
    // var_dump($results);
    echo "<br/>";
    foreach($results as $result)
    {
        if($result['Product_Id'] == $id)
        {
            echo "Psst!! Looks like you already <span style='color: red;'>saved this item</span>";
            break;
        }

    }
}
function displayWishLists()
{
    // change the customer value here
    $customerId = 1;
    $wishlists = wishlistsDB::getWishlistsByCustomer($customerId);
    foreach ($wishlists as $wishlist) {
        $wid= $wishlist->getWishlistId();

        $wname = $wishlist->getWishlistName();

        echo "<div id='wishlistName'>";
        echo $wname;
        echo "</div>";
        echo "<input type='submit' class='btn btn-default' value='Add to Wishlist' name='pushToList' id='pushToList' onclick=\"addtoList('$wid');\" />";
        echo "<br/><br/>";
    }
    echo "<input type='submit' name='newWishlist' class='btn btn-default' value='Create new Wishlist' onclick=\"newList();\"/>";

}
?>
<div class="container-fluid">
    <div class="row">
        <?php
        require_once("../Layout/footer.html");
        ?>
    </div>
</div>
