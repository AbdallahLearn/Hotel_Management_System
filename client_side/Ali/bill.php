<?php
//database connection and select 

$conn = mysqli_connect('127.0.0.1', 'root' , 'root' , 'aaam');

if(!$conn){
    echo 'Error: ' . mysqli_connect_error();
}

$booking_id =1;
$sql_s = 'SELECT `city`.`city_name`, `hotel`.`hotel_name`, `room`.`category`, `room`.`price`, `booking`.`arrival_date`, `booking`.`departure_date`
FROM `city`
	, `hotel`
	, `room`
	, `booking`
    WHERE booking_id = ' . $booking_id;


$result = mysqli_query($conn, $sql_s);
$billinfo = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);

foreach($billinfo as $ifo)
$h_naem = htmlspecialchars($ifo['hotel_name']);
$room_catrgory = htmlspecialchars($ifo['category']);
$check_in = htmlspecialchars($ifo['arrival_date']);
$check_out = htmlspecialchars($ifo['departure_date']);
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
    <header>
        <a href="../Mohammad/main.html">Home</a> > <a href="../Mohammad/main.html">City</a> > <a href="#">Rooms</a>
    </header>
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
                <div class="bookingdate">
                    <h3 class="text-center">Booking date: </h3><h5><?php echo $booking_date ?></h5>
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

                <button type="submit" name="submit" class="btn btn-primary">Complete payment</button>
            </div>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div>
    </div>
    
</body>
</html>