<?php

$gift_id = $_POST['GiftSent_Id'];

// Delete the product from the database
require_once('../model/database.php');
require_once('../model/giftcardorder_db.php');
GiftCardOrderDB::deleteGiftOrder($gift_id);

header('location: Index.php');
?>

</div>
<?php
require_once("../View/Layout/admin_footer.php");
?>
