<?php
require_once('Layout/admin_header.php');
require_once ('../Models/Database.php');
require_once ('../Models/Wishlists.php');
require_once ('../Models/wishlistsDB.php');
require_once ('../Models/wishlistDetailsDB.php');
?>

<link rel="stylesheet" type="text/css" href="Layout/Style/admin.css" />
    <div id="main">
        <h1>Top Five Products pinned to the wishlists by Users</h1>
        <?php
        $results = wishlistsDetailsDB::topProducts();
        $i=1;
        foreach($results as $result)
        {
            while($i<=5)
            {
                $pid = $result["Product_Id"];
                echo "<b>Product Id:</b> ".$pid."<br/>";
                $product = wishlistsDB::getProduct($pid);
                echo "<b>Title:</b> ".$product['title']."<br/>";
                echo "<b>Description:</b> ".$product['description']."<br/>";
                echo "<b>Image:</b> ".$product['image']."<br/>";
                echo "<b>Frequency:</b> ".$result["Frequency"];
                echo "<br/>";
                echo "<br/>";
                $i++;
                break;
            }
        }
        ?>

    <div class="container-fluid">
        <div class="row">
            <?php
            require_once('Layout/admin_footer.php');
            ?>
            </div>
        </div>

    </div> <!-- This closing tag must be at the end of your main content!! -->
