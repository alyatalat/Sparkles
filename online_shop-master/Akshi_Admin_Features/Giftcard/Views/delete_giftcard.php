<script
    src="https://code.jquery.com/jquery-2.2.2.min.js"
    integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
    crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" href="../View/Layout/Style/admin.css" />
<link rel="stylesheet" href="../../Scripts/Gift_Card.css"/>
<?php
require_once("Layout/admin_header.php");
?>


<?php

$gift_id = $_POST['GiftCard_Id'];

// Delete the product from the database
require_once('../model/database.php');
require_once('../model/giftcard_db.php');
GiftCardDB::deleteGiftCard($gift_id);

echo "The record has been deleted successfully";
?>
<p><a href="admin_index.php">View Gift Card List</a></p>



</div>
<?php
require_once("../Views/Layout/admin_footer.php");
?>

