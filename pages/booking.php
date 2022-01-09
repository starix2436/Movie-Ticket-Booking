<?php
include('../db_connection.php');
$conn = OpenCon();
$id = $_GET['s_id'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="booking_style.css" />
    <title>Movie Seat Booking</title>
  </head>
  <body>
    <div class="movie-container">
      <?php
      $seat_sql=mysqli_query($conn,"select * from cinema_hall where (select ch_id from show_c where s_id =".$id.")");
      // $seqt_count = (int)$seat_sql;
      $seat_row = mysqli_fetch_array($seat_sql);
      $s_sql = mysqli_query($conn,"select * from show_c where s_id =".$id);
      $s_row=mysqli_fetch_array($s_sql);
      ?>

      <span class="card-text"> Date: <?php echo date('d M Y', strtotime($s_row['s_Date'])); ?> <?php echo date('g:i', strtotime($s_row['s_startime'])) ?></span>
    </div>

    <ul class="showcase">
      <li>
        <div class="seat"></div>
        <small>Available</small>
      </li>
      <li>
        <div class="seat selected"></div>
        <small>Selected</small>
      </li>
      <li>
        <div class="seat sold"></div>
        <small>Sold</small>
      </li>
    </ul>
    <div class="container">
      <div class="screen"></div>

      <?php 
          for ($x=0;$x < ($seat_row['ch_totalSeats']/8);$x++):
          ?>
      <div class="row"> 
      
        <div class="seat"><a class="btn-light">
          <?php
             
          ?>
        </a></div>
        <div class="seat"><a class="btn-light"></a></div>
        <div class="seat"><a class="btn-light"></a></div>
        <div class="seat"><a class="btn-light"></a></div>
        <div class="seat"><a class="btn-light"></a></div>
        <div class="seat"><a class="btn-light"></a></div>
        <div class="seat"><a class="btn-light"></a></div>
        <div class="seat"><a class="btn-light"></a></div>
      </div>
      <?php
        endfor; ?>
    </div>

    <p class="text">
      You have selected <span id="count">0</span> seat for a price of RS.<span
        id="total"
        >0</span
      >
    </p>
    <!-- <script src="booking_script.js"></script> -->
  </body>
</html>