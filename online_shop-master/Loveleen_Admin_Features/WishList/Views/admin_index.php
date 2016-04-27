<?php
require_once ('../Models/Database.php');
require_once ('../Models/Wishlists.php');
require_once ('../Models/wishlistsDB.php');
require_once ('../Models/wishlistDetailsDB.php');
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
    <h1>Top Five Products pinned to the wishlists by Users</h1>
    <?php
    $results = wishlistsDetailsDB::topProducts();
    $i=1;
    foreach($results as $result)
    {
        while($i<=5)
        {
            echo "<div style='clear:left;'>";
            $pid = $result["Product_Id"];
            $product = wishlistsDB::getProduct($pid);

            $img = "Layout/".$product['image'];
            echo "<img src='$img' style='width: 200px; height: auto;border: 0px solid black;float: left;margin-right: 20px;'/>";
            echo "<div>";
            echo "<b>Product Id:</b> ".$pid."<br/>";

            echo "<b>Title:</b> ".$product['title']."<br/>";
            echo "<b>Description:</b> ".$product['description']."<br/>";

            echo "<b>Frequency:</b> ".$result["Frequency"];
            echo "</div>";
            echo "<br/>";
            echo "<br/>";
            $i++;
            echo "</div>";
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

