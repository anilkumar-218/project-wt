<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking System - Home</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Set background image for the entire page */
        body {
            background-image: url('srooms/sroom--3.jpg'); /* Relative path to the image */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Ensures the footer stays at the bottom */
        }

        /* Header styling */
        header {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 10px;
            text-align: center;
        }

        header nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-size: 16px;
        }

        header nav a:hover {
            text-decoration: underline;
        }

        /* Main Content */
        .home-section {
            flex: 1; /* This ensures the home section takes up the remaining space */
            text-align: center;
            color: white;
            padding: 50px;
            background-color: rgba(0, 0, 0, 0.5); /* Optional: Adds a dark overlay for better text contrast */
        }

        .home-section h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .home-section p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .button {
            padding: 10px 20px;
            background-color: #f0ad4e;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #e6953a;
        }

        /* Footer styling */
        footer {
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            text-align: center;
            padding: 15px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <nav>
            <a href="index.php">Home</a>
            <a href="rooms.html">Rooms</a>
            <a href="Services.html">Services</a> <!-- Added Services link -->
            <a href="about.html">About</a>
            <a href="contact.html">Contact Us</a>
            <a href="login.php">Logout</a>
            
        </nav>
    </header>

    <!-- Main Content -->
    <section class="home-section">
        <h1 style="color:white">Welcome to Our Hotel</h1>
        <p>Enjoy a luxurious stay at our hotel with premium amenities and services.</p>
        <a href="rooms.html" class="button">Browse Rooms</a>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Hotel Booking System. All Rights Reserved.</p>
    </footer>

</body>
</html>
