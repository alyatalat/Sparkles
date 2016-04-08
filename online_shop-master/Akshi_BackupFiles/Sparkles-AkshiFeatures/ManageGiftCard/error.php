<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- the head section -->
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Scripts/Gift_Card.css">


</head>

<!-- the body section -->
<body>
    <div id="page">
        <div id="header">
            <h1> Manage Gift Card</h1>
        </div>

        <div id="main">
            <h2 class="top">Error</h2>
            <p><?php echo $error; ?></p>
        </div>

        <div id="footer">
            <p class="copyright">
                &copy; <?php echo date("Y"); ?> Sparkles Shop, Inc.
            </p>
        </div>

    </div><!-- end page -->
    <?php include ('../View/footer.php');?>
</body>
</html>