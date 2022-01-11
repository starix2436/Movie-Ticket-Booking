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

  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet" /> -->
  
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

    <span class="card-text"> Date: <?php echo date('d M Y', strtotime($s_row['s_Date'])); ?>
      <?php echo date('g:i', strtotime($s_row['s_startime'])) ?></span>
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
        <div class="seat <?php 

                            // $sql_ss_status = "SELECT ss_status from show_seat where s_id =".$id.")";
                            // $ss_status = mysqli_query($conn,"SELECT ss_status from show_seat where s_id =".$id);
                            // switch($ss_status){
                            //   case 0 :
                            //     echo 'sold';
                            //     break;
                            //   case 1:
                            //     echo 'selected';
                            //     break;
                            //   default:
                            // }
                            // if (isset($_POST['hello'])) {
                            //   echo 'selected';


                            $sql_get_chid;
                            $sql_get_csid;
                            $sql_get_ssstatus;

                            }

                          ?>"><a class="btn-light" href='booking.php?hello=true' name='hello'></a></div>


        <div class="seat"><a class="btn-light"></a></div>
        <div class="seat"><a class="btn-light"></a></div>
        <div class="seat"><a class="btn-light"></a></div>
        <div class="seat"><a class="btn-light"></a></div>
        <div class="seat"><a class="btn-light"></a></div>
        <div class="seat"><a class="btn-light"></a></div>

      <!-- <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
        <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
        <label class="btn btn-secondary" for="btncheck1">1</label>

        <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
        <label class="btn btn-secondary" for="btncheck2">2</label>

        <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
        <label class="btn btn-secondary" for="btncheck3">3</label>

        <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off">
        <label class="btn btn-secondary" for="btncheck4">4</label>

        <input type="checkbox" class="btn-check" id="btncheck5" autocomplete="off">
        <label class="btn btn-secondary" for="btncheck5">5</label>

        <input type="checkbox" class="btn-check" id="btncheck6" autocomplete="off">
        <label class="btn btn-secondary" for="btncheck6">6</label>

      </div> -->

    </div>
    <?php
        endfor; ?>
  </div>

  <!-- <p class="text">
      You have selected <span id="count">0</span> seat for a price of RS.<span
        id="total"
        >0</span
      >
    </p> -->
  <!-- <script src="booking_script.js"></script> -->
</body>

</html>