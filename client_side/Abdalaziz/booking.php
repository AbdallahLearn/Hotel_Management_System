<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AAAM";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $city = $_POST['city'];
    $arrivalDate = $_POST['arrival_date'];
    $departureDate = $_POST['departure_date'];
    $numAdults = $_POST['num_adults'];
    $numChildren = $_POST['num_children'];

    // Insert data into the database
    $sql = "INSERT INTO reservations (city, arrival_date, departure_date, num_adults, num_children) 
            VALUES ('$city', '$arrivalDate', '$departureDate', '$numAdults', '$numChildren')";

    if ($conn->query($sql) === TRUE) {
        echo "Reservation successfully submitted!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // If the form is not submitted, redirect to the form page
    header("Location: your_booking_form_page.html");
    exit();
}

// Close the database connection
$conn->close();
?>

