<?php
// Get ID
$feedback_id = $_POST['Feedback_Id'];

// Delete the customer from the database
require_once('database.php');
$query = "DELETE FROM feedback
          WHERE Feedback_Id = '$feedback_id'";
$db->exec($query);

// display the Customer List page
header('location: ../Views/admin_index.php');
?>