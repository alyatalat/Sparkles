<?php

    require('database.php');

$db = Database::getDB();


    $categoryid = $_POST['faq_id'];
    $order = $_POST['sort_order'];
    if(empty($_POST['category_name'])){
        ?>
        <script><?php echo("location.href = '"."../Views/edit_faq_category.php?faq_id=".$categoryid . "&err_msg=Name cannot be blank"."';");?></script>

<?php
    exit();
    }


    $name = $_POST['category_name'];
    $originalorder = $_POST['orig_order'];


    $query = "UPDATE faq_category SET faq_category_name = :name,
                faq_category_order = :order
                WHERE faq_category_id = :categoryid";
    $statement = $db->prepare($query);
    $statement -> bindValue(':name', $name);
    $statement -> bindValue(':order', $order);
    $statement -> bindValue(':categoryid', $categoryid);
    $statement -> execute();
    $statement -> closeCursor();


    $query = "SELECT * FROM faq_category ORDER BY faq_category_order";
    $statement = $db->query($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();


    if($originalorder != $order) {

        if($originalorder > $order){
            foreach($categories as $category){

                if($category['faq_category_id'] != $categoryid && $category['faq_category_order'] < $originalorder && $category['faq_category_order'] >= $order ) {

                    $query = "UPDATE faq_category
                SET faq_category_order = :order WHERE faq_category_id = :faqid";
                    $statement = $db->prepare($query);
                    $statement->bindValue(':order', ($category['faq_category_order'] + 1));
                    $statement->bindValue(':faqid', $category['faq_category_id']);
                    $statement->execute();
                    $statement->closeCursor();
                }
            }

        }
        else{
            foreach($categories as $category){

                if($category['faq_category_id'] != $categoryid && $category['faq_category_order'] > $originalorder && $category['faq_category_order'] <= $order ) {

                    $query = "UPDATE faq_category
                SET faq_category_order = :order WHERE faq_category_id = :faqid";
                    $statement = $db->prepare($query);
                    $statement->bindValue(':order', ($category['faq_category_order'] - 1));
                    $statement->bindValue(':faqid', $category['faq_category_id']);
                    $statement->execute();
                    $statement->closeCursor();
                }
            }
        }


    }

?>

<script><?php echo("location.href = '"."../Views/faq_admin.php"."';");?></script>
