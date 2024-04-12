<?php

// Include connection file
require_once("../settings/connection.php"); 

// Include core file
require_once("../settings/core.php"); 

if (check_login()){

    if (isset($_GET["progressID"])){

        $progressID = $_GET["progressID"];


        require_once("get_a_progress_action.php"); 
        $progress = get_progress_by_id($progressID);
        
        $habit = $progress["habitName"];
        $current = $progress["currentNo"];
        $target = $progress["targetNo"];

        // Check if the target and currentProgress sessions are set
        if ($current != $target) {

            // Increment currentProgress
            $current++;

            // Calculate the completion percentage
            $completionPercentage = ($current / $target) * 100;

            if ($completionPercentage == 100){
                $completionStat = "Completed";
            }
            else {
                $completionStat = "In Progress";
            }



        }

        // Update the completion percentage and status in the database
        $sql = "UPDATE GoalProgress SET completionPercentage = ?, completionStat = ?, currentNo = ? WHERE progressID = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isii", $completionPercentage, $completionStat, $current, $progressID);
        
        if ($stmt->execute()){

            // Update successful
            $_SESSION["message"] = "Successfully increased completion for $habit";
            header("Location: ../view/progress_view.php"); // Redirect 
            exit();
            
          } 
          else{
            // Update failed
            $_SESSION["message"] = "Error updating chore: " . $stmt->error;
            header("Location: ../view/progress_view.php");
          }
          
          $stmt->close();

    } 
    else{
      echo "not meant to be here";
        //header("Location: ../admin/chore_control_view.php");  //Redirect
    }

}

?>

