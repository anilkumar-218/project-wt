<?php
// Include the database connection file
include("connection.php");

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Retrieve form data
    $user_name = $_POST['user_name'];
    $room_type = $_POST['room_type'];
    $amount = $_POST['amount'];

    // Validate input
    if (!empty($user_name) && !empty($room_type) && $amount > 0) {
        // Prepare the SQL query to insert transaction
        $query = "INSERT INTO transactions (user_name, room_type, amount_paid) 
                  VALUES ('$user_name', '$room_type', '$amount')";

        // Execute the query
        if (mysqli_query($con, $query)) {
            echo "<h3>Transaction Successful!</h3>";
            echo "Thank you, $user_name. You have booked a $room_type room for $$amount.<br>";
            echo "<a href='transaction_form.php'>Book Another Room</a>";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Invalid input. Please fill out the form correctly.";
    }
} else {
    echo "Unauthorized Access.";
}
?>
