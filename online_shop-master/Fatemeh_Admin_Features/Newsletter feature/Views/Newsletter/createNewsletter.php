<?php
require_once('../../Validation/validation.php');
$error="";
$title="";
$body="";
$valid=new validation();
if(isset($_POST['makeNewsletter'])){
    $title=$_POST['title'];
    $body=$_POST['body'];
    if($valid->isEmpty($title))
        $error="Please enetr a title for the newsletter.";
    else if($valid->isEmpty($body))
        $error="Please enter your main content for the newsletter.";
    else if($error=="")
        header("location: addNewsletter.php?title=$title&body=$body");
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>CreateNewsletter</title>
</head>
<body>
<?php echo $error;

?>
    <form action="" method="post" id="makeNewsletter">
        <input type="text" id="title" name="title" size="50"  value="<?php echo $title ?>"/><br/>
        <textarea id="body" name="body"  value="<?php echo $body ?>"></textarea><br/>
        <input type="submit" id="makeNewsletter" name="makeNewsletter" value="Create"/>
        <span id="message"></span>
    </form>
</body>
</html>