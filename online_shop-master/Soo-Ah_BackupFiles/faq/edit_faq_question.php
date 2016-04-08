


<?php
require_once('admin_header.php');
include('database.php');

if(isset($_GET['err_msg1'])) {
    $errmsg1 = $_GET['err_msg1'];
    $errmsg2 = "";
}
elseif(isset($_GET['err_msg2'])){
    $errmsg1 = "";
    $errmsg2 = $_GET['err_msg2'];
}
else{
    $errmsg1 = "";
    $errmsg2 = "";
}

$faqid = $_GET['faq_id'];



$query = "SELECT * FROM faq_question WHERE faq_question_id = :faqid";
$statement = $db->prepare($query);
$statement -> bindValue(':faqid', $faqid);
$statement->execute();
$question = $statement->fetch();
$statement->closeCursor();

$categoryid = $question['faq_question_category'];




?>
<link rel="stylesheet" type="text/css" href="faq_admin.css" />
<script>
    $('#sidebar-first .menu-item').removeClass('selectedItem');
    $('#sidebar-first .faq').addClass('selectedItem');
</script>

<div id="main">
    <h1>Frequently Asked Questions</h1>

    <div id="seperator"></div>


    <form action="edit_question.php" method="post">
        <table style="margin-bottom: 50px;">
            <tr>
                <td class="faq_table_title first_row" colspan="2"><span class=" glyphicon glyphicon-edit" aria-hidden="true"></span>Edit FAQ Question</td>
                <td class="first_row faq_link"  style='border-bottom:none !important;'></td>
            </tr>

            <tr>
                <th>FAQ Question <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:red;"></span></th>
                <td><input type="text" name="question" value="<?php
                    if(isset($_GET['tempQuestion'])){
                        echo $_GET['tempQuestion'];
                    }
                    else {
                        echo $question['faq_question_question'];
                    }?>" /></td>
                <td class="err_message"><?php echo $errmsg1; ?></td>
            </tr>

            <tr>
                <th>FAQ Answer <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:red;"></span></th>
                <td><textarea style="width:100%;" name="answer"><?php echo $question['faq_question_answer'];?></textarea></td>
                <td class="err_message"><?php echo $errmsg2; ?></td>
            </tr>


            <?php
            $query = "SELECT * FROM faq_question WHERE faq_question_category = :categoryid ORDER BY faq_question_order";
            $statement = $db->prepare($query);
            $statement -> bindValue(':categoryid', $categoryid);
            $statement->execute();
            $questions = $statement->fetchAll();
            $statement->closeCursor();

            ?>

            <tr>
                <th>Sort Order<span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:red;"></th>
                <td>
                    <select name="sort_order">
                        <?php
                        $i = 0;
                        foreach($questions as $q){
                            $i++;
                            if($i == $question['faq_question_order']){
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
            <input type="hidden" name="category_id" value="<?php echo $categoryid?>" />
            <input type="hidden" name="orig_order" value="<?php echo $question['faq_question_order']?>" />
            <tr>
                <td></td>
                <td><button type="submit" class="btn btn-default cancel_btn" name="edit">Edit</button>
                    <a href="edit_faq_category.php?faq_id=<?php echo $categoryid?>" class="btn btn-default cancel_btn">Cancel</a></td>
                <td class="err_message"></td>
            </tr>




        </table>

    </form>






</div>


</div>

<?php
require_once('admin_footer.php');
?>