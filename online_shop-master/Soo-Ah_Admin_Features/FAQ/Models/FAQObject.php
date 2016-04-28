<?php

class FAQObject{

    public function getCategories()
    {
        $db = Database::getDB();

        // Get name for all the categories
        $query = "SELECT * FROM faq_category ORDER BY faq_category_order";
        $statement = $db->query($query);
        $statement->execute();
        $categories = $statement->fetchAll();
        return $categories;
    }

    public function addCategories($catname, $catorder)
    {
        $db = Database::getDB();
        $query = "INSERT INTO faq_category
                            (faq_category_name, faq_category_order)
                            VALUES
                            (:name, :order)";
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $catname);
        $statement->bindValue(':order', $catorder);
        $statement->execute();

    }

    public function getQuestions($catid)
    {
        $db = Database::getDB();

    // Get name for all the categories
        $query = "SELECT * FROM faq_question WHERE faq_question_category = :categoryid ORDER BY faq_question_order";
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryid', $catid);
        $statement->execute();
        $questions = $statement->fetchAll();
        return $questions;

    }



    public function insertQuestions($q, $a, $catid, $order)
    {

        $db = Database::getDB();

        $query = "INSERT INTO faq_question
                            (faq_question_question,faq_question_answer,	faq_question_category, faq_question_order)
                            VALUES
                            (:question,:answer,:categoryid ,:order)";
        $statement = $db->prepare($query);
        $statement->bindValue(':question', $q);
        $statement->bindValue(':answer', $a);
        $statement->bindValue(':categoryid', $catid);
        $statement->bindValue(':order', $order);
        $statement->execute();

    }

    public function getCategory($catid)
    {
        $db = Database::getDB();
        // Get name for all the categories
        $query = "SELECT * FROM faq_category WHERE faq_category_id = :categoryid";
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryid', $catid);
        $statement->execute();
        $category = $statement->fetch();
        return $category;
    }

    public function getQuestion($catid)
    {
        $db = Database::getDB();
        $query = "SELECT * FROM faq_question WHERE faq_question_id = :faqid";
        $statement = $db->prepare($query);
        $statement -> bindValue(':faqid', $catid);
        $statement->execute();
        $question = $statement->fetch();
        return $question;
    }
}
?>