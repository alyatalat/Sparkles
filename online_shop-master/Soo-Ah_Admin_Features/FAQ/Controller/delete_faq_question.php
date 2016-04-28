<?php require_once("database.php");

$db = Database::getDB();


$categoryid = $_GET['category_id'];
$question_order = $_GET['faq_order'];
$question_id = $_GET['faq_id'];
$query = 'DELETE FROM faq_question WHERE faq_question_id = :questionid';
$statement = $db -> prepare($query);
$statement -> bindValue(':questionid', $question_id);
$sucess = $statement -> execute();
$statement -> closeCursor();


$query = "SELECT * FROM faq_question WHERE faq_question_category = :categoryid ORDER BY faq_question_order";
$statement = $db->prepare($query);
$statement -> bindValue(':categoryid', $categoryid);
$statement->execute();
$questions = $statement->fetchAll();
$statement->closeCursor();


foreach($questions as $question) {
    if($question['faq_question_order'] > $question_order){
        $query = 'UPDATE faq_question
                            SET faq_question_order = :order
                            WHERE faq_question_order = :oldorder AND faq_question_category = :categoryid';
        $statement = $db->prepare($query);
        $statement->bindValue(':order', ($question['faq_question_order']-1));
        $statement->bindValue(':oldorder', $question['faq_question_order']);
        $statement->bindValue(':categoryid', $question['faq_question_category']);
        $statement->execute();
        $statement->closeCursor();
    }

}


?>
<script>location.href='../Views/edit_faq_category.php?faq_id=<?php echo $categoryid; ?>';</script>


















