<div class="container-fluid">
    <div class="row">
        <?php
        require_once("../Layout/header.html");
        ?>
    </div>
</div>
<?php
require_once('../Models/Database.php');
require_once('../Models/Wishlists.php');
require_once('../Models/wishlistsDB.php');
require_once ('../Models/wishlistDetailsDB.php');
$db = Database::getDB();
$cid = $_POST['customerId'];
echo "<b>Wishlists you created:</b><br>";
$wishlists = wishlistsDB::getWishlistsByCustomer($cid);
foreach($wishlists as $wishlist)
{
    echo "<hr/><br/>";
    $wid = $wishlist->getWishlistId();
    echo $wid;
    echo "Wishlist name: ";
    echo $wishlist->getWishlistName();
    echo "<br/>Description you added:";
    echo $wishlist->getWishlistNote();
    echo "<br/>Created on:";
    echo $wishlist->getWishlistDate();
    echo "<br/><br/>";
    $products = wishlistsDetailsDB::showProducts($wid);
    //var_dump($stmt);
    $i=0;
    foreach($products as $product)
    {
        $pid = $product['Product_Id'];
        echo "Product Id: ".$product['Product_Id']."<br/>";
        echo "Product Title: ".$product['Product_Title']."<br/>";
        echo "Product Description: ".$product['Product_Description']."<br/>";
      echo "<img src=\"<?php echo $product[$i]['Image'] ?>\" style=\"width: 50px; height: auto;border: 1px solid black;\"/>";
        echo "<input type='submit' name='removeProduct' value='Delete from the wishlist' onclick=\"removeProduct($pid,$wid); \"/>";
        echo "<br/>";

        $i++;
    }
    echo "<input type='submit' name='editWishlist' value='Rename Wishlist' onclick=\"editWishlist($wid); \"/>";
    echo "<input type='submit' name='deleteWishlist' value='Delete Wishlist' onclick=\"delWishlist($wid);\" />";
    echo "<input type='hidden' name='wishlistId' value='<?php echo $wid; ?>' />";
}
?>

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
<div id="status"></div>
</body>
<div class="container-fluid">
    <div class="row">
        <?php
        require_once("../Layout/footer.html");
        ?>
    </div>
</div>
</html>


