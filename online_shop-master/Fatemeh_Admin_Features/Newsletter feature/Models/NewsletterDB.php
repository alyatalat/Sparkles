<?php

class NewsletterDb {
////getting all the newsletters from database
    public static function getNewsletters() {
        $db = DbConnection::getDB();
        $query = 'SELECT * FROM newsletter';
        $result = $db->query($query);
        $newsletters = array();
        foreach ($result as $row) {
            $newsletter = new Newsletter(
                $row['Title'],
                $row['Body']
            );
            $newsletter->setDateReleased($row['DateReleased']);
            $newsletter->setID($row['Newsletter_Id']);
            $newsletters[] = $newsletter;
        }
        return $newsletters;
    }
/////////////////get a specific newsletter by Id
    public static function getNewsletter($Id){
        $db = DbConnection::getDB();
        $query = "SELECT * FROM newsletter WHERE Newsletter_Id = '$Id'";
        $result = $db->query($query);
        //convert result into array
        $row = $result->fetch();
        $newsletter = new Newsletter(
            $row['Title'],
            $row["Body"],
            $row["DateReleased"]
        );
        $newsletter->setID($row["Newsletter_Id"]);
        return $newsletter;
    }
///////////////////////Insert a newsletter into database
    public static function addNewsletter($newsletter) {
        $db = DbConnection::getDB();

        $Body = $newsletter->getBody();
        $title = $newsletter->getTitle();
        $query =
            "INSERT INTO newsletter
                 (Title,Body)
             VALUES
                 ('$title','$Body')";

        $row_count = $db->exec($query);
        return $row_count;
    }
/////////////////////Delete a newsletter
    public static function deleteNewsletter($newsletter_id) {
        $db = DbConnection::getDB();
        $id=$newsletter_id;
        $query = "DELETE FROM newsletter
                  WHERE  Newsletter_Id = $id";
        $row_count = $db->exec($query);
        return $row_count;
    }
//update a newsletter in database
    public static function editNewsletter($news) {
        $db = DbConnection::getDB();

        $news_id = $news->getID();
        $title = $news->getTitle();
        $body= $news->getBody();

        $query =
            "UPDATE newsletter SET
                  Title='$title', Body='$body'
             WHERE
                   Newsletter_Id = $news_id";

        $row_count = $db->exec($query);
        return $row_count;
    }
}
/*require_once("DbConnection.php");
require_once("Newsletter.php");
$news1=new Newsletter("fffff","update test");
$news1->setID(4);
$news=new NewsletterDB();
$row=$news->editNewsletter($news1);
echo $row;*/