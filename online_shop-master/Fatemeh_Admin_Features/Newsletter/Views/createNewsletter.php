<?php
require_once('../Validation/validation.php');
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
<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
<script>
    tinymce.init({
        selector: 'textarea',
        width:1000,
        height: 400,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        content_css: [
            '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });
</script>
<script
    src="https://code.jquery.com/jquery-2.2.2.min.js"
    integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
    crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" href="Layout/Style/admin.css" />
<?php
require_once("Layout/admin_header.php");
?>
<div id="main">
<?php echo $error; ?>
    <h3>Create a newsletter</h3></br>
    <form action="" method="post" id="makeNewsletter" class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2">Newsletter Title:</label>
            <div class="col-sm-3">
                <input type="text" id="title" class="form-control" name="title" size="50"  value="<?php echo $title ?>"/>
            </div>
        </div>

        <!--<div class="form-group">
            <label class="col-sm-2">Newsletter Content:</label>
            <!--<div class="col-sm-3">-->
                <textarea id="body" name="body"  value="<?php echo $body ?>"></textarea>

            <!--</div>-->
        <!--</div>-->

        <div class="form-group">
            <label class="col-sm-2">&nbsp;</label>
            <div class="col-sm-3">
                <input type="submit" id="makeNewsletter" name="makeNewsletter" value="Create" class='btn btn-primary'/>
            </div>
        </div>
        <span id="message"></span>
    </form>
    <a href="admin_index.php" class="btn btn-primary">Cancel</a>
<div class="container-fluid">
    <div class="row">
        <?php
        require_once("Layout/admin_footer.php");
        ?>
    </div>
</div>
</div> <!-- This closing tag must be at the end of your main content!! -->