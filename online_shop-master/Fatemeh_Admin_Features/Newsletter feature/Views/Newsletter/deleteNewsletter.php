<?php
require_once('../../Models/DbConnection.php');
require_once('../../Models/Newsletter.php');
require_once('../../Models/NewsletterDB.php');

if(isset($_POST['delete'])){
    if(isset($_POST['newsId']))
        $id=$_POST['newsId'];

    $news=new NewsletterDB();

    $row= $news::deleteNewsletter($id);
    if($row==1)
        header("location: NewsletterList.php");
    else
        header("location: deleteNewsletter.php");
}