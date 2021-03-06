


<?php
require_once('admin_header.php');
include('database.php');

if(!isset($_GET['err_msg'])) {
    $errmsg = "";
}
else{
    $errmsg = $_GET['err_msg'];
}

// Get name for all the categories
    $query = "SELECT * FROM faq_category WHERE faq_category_id = :categoryid";
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryid', $_GET['faq_id']);
    $statement->execute();
    $category = $statement->fetch();
    $statement->closeCursor();





?>
<link rel="stylesheet" type="text/css" href="faq_admin.css" />
<script>
    $('#sidebar-first .menu-item').removeClass('selectedItem');
    $('#sidebar-first .faq').addClass('selectedItem');
</script>

<div id="main">
    <h1>Frequently Asked Questions</h1>

    <div id="seperator"></div>


    <form action="edit_category.php" method="post">
    <table style="margin-bottom: 50px;">
        <tr>
            <td class="faq_table_title first_row" colspan="2"><span class=" glyphicon glyphicon-edit" aria-hidden="true"></span>Edit FAQ Category</td>
            <td class="first_row faq_link"  style='border-bottom:none !important;'></td>
        </tr>

        <tr>
            <th>FAQ Category Name<span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:red;"></span></th>
            <td><input type="text" name="category_name" value="<?php echo $category['faq_category_name'];?>" /></td>
            <td class="err_message"><?php echo $errmsg; ?></td>
        </tr>


        <?php
            $query = "SELECT * FROM faq_category ORDER BY faq_category_order";
            $statement = $db->query($query);
            $statement->execute();
            $categories = $statement->fetchAll();
            $statement->closeCursor();

        ?>

        <tr>
            <th>Sort Order<span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:red;"></th>
            <td>
                <select name="sort_order">
                    <?php
                    $i = 0;
                    foreach($categories as $ct){
                        $i++;
                        if($i == $category['faq_category_order']){
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
        <input type="hidden" name="faq_id" value="<?php echo $_GET['faq_id']?>" />
        <input type="hidden" name="orig_order" value="<?php echo $category['faq_category_order']?>" />
        <tr>
            <td></td>
            <td><button type="submit" class="btn btn-default cancel_btn" name="edit">Edit</button>
                <a href="faq_admin.php" class="btn btn-default cancel_btn">Cancel</a></td>
            <td class="err_message"></td>
        </tr>
    </table>

    </form>


    <?php
    $query = "SELECT * FROM faq_question WHERE 	faq_question_category=:categoryid ORDER BY faq_question_order";
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryid', $_GET['faq_id']);
    $statement->execute();
    $questions = $statement->fetchAll();
    $statement->closeCursor();

    ?>


    <form action="edit_faq_question.php" method="post">
    <table style="margin-top:50px; margin-bottom: 50px;">
        <tr>
            <td colspan="2" class="faq_table_title first_row"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>FAQ Question List</td>
            <td colspan="2" style="text-align:right;" class="first_row faq_link"><a href="add_faq_question.php?category_id=<?php echo $_GET['faq_id'];?>">[Add New Question]</a></td>
        </tr>

        <tr>
            <th>Question</th>
            <th>Answer</th>
            <th>Sort Order</th>
            <th>Action</th>
        </tr>

        <?php foreach($questions as $question){ ?>
            <tr>
                <td><?php echo $question['faq_question_question']; ?></td>
                <td><?php echo $question['faq_question_answer']; ?></td>
                <td><?php echo $question['faq_question_order']; ?></td>
                <td><a href="edit_faq_question.php?faq_id=<?php echo $question['faq_question_id'];?>" class="faq_link">[Edit]</a>&nbsp;<a href="delete_faq_question.php?faq_id=<?php echo $question['faq_question_id'];?>&faq_order=<?php echo $question['faq_question_order']?>&category_id=<?php echo $question['faq_question_category'] ?>" onclick="return confirm('Are you sure you want to delete?')" class="faq_link">[Delete]</a></td>
            </tr>
        <?php } ?>
    </table>

    </form>


</div>


</div>

<?php
require_once('admin_footer.php');
?>