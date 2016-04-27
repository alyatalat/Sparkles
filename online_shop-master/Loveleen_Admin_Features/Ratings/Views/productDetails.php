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
    <?php
    require_once ('../Models/Database.php');
    require_once '../Models/AdminDB.php';
    if(isset($_POST['Id'])) {
        $db = Database::getDB();
        $results = AdminDB::getRatings($_POST['Id']);
        ?>
        <br/>

        <table class="table table-bordered">
        <tr>
            <th>
                Product Id
            </th>
            <th>
                Product Title
            </th>
            <th>
                Rating
            </th>
            <th>
                Customer Id
            </th>
            <th>
                Action
            </th>
        </tr>
        <?php
        foreach($results as $result)
        {
            ?>

            <tr>
                <td>
                    <?php echo $result['Product_Id']; ?>
                </td>
                <td>
                    <?php echo $result['Product_title']; ?>
                </td>
                <td>
                    <?php echo $result['Rating'];?>
                </td>
                <td>
                    <?php echo $result['Customer_Id'];?>
                </td>
                <td>
                    <form method="post" action="AdminDeleteRating.php">
                        <input type="submit" value="Delete" class="btn btn-default">
                        <input type="hidden" value="<?php echo $_POST['Id'] ?>" name="productId"/>
                        <input type="hidden" value="<?php echo $result['Customer_Id'] ?>" name="Customer_Id"/>
                    </form>
                </td>

            </tr>
            <br/>




            <?php

        }
        echo " </table>";

    }
    ?>
<div class="container-fluid">
    <div class="row">
        <?php
        require_once("Layout/admin_footer.php");
        ?>
    </div>
</div>


</div> <!-- This closing tag must be at the end of your main content!! -->






































