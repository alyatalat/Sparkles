
<link rel="stylesheet" type="text/css" href="Layout/Style/admin.css" />

<?php
require_once('Layout/admin_header.php');
include('../Controller/database.php');
require_once ('../Models/FAQObject.php');

$db = Database::getDB();

$tempo = new FAQObject();

$category = $tempo->getCategory($_GET['faq_id']);

?>
<link rel="stylesheet" type="text/css" href="Layout/Style/faq_admin.css" />
<script>
    $('#sidebar-first .menu-item').removeClass('selectedItem');
    $('#sidebar-first .faq').addClass('selectedItem');
</script>

<div id="main">
    <h1>Frequently Asked Questions</h1>

    <div id="seperator"></div>


    <?php
    $questions = $tempo->getQuestions($_GET['faq_id']);
    ?>


    <form action="edit_faq_question.php" method="post">
        <table style="margin-top:50px; margin-bottom: 50px;">
            <tr>
                <td colspan="2" class="faq_table_title first_row"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>FAQ Question List</td>
                <td colspan="2" style="text-align:right;" class="first_row faq_link"><a href="faq_admin.php">[Back to List]</a>&nbsp;&nbsp;<a href="add_faq_question.php?category_id=<?php echo $_GET['faq_id'];?>">[Add New Question]</a></td>
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
                    <td><a href="edit_faq_question.php?faq_id=<?php echo $question['faq_question_id'];?>" class="faq_link">[Edit]</a>&nbsp;<a href="../Controller/delete_faq_question.php?faq_id=<?php echo $question['faq_question_id'];?>&faq_order=<?php echo $question['faq_question_order']?>&category_id=<?php echo $question['faq_question_category'] ?>" onclick="return confirm('Are you sure you want to delete?')" class="faq_link">[Delete]</a></td>
                </tr>
            <?php } ?>
        </table>

    </form>


</div>


</div>

<?php
require_once('Layout/admin_footer.php');
?>