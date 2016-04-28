<script
    src="https://code.jquery.com/jquery-2.2.2.min.js"
    integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
    crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" href="Layout/Style/admin.css" />
<?php
require_once("Layout/admin_header.php");
include('../Controller/database.php');
require_once ('../Models/DBObject.php');
$db = Database::getDB();

$tempo = new DBObject();

$categories = $tempo->getCategories($_GET['category'])


?>

<link rel="stylesheet" type="text/css" href="Layout/Style/img_slider_admin.css" />
<div id="main">
    <h1>Image Slider</h1>
    <div id="seperator"></div>

    <table>
        <tr>
            <td colspan="2" class="faq_table_title first_row"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>Image List For <?php echo $_GET['category']; ?></td>
            <td class="first_row faq_link"><a id="checknum" href="add_image.php?category=<?php echo $_GET['category'];?>">[Add New Image]</a>&nbsp;&nbsp;&nbsp;<a href="image_admin.php">[Back to List]</a></td>
        </tr>

        <tr>
            <th>Images</th>
            <th>Sort Order</th>
            <th>Action</th>
        </tr>

        <?php foreach($categories as $category){ ?>
            <tr>
                <td>
                    <?php
                    $pos = strpos($category['image_file'], "Images");
                    $pos = substr($category['image_file'], $pos+7);
                     ?>
                    <img style="width:100%;" height="80" src="Images/<?php echo $pos; ?>" />
                </td>
                <td><?php echo $category['image_order']; ?></td>
                <td><a href="edit_image.php?image_id=<?php echo $category['image_id'];?>&category=<?php echo $category['image_category']; ?>" class="faq_link">[Edit Order]</a>&nbsp;
                    <a href="delete_image.php?image_id=<?php echo $category['image_id'];?>&image_order=<?php echo $category['image_order']?>&filename=<?php echo $pos; ?>&image_category=<?php echo $category['image_category']?>" class="faq_link deleteBtn">[Delete]</a></td>
            </tr>
        <?php } ?>

    </table>


</div>


<script>

    $(document).ready(function(){


        function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        }


        var catName = getParameterByName('category');

        var count = 0;



        $.getJSON('imageReader.php', {category: catName}, function (data) {
            count = data.length;
            console.log(count);
        });

        $("#checknum").click(function(){

            var num = "";



            if(count>=5){
                num = "false";
            }

            if(num=='false'){
                alert("You can only add the images to the slider up to 5");
                return false;
            }

        });
        $(".deleteBtn").click(function(event){
            if(count == 1) {
                alert("You cannot delete all the images in the category!");
                return false;
            }
            else {
                return confirm("Are you sure you want to delete the image?");
            }

        });

    });

</script>

</div> <!-- This closing tag must be at the end of your main content!! -->

<?php
require_once("Layout/admin_footer.php");
?>
