<!DOCTYPE html>

<head>
    <title>Habit Tracking System - Add Habit View</title>
    <link rel="stylesheet" href="../css/Habit.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <?php

    // Include core.php to check user login status
    require_once("../settings/core.php");

    //include select options function to display days and reminder options
    require_once("../functions/select_options_fxn.php");

    // Check if user is logged in 
    if (check_login()){  
    ?>

</head>

<body>
    <header>
        Add a new habit
    </header>
    
    <!-- div for displaying error messages -->
    <?php
    if (isset($_SESSION["message"])) {
        ?>
        <div class="message-box">
            <?php
            echo $_SESSION["message"];
            unset($_SESSION["message"]); // Clear the message to prevent displaying it again
            ?>
        </div>
        <?php
    }
    ?>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Habit Tracker</h2>
        <ul>
            <li><a href="homepage.php">Home</a></li>
            <li><a href="../Login/logout_view.php">Logout</a></li>
        </ul>
    </div>
    
    <main>

        <form action="../actions/add_habit_action.php" method="post">

            <label for="habit-name">Habit Name:</label> 
            <input type="text" name="habitName" id="habit-name" placeholder="e.g: Jogging" required>

            <label for="reminder-Type">Select a reminder option:</label> 
            <select name="reminderType" id="reminder-Type">
                <?php
                    echo getReminderOptions();
                ?>
            </select>
            <p></p>

            <label for="reminder-Time">Select a reminder time:</label> 
            <input type= "time" name="reminderTime" id="reminder-Time">
            <p></p>

            <label for="reminder-day">select day to start remiders:</label>
            <select name="reminderDay" id="reminder-day">
                <?php
                    echo getDayOptions();
                ?>
            </select>
            <p></p>

            <button type="submit">Add Habit</button>
        </form>

    </main>

</body>

<?php
    } 
    else {
      echo "You are not authorized to access this page.";
      header("Location:../login/Login_view.php");  //Redirect to login page
    }

    
?>