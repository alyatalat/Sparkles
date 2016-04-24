<?php

require_once('../model/database.php');
require_once('file_util.php');
require_once('image_util.php');
$db = Database::getDB();
include("../view/admin_header.php");
?>

    <div id="main">

    <div id="heading">
        <h1>Add a Promo Code</h1>
    </div>
    <div id="main">
        <h1>Promo Code Details</h1>
<?php
if(isset($_GET['error']))
{
    $error =$_GET['error'];
    $error ="All fields are required, please fill them all";
    echo $error;
}
?>
<!--        form for the gift card-->
<form action="pc_added.php" method="GET">
    <label>Code:</label>
        <input type="input" name="code" />
        <br />
        <label>Discount:</label>
        <input type="input" name="discount" />
        <br />

    <br/>
    <input type="submit" value="Add"/> <br/>
</form>

        <p><a href="Index.php">View Promo Code List</a></p>
    </div>
</div><!-- end page -->
<?php
include("../view/admin_footer.php");
?>
