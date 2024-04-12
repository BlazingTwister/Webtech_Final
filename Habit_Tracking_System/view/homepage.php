<!DOCTYPE html>

<head>
    <title>Habit Tracking System - Homepage</title>
    <link rel="stylesheet" href="../css/Habit.css">
    <link rel="stylesheet" href="../css/sidebar.css">

    <?php
    // Include core.php to check user login status
    require_once("../settings/core.php");

    // Check if user is logged in 
    if (check_login()){  
    ?>


</head>

<body>

    <header>

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
            <li><a href="#">Home</a></li>
            <li><a href="../Login/logout_view.php">Logout</a></li>
        </ul>
    </div>

    <!-- Main content -->
    <div class="content">
        <header>
            <h1>Welcome to Habit Tracker</h1>
        </header>

        <main>
            
            <div> 
                <p>Add a new habit </p> <a href="add_habit_view.php"> here </a> 
            </div>


            <div> 
                <p>View all habits </p> <a href="all_habits_view.php"> here </a> 
            </div>

            <div> 
                <p>Set Goals</p> <a href="set_goals_view.php"> here </a> 
            </div>
            
            <div> 
                <p>Check Progress </p> <a href="progress_view.php"> here </a> 
            </div>

        </main>

        <footer>
        </footer>
    </div>

    <?php
    } 
    else {
      echo "You are not authorized to access this page.";
    }
  ?>

</body>
</html>
