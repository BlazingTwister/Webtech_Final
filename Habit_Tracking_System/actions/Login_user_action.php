<?php

// Start session
session_start();

// Include connection file
require_once("../settings/connection.php");

// Check if login button was clicked
if ($_SERVER["REQUEST_METHOD"] === "POST") {

  // Collect form data
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Prepare SQL query
  $sql = "SELECT userID, passwd, username 
          FROM Users 
          WHERE email = ?" ;

  // Prepare and execute the statement
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $email);
  $stmt->execute();

  // Get the result set
  $stmt = $stmt->get_result();


  // Check if any row was returned
  if ($stmt->num_rows === 1) {
    $result = $stmt->fetch_assoc();  // Row returned

    // Verify password
    if (password_verify($password, $result["passwd"])) {

      // Password matches, create session and redirect based on role
      $username = $result["username"];
      $_SESSION["username"] = $username;  //Session for Username

  
      header("Location: ../view/homepage.php");
      die(); 

    } 
    else {
      // Incorrect password
      $_SESSION["message"] = "Incorrect username or password.";
    }

  } 
  else {

    // User not found
    $_SESSION["message"] = "User not registered.";
    header("Location: ../Login/register_view.php");
  }

} 
else {
  // Not a POST request, redirect to login page
  header("Location: ../Login/Login_view.php");
  die();
}

?>