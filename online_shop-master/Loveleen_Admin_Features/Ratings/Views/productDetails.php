<?php
require_once ('../Models/Database.php');
require_once '../Models/AdminDB.php';
if(isset($_POST['Id'])) {
    $db = Database::getDB();
    $results = AdminDB::getRatings($_POST['Id']);
    ?>
    <table style="border: 1px solid black;">
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
                    <input type="submit" value="Delete">
                    <input type="hidden" value="<?php echo $_POST['Id'] ?>" name="productId"/>
                    <input type="hidden" value="<?php echo $result['Customer_Id'] ?>" name="Customer_Id"/>
                </form>
            </td>
            <br/>
        </tr>
        </table>



        <?php

    }
}
?>