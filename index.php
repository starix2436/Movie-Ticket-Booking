<?php
include('db_connection.php');
$conn = OpenCon();

$result=mysqli_query($conn,"select * from movie_30");

// while($row=mysqli_fetch_array($result))
// {
//          echo $row['m_name'].' '.$row['m_rating'].' '.$row['m_len'].' '.$row['m_genre'].' '.$row['m_img'].' '.$row['m_id'].'<br/>';
// }




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
  <?php
  include('pages/navbar.php');
?>
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
          <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
            aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
            <rect width="100%" height="100%" fill="#777" />
          </svg>

          <div class="container">
            <div class="carousel-caption text-start">
              <h1>Example headline.</h1>
              <p>
                Some representative placeholder content for the first slide of
                the carousel.
              </p>
              <p>
                <a class="btn btn-lg btn-primary" href="#">BOOK NOW</a>
              </p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
            aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
            <rect width="100%" height="100%" fill="#777" />
          </svg>

          <div class="container">
            <div class="carousel-caption">
              <h1>Another example headline.</h1>
              <p>
                Some representative placeholder content for the second slide
                of the carousel.
              </p>
              <p><a class="btn btn-lg btn-primary" href="#">BOOK NOW</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
            aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
            <rect width="100%" height="100%" fill="#777" />
          </svg>

          <div class="container">
            <div class="carousel-caption text-end">
              <h1>One more for good measure.</h1>
              <p>
                Some representative placeholder content for the third slide of
                this carousel.
              </p>
              <p>
                <a class="btn btn-lg btn-primary" href="#">BOOK NOW</a>
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

      
      while($row=mysqli_fetch_array($result)):
      
      $oIMDB = new IMDB($row['m_img']);
      ?>
        <div class="col-lg-4">
          <div class="card" style="width: 100%;">

            <img src="<?php if ($oIMDB->isReady) { echo $oIMDB->getPoster('small', true);}?>" class="card-img-top" alt="...">       
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['m_name'] ?></h5>
              <p class="card-text"> Rating: <?php echo $row['m_rating'] ?>/10</p>
              <p class="card-text"> Genre: <?php echo $row['m_genre'] ?></p>
              <p class="card-text"> Duration <?php echo $row['m_len'] ?></p>
              <a href="#" class="btn btn-primary">Book Now</a>
            </div>
          </div>
        </div>
        <?php endwhile; ?>


        </div>
        <!-- /.row -->

        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider" />

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">
              First featurette heading.
              <span class="text-muted">It’ll blow your mind.</span>
            </h2>
            <p class="lead">
              Some great placeholder content for the first featurette here.
              Imagine some exciting prose here.
            </p>
          </div>
          <div class="col-md-5">
            <svg class="
                bd-placeholder-img bd-placeholder-img-lg
                featurette-image
                img-fluid
                mx-auto
              " width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img"
              aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#eee" />
              <text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text>
            </svg>
          </div>
        </div>

        <hr class="featurette-divider" />

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">
              Oh yeah, it’s that good.
              <span class="text-muted">See for yourself.</span>
            </h2>
            <p class="lead">
              Another featurette? Of course. More placeholder content here to
              give you an idea of how this layout would work with some actual
              real-world content in place.
            </p>
          </div>
          <div class="col-md-5 order-md-1">
            <svg class="
                bd-placeholder-img bd-placeholder-img-lg
                featurette-image
                img-fluid
                mx-auto
              " width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img"
              aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#eee" />
              <text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text>
            </svg>
          </div>
        </div>

        <hr class="featurette-divider" />

        <div class="row featurette" >
          <div class="col-md-7">
            <h2 class="featurette-heading">
              And lastly, this one. <span class="text-muted">Checkmate.</span>
            </h2>
            <p class="lead">
              And yes, this is the last block of representative placeholder
              content. Again, not really intended to be actually read, simply
              here to give you a better view of what this would look like with
              some actual content. Your content.
            </p>
          </div>
          <div class="col-md-5">
            <svg class="
                bd-placeholder-img bd-placeholder-img-lg
                featurette-image
                img-fluid
                mx-auto
              " width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img"
              aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#eee" />
              <text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text>
            </svg>
          </div>
        </div>

        <hr class="featurette-divider" />
        <div class="container col-xxl-8 px-4 py-5" >
          <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
              <img src="bootstrap-themes.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700"
                height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
              <h1 class="display-5 fw-bold lh-1 mb-3">Responsive left-aligned hero with image</h1>
              <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s
                most
                popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system,
                extensive prebuilt components, and powerful JavaScript plugins.</p>
              <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">BOOK NOW</button>
              </div>
            </div>
          </div>
        </div>

        <!-- /END THE FEATURETTES -->
      </div>
      <!-- /.container -->

      <!-- FOOTER -->
      <footer class="container" style="padding: 0rem; margin:0rem;">

        <?php
  include('pages/footer.php');
?>

<?php
CloseCon($conn);
?>

      </footer>
  </main>

  <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>