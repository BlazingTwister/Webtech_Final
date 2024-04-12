<?php

require_once("../settings/connection.php"); // Include connection file

// add core to get user id
require_once("../settings/core.php");

$username = $_SESSION['username'];
$userId = get_user_id($username);

function get_all_habits($userId) {
  
  global $conn; // Access global database connection

  $sql = "SELECT * FROM Habits"; // Query to fetch all habits
  $result = mysqli_query($conn, $sql); // Execute query

  // Check for query execution errors
  if (!$result) {
    die("Error fetching chores: " . mysqli_error($conn));
  }

  // Check if any records were returned
  if (mysqli_num_rows($result) > 0) {
    $habits = mysqli_fetch_all($result, MYSQLI_ASSOC); // Fetch all rows as associative array
    return $habits; // Return the array of chores
  } 
  else {
    return []; // Return an empty array if no chores found
  }

  
}


function get_all_habits_progress($userId) {
  
  global $conn; // Access global database connection

  $sql = "SELECT * FROM GoalProgress"; // Query to fetch all habits progress
  $result = mysqli_query($conn, $sql); // Execute query

  // Check for query execution errors
  if (!$result) {
    die("Error fetching chores: " . mysqli_error($conn));
  }

  // Check if any records were returned
  if (mysqli_num_rows($result) > 0) {
    $progress = mysqli_fetch_all($result, MYSQLI_ASSOC); // Fetch all rows as associative array
    return $progress; // Return the array of chores
  } 
  else {
    return []; // Return an empty array if no chores found
  }

  
}



