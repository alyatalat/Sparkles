<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include('../view/admin_header.php');
require_once('../model/database.php');
require_once 'file_util.php';  // the get_file_list function
require_once 'image_util.php'; // the process_image function

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
        var_dump($action);
        var_dump($_FILES['file1']);
        if (isset($_FILES['file1'])) {
            $filename = $_FILES['file1']['name'];
            if (empty($filename)) {
                break;
            }
            $source = $_FILES['file1']['tmp_name'];
            $target = $image_dir_path . DIRECTORY_SEPARATOR . $filename;
            var_dump($target);
           move_uploaded_file($source, $target);

        }
        break;
    case 'delete':
        $filename = $_GET['filename'];
        $target = $image_dir_path . DIRECTORY_SEPARATOR . $filename;
        if (file_exists($target)) {
            unlink($target);
        }
        break;
}

$files = get_file_list($image_dir_path);



?>
<head>
    <title>Add Gift Card</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Scripts/Gift_Card.css">

</head>

<body>
<div id="page-wrapper">
    <div id="heading">
        <h1>Add a Gift Card</h1>
    </div>

    <div id="main">
        <h1>Gift Card Details</h1>

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
    <input type="submit" value="Add"/>
        <br/>
</form>



        <form id="upload_form"
              action="" method="POST"
              enctype="multipart/form-data">


            <input type="hidden" name="action" value="upload"/>
            <br/>
            <input type="file" name="file1"/><br />
            <br/>
            <input id="upload_button" type="submit" value="Upload"/>

        </form>
        <a href="gift_added.php">Upload</a>


        <p><a href="Index.php">View Gift Card List</a></p>
    </div>


</div><!-- end page -->
</body>
</html>