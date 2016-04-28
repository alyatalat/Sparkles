<div class="container-fluid">
    <div class="row">
        <?php
        require_once("../Layout/header.html");
        ?>
    </div>
</div>

<!-- main -->
<div class="container-fluid">
    <div class="row feedback-header-image">
        <h2 class="category-title"> Feedback Form </h2>
    </div>
</div>

<div id="wrapper" class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div id="sidebar-wrapper" class="col-md-3 col-sm-4">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Categories
                    </a>
                </li>
                <li>
                    <a href="#">Today's Deals</a>
                </li>
                <li>
                    <a href="#">Sort Products</a>
                </li>
                <li>
                    <a href="#">My Gift Cards</a>
                </li>
                <li>
                    <a href="#">My WishList</a>
                </li>
                <li>
                    <a href="#">Sale</a>
                </li>
                <li>
                    <a href="feedback.php">Feedback</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <div id="page-content-wrapper" class="col-md-9 col-sm-8 col-xs-12">
            <div class="container-fluid">
                <div class="row">
                    <div class="nav">
                        <ul class="breadcrumb">
                            <li><a href="../../homepage.php">Home</a></li>
                            <li><a href="feedback.php">Feedback</a></li>
                            <li class="active"><a href="Thankyou.php">Thank You</a></li>
                        </ul>
                    </div>

                    Thank you. Your message was received.

                </div>
            </div>

        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <?php
        require_once("../Layout/footer.html");
        ?>
    </div>
</div>
<!--
--><?/*
//ob_start();
if(isset($_POST['submit']))
{
    require("class.phpmailer.php");

    $mail = new PHPMailer();

//Your SMTP servers details

    $mail->IsSMTP();               // set mailer to use SMTP
    $mail->Host = "localhost";  // specify main and backup server or localhost
    $mail->SMTPAuth = true;     // turn on SMTP authentication
    $mail->Username = "hello@alyatalat.com";  // SMTP username
    $mail->Password = "*****"; // SMTP password
//It should be same as that of the SMTP user

    $redirect_url = "feedback.php"; //Redirect URL after submit the form

    $mail->From = $mail->hello;    //Default From email same as smtp user
    $mail->FromName = $_POST['fullname'];

    $mail->AddAddress("hello@frogdigital.co.uk", "Frog Digital"); //Email address where you wish to receive/collect those emails.

    $mail->WordWrap = 50;                                 // set word wrap to 50 characters
    $mail->IsHTML(true);                                  // set email format to HTML

    $mail->Subject = $_POST['service'];

    $message = "<b>Name: </b>".$_POST['fullname']." \r\n <br><br><b>Email: </b>".$_POST['email']." \r\n <br><br><b>Service: </b>".$_POST['service']." \r\n <br><br><b>Budget: </b>".$_POST['budget']." \r\n <br><br><b>Comments: </b>".$_POST['comments'];
    $mail->Body    = $message;


    if ($mail->send()){
        $autoemail = new PHPMailer();
        $autoemail->From = "hello@frogdigital.co.uk";
        $autoemail->FromName = "Frog Digital";
        $autoemail->AddAddress($mail->From, $mail->FromName);
        $autoemail->Subject = "Autorepsonse: We received your submission";
        $autoemail->Body = "We received your submission. We will contact you soon ...";
        $autoemail->Send();
    }




    */?>