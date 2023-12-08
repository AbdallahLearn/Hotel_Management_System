<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aaam";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate email and password (you can add more validation as needed)
    if (empty($email) || empty($password)) {
        $errorMessage = "Email and password are required!";
    } else {
        // Prepare and execute a query to fetch the user's details
        $sql = "SELECT * FROM  WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // User's credentials are correct, proceed to the dashboard or authorized area
            // Redirect to the dashboard or authorized area
            header("Location: service.php");
            exit();
        } else {
            // Invalid credentials
            $errorMessage = "<p style='color:red'>" .  "Invalid email or password!";
        }
    }
}

// Close the database connection
$conn->close();
?>
