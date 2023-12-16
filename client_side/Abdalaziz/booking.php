<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name"; // Replace with your actual database name

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$booking_id = isset($_GET['booking_id']) ? $_GET['booking_id'] : null;

// Retrieve booking information
$sql = "SELECT * FROM booking WHERE booking_id = " . $booking_id;
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}

$bookingInfo = mysqli_fetch_assoc($result);

mysqli_free_result($result);
mysqli_close($conn);
?>