
<link rel="stylesheet" type="text/css" href="Layout/Style/admin.css" />

<?php
require_once('Layout/admin_header.php');
require_once ('../Models/FAQObject.php');
include('../Controller/database.php');

$db = Database::getDB();

$tempo = new FAQObject();
$categories = $tempo->getCategories();


?>
<link rel="stylesheet" type="text/css" href="Layout/Style/faq_admin.css" />
<script>
    $('#sidebar-first .menu-item').removeClass('selectedItem');
    $('#sidebar-first .faq').addClass('selectedItem');
</script>
<?php
    $err_msg = "";

    if(isset($_POST['submit'])){

        if($_POST['category_name'] == null || $_POST['category_name'] == ""){
            $err_msg = "Category Name field should not be blank";
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

                            $query = "UPDATE faq_category
                            SET faq_category_order = CASE faq_category_order ";

                            for($k = $j; $k < $maxValue; $k++){
                                $query .= "WHEN " . $k . " THEN " . ($k+1) . " ";
                            }

                            $query .= " END WHERE faq_category_order IN (";


                            for($p = $j; $p < $maxValue; $p++){

                                if($p == $maxValue-1){
                                    $query .= $p . ")";
                                }
                                else {
                                    $query .= $p . ", ";
                                }
                            }


                            $statement = $db->prepare($query);
                            $statement->execute();
                            $statement->closeCursor();


                        break;
                    }
                    else{}
                }
            }

            $tempo->addCategories($_POST['category_name'],$sort_order_input)

            ?>
           <script><?php echo("location.href = '"."faq_admin.php"."';");?></script>


            <?php
        }
    }
?>

<div id="main">
    <h1>Frequently Asked Questions</h1>

    <div id="seperator"></div>

    <table>

        <form action="" method="post">

        <tr>
            <td colspan="2" class="faq_table_title first_row"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Add FAQ Category</td>

            <td class="first_row" style="border-bottom: none;"></td>
        </tr>

        <tr>
            <th>FAQ Category Name <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:red;"></span></th>
            <td><input type="text" name="category_name" value="" /></td>
            <td class="err_message"><?php echo $err_msg; ?></td>
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
                <a href="faq_admin.php" class="btn btn-default cancel_btn">Cancel</a></td>
            <td class="err_message"></td>
        </tr>

        </form>


    </table>

</div>

</div>

<?php
require_once('Layout/admin_footer.php');
?>