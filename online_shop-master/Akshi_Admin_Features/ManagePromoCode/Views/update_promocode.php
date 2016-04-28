session_start();
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

$_SESSION['Promocode_id']=$_POST['Promocode_id'];
$id = $_SESSION['Promocode_id'];
$db = Database::getDB();
//id card for the gift details
    $id = $_POST['Promocode_id'];

    $sql = "SELECT * FROM promo_code WHERE Promocode_id = '$id'";
    $result = $db->query($sql);
    $pc_detail = $result->fetch();
?>
<div id="main">
    <div id="header">
        <h1>Update a Promo Code</h1>
    </div>

    <div id="main">

        </form>
            <form method="post" action="pc_updated.php">
            <input type="hidden" name="Promocode_id" value="<?php echo $id;?>"/>
            <label>Code:</label>
            <input type="input" name="Code" value="<?php echo $pc_detail['Code'];?>" />
            <br />

            <label>Expiry Date:</label>
            <input type="input" name="Exp_Date" value="<?php echo $pc_detail['Exp_Date'];?>"/>
            <br />

                <label>Amount:</label>
                <input type="input" name="Amount" value="<?php echo $pc_detail['Amount'];?>" />
                <br />


                <input type="submit" value="Update" name="Update">
        </form>
        <p><a href="Index.php">View Promo Code List</a></p>
    </div>


</div><!-- end page -->
<?php
require_once("Layout/admin_footer.php");
?>