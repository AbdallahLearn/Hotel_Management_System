<?php

include './conn.php';


$booking_id = isset($_GET['booking_id']) ? $_GET['booking_id'] : null;


$room_catrgory = '3 Bed, 2 B';
$price = 100;
$tax = $price * 0.15;
$total = $price + $tax;

$paymentMethod = $_POST['paymentMethod'];
$cc_name = $_POST['cc-name'];
$cc_number = $_POST['cc-number'];
$cc_cvv = $_POST['cc-cvv'];


$errors = [
  'cc_number' =>'',
  'cc_cvv' =>'',
  'emailError' =>'',
];

if (isset($_POST['submit'])){
  if (strlen($cc_number) != 16){
    $errors['cc_number'] = 'Credit card number must be 16 numbers';
  }
  if(strlen($cc_cvv) != 3){
    $errors['cc_cvv'] = 'CVV must be 3 numbers';
  }else{

  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet" href="paymentStyle.css">

  </head>
  <body>
    <header>
      <h1>AAAM Hotel</h1>
        <nav>
          <ul>
            <li><a href="../Mohammad/main.html">Home</a></li>
              <li><a href="#">Rooms</a></li>
              <li><a href="../Mohammad/main.html">City</a></li>     
          </ul>
        </nav>
    </header>

    <div class="container">
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your bill</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">room catrgory</h6>
              <small class="text-muted"><?php echo $room_catrgory ?></small>
            </div>
            <span class="text-muted">$<?php echo $price ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Tax</h6>
              <small class="text-muted">15%</small>
            </div>
            <span class="text-muted">$<?php echo $tax ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>$<?php echo $total ?></strong>
          </li>
        </ul> 
      </div>
      
      <div class="col-md-7 col-lg-8">
        <form class="needs-validation" action="payment.php" method="POST">
          <h4 class="mb-3">Payment</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked="" required="">
              <label class="form-check-label" for="credit">Credit card</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required="">
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
          </div>

          <div class="row gy-3">

            <div class="col-md-6">
              <label for="cc-name" class="form-label">Name on card</label>
              <input type="text" class="form-control" id="cc-name" name="cc-name" placeholder="" >
              <small class="text-muted">Full name as displayed on card</small>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Credit card number</label>
              <input type="text" class="form-control" id="cc-number" name="cc-number" placeholder="">
              <small class="text-muted"><?php echo $errors['cc_number']?></small>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" name="cc-cvv" placeholder="" required="">
              <small class="text-muted"><?php echo $errors['cc_cvv']?></small>
            </div>

          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit" name="submit" >Continue to checkout</button>
        </form>
      </div>
    </div>
    </div>
</body>
</html>
