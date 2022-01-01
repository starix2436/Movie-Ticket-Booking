<?php

include 'db_connection.php';
$conn = OpenCon();

$result = mysqli_query($conn, 'select * from movie_30 LIMIT 6');

$result2 = mysqli_query($conn, 'select * from movie_30 LIMIT 6,8');

$result3 = mysqli_query($conn, 'select * from movie_30 LIMIT 10,13');

// while($row=mysqli_fetch_array($result))
// {
//          echo $row['m_name'].' '.$row['m_rating'].' '.$row['m_len'].' '.$row['m_genre'].' '.$row['m_img'].' '.$row['m_id'].'<br/>';
// }

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
  <meta name="generator" content="Hugo 0.84.0" />
  <title>Home</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/" />

  <!-- Bootstrap core CSS -->
  <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet" />

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
  <link href="carousel.css" rel="stylesheet" />
</head>

<body>
  <?php include 'pages/navbar.php'; ?>
  <main>
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
          aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">

        <div class="carousel-item active">
          <?php
          include_once './imdb.class.php';
          $row = mysqli_fetch_array($result2);
          $oIMDB = new IMDB($row['m_img']);
          ?>
          <img src="<?php if ($oIMDB->isReady) {
              echo $oIMDB->getPoster('small', true);
          } ?>" alt="Bootstrap Themes"
            loading="lazy" style="object-fit: cover;">

          <div class="container">
            <div class="carousel-caption text-start">
              <h1><?php echo $row['m_name']; ?></h1>
              <p>
                <?php $row['m_genre']; ?>
              </p>
              <p>
                <a class="btn btn-lg btn-primary" href="./pages/moviedetails.php?m_id=<?php echo $row[
                    'm_id'
                ]; ?>">BOOK NOW</a>
              </p>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <?php
          include_once './imdb.class.php';
          $row = mysqli_fetch_array($result2);
          $oIMDB = new IMDB($row['m_img']);
          ?>
          <img src="<?php if ($oIMDB->isReady) {
              echo $oIMDB->getPoster('small', true);
          } ?>" alt="Bootstrap Themes"
            loading="lazy" style="object-fit: cover;">

          <div class="container">
            <div class="carousel-caption">
              <h1><?php echo $row['m_name']; ?></h1>
              <p>
                <?php $row['m_genre']; ?>
              </p>
              <p><a class="btn btn-lg btn-primary" href="./pages/moviedetails.php?m_id=<?php echo $row[
                  'm_id'
              ]; ?>">BOOK NOW</a></p>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <?php
          include_once './imdb.class.php';
          $row = mysqli_fetch_array($result2);
          $oIMDB = new IMDB($row['m_img']);
          ?>
          <img src="<?php if ($oIMDB->isReady) {
              echo $oIMDB->getPoster('small', true);
          } ?>" alt="Bootstrap Themes"
            loading="lazy" style="object-fit: cover;">


          <div class="container">
            <div class="carousel-caption text-end">
              <h1><?php echo $row['m_name']; ?></h1>
              <p>
                <?php $row['m_genre']; ?>
              </p>
              <p>
                <a class="btn btn-lg btn-primary" href="./pages/moviedetails.php?m_id=<?php echo $row[
                    'm_id'
                ]; ?>">BOOK NOW</a>
              </p>
            </div>
          </div>

        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="container marketing">
      <!-- Three columns of text below the carousel -->
      <div class="row">

        <?php
        include_once './imdb.class.php';

        while ($row = mysqli_fetch_array($result)):
            $oIMDB = new IMDB($row['m_img']); ?>
        <div class="col-lg-4">
          <div class="card" style="width: 100%;">
            <img src="<?php if ($oIMDB->isReady) {
                echo $oIMDB->getPoster('small', true);
            } ?>" class="card-img-top"
              alt="..." loading="lazy">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['m_name']; ?></h5>
              <p class="card-text"> Rating: <?php echo $row[
                  'm_rating'
              ]; ?>/10</p>
              <p class="card-text"> Genre: <?php echo $row['m_genre']; ?></p>
              <p class="card-text"> Duration <?php echo $row['m_len']; ?></p>
              <a href="./pages/moviedetails.php?m_id=<?php echo $row[
                  'm_id'
              ]; ?>"
                class="btn btn-primary">Book Now</a>
            </div>
          </div>
        </div>
        <?php
        endwhile;
        ?>


      </div>
      <!-- /.row -->

      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider" />

      <?php
      include_once './imdb.class.php';
      $row = mysqli_fetch_array($result3);
      $oIMDB = new IMDB($row['m_img']);
      ?>
      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">
          <?php echo $row['m_name']; ?>.
            <span class="text-muted">It’ll blow your mind.</span>
          </h2>
          <p class="lead">
          The Bandit is a 1996 Turkish film written and directed by Yavuz Turgul and starring Şener Şen and Uğur Yücel. 
          </p>
          <button type="button" href="./pages/moviedetails.php?m_id=<?php echo $row[
              'm_id'
          ]; ?>" class="btn btn-outline-primary">Book Now</button>

        </div>
        <div class="col-md-5">
            <img src="<?php if ($oIMDB->isReady) {
                echo $oIMDB->getPoster('small', true);
            } ?>" alt="Bootstrap Themes"
            loading="lazy" style="object-fit: cover; width:500px;height:500px;">
        </div>
        
      </div>

      <hr class="featurette-divider" />
      <?php
      include_once './imdb.class.php';
      $row = mysqli_fetch_array($result3);
      $oIMDB = new IMDB($row['m_img']);
      ?>
      <div class="row featurette">
        <div class="col-md-7 order-md-2">
          <h2 class="featurette-heading">
          <?php echo $row['m_name']; ?>
            <span class="text-muted">See for yourself.</span>
          </h2>
          <p class="lead">
          Barry, an Irish rogue, gets into a relationship with a rich widow and cheats his way to the top of the 18th-century British society, by assuming the identity of her dead husband.
          </p>
      
          <button type="button" href="./pages/moviedetails.php?m_id=<?php echo $row[
              'm_id'
          ]; ?>" class="btn btn-outline-primary" style="float:right">Book Now</button>

        </div>
        <div class="col-md-5 order-md-1">
        <img src="<?php if ($oIMDB->isReady) {
            echo $oIMDB->getPoster('small', true);
        } ?>" alt="Bootstrap Themes"
            loading="lazy" style="object-fit: cover; width:500px;height:500px;">
        </div>
      </div>

      <hr class="featurette-divider" />
      <?php
      include_once './imdb.class.php';
      $row = mysqli_fetch_array($result3);
      $oIMDB = new IMDB($row['m_img']);
      ?>
      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">
          <?php echo $row[
              'm_name'
          ]; ?> <span class="text-muted">Checkmate.</span>
          </h2>
          <p class="lead">
          Barry, an Irish rogue, gets into a relationship with a rich widow and cheats his way to the top of the 18th-century British society, by assuming the identity of her dead husband.
          </p>
          <button type="button" href="./pages/moviedetails.php?m_id=<?php echo $row[
              'm_id'
          ]; ?>" class="btn btn-outline-primary">Book Now</button>

        </div>
        <div class="col-md-5">
        <img src="<?php if ($oIMDB->isReady) {
            echo $oIMDB->getPoster('small', true);
        } ?>" alt="Bootstrap Themes"
            loading="lazy" style="object-fit: cover; width:500px;height:500px;">
        </div>
      </div>
      <?php
      include_once './imdb.class.php';
      $row = mysqli_fetch_array($result3);
      $oIMDB = new IMDB($row['m_img']);
      ?>
      <hr class="featurette-divider" />
      <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
          <div class="col-10 col-sm-8 col-lg-6">
            <img src="<?php if ($oIMDB->isReady) {
                echo $oIMDB->getPoster('small', true);
            } ?>" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700"
              height="500" style="object-fit: cover; width:500px;height:500px;" loading="lazy">
          </div>
          <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">  <?php echo $row[
                'm_name'
            ]; ?> </h1>
            <p class="lead">Earl Partridge and Jimmy Gator, both afflicted with cancer, work together on a TV show. They both live in dysfunctional families, which affects their personal and professional lives.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
              <button type="button" href="./pages/moviedetails.php?m_id=<?php echo $row[
                  'm_id'
              ]; ?>" class="btn btn-primary btn-lg px-4 me-md-2">BOOK NOW</button>
            </div>
          </div>
        </div>
      </div>

      <!-- /END THE FEATURETTES -->
    </div>
    <!-- /.container -->

    <!-- FOOTER -->

    <?php include 'pages/footer.php'; ?>

    <?php CloseCon($conn); ?>

  </main>

  <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>