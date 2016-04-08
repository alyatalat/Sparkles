

<?php
require_once("header.html");
require("Soo-Ah_Admin_Features/faq/database.php");
?>

<link rel="stylesheet" href="faq.css" type="text/css" />
<script src="faq.js" type="text/javascript"></script>

    <div class="container">

        <h1 class="page-title">Frequently Asked Questions</h1>

            <div class="main-nav">

                <ul class="nav nav-tabs nav-justified" style="margin-top:50px ;margin-bottom: 50px;">
                    <li role="presentation" <?php if(!isset($_GET['faq_id'])){ echo "class='active'";}?> ><a style="cursor:pointer; color: #555;" href="faq.php">All</a></li>

                    <?php
                    $query = "SELECT * FROM faq_category ORDER BY faq_category_order";
                    $statement = $db->query($query);
                    $statement->execute();
                    $categories = $statement->fetchAll();
                    $statement->closeCursor();

                    foreach($categories as $category){
                    ?>

                    <li role="presentation" <?php if(isset($_GET['faq_id'])){ if($_GET['faq_id']==$category['faq_category_id']){
                        echo "class='active'";
                    } } ?>><a style="color: #555;" href="faq.php?faq_id=<?php echo $category['faq_category_id'];?>"><?php echo $category['faq_category_name']; ?></a></li>
                    <?php } ?>

                </ul>

            </div>

            <div class="faq-box">
                <?php
                if(!isset($_GET['faq_id'])){
                foreach($categories as $category) {
                    ?>
                <h2><?php echo $category['faq_category_name'] ?></h2>


                <?php
                    $query = "SELECT * FROM faq_question WHERE faq_question_category = :categoryid ORDER BY faq_question_order";
                    $statement = $db->prepare($query);
                    $statement -> bindValue(':categoryid', $category['faq_category_id']);
                    $statement->execute();
                    $questions = $statement->fetchAll();
                    $statement->closeCursor();


                foreach($questions as $question) {

                    ?>
                    <h3><?php echo $question['faq_question_question']; ?><span class="glyphicon glyphicon-menu-down"
                                                                               aria-hidden="true"></span></h3>
                    <p><?php echo $question['faq_question_answer']; ?></p>

                    <?php
                }
                }

                }

                else{

                    $faqid = $_GET['faq_id'];

                    $query = "SELECT * FROM faq_question WHERE faq_question_category = :categoryid ORDER BY faq_question_order";
                    $statement = $db->prepare($query);
                    $statement -> bindValue(':categoryid', $faqid);
                    $statement->execute();
                    $questions = $statement->fetchAll();
                    $statement->closeCursor();

                    $query = "SELECT * FROM faq_category WHERE faq_category_id = :categoryid";
                    $statement = $db->prepare($query);
                    $statement -> bindValue(':categoryid', $faqid);
                    $statement->execute();
                    $onecategory = $statement->fetch();
                    $statement->closeCursor();


                    ?>
                    <h2><?php echo $onecategory['faq_category_name'] ?></h2>



                <?php
                foreach($questions as $question) {

                    ?>
                    <h3><?php echo $question['faq_question_question']; ?><span class="glyphicon glyphicon-menu-down"
                                                                               aria-hidden="true"></span></h3>
                    <p><?php echo $question['faq_question_answer']; ?></p>
                    <?php
                }

                }



                ?>

            </div>



    </div>



</div>


<?php
require_once("footer.html");
?>