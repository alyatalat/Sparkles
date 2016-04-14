<!--
This is the Index Page of the Sparkles Online Shop Project
Author: Alya Talat
-->
<?php
    require_once("../Layout/header.html"); // header layout
?>
<!-- main -->
<div class="container-fluid">
    <div class="row" id="imgSlider">
        <div id="part1" class="col-md-3 col-sm-6 col-xs-12">
            <div class = "title1">
                <h2 id="apparel-title"> <a href="Apparel.php">APPAREL</a> </h2>
            </div>
        </div>
        <div id="part2" class="col-md-3 col-sm-6 col-xs-12">
            <div class = "title1">
                <h2 id="accessories-title"> <a href="Jewelry.php">Jewelry</a> </h2>
            </div>
        </div>
        <div id="part3" class="col-md-3 col-sm-6 col-xs-12">
            <div class = "title1">
                <h2 id="shoes-title"> <a href="Shoes.php">Shoes</a> </h2>
            </div>
        </div>
        <div id="part4" class="col-md-3 col-sm-6 col-xs-12">
            <div class = "title1">
                <h2 id="sale-title"> <a href="sale.php">Sale</a> </h2>
            </div>
        </div>
    </div>
</div>
<?php
    require_once("../Layout/footer.html"); // footer layout
?>
