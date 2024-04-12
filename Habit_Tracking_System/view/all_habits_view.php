<!DOCTYPE html>

<head>
    <title>Habit Control</title>
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="../css/Habit.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    

    <?php

        // Include core.php to check user login status
        require_once("../settings/core.php");

        if (check_login()){  
    ?>

</head>

<body>
    
    <header>
      All habits
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

      <h2>List of Habits</h2>
      
      <main>
        <?php

        // Include the chore_fxn.php file to display the list of chores using the function
        require_once("../functions/habit_fxn.php");

        echo "";

        //Function to view all habits progress
        require_once("../functions/habit_progress_fxn.php");
        ?>

      </main>
        
        <?php
      
      
    } 
    else {
      echo "You are not authorized to access this page.";
    }

    
  ?>


</body>

</html>
