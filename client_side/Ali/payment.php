<?php

include './conn.php';



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
   
   header("Location: ../Mohammad/city.html");
   exit();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet" href="paymentStyle.css">

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
    <a href="../../../city.html">Home</a> > <a href="../../../hotel_makkah">Hotel</a> > <a href="../../../booking">Booking</a> > <a href="../../../bill">Bill</a> > <a href="#">Payment</a>
    </div>
    <div class="container">
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light shadow-lg" id="box">
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your bill</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">room catrgory</h6>
              <small class="text-muted">standard</small>
            </div>
            <span class="text-muted">$150</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Tax</h6>
              <small class="text-muted">15%</small>
            </div>
            <span class="text-muted">$22.5</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>$172.5</strong>
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
              <label for="cc-number" class="form-label">Credit card number</label >
              <input type="text" class="form-control" id="cc-number" name="cc-number" placeholder="">
              <small class="text-muted" id="ErMsg"><?php echo $errors['cc_number']?></small>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" name="cc-cvv" placeholder="" required="">
              <small class="text-muted" id="ErMsg"><?php echo $errors['cc_cvv']?></small>
            </div>

          </div>

          <hr class="my-4">
          <div class="form-group">
              <button id="check_availability" type="submit" name="submit">Continue to checkout</button>
          </div>
        </form>
      </div>
      </div>
    </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- محتوى النافذة المنبثقة هنا -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- تضمين Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <footer>
        <p>The website created by <strong>Abdallah</strong>  ,  <strong>Abdalaziz</strong>   ,  <strong>Ali</strong>   ,   <strong>Mohammad</strong></p>
    </footer>
</body>
</html>
