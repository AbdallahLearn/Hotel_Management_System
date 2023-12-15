<?php
// Database connection parameters
$servername = "localhost";
$username = "abood";
$password = "AA1122ss";
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

    // Fetch the hashed password from the database
    $sql = "SELECT * FROM customers WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, proceed to the dashboard or authorized area
            header("Location: ../Mohammad/main.html");
            exit();
        } else {
            // Invalid credentials
            echo "<p style='color:red'>" . "Invalid email or password!" . "</p>";
        }
    
}

}

// Close the database connection
mysqli_close($conn);
?>
