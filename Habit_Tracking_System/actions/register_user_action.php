<?php
require_once("../settings/connection.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST")

  // Collect form data
  $username = $_POST["username"];
  $fname = $_POST["firstName"];
  $lname = $_POST["lastName"];
  $gender = $_POST["gender"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Encrypt password
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  
  // Prepare and execute INSERT statement
  $sql = "INSERT INTO Users (username, fname, lname, gender, email, passwd) 
          VALUES (?, ?, ?, ?, ?, ?)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssssss", $username, $fname, $lname, $gender, $email, $hashed_password);


  if ($stmt->execute()){
    // Registration successful
    
    $_SESSION["username"] = $username;  //Session for Username

    $_SESSION["message"] = "Registration successful, please Login.";
    header("Location: ../Login/Login_view.php");

    exit(); // Ensure script termination after redirection
  } 
  else {

    // Registration failed, display error message
    $_SESSION["message"] = "Registration failed: " . $stmt->error;
  }

  

?>
