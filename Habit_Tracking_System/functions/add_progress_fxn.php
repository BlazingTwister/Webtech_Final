<?php

//add connection
require_once("../settings/connection.php");


//Function to add progresses for goals in the the database
function addProgressFunction($habitName, $userId, $sDate, $targetNumberOfTimes) {
    
    global $conn;

    $completionStat = "Incomplete";
    $completionPercentage = 0;
    
    

    $sql = "INSERT INTO GoalProgress (habitName, userID, sDate, completionStat, completionPercentage, targetNo) VALUES (?,?,?,?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sissii", $habitName, $userId, $sDate, $completionStat, $completionPercentage, $targetNumberOfTimes);

 
    try {
        if ($stmt->execute()) { // Successfully added habit to database

            $_SESSION["message"] = "Progress for habit $habitName is now being tracked. ";

            // Redirect back to homepage.php 
            header("Location: ../view/homepage.php");
        }
        
    } catch (mysqli_sql_exception $exception) {
        if ($exception->getCode() === 1062) { // MySQL error code for duplicate entry

            $_SESSION["message"] = "Progress is already being tracked for the habit: $habitName.";

            header("Location: ../view/set_goals_view.php");
        } 
        else {
            $_SESSION["message"] = "Failed to track progress.";
            header("Location: ../view/set_goals_view.php");
        }
    }

}

