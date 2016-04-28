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

$categories = $tempo->getImages();

?>

<link rel="stylesheet" type="text/css" href="Layout/Style/img_slider_admin.css" />
<div id="main">
    <h1>Image Slider</h1>
    <div id="seperator"></div>

    <table>
        <tr>
            <td class="faq_table_title first_row"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>Category List</td>
        </tr>

        <tr>
            <th>Category Name</th>
            <th></th>
        </tr>

        <tr>
            <td>APPAREL</td>
            <td><a href="image_list.php?category=APPAREL">[Image List]</a>&nbsp;
                <a href="add_image.php?category=APPAREL">[Add Image]</a></td>
        </tr>

        <tr>
            <td>JEWERLY</td>
            <td><a href="image_list.php?category=JEWERLY">[Image List]</a>&nbsp;
                <a href="add_image.php?category=JEWERLY">[Add Image]</a></td>
        </tr>

        <tr>
            <td>SHOES</td>
            <td><a href="image_list.php?category=SHOES">[Image List]</a>&nbsp;
                <a href="add_image.php?category=SHOES">[Add Image]</a></td>
        </tr>

    </table>


</div>

</div> <!-- This closing tag must be at the end of your main content!! -->

<?php
require_once("Layout/admin_footer.php");
?>
