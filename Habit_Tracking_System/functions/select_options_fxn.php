<?php

require_once("../settings/connection.php");

//Function to select the reminder options from the database
function getReminderOptions() {

    global $conn;

    $sql = "SELECT rType FROM Reminder";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error fetching reminder types: " . mysqli_error($conn));
    }

    $dropdown_options = "";

    while ($row = mysqli_fetch_assoc($result)) {
        $rType = $row["rType"];
        $dropdown_options .= "<option value='$rType'>$rType</option>";
    }

    mysqli_free_result($result);

    return $dropdown_options;
}

//Function to select day options from the database
function getDayOptions() {

    global $conn;
    
    $sql = "SELECT dayN FROM DaysOfWeek";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error fetching day names: " . mysqli_error($conn));
    }

    $dropdown_options = "";

    while ($row = mysqli_fetch_assoc($result)) {
        $dayN = $row["dayN"];
        $dropdown_options .= "<option value='$dayN'>$dayN</option>";
    }

    mysqli_free_result($result);

    return $dropdown_options;
}


//Function to select habit options from the database
function getHabitOptions() {

    global $conn;
    
    $sql = "SELECT habitName FROM Habits";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error fetching day names: " . mysqli_error($conn));
    }

    $dropdown_options = "";

    while ($row = mysqli_fetch_assoc($result)) {
        $habitName = $row["habitName"];
        $dropdown_options .= "<option value='$habitName'>$habitName</option>";
    }

    mysqli_free_result($result);

    return $dropdown_options;
}

?>