
<?php
require_once("Layout/admin_header.php");
require_once('../Controller/database.php');
require_once ('../Models/dbclass.php');

$db = Dbclass::getDB();


if(isset($_POST['Customer_Id'])){
    $id= $_POST['Customer_Id'];
}
elseif(isset($_GET['id'])) {
    $id= $_GET['id'];
    $username=$_GET['username'];
    $fname=$_GET['fname'];
    $lname=$_GET['lname'];
    $email=$_GET['email'];
    $phone=$_GET['phone'];
    $address=$_GET['address'];
    $status=$_GET['status'];
}else{
    $id=0;
    echo'<script>
        alert("No Customer Chosen");
    </script>';
}


$sql = "SELECT * FROM customer WHERE Customer_Id = '$id'";
$result = $db->query($sql);
$customer = $result->fetch();


?>

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

<!-- the body section -->


<div id="main">

    <h3 class="text-center title">Customer Account Management System</h3>
    <br/>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Update Customer Information</h3>
            <?php
            if(isset($_GET['error'])){
                echo
                "
                    <div class='row alert alert-danger'>
                    <hr/>
                    <p style=>Please Fix The Following Errors:</p>
                    <p style=>{$_GET['error']}</p>
                    <hr/>
                    </div>

                    ";
            }
            ?>
        </div>
        <div class="panel-body">
            <div class="row">
                <form action="../Controller/update_customer.php" method="post" enctype=""
                      id="update_customer_form" >
                    <div class="col-md-12">
                        <table>
                            <tbody>
                            <tr>
                                <td><label>Customer ID:</label></td>
                                <td><label><?php echo $id; ?></label></td>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                            </tr>
                            <tr>
                                <td><label>First Name:</label></td>
                                <td class="addbody"><input type="input" name="fname" value="<?php
                                    if(isset($_GET['fname'])) {
                                        echo $_GET['fname'];
                                    }else {
                                        echo $customer['FirstName'];
                                    }
                                    ?>"/>
                                </td>
                                <td><label>Last Name:</label></td>
                                <td class="addbody"><input type="input" name="lname" value="<?php
                                    if(isset($_GET['lname'])) {
                                        echo $_GET['lname'];
                                    }else {
                                        echo $customer['LastName'];
                                    }
                                    ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Username:</label></td>
                                <td class="addbody"><input type="input" name="username" value="<?php
                                    if(isset($_GET['username'])) {
                                        echo $_GET['username'];
                                    }else {
                                        echo $customer['UserName'];
                                    } ?>"/></td>
                            </tr>
                            <tr>
                                <td><label>Email:</label></td>
                                <td class="addbody"><input type="input" name="email" value="<?php
                                    if(isset($_GET['email'])) {
                                        echo $_GET['email'];
                                    }else {
                                        echo $customer['Email'];
                                    } ?>"/></td>
                            </tr>
                            <tr>
                                <td><label>Phone Number:</label></td>
                                <td class="addbody"><input type="input" name="phone" value="<?php
                                    if(isset($_GET['phone'])) {
                                        echo $_GET['phone'];
                                    }else {
                                        echo $customer['PhoneNumber'];
                                    } ?>"/></td>
                            </tr>
                            <tr>
                                <td><label>Billing Address:</label></td>
                                <td class="addbody"><input type="input" name="address" value="<?php
                                    if(isset($_GET['address'])) {
                                        echo $_GET['address'];
                                    }else {
                                        echo $customer['BillingAddress'];
                                    }?>"/></td>
                            </tr>
                            <tr>
                                <td><label>Account Status:</label></td>
                                <td class="addbody"><input type="input" name="status" value="<?php
                                    if(isset($_GET['status'])) {
                                        echo $_GET['status'];
                                    }else {
                                        echo $customer['Status'];
                                    } ?>"/></td>
                            </tr>
                            </tbody>
                        </table> <br/><br/>
                        <div class="text-right">
                            <button class="btn btn-md btn-primary" type="submit">Update Customer Account</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
    <p><a href="admin_index.php">Back to Customer Listing</a></p>


</div> <!-- end main -->

</div>

<?php
require_once("Layout/admin_footer.php");
