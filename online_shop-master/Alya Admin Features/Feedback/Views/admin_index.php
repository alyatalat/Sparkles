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

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Filter Results</h3>
        </div>
        <div class="panel-body">
            <form action="thankyou.php" method="post" id="filter_feedback_form" >
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        Department
                        <div class="checkbox">
                            <label><input type="checkbox" name="category" value="">Shipping</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="category" value="">Complaints</label>
                        </div>
                    </div>
                </div>
                <div class="row text-right results">
                    <button class="btn btn-md" type="submit"><a href="">Show Results</a></button>
                </div>
            </form>
        </div>
    </div>
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
