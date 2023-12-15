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

        $booking_id = random_int(10000, 99999);

        // Retrieve form data
        $city = $_POST['city'];
        $check_in = $_POST['cheick_in'];
        $check_out = $_POST['cheick_out'];
        $num_adults = $_POST['num_adults'];
        $num_children = $_POST['num_children'];

        // Insert data into the database
        $sql = "INSERT INTO booking (booking_id, arrival_date, departure_date, num_adults, num_children) 
            VALUES ('$booking_id', '$check_in', '$check_out', '$num_adults', '$num_children')";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the payment page
            header("Location: ../Ali/bill.php?booking_id=" . $booking_id);
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
