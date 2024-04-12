<!DOCTYPE html>

<head>
    <title>Habit Tracking System - Add Goal View</title>
    <link rel="stylesheet" href="../css/Habit.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <?php

    // Include core.php to check user login status
    require_once("../settings/core.php");

    //include select options function to display habit options
    require_once("../functions/select_options_fxn.php");

    // Check if user is logged in 
    if (check_login()){  
    ?>

</head>

<body>
    <header>
        Set Your Goals
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

        <form action="../actions/add_goal_action.php" method="post">

            <label for="habit-name">Habit Name:</label> 
            <select name="habitName" id="habit-name">
                <?php
                    echo getHabitOptions();
                ?>
            </select>
            <p></p>

            <label for="num-times">How many times do you want to do this?:</label> 
            <input type= "number" name="timesNo" id="num-times" min=0 value=1 required>
            <p></p>

            <label for="frequency-Type">How frequently do you want to do this?:</label> 
            <select name="frequency" id="frequency-Type">
                <?php
                    echo getReminderOptions();
                ?>
            </select>
            <p></p>

            <label for="description">Write a description for your goal:</label> 
            <input type="text" name="description" id="description" placeholder="Enter your goal description" >

            <button type="submit">Set Goal</button>
        </form>

    </main>

</body>

<?php
    } 
    else {
        $_SESSION["message"] = "You are not authorized to access this page.";
      header("Location:../login/Login_view.php");  //Redirect to login page
    }

    
  ?>