<?php
include('../db_connection.php');
$conn = OpenCon();

$result=mysqli_query($conn,"select * from movie_30");

// while($row=mysqli_fetch_array($result))
// {
//          echo $row['m_name'].' '.$row['m_rating'].' '.$row['m_len'].' '.$row['m_genre'].' '.$row['m_img'].' '.$row['m_id'].'<br/>';
// }




?>

<!-- Tikcet booking page -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>All Movies</title>
  </head>
  <body>

  <?php
  include('./navbar.php');
?>
</br>
</br>
<main>
<div class="container marketing">
  <div class="row">

<?php    
include_once '../imdb.class.php';


while($row=mysqli_fetch_array($result)):

$oIMDB = new IMDB($row['m_img']);
?>
  <div class="col-lg-4">
    <div class="card" style="width: 100%;">

      <img src="../<?php if ($oIMDB->isReady) { echo $oIMDB->getPoster('small', true);}?>" class="card-img-top" alt="..." loading="lazy">       
      <div class="card-body">
        <h5 class="card-title"><?php echo $row['m_name'] ?></h5>
        <p class="card-text"> Rating: <?php echo $row['m_rating'] ?>/10</p>
        <p class="card-text"> Genre: <?php echo $row['m_genre'] ?></p>
        <p class="card-text"> Duration <?php echo $row['m_len'] ?></p>
        <a href="http://localhost/pages/moviedetails.php?m_id=<?php echo $row['m_id'] ?>" class="btn btn-primary">Book Now</a>
      </div>
    </div>
  </div>
  <?php endwhile; ?>


  </div>
</div>
</main>
</br>
</br>

<?php
include('./footer.php');
?>

<?php
CloseCon($conn);
?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>