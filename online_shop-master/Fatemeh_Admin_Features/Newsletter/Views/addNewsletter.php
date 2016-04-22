<?php
require_once('../Models/DbConnection.php');
require_once('../Models/Newsletter.php');
require_once('../Models/NewsletterDB.php');

if(isset($_GET['title']))
    $title=$_GET['title'];

if(isset($_GET['body']))
    $body=$_GET['body'];
$news=new Newsletter($title,$body);
$row= NewsletterDb::addNewsletter($news);
if($row==1)
    header("location: admin_index.php");
else
    header("location: createNewsletter.php");
