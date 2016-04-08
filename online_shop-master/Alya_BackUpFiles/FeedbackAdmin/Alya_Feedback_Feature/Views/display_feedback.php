<?php
require_once('../Controller/database.php');
$query = "SELECT * FROM feedback ORDER BY Feedback_Id";
$entry = $db->query($query);
?>


<div class="container-fluid">
    <div class="row">
        <?php
        require_once("../Layout/admin_header.php");
        ?>
    </div>
</div>

<!-- the body section -->

<div id="page-container">
    <?php
    require_once("../Layout/admin_sidebar.php");
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
                <form action="" method="post" id="filter_feedback_form" >
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
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
</div>

<div class="container-fluid">
    <div class="row">
        <?php
        require_once("../Layout/admin_footer.php");
        ?>
    </div>
</div>

</div><!-- end page -->

</html>