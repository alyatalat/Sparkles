<?php
require_once('../Models/DbConnection.php');
require_once('../Models/Newsletter.php');
require_once('../Models/NewsletterDB.php');

if(isset($_GET['newsId']))
    $id=$_GET['newsId'];
if(isset($_GET['title']))
    $title=$_GET['title'];
if(isset($_GET['body']))
    $body=$_GET['body'];
$news=new Newsletter($title,$body);
$news->setID($id);

$row= NewsletterDB::editNewsletter($news);
if($row==1)
    header("location: admin_index.php");
else
    header("location: editNewsletterForm.php");