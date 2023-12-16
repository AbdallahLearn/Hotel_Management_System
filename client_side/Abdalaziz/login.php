<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aaam";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM customer WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        
        header("Location: ../Mohammad/city.html"); 
    } else {
       
        echo "Invalid email or password";
    }
}
?>
