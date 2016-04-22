<?php
require_once('../../Models/DbConnection.php');
require_once('../../Models/Newsletter.php');
require_once('../../Models/NewsletterDB.php');
require_once('../../Validation/validation.php');
$error="";

$valid=new validation();
if(isset($_POST['edit'])){
    $id=$_POST['newsId'];
    $title=$_POST['title'];
    $body=$_POST['body'];
    if($valid->isEmpty($title))
        $error="Please enetr a title for the newsletter.";
    else if($valid->isEmpty($body))
        $error="Please enter your main content for the newsletter.";
    else if($error=="")
        header("location: editNewsletter.php?newsId=$id&title=$title&body=$body");
}

if(isset($_POST['Edit'])){
    if(isset($_POST['newsId']))
    $news=NewsletterDB::getNewsletter($_POST['newsId']);
    $id=$news->getID();
    $title=$news->getTitle();
    $body=$news->getBody();
}
?>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
<?php echo $error; ?>
<div id="container">
    <form action="" method="post" class="form-horizontal">

        <div class="form-group">
            <label class="col-sm-2">Newsletter Id:</label>
            <div class="col-sm-3">
                <input type="input" name="newsId" value="<?php echo $id; ?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2">Title:</label>
            <div class="col-sm-3">
                <input type="input" name="title" value="<?php echo $title; ?>"  class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2">body:</label>
            <div class="col-sm-3">
                <input type="input" name="body" value="<?php echo $body; ?>"  class="form-control"/>

            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2">&nbsp;</label>
            <div class="col-sm-3">
                <input type="submit" name="edit" value="Edit" class="btn btn-primary"/>
            </div>
        </div>
    </form>
    <a href="NewsletterList.php" class="btn btn-primary">Back to list</a>
</div>
</body>
</html>
