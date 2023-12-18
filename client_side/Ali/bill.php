<?php
//database connection and select 

include './conn.php';


$booking_id = isset($_GET['booking_id']) ? $_GET['booking_id'] : null;

$sql_s = 'SELECT `booking`.`arrival_date`, `booking`.`departure_date`, `booking`.`num_children`, `booking`.`num_adults`,`room`.`category`, `room`.`price`, `hotel`.`hotel_name`, `city`.`city_name`
FROM `booking` 
	LEFT JOIN `room` ON `room`.`booking_id` = `booking`.`booking_id` 
	LEFT JOIN `hotel` ON `room`.`hotel_id` = `hotel`.`hotel_id` 
	LEFT JOIN `city` ON `hotel`.`city_id` = `city`.`city_id`
    WHERE booking.booking_id =' . $booking_id;


$result = mysqli_query($conn, $sql_s);
$billinfo = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);

foreach($billinfo as $ifo)
$h_naem = htmlspecialchars($ifo['hotel_name']);
$room_catrgory = htmlspecialchars($ifo['category']);
$check_in = htmlspecialchars($ifo['arrival_date']);
$check_out = htmlspecialchars($ifo['departure_date']);
$num_children = htmlspecialchars($ifo['num_children']);
$num_adults = htmlspecialchars($ifo['num_adults']);
$price = htmlspecialchars($ifo['price']);
$tax = $price * 0.15;
$total = $price + $tax;
$booking_date = "10/12/2023";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet" href="billStyle.css">
</head>
<body>
    <div class="header">
        <div class="header-right">
            <a href="../../city.html">Home</a>
            <a href="./contact.html">Contact</a>
            <a href="./about.html">About</a>
            <a href="../../login.html">Login</a>
            <a href="../../signup">Sign Up</a>
        </div>
    </div>

    <div class="nav">
        <a href="../../../city.html">Home</a> > <a href="../../../hotel_makkah">Hotel</a> > <a href="../../../booking">Booking</a> > <a href="#">Bill</a>
    </div>

    <div class="container">
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light shadow-lg" id="box">
            <div class="col-md-50 p-lg-2 mx-auto my-1">
                <h1 class="text-center"><?php echo $h_naem ?></h1>
                <br>
                <div class="category">
                    <h3 class="text-center">Room category: </h3><h5><?php echo $room_catrgory ?></h5>
                </div>
                <div id="check">
                    <h3 class="text-center">Check in: </h3><h5><?php echo $check_in ?></h5>
                    <h3 class="text-center">Check out: </h3><h5><?php echo $check_out ?></h5>
                </div>
                <div id="check">
                    <h3 class="text-center">number adults: </h3><h5><?php echo $num_adults ?></h5>
                    <h3 class="text-center">number children: </h3><h5><?php echo $num_children ?></h5>
                </div>
                <div class="price">
                    <div class="group">
                        <h3 class="text-center">Price: </h3>
                        <h5><?php echo $price ?></h5>
                    </div>

                    <div class="group">
                        <h3 class="text-center">Tax: </h3>
                        <h5><?php echo $tax ?></h5>
                    </div>

                    <div class="group">
                        <h3 class="text-center">Total: </h3>
                        <h5><?php echo $total ?></h5>
                    </div>
                </div>

                <br>
                <div class="form-group">
                    <button id="check_availability" type="submit"><a href="./payment.php">Complete payment</a></button>
                </div>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div>
    </div>
    <footer>
        <p>The website created by <strong>Abdallah</strong>  ,  <strong>Abdalaziz</strong>   ,  <strong>Ali</strong>   ,   <strong>Mohammad</strong></p>
    </footer>
</body>
</html>