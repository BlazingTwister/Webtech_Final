<?php

//add connection
require_once("../settings/connection.php");

// add core to get user id
require_once("../settings/core.php");


$username = $_SESSION['username'];
$userId = get_user_id($username);


// Check if form is submitted 
if ($_SERVER["REQUEST_METHOD"] === "POST" ){

    //Collect form data
    $habitName = $_POST["habitName"];
    $goalDescription = $_POST["description"];
    $targetNumberOfTimes = $_POST["timesNo"];
    $frequency = $_POST["frequency"];
    $progress = 0;
    
    $_SESSION["current"] = 0;  //Current Progress


    //add to get habit id
    require_once("get_a_habit_action.php");

    $habitId = get_habit_by_name($habitName);


    // Get the current date
    $sDate = date("Y-m-d");  //Start date


    //To start tracking progress for the goal
    require_once("../functions/add_progress_fxn.php");

    addProgressFunction($habitName, $userId, $sDate, $targetNumberOfTimes);



    $sql = "INSERT INTO Goals (habitID, userID, goalDescription, targetNumberOfTimes, targetFrequency, progress) VALUES (?,?,?,?,?)";
    

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisis", $habitId, $userId, $goalDescription, $targetNumberOfTimes, $frequency);

 
    try {
        if ($stmt->execute()) { // Successfully added habit to database

            $_SESSION["message"] = "Successfully set a goal for habit $habitName. ";

            // Redirect back to homepage.php 
            header("Location: ../view/homepage.php");
        }
        
    } catch (mysqli_sql_exception $exception) {
        if ($exception->getCode() === 1062) { // MySQL error code for duplicate entry

            $_SESSION["message"] = "Failed to set Goal. There is already a goal for the habit: $habitName.";

            header("Location: ../view/add_habit_view.php");
        } 
        else {
            $_SESSION["message"] = "Failed to set Goal.";
            header("Location: ../view/add_habit_view.php");
        }
    }

} 