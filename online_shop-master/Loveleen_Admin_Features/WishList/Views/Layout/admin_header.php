<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Sparkles Administration</title>

    <script
        src="https://code.jquery.com/jquery-2.2.2.min.js"
        integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
        crossorigin="anonymous"></script>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <link rel="stylesheet" href="Style/admin.css" />




</head>
<body>


<!-- header -->
<div id="header">
    <div class="logo">
        <a href=""><img src="../Views/Layout/Images/black_logo.png" alt="logo image" /></a>
        <span id="adminNote">Sparkles Admin</span>
    </div>

    <div class="iconsInHeader">
        <button type="button" id="testBtn1" title="profile">
            profile
        </button>|&nbsp;
        <button type="button" title="logout">
            logout
        </button>
    </div>
</div>



<div id="page-container">


    <!-- left sidebar -->
    <div id="sidebar-first">

        <ul class="menu">
            <li class="menu-item products" id="first-item">
                <a href="../../../Alya%20Admin%20Features/ProductInventory/Views/admin_index.php" class="link"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                    <span class="admin_list">Products</span></a>

                <div class="mobile_menu">
                    <a href="../../../Alya%20Admin%20Features/ProductInventory/Views/admin_index.php">Products</a>
                </div>

            </li>
            <li class="menu-item customers">
                <a href="../../../Alya%20Admin%20Features/CustomerLogin/Views/admin_index.php" class="link"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    <span class="admin_list">Customers</span></a>

                <div class="mobile_menu">
                    <a href="../../../Alya%20Admin%20Features/CustomerLogin/Views/admin_index.php">Customers</a>
                </div>

            </li>
            <li class="menu-item todaysdeal">
                <a href="../../../Fatemeh_Admin_Features/TodaysDeal/Views/admin_index.php" class="link"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
                    <span class="admin_list">Today's Deal</span></a>

                <div class="mobile_menu">
                    <a href="../../../Fatemeh_Admin_Features/TodaysDeal/Views/admin_index.php">Today's Deal</a>
                </div>
            </li>
            <li class="menu-item faq">
                <a href="../../../Soo-Ah_Admin_Features/FAQ/Views/faq_admin.php" class="link"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
                    <span class="admin_list">FAQ</span></a>
                <div class="mobile_menu">
                    <a href="../../../Soo-Ah_Admin_Features/FAQ/Views/faq_admin.php">FAQ</a>
                </div>

            </li>
            <li class="menu-item newsletter">
                <a href="../../../Fatemeh_Admin_Features/Newsletter/Views/admin_index.php" class="link"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                    <span class="admin_list">Newsletter</span></a>
                <div class="mobile_menu">
                    <a href="../../../Fatemeh_Admin_Features/Newsletter/Views/admin_index.php">Newsletter</a>
                </div>

            </li>
            <li class="menu-item testimonials">
                <a href="../../../Fatemeh_Admin_Features/Livechat/Views/admin_index.php" class="link"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                    <span class="admin_list">Livechat</span></a>
                <div class="mobile_menu">
                    <a href="../../../Fatemeh_Admin_Features/Livechat/Views/admin_index.php">Livechat</a>
                </div>
            </li>
            <li class="menu-item wishlist selectedItem">
                <a href="../../../Loveleen_Admin_Features/WishList/Views/admin_index.php" class="link"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>
                    <span class="admin_list">Wish List</span></a>

                <div class="mobile_menu">
                    <a href="../../../Loveleen_Admin_Features/WishList/Views/admin_index.php">Wish List</a>
                </div>

            </li>
            <li class="menu-item ratings">
                <a href="../../../Loveleen_Admin_Features/Ratings/Views/admin_index.php" class="link"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    <span class="admin_list">Ratings</span></a>

                <div class="mobile_menu">
                    <a href="../../../Loveleen_Admin_Features/Ratings/Views/admin_index.php">Ratings</a>
                </div>

            </li>
            <li class="menu-item currency">
                <a href="../../../Loveleen_Admin_Features/Currency/Views/admin_index.php" class="link"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                    <span class="admin_list">Currency</span></a>

                <div class="mobile_menu">
                    <a href="../../../Loveleen_Admin_Features/Currency/Views/admin_index.php">Currency</a>
                </div>

            </li>
            <li class="menu-item imageslider">
                <a href="../../../Soo-Ah_Admin_Features/ImageSlider/Views/image_admin.php" class="link"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                    <span class="admin_list">Image Slider</span></a>

                <div class="mobile_menu">
                    <a href="../../../Soo-Ah_Admin_Features/ImageSlider/Views/image_admin.php">Image Slider</a>
                </div>

            </li>
            <li class="menu-item feedback">
                <a href="../../../Alya%20Admin%20Features/Feedback/Views/admin_index.php" class="link"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    <span class="admin_list">Feedback</span></a>

                <div class="mobile_menu">
                    <a href="../../../Alya%20Admin%20Features/Feedback/Views/admin_index.php">Feedback</a>
                </div>

            </li>
            <li class="menu-item promo ">
                <a href="../../../Akshi_Admin_Features/Promo/Views/admin_index.php" class="link"><span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
                    <span class="admin_list">Promo Card</span></a>

                <div class="mobile_menu">
                    <a href="../../../Akshi_Admin_Features/Promo/Views/admin_index.php">Promo Card</a>
                </div>

            </li>
            <li class="menu-item shopping">
                <a href="../../../Akshi_Admin_Features/ShoppingCart/Views/admin_index.php" class="link"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                    <span class="admin_list">Shopping Cart</span></a>

                <div class="mobile_menu">
                    <a href="../../../Akshi_Admin_Features/ShoppingCart/Views/admin_index.php">Shopping Cart</a>
                </div>

            </li>
            <li class="menu-item giftcard">
                <a href="../../../Akshi_Admin_Features/Giftcard/Views/admin_index.php" class="link"><span class="glyphicon glyphicon-gift" aria-hidden="true"></span>
                    <span class="admin_list">Giftcard</span></a>

                <div class="mobile_menu">
                    <a href="../../../Akshi_Admin_Features/Giftcard/Views/admin_index.php">Giftcard</a>
                </div>

            </li>


        </ul>

    </div>