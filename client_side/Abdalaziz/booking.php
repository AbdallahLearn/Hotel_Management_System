    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "aaam";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $city = $_POST['city'];
        $check_in = $_POST['cheick_in'];
        $check_out = $_POST['cheick_out'];
        $num_adults = $_POST['num_adults'];
        $num_children = $_POST['num_children'];

        // Insert data into the database
        $sql = "INSERT INTO bookings (city, check_in, check_out, num_adults, num_children) 
            VALUES ('$city', '$check_in', '$check_out', '$num_adults', '$num_children')";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the payment page
            header("Location: ../Ali/payment.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
