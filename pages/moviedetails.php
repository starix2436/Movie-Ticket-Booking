<?php
include '../db_connection.php';
$conn = OpenCon();

// while($row=mysqli_fetch_array($result))
// {
//          echo $row['m_name'].' '.$row['m_rating'].' '.$row['m_len'].' '.$row['m_genre'].' '.$row['m_img'].' '.$row['m_id'].'<br/>';
// }
include_once '../imdb.class.php';

//need to pass the m_id of the movie from the index page
$id = $_GET['m_id'];
$movie_sql = mysqli_query($conn, 'select * from movie_30 where m_id = ' . $id);
session_start();
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
  <title><?php
  $idheader = $_GET['m_id'];
  $movieheader = mysqli_query(
      $conn,
      'select * from movie_30 where m_id = ' . $idheader
  );
  $row = mysqli_fetch_array($movieheader);
  echo $row['m_name'];
  ?></title>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>


  <?php
  include 'navbar.php';

  while ($row = mysqli_fetch_array($movie_sql)):
      //$row = $conn->query($sql);

      $oIMDB = new IMDB($row['m_img']); ?>

<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="../<?php if ($oIMDB->isReady) {
            echo $oIMDB->getPoster('small', true);
        } ?>" class="card-img-top"
        class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" loading="lazy" alt="...">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3"><?php echo $row[
            'm_name'
        ]; ?></h1>
          <!-- <p class="lead"> Description <?php echo $row[
              'm_description'
          ]; ?></p> -->
        <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
        
          <p class="lead"> Rating: <?php echo $row['m_rating']; ?>/10</p>
          <p class="lead"> Genre: <?php echo $row['m_genre']; ?></p>
          <p class="lead"> Duration <?php echo $row['m_len']; ?></p>
          <!-- below is present in the updated db -->



        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <?php
        $show_sql = mysqli_query(
            $conn,
            'select * from show_c where m_id =' . $id
        );
        while ($s_row = mysqli_fetch_array($show_sql)):<?php
            //$row = $conn->query($sql);
            ?>

            <div class="col-2">
              <span class="card-text"> Date: <?php echo date(
                  'd M Y',
                  strtotime($s_row['s_Date'])
              ); ?></span>
            </div>
            <div class="col-2">
              <a href="booking.php?s_id=<?php echo $s_row[
                  's_id'
              ]; ?>"" class="btn btn-primary"><?php echo date(
    'g:i',
    strtotime($s_row['s_startime'])
); ?></a>
            </div>

            <?php endwhile;
        ?>
        </div>
      </div>
    </div>
  </div>

  <div class="b-example-divider"></div>

    
    <hr class="featurette-divider" />

                  </br>
                  </br>
  <div class="container recomendation">
    <h2>Recommended Movies</h2>
                  </br>
                  </br>
                  
    <div class="row">
      <?php
      $recomendation_sql = mysqli_query(
          $conn,
          'select * from movie_30 where m_id <> ' .
              $id .
              ' ORDER BY RAND() limit 3'
      );
      while ($r_row = mysqli_fetch_array($recomendation_sql)):
          $oIMDB = new IMDB($r_row['m_img']); ?>
      <div class="col-lg-4">
        <div class="card" style="width: 100%;">

          <img src="../<?php if ($oIMDB->isReady) {
              echo $oIMDB->getPoster('small', true);
          } ?>" class="card-img-top"
            alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $r_row['m_name']; ?></h5>
            <p class="card-text"> Rating: <?php echo $r_row[
                'm_rating'
            ]; ?>/10</p>
            <p class="card-text"> Genre: <?php echo $r_row['m_genre']; ?></p>
            <p class="card-text"> Duration <?php echo $r_row['m_len']; ?></p>
            <a href="http://localhost/pages/moviedetails.php?m_id=<?php echo $row[
                'm_id'
            ]; ?>" class="btn btn-primary">Book Now</a>
          </div>
        </div>
      </div>
      <?php
      endwhile;
      ?>
    </div>



    <?php
  endwhile;
  ?>
    <?php include '../pages/footer.php'; ?>



</body>

</html>