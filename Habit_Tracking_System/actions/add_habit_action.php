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
    $reminderType = $_POST["reminderType"];
    $reminderTime = $_POST["reminderTime"];
    $reminderDay = $_POST["reminderDay"];
    


    // Insert habit into database
    $sql = "INSERT INTO Habits (userID, habitName, reminderType, reminderTime, reminderDay) VALUES (?,?,?,?,?)";
    

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $userId, $habitName, $reminderType, $reminderTime, $reminderDay);

 
    try {
        if ($stmt->execute()) { // Successfully added habit to database

            $_SESSION["message"] = "Successfully added habit";

            // Redirect back to homepage.php 
            header("Location: ../view/homepage.php");
        }
        
    } catch (mysqli_sql_exception $exception) {
        if ($exception->getCode() === 1062) { // MySQL error code for duplicate entry

            $_SESSION["message"] = "Failed to add habit. The habit already exists.";

            header("Location: ../view/add_habit_view.php");
        } 
        else {
            $_SESSION["message"] = "Failed to add habit.";
            header("Location: ../view/add_habit_view.php");
        }
    }

} 
