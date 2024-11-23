<?php
session_start();

include("connection.php");
include("functions.php");

// Initialize error messages
$login_error_message = '';
$logo_error_message = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Retrieve the posted data
    $user_name = $_POST['username'];
    $password = $_POST['password'];

    // Validate inputs
    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        // Check for user in the database
        $query = "SELECT * FROM users WHERE user_name = '$user_name' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            if ($user_data['password'] === $password) {
                // Set session and redirect to index page
                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: index.php");
                die;
            } else {
                // Wrong password
                $login_error_message = "You entered incorrect username or password. Please try again.";
                $logo_error_message = "Wrong username or password!";
            }
        } else {
            // No user found
            $login_error_message = "You entered incorrect username or password. Please try again.";
            $logo_error_message = "Wrong username or password!";
        }
    } else {
        // Empty fields or invalid username
        $login_error_message = "You entered incorrect username or password. Please try again.";
        $logo_error_message = "Wrong username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login -Our Hotel</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <div class="logo-container">
           
        </div>

        <h1>Login to Our Hotel</h1>

        <form method="POST" action="">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required placeholder="Enter your username">
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">
            </div>
            
            <button type="submit" class="login-btn">Login</button>
            
            <!-- Display error message below the login button -->
            <?php if (!empty($login_error_message)): ?>
                <div class="error-message" style="color: red; font-size: 14px; margin-top: 10px;"><?php echo $login_error_message; ?></div>
            <?php endif; ?>
        </form>

        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
    </div>
</body>
</html>