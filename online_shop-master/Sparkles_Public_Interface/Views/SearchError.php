<!-- Author: Sooah Jung -->

<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/Sparkles/online_shop-master';
require_once('../Layout/header.html');
//require($path . "/Soo-Ah_Admin_Features/FAQ/Controller/database.php");
require_once('../Controller/database.php');
?>


<div class="container">

    <div style="padding: 50px 20px; font-size: 16px;">
        <p>Your search <b>"<?php echo $_GET['word'] ?>"</b> did not match any products.</p>
        <br />
        <p>Try something like</p>
        <ul>
            <li>Using more general terms</li>
            <li>Checking your spelling</li>
        </ul>
    </div>
</div>


</div>


<?php
require_once("../Layout/footer.html");
?>
