<?php

require_once('../model/database.php');
require_once('file_util.php');
require_once('image_util.php');
$db = Database::getDB();
$image_dir = '..\Images\Gift_Card';
$image_dir_path = getcwd() . DIRECTORY_SEPARATOR . $image_dir;

$action = '';
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

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


include("../view/admin_header.php");
?>

    <div id="main">

    <div id="heading">
        <h1>Add a Gift Card</h1>
    </div>
    <div id="main">
        <h1>Gift Card Details</h1>
<?php
if(isset($_GET['error']))
{
    $error =$_GET['error'];
    $error ="All fields are required, please fill them all";
    echo $error;
}
?>
<!--        upload the image-->
        <form id="upload_form"
              action="" method="POST"
              enctype="multipart/form-data">
            <input type="hidden" name="action" value="upload"/>
            <br/>
            <input type="file" name="file1"/><br />
            <br/>
            <input id="upload_button" type="submit" value="Upload"/>

        </form>
<!--        form for the gift card-->
<form action="gift_added.php" method="GET">
    <label>Title:</label>
        <input type="input" name="title" />
        <br />
        <label>Description:</label>
        <input type="input" name="description" />
        <br />
        <label>Image Source:</label>
        <input type="input" name="filename" value="<?php if(isset($filename)){echo $filename;} ?>"/>
    <br/>
    <input type="submit" value="Add"/> <br/>
</form>

        <p><a href="Index.php">View Gift Card List</a></p>
    </div>
</div><!-- end page -->
<?php
include("../view/admin_footer.php");
?>
