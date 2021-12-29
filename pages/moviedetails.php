<?php
include('../db_connection.php');
$conn = OpenCon();

$result=mysqli_query($conn,"select * from movie_30");

// while($row=mysqli_fetch_array($result))
// {
//          echo $row['m_name'].' '.$row['m_rating'].' '.$row['m_len'].' '.$row['m_genre'].' '.$row['m_img'].' '.$row['m_id'].'<br/>';
// }
include_once '../imdb.class.php';

//need to pass the m_id of the movie from the index page
$id = $_GET['m_id'];
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet" />
  <title><?php echo $row['m_name'] ?></title>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>

  <?php
      include('navbar.php');
     
      $movie_sql=mysqli_query($conn,"select * from movie_30 where m_id = ".$id);
      while($row=mysqli_fetch_array($movie_sql)):
      //$row = $conn->query($sql);
      
      $oIMDB = new IMDB($row['m_img']);
      
      ?>
  <div class="container movie_details">
    <div class="row">
      <div class="col-sm-4">
        <img src="../<?php if ($oIMDB->isReady) { echo $oIMDB->getPoster('small', true);}?>" class="card-img-top"
          alt="...">
        <h5 class="card-title-below"><?php echo $row['m_name'] ?></h5>
      </div>
      <div class="col-sm-8">
        <div class ="movie details">
          <h5 class="card-title"><?php echo $row['m_name'] ?></h5>
          <p class="card-text"> Rating: <?php echo $row['m_rating'] ?>/10</p>
          <p class="card-text"> Genre: <?php echo $row['m_genre'] ?></p>
          <p class="card-text"> Duration <?php echo $row['m_len'] ?></p>
          <!-- below is present in the updated db -->
          <!-- <p class="card-text"> Description <?php echo $row['m_description'] ?></p> -->
        </div>
        <div class="container">
          <div class="row">
            <?php
                  $show_sql=mysqli_query($conn,"select * from show_c where m_id =".$id);
                  while($s_row=mysqli_fetch_array($show_sql)):
                  //$row = $conn->query($sql);
                ?>

            <div class="col-2">
              <span class="card-text"> Date: <?php echo date('d M Y', strtotime($s_row['s_Date'])); ?></span>
            </div>
            <div class="col-2">
              <a href="#" class="btn btn-primary"><?php echo date('g:i', strtotime($s_row['s_startime'])) ?></a>
            </div>

            <?php endwhile; ?>
          </div>
        </div>

      </div>
    </div>
    <hr class="featurette-divider" />
  </div>

                  </br>
                  </br>
  <div class="container recomendation">
    <h2>Recommended Movies</h2>
                  </br>
                  </br>
                  
    <div class="row">
      <?php 
          $recomendation_sql=mysqli_query($conn,"select * from movie_30 where m_id <> ".$id." limit 3 offset 2");
          while($r_row=mysqli_fetch_array($recomendation_sql)):
      
            $oIMDB = new IMDB($r_row['m_img']);
            ?>
      <div class="col-lg-4">
        <div class="card" style="width: 100%;">

          <img src="../<?php if ($oIMDB->isReady) { echo $oIMDB->getPoster('small', true);}?>" class="card-img-top"
            alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $r_row['m_name'] ?></h5>
            <p class="card-text"> Rating: <?php echo $r_row['m_rating'] ?>/10</p>
            <p class="card-text"> Genre: <?php echo $r_row['m_genre'] ?></p>
            <p class="card-text"> Duration <?php echo $r_row['m_len'] ?></p>
            <a href="#" class="btn btn-primary">Book Now</a>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>



    <?php endwhile; ?>
    <?php
  include('../pages/footer.php');
?>



</body>

</html>