<?php

// Include connection file
require_once("../settings/connection.php"); 

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST"){

    // Collect form data
    $HabitID = $_POST["habitID"];
    $habitName = $_POST["habitName"];
    $reminderType = $_POST["reminderType"];
    $reminderTime = $_POST["reminderTime"];
    $reminderDay = $_POST["reminderDay"];
    $frequency = $_POST["frequency"];
  
    
    // Validate chore name
    if (empty($habitName)) {
        echo "Error: Please enter a chore name.";
        header("Location: ../view/edit_habit_view.php");
    }

    // Prepare and execute UPDATE statement
    $sql = "UPDATE Habits
    SET
        habitName = ?,
        reminderType = ?,
        reminderTime = ?,
        reminderDay = ?,
        frequency = ?
    WHERE
        habitID = ?";
        

    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ssssii", $habitName, $reminderType, $reminderTime, $reminderDay, $frequency, $HabitID);



    if ($stmt->execute()){

        // Update successful
        $_SESSION["message"] = "Habit successfully updated";
        header("Location: ../view/all_habits_view.php"); // Redirect 
        exit();
        
      } 
      else{
        // Update failed
        $_SESSION["message"] = "Error updating chore: " . $stmt->error;
      }
      
      $stmt->close();
      
}

?>