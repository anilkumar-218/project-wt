<?php 
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Retrieve the posted data
    $user_name = $_POST['username'];
    $password = $_POST['password'];

    // Validate inputs
    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        // Generate a unique user ID and save to the database
        $user_id = random_num(20);
        $query = "INSERT INTO users (user_id, user_name, password) VALUES ('$user_id', '$user_name', '$password')";
        mysqli_query($con, $query);

        // Redirect to login page
        header("Location: login.php");
        die;
    } else {
        echo "Please enter some valid information!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Recipe Collection</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
 
    <div class="signup-container">
        <h1>Create an Account</h1>
        <form method="POST" action="">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required placeholder="Enter your username">
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Create a password">
            </div>
            <button type="submit" class="signup-btn">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>