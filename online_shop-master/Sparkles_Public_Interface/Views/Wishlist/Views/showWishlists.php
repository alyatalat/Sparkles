<div class="container-fluid">
    <div class="row">
        <?php
        require_once("../Layout/header.html");
        ?>
    </div>
</div>
<div class="container">
<?php
require_once('../Models/Database.php');
require_once('../Models/Wishlists.php');
require_once('../Models/wishlistsDB.php');
require_once ('../Models/wishlistDetailsDB.php');
$db = Database::getDB();
$cid = $_POST['customerId'];
echo "<h1 style='text-align: center;'><b>Wishlists you created:</b></h1>";
$wishlists = wishlistsDB::getWishlistsByCustomer($cid);
foreach($wishlists as $wishlist)
{
    echo "<hr/><br/><div>";
    $wid = $wishlist->getWishlistId();
   // echo $wid;
    echo "<b>Wishlist name:</b>&nbsp; ";
    echo $wishlist->getWishlistName();
    echo "<br/><b>Description you added:</b>&nbsp;";
    echo $wishlist->getWishlistNote();
    echo "<br/><b>Created on:</b>&nbsp;";
    echo $wishlist->getWishlistDate();
    echo "<br/><br/>";
    $products = wishlistsDetailsDB::showProducts($wid);
    $i=0;
    foreach($products as $product)
    {
        echo "<div style='clear: left;'>";
        $pid = $product['Product_Id'];
        $img = $product['Image'];
        echo "<img src='$img' style='width: 200px; height: auto;border: 0px solid black;float: left;margin-right: 10px;'/>";
        echo "<b>Product Id: </b>&nbsp;".$product['Product_Id']."<br/>";
        echo "<b>Product Title:</b>&nbsp; ".$product['Product_Title']."<br/>";
        echo "<b>Product Description:</b>&nbsp; ".$product['Product_Description']."<br/>";
        echo "<input type='submit' name='removeProduct' class='btn btn-default' value='Delete this item from the wishlist' onclick=\"removeProduct($pid,$wid); \"/>";
        echo "<br/><br/>";

        $i++;
        echo "</div>";
    }
    echo "<input type='submit' name='editWishlist' value='Rename Wishlist' class='btn btn-default' onclick=\"editWishlist($wid); \"/>";
    echo "<input type='submit' name='deleteWishlist' value='Delete Wishlist' class='btn btn-default' onclick=\"delWishlist($wid);\" />";
    echo "<input type='hidden' name='wishlistId' value='<?php echo $wid; ?>' />";
    echo "</div><br/>";
}
?>
</div>
<html>
<head>
    <title>Sparkles</title>
    <script type="text/javascript">
        function removeProduct(proid,wishid)
        {
            //  alert(proid+" "+wishid);
            var ans = confirm('Are you sure you want to remove this product from wishlist?');
            if(ans) {
                var x = new XMLHttpRequest();
                var url = "removeProductFromWishlist.php";
                var p = proid;
                var w = wishid;
                var vars = "prod=" + p + "&wishid=" + w;
                x.open("POST", url, true);
                x.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                x.onreadystatechange = function () {
                    if (x.readyState == 4 && x.status == 200) {
                        var return_data = x.responseText;
                        alert(return_data);
                        location.reload();
                    }
                }
                x.send(vars);
                alert("processing...");
            }
            else
            {
                alert("Thank You!");
            }
        }
        function delWishlist(wid)
        {
            var answer = confirm('Are you sure you want to delete this?');
            if (answer)
            {
                var x = new XMLHttpRequest();
                var url="deleteWishlist.php";
                var a=wid;
                var vars="choice="+a;
               // alert(vars);
                x.open("POST",url,true);
                x.setRequestHeader("content-type","application/x-www-form-urlencoded");
                x.onreadystatechange = function () {
                    if(x.readyState == 4 && x.status == 200){
                        var return_data = x.responseText;
                        alert(return_data);
                        location.reload();
                    }
                }
                x.send(vars);
                alert("processing...");
            }
            else
            {
                alert('Thank You!');
            }

        }
        function editWishlist(wishlistId)
        {
            var name = prompt("Enter Name for your wishlist");
            if(name === "")
            {
                alert("Please enter a valid name");
            }
            else if(name != "")
            {
                var alphaExp = /^[\w ]+$/;
                if(name.match(alphaExp)){
                    var x = new XMLHttpRequest();
                    var url="renameWishlist.php";
                    var a=wishlistId;
                    var vars="choice="+a+"&wname="+name;
                  // alert(vars);
                    x.open("POST",url,true);
                    x.setRequestHeader("content-type","application/x-www-form-urlencoded");
                    x.onreadystatechange = function () {
                        if(x.readyState == 4 && x.status == 200){
                            var return_data = x.responseText;
                            alert(return_data);
                            location.reload();
                        }
                    }
                    x.send(vars);
                    alert("processing...");
                 }
                else
                {
                alert("Please enter a valid name for your wishlist");
                }
            }
        }
    </script>

</head>

<body>
<div id="status" class="container"></div>
</body>
<div class="container-fluid">
    <div class="row">
        <?php
        require_once("../Layout/footer.html");
        ?>
    </div>
</div>
</html>


