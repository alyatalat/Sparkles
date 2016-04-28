<?php
require_once("database.php");

$db = Database::getDB();

            $category_order = $_GET['faq_order'];
            $category_id = $_GET['faq_id'];
            $query = 'DELETE FROM faq_category WHERE faq_category_id = :categoryid';
            $statement = $db -> prepare($query);
            $statement -> bindValue(':categoryid', $category_id);
            $sucess = $statement -> execute();
            $statement -> closeCursor();


            $query = "SELECT * FROM faq_category ORDER BY faq_category_order";
            $statement = $db->query($query);
            $statement->execute();
            $categories = $statement->fetchAll();
            $statement->closeCursor();


            foreach($categories as $category) {
                if($category['faq_category_order'] > $category_order){
                    $query = 'UPDATE faq_category
                            SET faq_category_order = :order
                            WHERE faq_category_order = :oldorder';
                    $statement = $db->prepare($query);
                    $statement->bindValue(':order', ($category['faq_category_order']-1));
                    $statement->bindValue(':oldorder', $category['faq_category_order']);
                    $statement->execute();
                    $statement->closeCursor();
                }

            }


        ?>
        <script>location.href='../Views/faq_admin.php';</script>










