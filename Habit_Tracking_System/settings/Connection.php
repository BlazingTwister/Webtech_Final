<?php

// Database connection parameters
$host = "localhost";
$user = "root";
$password = "";
$database = "HabitTracker";

// MySQLi connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";

?>