<?php

// Include connection file
require_once("../settings/connection.php"); 

// Check for GET URL and chore ID
if (isset($_GET["habitID"])){

  $habitID = $_GET["habitID"];


  // Prepare and execute DELETE query
  $sql = "DELETE FROM Habits WHERE habitID = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $habitID);

  // Check for query execution success
  if ($stmt->execute()){

    $_SESSION["message"] = "Habit deleted";

    header("Location: ../view/all_habits_view.php"); // Redirect with success message

  } 
  else{
    $_SESSION["message"] = "Habit deletion failed";

    header("Location: ../admin/chore_control_view.php"); // Redirect with error message
    
  }

} 
else{

  $_SESSION["message"] = "Something is wrong";

  header("Location: ../admin/chore_control_view.php"); // Redirect if no chore ID provided
}

exit(); // Close database connection


?>

