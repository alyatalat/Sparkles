<?php
// Get ID
$customer_id = $_POST['customer_id'];

// Delete the customer from the database
require_once('database.php');
$query = "DELETE FROM customer
          WHERE Customer_Id = '$customer_id'";
$db->exec($query);

// display the Customer List page
header('location: ../Views/admin_index.php');
?>