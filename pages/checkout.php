<?php
include '../db_connection.php';
$conn = OpenCon();
$id = $_GET['s_id'];

?>

<!doctype html>
<html lang="en">

<head>
  <?php session_start(); 
  ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Checkout example · Bootstrap v5.0</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">
  <!-- Bootstrap core CSS -->
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">

  <?php include './navbar.php'; ?>
  <div class="container">
    <main>
      <div class="py-5 text-center">
        <h2>Checkout form</h2>
      </div>

      <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Your Booking</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <form name="form" action="" method="post">
                  <h6 class="my-0">No. of Seats</h6>
                  <input type="text" class="form-control" name="noSeats" id="noSeats" placeholder="" value="" required>
                   
                  <input type="text" class="form-control" name="s_id" id="s_id" placeholder="" value="<?php echo $id ?>" hidden>
              
                </from>
              </div>
              <span class="text-muted"></span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Cost Of Each Seat: 240</h6>
              </div>
              <span class="text-muted"></span>
            </li>
            <script>
              var inputBox = document.getElementById('noSeats');

              inputBox.onkeyup = function () {
                document.getElementById('output').innerHTML = inputBox.value * 240;
              }
            </script>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (INR) <span id="output"></span></span>
              <strong></strong>
            </li>
          </ul>

          <!-- <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </form> -->
        </div>
        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" novalidate action="" method="post">
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="firstName" class="form-label">First name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="lastName" class="form-label">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>

              <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>

              <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>

              <div class="col-12">
                <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
                <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
              </div>

              <div class="col-md-5">
                <label for="country" class="form-label">State</label>
                <select class="form-select" id="country" required>
                  <option value="">Choose...</option>
                  <option>Goa</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>

              <div class="col-md-4">
                <label for="state" class="form-label">Theatre</label>
                <select class="form-select" id="state" required>
                  <option value="">Choose...</option>
                  <option>INOX</option>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>

              <div class="col-md-3">
                <label for="zip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>

            <hr class="my-4">

            <h4 class="mb-3">Payment</h4>

            <div class="my-3">
              <div class="form-check">
                <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                <label class="form-check-label" for="credit">Credit card</label>
              </div>
              <div class="form-check">
                <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                <label class="form-check-label" for="debit">Debit card</label>
              </div>
            </div>

            <div class="row gy-3">
              <div class="col-md-6">
                <label for="cc-name" class="form-label">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>

              <div class="col-md-6">
                <label for="cc-number" class="form-label">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>

              <div class="col-md-3">
                <label for="cc-expiration" class="form-label">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>

              <div class="col-md-3">
                <label for="cc-cvv" class="form-label">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>

            <hr class="my-4">
            <input class="w-100 btn btn-primary btn-lg" type = "submit" name = "submit" value = "Submit">
<!-- 
            <button  type="submit" name="submit"><a href="../index.php" style="color:white">Continue to
                checkout</a></button> -->
          </form>
        </div>
      </div>
      </br>
      </br>
      <hr class="featurette-divider" />
    </main>

    </br>
    </br>
    <?php include '../pages/footer.php'; ?>
    <?php 


if( !(isset($_SESSION['useremail'])&&isset($_SESSION['userpass'])&&isset($_SESSION['username']))){
  echo '<script type="text/javascript">'; 
  echo 'alert("Please login to book a ticket");';
  echo 'window.location= "./signin_signup.php";';
  echo '</script>';    
}

                if (isset($_POST['submit'])){
                  $u_name=$_POST['firstName'];
                  $u_mail=$_POST['email'];
                  $no = $_POST['noSeats'];
                  // $p_amount=$_POST['cityName'];

                  $sql_get_uid = ("SELECT u_id FROM user WHERE u_email = '$u_mail'");
                  
                  $u_id_result=mysqli_query($conn,$sql_get_uid);

                  while ($u_id = $u_id_result->fetch_assoc()) {
                    $u_id_value =  $u_id['u_id'];
                  }
                  $s_id = $_GET['s_id'];
                  $sql_booking = "INSERT INTO booking (b_noOSeats,u_id,s_id) VALUES ('$no','$u_id_value','$s_id')";

                  if (mysqli_query($conn, $sql_booking)) {
                    echo '';
                } else {
                    echo '<br>Error: ' . $sql_booking . '' . mysqli_error($conn);
                }

                  $sql_get_b_id = "SELECT b_id FROM booking ORDER BY b_id DESC LIMIT 1";

                  $b_id_result=mysqli_query($conn,$sql_get_b_id);
                  
                  while ($b_id = $b_id_result->fetch_assoc()) {
        
                      $b_id_value =  $b_id['b_id'];
                    }

                  $sql_payment = "INSERT INTO payment (p_amount,b_id) VALUES ('$no','$b_id_value')";

                  if (mysqli_query($conn, $sql_payment)) {
               
              echo '<script type="text/javascript">'; 
              echo 'alert("Booking Successful");';
              echo 'window.location= "../index.php";';
              echo '</script>';    
          
                } else {
                    echo '<br>Error: ' . $sql_payment . '' . mysqli_error($conn);
                }
              }
              ?>
  </div>


  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <script src="form-validation.js"></script>
</body>

</html>