<script
    src="https://code.jquery.com/jquery-2.2.2.min.js"
    integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
    crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" href="Layout/Style/admin.css" />
<link rel="stylesheet" href="../Scripts/Gift_Card.css"/>
<?php
require_once("Layout/admin_header.php");
?>

<?php
require_once('../model/database.php');
require_once('../model/promocode_db.php');
$db = Database::getDB();

?>

    <div id="main">

    <div id="heading">
        <h1>Add a Promo Code</h1>
    </div>
    <div id="main">
        <h1>Promo Code Details</h1>
<!--        form for the gift card-->
<form action="pc_added.php" method="GET">
    <label>Code:</label>
        <input type="input" name="Code" />
        <br />
        <label>Expiry Date:</label>
        <input type="input" name="Exp_Date" />
        <br />
    <label>Amount:</label>
    <input type="input" name="Amount" />
    <br />

    <br/>
    <input type="submit" value="Add"/> <br/>
</form>

        <p><a href="admin_index.php">View Promo Code List</a></p>
    </div>
</div><!-- end page -->
<?php
require_once("Layout/admin_footer.php");
?>