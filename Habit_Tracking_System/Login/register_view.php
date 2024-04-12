<!DOCTYPE html>

<head>
    <title>Habit Tracking System - Register Page</title>

    <link rel="stylesheet" href="../css/Habit.css"> 

    <script src="../js/register-validation.js"></script>

    <?php
    require_once("../settings/connection.php");
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
    
    <main>

        <h1>Create Your Account</h1>
        <p>Join us to track your habits effectively !</p>

        <div style="text-align: center;">
        <form action="../actions/register_user_action.php" method="post" name="registrationForm" id="registration-form">
            
            <label for="user-name">Username:</label>
            <input type="text" placeholder="Enter a Username" name="username" id="user-name" required>

            <p></p>
            <label for="first-name">First Name:</label>
            <input type="text" placeholder="Enter your first name" name="firstName" id="first-name" required>

            <p></p>
            <label for="last-name">Last Name:</label>
            <input type="text" placeholder="Enter your last name" name="lastName" id="last-name" required>

            <p></p>
            <label for="gender">Gender:</label>
            <div>
                <input type="radio" name="gender" id="gender-male" value="Male">
                <label for="gender-male">Male</label>

                <input type="radio" name="gender" id="gender-female" value="Female">
                <label for="gender-female">Female</label>
            </div>


            <p></p>
            <label for="email">Email:</label>
            <input type="email" placeholder="Enter your email address" name="email" id="email" required>

            <p></p>
            <label for="password">Password:</label>
            <input type="password" placeholder="Enter your password" name="password" id="password" required minlength="8">

            <p></p>
            <label for="password-retype">Confirm Password:</label>
            <input type="password" placeholder="Retype your password" name="passwordRetype" id="password-retype" required minlength="8">

            <p></p>
            <button type="submit" name="register_now" id="register">Register</button>

        </form>
        </div>

        <p> Already have an account? <a href="Login_view.php">Login here</a> </p>
    </main>

    <footer>
    </footer>

</body>

</html>