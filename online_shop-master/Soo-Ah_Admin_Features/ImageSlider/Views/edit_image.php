
<link rel="stylesheet" type="text/css" href="Layout/Style/admin.css" />

<?php
require_once('Layout/admin_header.php');
include('../Controller/database.php');
require_once ('../Models/DBObject.php');

$db = Database::getDB();

$tempo = new DBObject();

$category = $tempo->getImage($_GET['image_id']);


?>
<link rel="stylesheet" type="text/css" href="Layout/Style/img_slider_admin.css" />
<script>
    $('#sidebar-first .menu-item').removeClass('selectedItem');
    $('#sidebar-first .imageslider').addClass('selectedItem');
</script>

<div id="main">
    <h1>Image Slider</h1>

    <div id="seperator"></div>


    <form action="edit_image_process.php?image_id=<?php echo $_GET['image_id'];?>&category=<?php echo $_GET['category']; ?>" method="post">
        <table style="margin-bottom: 50px;">
            <tr>
                <td class="faq_table_title first_row" colspan="2"><span class=" glyphicon glyphicon-edit" aria-hidden="true"></span>Edit Image</td>
                <td class="first_row faq_link"  style='border-bottom:none !important;'></td>
            </tr>


            <?php

                $categories = $tempo->getCategories($_GET['category']);
            ?>

            <tr>
                <th>Sort Order<span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:red;"></th>
                <td>
                    <select name="sort_order">
                        <?php
                        $i = 0;
                        foreach($categories as $ct){
                            $i++;
                            if($i == $category['image_order']){
                                ?>
                                <option value="<?php echo $i;?>" selected><?php echo $i; ?></option>
                                <?php
                            }
                            else{
                                ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php }
                        } ?>
                    </select>
                </td>
                <td class="err_message"></td>
            </tr>
            <input type="hidden" name="image_id" value="<?php echo $_GET['image_id']?>" />
            <input type="hidden" name="orig_order" value="<?php echo $category['image_order']?>" />
            <tr>
                <td></td>
                <td><button type="submit" class="btn btn-default cancel_btn" name="edit">Edit</button>
                    <a href="image_list.php?category=<?php echo $_GET['category']; ?>" class="btn btn-default cancel_btn">Cancel</a></td>
                <td class="err_message"></td>
            </tr>
        </table>

    </form>




</div>


</div>

<?php
require_once('Layout/admin_footer.php');
?>