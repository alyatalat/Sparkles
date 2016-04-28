<script
    src="https://code.jquery.com/jquery-2.2.2.min.js"
    integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
    crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" href="Layout/Style/admin.css" />

<link rel="stylesheet" href="Layout/Style/main.css" />
<link rel="stylesheet" href="Layout/Style/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="Layout/Style/dataTables.bootstrap.min.css" />
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="Layout/Scripts/sorttable.js"></script>
<script src="Layout/Scripts/dataTables.bootstrap.js"></script>
<script src="Layout/Scripts/jquery.dataTables.js"></script>







<?php
require_once("Layout/admin_header.php");
?>

<?php
require_once('../Controller/database.php');
$query = "SELECT * FROM feedback ORDER BY Feedback_Id";
$entry = $db->query($query);
?>

<div id="main">

    <!-- display a table of products -->
    <h3 class="text-center title">Customer Feedback Messages</h3>
    <br/>

    <div >
        <table id="feedbacktbl" class="table table-hover table-condensed text-left">
            <thead>
            <tr>
                <th>ID</th>
                <th>Department</th>
                <th>Customer Name</th>
                <th>Customer Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Date</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($entry as $feedback) : ?>
                <tr>
                    <td><?php echo $feedback['Feedback_Id']; ?></td>
                    <td><?php echo $feedback['Department']; ?></td>
                    <td><?php echo $feedback['Customer_Name']; ?></td>
                    <td><?php echo $feedback['Customer_Email']; ?></td>
                    <td><?php echo $feedback['Subject']; ?></td>
                    <td><?php echo $feedback['Message']; ?></td>
                    <td><?php echo $feedback['Message_Date']; ?></td>
                    <td>
                        <form action="../Controller/delete_feedback.php" method="post"
                              id="delete_account_form">
                            <input type="hidden" name="Feedback_Id"
                                   value="<?php echo $feedback['Feedback_Id']; ?>" />
                            <button type="submit" class="delete btn btn-sm btn-default">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>

                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div> <!-- end main -->






</div> <!-- This closing tag must be at the end of your main content!! -->

<?php
require_once("Layout/admin_footer.php");
?>
