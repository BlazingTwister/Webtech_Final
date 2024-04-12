<?php

// Start the session
session_start();


require_once("../settings/connection.php"); // Include connection file


// Function to check for login status
function check_login(){

    // Check do the person logged in
    if($_SESSION["username"]==NULL){
        // Not logged in
        echo "You haven't log in";
        header("Location: ../login/Login_view.php");  //Redirect to login page
        return false;
    }
    else{
        $username = $_SESSION["username"];
        // Logged in
        echo "Successfully logged in as $username ";
        return true;
    }
}



// Function to get the user ID based on the username
function get_user_id($username) {

    global $conn;

    // Query to select the userID based on the username
    $sql = "SELECT userID FROM Users WHERE username = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);

    // Execute the statement
    $stmt->execute();

    // Bind the result variable
    $stmt->bind_result($userID);

    // Fetch the result
    $stmt->fetch();

    // Close the statement
    $stmt->close();

    // Return the user ID
    return $userID;
}


?>