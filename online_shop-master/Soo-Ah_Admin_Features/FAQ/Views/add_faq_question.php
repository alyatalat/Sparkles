
<link rel="stylesheet" type="text/css" href="Layout/Style/admin.css" />

<?php
require_once('Layout/admin_header.php');
include('../Controller/database.php');


$categoryid = $_GET['category_id'];

// Get name for all the categories
$query = "SELECT * FROM faq_question WHERE faq_question_category = :categoryid ORDER BY faq_question_order";
$statement = $db->prepare($query);
$statement->bindValue(':categoryid', $categoryid);
$statement->execute();
$questions = $statement->fetchAll();
$statement->closeCursor();
?>
    <link rel="stylesheet" type="text/css" href="Layout/Style/faq_admin.css" />
    <script>
        $('#sidebar-first .menu-item').removeClass('selectedItem');
        $('#sidebar-first .faq').addClass('selectedItem');
    </script>
<?php
$err_msg1 = "";
$err_msg2 = "";




if(isset($_POST['submit'])){

    if($_POST['question'] == null || $_POST['question'] == ""){
        $err_msg1 = "Question field should not be blank";
    }
    elseif($_POST['answer'] == null || $_POST['answer'] == ""){
        $err_msg2 = "Answer field should not be blank";
    }
    else{
        $maxValue = $_POST['maxValue'];

        $sort_order_input = $_POST['sort_order'];



        if($sort_order_input == $maxValue || $sort_order_input == ""){
            $sort_order_input = $maxValue;
        }

        else{

            for($j=1; $j<$maxValue; $j++){
                if($sort_order_input == $j){

                    $query = "UPDATE faq_question
                            SET faq_question_order = CASE faq_question_order ";

                    for($k = $j; $k < $maxValue; $k++){
                        $query .= "WHEN " . $k . " THEN " . ($k+1) . " ";
                    }

                    $query .= " END WHERE faq_question_order IN (";


                    for($p = $j; $p < $maxValue; $p++){

                        if($p == $maxValue-1){
                            $query .= $p . ")";
                        }
                        else {
                            $query .= $p . ", ";
                        }
                    }


                    $statement = $db->prepare($query);
                    $statement->execute();
                    $statement->closeCursor();


                    break;
                }
                else{}
            }
        }

        $query = "INSERT INTO faq_question
                            (faq_question_question,faq_question_answer,	faq_question_category, faq_question_order)
                            VALUES
                            (:question,:answer,:categoryid ,:order)";
        $statement = $db->prepare($query);
        $statement->bindValue(':question', $_POST['question']);
        $statement->bindValue(':answer', $_POST['answer']);
        $statement->bindValue(':categoryid', $categoryid);
        $statement->bindValue(':order', $sort_order_input);
        $statement->execute();
        $statement->closeCursor();
        ?>
        <script><?php echo("location.href = '"."edit_faq_category.php?faq_id=" . $categoryid ."';");?></script>


        <?php
    }
}
?>

    <div id="main">
        <h1>Frequently Asked Questions</h1>

        <div id="seperator"></div>

        <table>

            <form action="" method="post">

                <tr>
                    <td colspan="2" class="faq_table_title first_row"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Add FAQ Question</td>

                    <td class="first_row" style="border-bottom: none;"></td>
                </tr>

                <tr>
                    <th>FAQ Question <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:red;"></span></th>
                    <td><input type="text" name="question" value="<?php if(isset($_POST['question'])){echo $_POST['question'];}?>"  /></td>
                    <td class="err_message"><?php echo $err_msg1; ?></td>
                </tr>

                <tr>
                    <th>FAQ Answer <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:red;"></span></th>
                    <td><textarea name="answer" style="width:100%;"></textarea></td>
                    <td class="err_message"><?php echo $err_msg2; ?></td>
                </tr>


                <tr>
                    <th>Sort Order</th>
                    <td><select name="sort_order">
                            <option selected value="">Select the Sort Order</option>
                            <?php
                            $i = 0;
                            foreach($questions as $question){
                                $i++;
                                ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } $i++; ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        </select></td>
                    <input type="hidden" name="maxValue" value="<?php echo $i;?>" />
                    <td class="err_message"></td>
                </tr>

                <tr>
                    <th></th>
                    <td><button type="submit" class="btn btn-default cancel_btn" name="submit">Add</button>
                        <a href="edit_faq_category.php?faq_id=<?php echo $categoryid; ?>" class="btn btn-default cancel_btn">Cancel</a></td>
                    <td class="err_message"></td>
                </tr>

            </form>


        </table>

    </div>

    </div>

<?php
require_once('Layout/admin_footer.php');
?>