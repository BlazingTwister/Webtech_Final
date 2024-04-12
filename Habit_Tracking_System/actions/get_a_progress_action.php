<?php

// Include connection file
require_once("../settings/connection.php"); 

//Function to get a progress by id
function get_progress_by_id($progressId){

  global $conn; // Access global database connection

  $sql = "SELECT * FROM GoalProgress WHERE progressId = ?"; 

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $progressId);

  // Check for query execution success
  if ($stmt->execute()){

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

      // Get the result set
      
      $progress = $result->fetch_assoc();

      return $progress;  // return the result

    }
    else{
      $_SESSION["message"] = "progress not found";
    }
  } 
  else{
    $_SESSION["message"] = "Error while finding progress"; 
  }

}