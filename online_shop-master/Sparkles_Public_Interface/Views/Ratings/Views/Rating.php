<?php
require_once('../Models/Database.php');
require_once('../Models/Products.php');
require_once('../Models/RatingDB.php');

$db = Database::getDB();
if(isset($_GET['id']))
{
    $id =(int)$_GET['id'];
    $product = RatingDB::getProduct($id);
}
?>
<?php
require_once 'addRating.php';
?>

<!doctype html>
<html>
<head>
    <title>Rating System Page</title>

    <script type="text/javascript">
        function ratings(elem)
        {
            var x = new XMLHttpRequest();
            var url="addRating.php";
            var id = '<?php echo $id; ?>';
            var a=document.getElementById(elem).value;
            var vars="choice="+a+"&id="+id;
            x.open("POST",url,true);
            x.setRequestHeader("content-type","application/x-www-form-urlencoded");
            x.onreadystatechange = function () {
                if(x.readyState == 4 && x.status == 200){
                    var return_data = x.responseText;
                  //alert(return_data);
                    document.getElementById("status").innerHTML=return_data;
                    //do average here
                }
            }
            x.send(vars);
            document.getElementById("status").innerHTML="processing...";
        }

    </script>
</head>
<body>
<!--Header-->
<div class="container-fluid">
    <div class="row">
        <?php
        require_once ('../Layout/header.html');
        ?>
    </div>
</div>
<!--Header Ends-->
<!--Main Body-->
<div class="container-fluid">
    <div class="row header-image">
        <h2 class="category-title"> Shop Apparel </h2>
    </div>
</div>
<div id="wrapper" class="container-fluid">
    <div class="row">
        <div id="sidebar-wrapper" class="col-md-3 col-sm-4">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Categories
                    </a>
                </li>
                <li>
                    <a href="#">Today's Deals</a>
                </li>
                <li>
                    <a href="#">Sort Products</a>
                </li>
                <li>
                    <a href="#">My Gift Cards</a>
                </li>
                <li>
                    <a href="#">My WishList</a>
                </li>
                <li>
                    <a href="#">Sale</a>
                </li>
                <li>
                    <a href="#">Feedback</a>
                </li>
            </ul>
        </div>
        <div id="page-content-wrapper" class="col-md-9 col-sm-8 col-xs-12">
            <div class="container-fluid">
                <div class="row">
                    <div class="nav">
                        <ul class="breadcrumb">
                            <li><a href="../homepage.php">Home</a></li>
                            <li><a href="../../Apparel.php">Apparel</a></li>
                            <li class="active">Rate</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="products">
                        <?php echo '<img src="../'. $product->getImage() .'" alt="product image" width="150" height="150 style=\"align=left \""/>'; ?>
                        <div class="product-info" style="padding-left: 50px;">
                            Title: <?php echo $product->getTitle(); ?> <br>
                            Description:<?php echo $product->getDescription();?>
                            <div class="product-rating">Average rating: <?php
                                $rate = RatingDB::getAverage($id);
                              //  $avg= round($rate['rate'],2);
                                $avg= round($rate['rate']);
                                echo $avg."/5 stars \t";
                                if($avg == 0)
                                {
                                    echo "<img id='myStars' src=\"Images/starsNorm.png\" alt=\"stars\" height='30px' width='auto'>";
                                }
                                if($avg == 1)
                                {
                                    echo "<img id='myStars' src=\"Images/1lit.png\" alt=\"stars\" height='30px' width='auto'>";
                                }
                                if($avg == 2)
                                {
                                    echo "<img id='myStars' src=\"Images/2lit.png\" alt=\"stars\" height='30px' width='auto'>";
                                }
                                if($avg == 3)
                                {
                                    echo "<img id='myStars' src=\"Images/3lit.png\" alt=\"stars\" height='30px' width='auto'>";
                                }if($avg == 4)
                                {
                                    echo "<img id='myStars' src=\"Images/4lit.png\" alt=\"stars\" height='30px' width='auto'>";
                                }
                                if($avg == 5)
                                {
                                    echo "<img id='myStars' src=\"Images/5lit.png\" alt=\"stars\" height='30px' width='auto'>";
                                }

                                $count = RatingDB::getcount($id);
                                if($avg == 0)
                                    $rating = "This article has not been rated yet. You can be the first to pass judgement";
                                else if($count == 1)
                                    $rating = "This article has been rated by $count person";
                                else if($count>1)
                                {
                                    $rating = "This article has been rated by $count people";
                                }
                                else
                                {
                                    $rating = "Sorry, There is an error in the system. Please refresh the page";
                                }
                                ?></div>
                            <div id="Ratings">
                                <strong>Rate this product</strong><br>
                                On a scale of 1 to 5, 1 means bad and 5 means excellent <br><br>

                                <input type="image" id="star1" class="stars" src="Images/starNorm.png" value="1" onclick="ratings('1');" onmouseover="starslit(this.id)" onmouseout="starsdim(this.id)">
                                <input type="hidden" name="choice" id="1" value="1">
                                <input type="image" id="star2" class="stars" src="Images/starNorm.png" value="2" onclick="ratings('2');" onmouseover="starslit(this.id)" onmouseout="starsdim(this.id)">
                                <input type="hidden" name="choice" id="2" value="2">
                                <input type="image" id="star3" class="stars" src="Images/starNorm.png" value="3" onclick="ratings('3');" onmouseover="starslit(this.id)" onmouseout="starsdim(this.id)">
                                <input type="hidden" name="choice" id="3" value="3">
                                <input type="image" id="star4" class="stars" src="Images/starNorm.png" value="4" onclick="ratings('4');" onmouseover="starslit(this.id)" onmouseout="starsdim(this.id)">
                                <input type="hidden" name="choice" id="4" value="4">
                                <input type="image" id="star5" class="stars" src="Images/starNorm.png" value="5" onclick="ratings('5');" onmouseover="starslit(this.id)" onmouseout="starsdim(this.id)">
                                <input type="hidden" name="choice" id="5" value="5">
                                <input type="hidden" name="productId" value="<?php echo $_GET['id']; ?>">
                                <br/>
                                <br/>
                                <strong><?php echo $rating;?></strong>
                                <div id="status"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function starslit(x)
        {
            var star1 = document.getElementById("star1");
            var star2 = document.getElementById("star2");
            var star3 = document.getElementById("star3");
            var star4 = document.getElementById("star4");
            var star5 = document.getElementById("star5");
            if(x === star1.id)
            {
                star1.src = 'Images/starOver.png';
            }
            else if(x === star2.id)
            {
                star1.src = 'Images/starOver.png';
                star2.src = 'Images/starOver.png';
            }
            else if(x === star3.id)
            {
                star1.src = 'Images/starOver.png';
                star2.src = 'Images/starOver.png';
                star3.src = 'Images/starOver.png';
            }
            else if(x === star4.id)
            {
                star1.src = 'Images/starOver.png';
                star2.src = 'Images/starOver.png';
                star3.src = 'Images/starOver.png';
                star4.src = 'Images/starOver.png';
            }
            else if(x === star5.id)
            {
                star1.src = 'Images/starOver.png';
                star2.src = 'Images/starOver.png';
                star3.src = 'Images/starOver.png';
                star4.src = 'Images/starOver.png';
                star5.src = 'Images/starOver.png';
            }
        }
        function starsdim(x)
        {
            var star1 = document.getElementById("star1");
            var star2 = document.getElementById("star2");
            var star3 = document.getElementById("star3");
            var star4 = document.getElementById("star4");
            var star5 = document.getElementById("star5");
            if(x === star1.id)
            {
                star1.src = 'Images/starNorm.png';
            }
            else if(x === star2.id)
            {
                star1.src = 'Images/starNorm.png';
                star2.src ='Images/starNorm.png';
            }
            else if(x === star3.id)
            {
                star1.src = 'Images/starNorm.png';
                star2.src = 'Images/starNorm.png';
                star3.src = 'Images/starNorm.png';
            }
            else if(x === star4.id)
            {
                star1.src = 'Images/starNorm.png';
                star2.src = 'Images/starNorm.png';
                star3.src = 'Images/starNorm.png';
                star4.src = 'Images/starNorm.png';
            }
            else if(x === star5.id)
            {
                star1.src = 'Images/starNorm.png';
                star2.src = 'Images/starNorm.png';
                star3.src = 'Images/starNorm.png';
                star4.src = 'Images/starNorm.png';
                star5.src = 'Images/starNorm.png';
            }
        }
    </script>
    <!--Main Body Ends-->
    <!--Footer-->
    <div class="container-fluid">
        <div class="row">
            <?php
            require_once ('../Layout/footer.html');
            ?>
        </div>
    </div>
</body>
</html>
<!--Footer Ends-->
