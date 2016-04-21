<!doctype html>
<html lang="en">

<!-- the head section -->
<head>
    <title>Sparkles Online Shop</title>
    <link rel="stylesheet" type="text/css" href="../Style/main.css" />
</head>

<!-- the body section -->
<body>
<div id="page">
    <div id="header">
        <h1>Sparkles Online Shop</h1>
    </div>

    <div id="main">
        <h2 class="top">Error</h2>
        <p><?php echo $error; ?></p>
        <p><a href="../Views/display_product.php">Back to Index</a></p>
    </div>

    <div id="footer">
        <p class="copyright">
            &copy; <?php echo date("Y"); ?> Sparkles Online Shop
        </p>
    </div>

</div><!-- end page -->
</body>
</html>