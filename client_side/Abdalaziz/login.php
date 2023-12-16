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

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute a query to insert the user with hashed password
    $sql = "INSERT INTO customers (email, password) VALUES ('$email', '$hashed_password')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // User successfully registered, you can redirect or perform additional actions
        header("Location: ../Mohammad/city.html");
    } else {
        // Registration failed
        echo "Error: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
