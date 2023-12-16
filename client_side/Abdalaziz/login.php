<?php
// Database connection parameters
$servername = "localhost";
$username = "abood";
$password = "AA1122ss";
$dbname = "aaam";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to securely hash passwords
function verifyPassword($password, $hashedPassword) {
    // Verify if the provided password matches the hashed password
    return password_verify($password, $hashedPassword);
}

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // SQL query to retrieve the hashed password for the given email
    $sql = "SELECT * FROM customer WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, verify the password
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];

        if (verifyPassword($password, $hashedPassword)) {
            // Password is correct, login successful
            echo "Login successful!";
        } else {
            // Password is incorrect
            echo "Login failed. Please check your email and password.";
        }
    } else {
        // User not found
        echo "Login failed. Please check your email and password.";
    }
}

// Close the database connection
$conn->close();
?>