<?php
// Start session to track user
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Room</title>
</head>
<body>
    <h1>Book a Room</h1>
    <form method="POST" action="process_transaction.php">
        <label>Enter Your Name:</label>
        <input type="text" name="user_name" placeholder="Your Name" required><br><br>

        <label>Select Room Type:</label>
        <select name="room_type" required>
            <option value="Standard">Standard</option>
            <option value="Deluxe">Deluxe</option>
        </select><br><br>

        <label>Enter Amount:</label>
        <input type="number" name="amount" placeholder="Amount to Pay" min="0" required><br><br>

        <button type="submit">Book Room</button>
    </form>
</body>
</html>
