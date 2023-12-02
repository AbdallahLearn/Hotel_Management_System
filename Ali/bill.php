<?php
/*database connection and select 

$conn = mysqli_connect('127.0.0.1', 'root' , 'root' , 'name of DB');

if(!$conn){
    echo 'Error: ' . mysqli_connect_error();
}
$sql_s = 'SELECT  FROM '

*/
$h_naem = "any name hotel";
$room_catrgory = "2 room";
$check_in = "12/12/2023";
$check_out = "13/12/2023";
$price = 100;
$tax = $price * 0.15;
$total = $price + $tax;
$booking_date = "10/12/2023";
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1><?php echo $h_naem ?></h1>
    <h2><?php echo $room_catrgory ?></h2>
    <h2><?php echo $check_in ?></h2>
    <h2><?php echo $check_out ?></h2>
    <h2><?php echo $price ?></h2>
    <h2><?php echo $tax ?></h2>
    <h2><?php echo $total ?></h2>
    <h2><?php echo $booking_date ?></h2>
</body>
</html>