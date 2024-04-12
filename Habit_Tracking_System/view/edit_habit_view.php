<?php

// Include connection file
require_once("../settings/connection.php"); 

// Include core file
require_once("../settings/core.php"); 


//include select options function to display days and reminder options
require_once("../functions/select_options_fxn.php");

if (check_login()){

    // Include get  chore file
    require_once("../actions/get_a_habit_action.php"); 


    if (isset($_GET["habitID"])){

        $ret_var = $_GET["habitID"];

        $habit = get_habit_by_id($ret_var);  //2nd variable

    } 
    else{
      echo "not meant to be here";
        //header("Location: ../admin/chore_control_view.php");  //Redirect
    }

}

?>

<!DOCTYPE html>

<head>
  <title>Edit Habit</title>
    <link rel="stylesheet" href="../css/Habit.css">
    <link rel="stylesheet" href="../css/sidebar.css">

</head>

<body>

    <header>
        Editing a Habit
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


  <h1>Edit Habit</h1>
  
  <main>
    <form id="edit-habit-form" action="../actions/edit_a_habit_action.php" method="POST">

        <input type="hidden" name="habitID" value="<?php echo $ret_var ?> ">

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

        <label for="reminder-day">select day for remider:</label>
        <select name="reminderDay" id="reminder-day">
            <?php
                echo getDayOptions();
            ?>
        </select>
        <p></p>

        <label for="frequency">Frequency:</label> 
        <input type="text" name="frequency" id="frequency" placeholder="e.g once, twice, 3 times...." required>


        <button type="submit" id="submitBtn">Update Habit</button>
    </form>
  </main>
  
</body>

</html>
