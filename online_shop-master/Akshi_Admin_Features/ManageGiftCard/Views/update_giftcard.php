<?php session_start();?>
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
require_once('../model/database.php');
require_once 'file_util.php';  // the get_file_list function
require_once 'image_util.php'; // the process_image function
$image_dir = '..\Images\Gift_Card';
$image_dir_path = getcwd() . DIRECTORY_SEPARATOR . $image_dir;

$_SESSION['gift_id']=$_POST['GiftCard_Id'];
$id = $_SESSION['gift_id'];
$db = Database::getDB();
//id card for the gift details
    $id = $_POST['GiftCard_Id'];

    $sql = "SELECT * FROM gift_cards WHERE Gift_Id= '$id'";
    $result = $db->query($sql);
    $gift_detail = $result->fetch();

$action = '';
//action is set
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
//upload the file
switch ($action) {
    case 'upload':
        if (isset($_FILES['file1'])) {
            $filename = $_FILES['file1']['name'];
            if (empty($filename)) {
                break;
            }
            $source = $_FILES['file1']['tmp_name'];
            $target = $image_dir_path . DIRECTORY_SEPARATOR . $filename;

            move_uploaded_file($source, $target);
        }
        break;
    case 'delete':
        $filename = $_GET['filename'];
        $target = $image_dir_path . DIRECTORY_SEPARATOR . $filename;
        if (file_exists($target))
        {
            unlink($target);
        }
        break;
}

$files = get_file_list($image_dir_path);


?>
<div id="main">
    <div id="header">
        <h1>Update a Gift Card</h1>
    </div>

    <div id="main">

        <?php

        $image_src = $gift_detail['Image_src'];
//add slashes to save the file path
        $image_src = addslashes($image_src);
      ?>

            <br />
<!--form to upload the file or change the file-->
        <form id="upload_form"
              action="" method="POST"
              enctype="multipart/form-data">
            <input type="hidden" name="action" value="upload"/>
            <br/>
            <input type="hidden" name="GiftCard_Id" value="<?php echo $id;?>"/>
            <input type="file" name="file1"/><br />
            <br/>
            <input id="upload_button" type="submit" value="Upload"/>
<!--description of the gift card-->
        </form>
            <form method="post" action="gift_updated.php">
            <input type="hidden" name="GiftCard_Id" value="<?php echo $id;?>"/>
            <label>Title:</label>
            <input type="input" name="title" value="<?php echo $gift_detail['Title'];?>" />
            <br />

            <label>Description:</label>
            <input type="input" name="description" value="<?php echo $gift_detail['Description'];?>"/>
            <br />

            <label>Image Source:</label>
            <br />
            <?php if (isset($filename))
            {
                $image_src= $filename;
            }

            ?>

            <input type="input" name="image_src" value="<?php echo $image_src; ?>"/>
            <br/>
            <input type="submit" value="Update" name="Update">
        </form>
        <p><a href="Index.php">View Gift Card List</a></p>
    </div>


</div>
<?php
require_once("Layout/admin_footer.php");
?>