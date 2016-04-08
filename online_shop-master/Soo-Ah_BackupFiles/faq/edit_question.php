<?php

require('database.php');

$faqid = $_POST['faq_id'];
$order = $_POST['sort_order'];

if(empty($_POST['question'])){
    ?>
    <script><?php echo("location.href = '"."edit_faq_question.php?faq_id=".$faqid . "&err_msg1=Question field cannot be blank"."';");?></script>

    <?php
    exit();
}
elseif(empty($_POST['answer'])){
    ?>
    <script><?php echo("location.href = '"."edit_faq_question.php?faq_id=".$faqid . "&err_msg2=Answer field cannot be blank&tempQuestion=". $_POST['question'] ."';");?></script>

    <?php
    exit();
}
else{
}



$question = $_POST['question'];
$answer = $_POST['answer'];
$originalorder = $_POST['orig_order'];


$query = "UPDATE faq_question SET faq_question_question = :question,
                faq_question_answer = :answer,
                faq_question_order = :order
                WHERE faq_question_id = :faqid";
$statement = $db->prepare($query);
$statement -> bindValue(':question', $question);
$statement -> bindValue(':answer', $answer);
$statement -> bindValue(':order', $order);
$statement -> bindValue(':faqid', $faqid);
$statement -> execute();
$statement -> closeCursor();


$query = "SELECT * FROM faq_question WHERE faq_question_category = :categoryid ORDER BY faq_question_order";
$statement = $db->prepare($query);
$statement -> bindValue(':categoryid', $_POST['category_id']);
$statement->execute();
$questions = $statement->fetchAll();
$statement->closeCursor();


if($originalorder != $order) {

    if($originalorder > $order){
        foreach($questions as $question){

            if($question['faq_question_id'] != $faqid && $question['faq_question_order'] < $originalorder && $question['faq_question_order'] >= $order ) {

                $query = "UPDATE faq_question
                SET faq_question_order = :order WHERE faq_question_id = :faqid";
                $statement = $db->prepare($query);
                $statement->bindValue(':order', ($question['faq_question_order'] + 1));
                $statement->bindValue(':faqid', $question['faq_question_id']);
                $statement->execute();
                $statement->closeCursor();
            }
        }

    }
    else{
        foreach($questions as $question){

            if($question['faq_question_id'] != $faqid && $question['faq_question_order'] > $originalorder && $question['faq_question_order'] <= $order ) {

                $query = "UPDATE faq_question
                SET faq_question_order = :order WHERE faq_question_id = :faqid";
                $statement = $db->prepare($query);
                $statement->bindValue(':order', ($question['faq_question_order'] - 1));
                $statement->bindValue(':faqid', $question['faq_question_id']);
                $statement->execute();
                $statement->closeCursor();
            }
        }
    }
}
else{}
?>
        <script><?php echo("location.href = 'edit_faq_category.php?faq_id=" . $_POST['category_id'] . "';");?></script>



