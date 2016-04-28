
<link rel="stylesheet" type="text/css" href="Layout/Style/admin.css" />

<?php
require_once('Layout/admin_header.php');
require_once 'image_util.php'; // the process_image function
include('../Controller/database.php');
require_once ('../Models/DBObject.php');
$db = Database::getDB();

$tempo = new DBObject();

$categories = $tempo->getCategories($_GET['category']);


?>
<link rel="stylesheet" type="text/css" href="Layout/Style/img_slider_admin.css" />
<script>
    $('#sidebar-first .menu-item').removeClass('selectedItem');
    $('#sidebar-first .imageslider').addClass('selectedItem');
</script>


<?php
$err_msg1 = "";
$err_msg2 = "";
if(isset($_POST['submit'])){

    if(!isset($_FILES['imagefile']) || $_FILES['imagefile']['error'] == UPLOAD_ERR_NO_FILE){
        $err_msg1 = "Image to be uploaded must be chosen";
    }
    else{
        $maxValue = $_POST['maxValue'];

        $sort_order_input = $_POST['sort_order'];

        if($sort_order_input == $maxValue || $sort_order_input == ""){
            $sort_order_input = $maxValue;
        }

        else{

            for($j=1; $j<$maxValue; $j++){
                if($sort_order_input == $j){

                    $query = "UPDATE image_slider
                            SET image_order = CASE image_order ";

                    for($k = $j; $k < $maxValue; $k++){
                        $query .= "WHEN " . $k . " THEN " . ($k+1) . " ";
                    }

                    $query .= " END WHERE image_order IN (";


                    for($p = $j; $p < $maxValue; $p++){

                        if($p == $maxValue-1){
                            $query .= $p . ") && image_category = :category";
                        }
                        else {
                            $query .= $p . ", ";
                        }
                    }



                    $statement = $db -> prepare($query);
                    $statement -> bindValue(':category', $_GET['category']);
                    $statement->execute();
                    $statement->closeCursor();


                    break;
                }
                else{}
            }
        }





        $image_dir = 'Images';

        //getcwd — Gets the current working directory
        $image_dir_path = getcwd() . DIRECTORY_SEPARATOR . $image_dir;

        $action = '';
        if (isset($_POST['action'])) {
            $action = $_POST['action'];
        } else if (isset($_GET['action'])) {
            $action = $_GET['action'];
        }

        switch ($action) {
            case 'upload':
                if (isset($_FILES['imagefile'])) {
                    $filename = $_FILES['imagefile']['name'];
                    if (empty($filename)) {
                        break;
                    }
                    $source = $_FILES['imagefile']['tmp_name'];
                    $target = $image_dir_path . DIRECTORY_SEPARATOR . $filename;
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


        $filepath = $target;


        $tempo->addImage($filepath, $sort_order_input, $_GET['category']);



        ?>
        <script><?php echo("location.href = '"."image_list.php?category=".$_GET['category']."';");?></script>


        <?php
    }
}
?>



<div id="main">
    <h1>Image Slider</h1>

    <div id="seperator"></div>

    <table>

        <form action="" method="post" enctype="multipart/form-data">

            <tr>
                <td colspan="2" class="faq_table_title first_row"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>Add Image to Slider</td>

                <td class="first_row" style="border-bottom: none;"></td>
            </tr>

            <tr>
                <th>Image to be uploaded <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:red;"></span></th>
                <td><input type="file" id="imagefile" name="imagefile" /></td>
                <input type="hidden" name="action" value="upload"/>
                <td class="err_message"><?php echo $err_msg1; ?></td>
            </tr>

            <tr>
                <th>Sort Order</th>
                <td><select name="sort_order">
                        <option selected value="">Select the Sort Order</option>
                        <?php
                        $i = 0;
                        foreach($categories as $category){
                            $i++;
                            ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } $i++; ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    </select></td>
                <input type="hidden" name="maxValue" value="<?php echo $i;?>" />
                <td class="err_message"></td>
            </tr>


            <tr>
                <th></th>
                <td><button type="submit" class="btn btn-default cancel_btn" name="submit">Add</button>
                    <a href="image_list.php?category=<?php echo $_GET['category'];?>" class="btn btn-default cancel_btn">Cancel</a></td>
                <td class="err_message"></td>
            </tr>

        </form>


    </table>

    <h2 class="faq_table_title">Preview</h2>

    <script>
        $(document).ready(function(){

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result);
                        $("#blah").css({"width": "100%", "height": "300px", "margin-bottom":"50px"});
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            $('#imagefile').change(function(){
                readURL(this);
            });
        });
    </script>


    <div id="imageuploaded">
        <img id="blah" src="#" alt="" />
    </div>


</div>

</div>

<?php
require_once('Layout/admin_footer.php');
?>