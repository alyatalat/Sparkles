<!--
    Team Echo
    Index.php
    E-store home page
-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Style/echo-index.css">
    <link rel="stylesheet" href="../Style/Feedback.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


    <script src="../Script/index.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
</head>
<body>

<!-- header -->

<div class="header-container">
    <header id="header">
        <div class="header-container">
            <div id="header-logo">
                <a href="../../HomeIndex.php" title="home page"><img class="logo img-responsive" src="../Images/white_logo.png" alt="logo image" /></a>
            </div>

            <div class="currency dropdown menu_icon">
                <a href="" title="Currency" class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">CAD $ <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></a>


                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">CAD $</a></li>
                    <li><a href="#">USD $</a></li>
                </ul>




            </div>


            <div class="shopping_cart menu_icon">
                <a href="" title="View my shopping cart"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>
            </div>

            <div class="top_menu_icon menu_icon">
                <a href="" title="View Today's Deal"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span></a>
            </div>

            <div class="top_menu_icon menu_icon search" id="search">
                <a title="Search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
            </div>

            <div class="top_menu_icon menu_icon">
                <a href="../../CustomerLogin.php" title="Sign in/Join in"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
            </div>

            <div class="top_menu_icon hidden-md hidden-lg menu_icon hamburger" id="hamburger">
                <a style="cursor: pointer" title=""><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></a>

            </div>




            <div class="top_menu hidden-sm hidden-xs">
                <ul class="menu">
                    <li class="top-level-menu-li">
                        <a class="top-level-menu-li-a" href="../../Apparel.php">APPAREL</a>
                    </li>
                    <li class="top-level-menu-li">
                        <a class="top-level-menu-li-a" href="../../jewelry.php">JEWERLY</a>
                    </li>
                    <li class="top-level-menu-li">
                        <a class="top-level-menu-li-a" href="../../shoes.php">SHOES</a>
                    </li>
                    <li class="top-level-menu-li">
                        <a class="top-level-menu-li-a" href="../../sale.php">SALE</a>
                    </li>
                </ul>
            </div>




        </div>
    </header>
</div>



<div id="search_bar_container">
    <form action="" method="post">
        <div class="form-group">
            <input placeholder="Search For ... " type="text" id="searchBox" name="search"  />
            <button type="submit" id="submitSearch" name="submitSearch" class="btn btn-link">
                <img src="../Images/arrow-right.png" alt="submit image" id="arrw" />
            </button>
        </div>
    </form>
</div>


<div id="mobile-menu" class="hidden-md hidden-lg">
    <ul>
        <li><a href="../../apparel.php">APPAREL</a></li>
        <li><a href="../../jewelry.php">JEWERLY</a></li>
        <li><a href="../../shoes.php">SHOES</a></li>
        <li><a href="../../sale.php">SALE</a></li>
    </ul>
</div>
