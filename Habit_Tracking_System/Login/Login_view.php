<?php require_once("../settings/connection.php"); ?>

<!DOCTYPE html>

<head>
    <title>Habit Tracking System - Login Page</title>

    <link rel="stylesheet" href="../CSS/HabIt.css">

    <script src="../js/login-validation.js"></script>
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
    
    <main>
        <h1>Welcome, Please login!</h1>
        
        <div style="text-align: center;">
        <form action="../actions/login_user_action.php" method="post" name="loginForm" id="loginform">

            <label for="email">Email:</label>
            <input type="email" placeholder="Enter your email address" name="email" id="email" required>

            <p></p>
            <label for="password">Password:</label>
            <input type="password" placeholder="Enter your password" name="password" id="password" required >

            <p></p>
            <button type="submit" name="submit" id="sign-in">Sign In</button>

        </form>
        </div>


        <p> Don't have an account? <a href="register_view.php">Register here</a> </p>
    </main>

    <footer>
    </footer>

</body>


</html>
