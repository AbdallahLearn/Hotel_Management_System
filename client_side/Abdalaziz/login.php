<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aaam";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare and execute a query to fetch the customer's details
    $sql = "SELECT * FROM customers 
            WHERE email = '$email' AND password = '$password';";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Customer's credentials are correct, proceed to the dashboard or authorized area
        // Redirect to the dashboard or authorized area
       
        header("Location: ../Mohammad/main.html");
        exit();
    } else {
        // Invalid credentials
        echo "<p style='color:red'>" . "Invalid email or password!" . "</p>";
    }
}

// Close the database connection
mysqli_close($conn);
?>
