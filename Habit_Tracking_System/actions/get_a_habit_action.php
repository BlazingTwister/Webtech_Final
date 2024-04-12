<?php

// Include connection file
require_once("../settings/connection.php"); 

//Function to get a habit by id
function get_habit_by_id($habitId){

  global $conn; // Access global database connection

  $sql = "SELECT * FROM Habits WHERE habitID = ?"; 

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $habitId);

  // Check for query execution success
  if ($stmt->execute()){

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

      // Get the result set
      
      $habit = $result->fetch_assoc();

      return $habit;  // return the result

    }
    else{
      $_SESSION["message"] = "Habit not found";
    }
  } 
  else{
    $_SESSION["message"] = "Error while finding habit"; 
  }

}


//Function to get a habit by Name
function get_habit_by_name($habitName){

  global $conn; // Access global database connection

  $sql = "SELECT * FROM Habits WHERE habitName = ?"; 

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $habitName);

  // Check for query execution success
  if ($stmt->execute()){

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

      // Get the result set
      
      $habit = $result->fetch_assoc();

      return $habit;  // return the result

    }
    else{
      $_SESSION["message"] = "Habit not found";
    }
  } 
  else{
    $_SESSION["message"] = "Error while finding habit"; 
  }

}

?>
