<?php
  include('../db_connection.php');
  $conn = OpenCon();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Checkout example · Bootstrap v5.0</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">
  <!-- Bootstrap core CSS -->
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">


  <!-- Custom styles for this template -->
  <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">

  <?php
  include('./navbar.php');
?>
  <div class="container">
    <main>
      <div class="py-5 text-center">
        <h2>Add a new movie to database</h2>
      </div>

      <div class="row row-cols-2">
        <div class="col">
          <h4 class="mb-3">Movie details</h4>
          <form class="needs-validation" action="#" method="post">
            <div class="row g-3">
              <div class="col-6">
                <label for="movieName" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid Movie name is required.
                </div>
              </div>
              <div class="col-6">
                <label for="movieName" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid description is required.
                </div>
              </div>
              <div class="col-6">
                <label for="movieName" class="form-label">Length</label>
                <input type="text" class="form-control" name="length" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid length is required.
                </div>
              </div>
              <div class="col-6">
                <label for="movieName" class="form-label">Genre</label>
                <input type="text" class="form-control" name="genre" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid genre is required.
                </div>
              </div>
              <div class="col-6">
                <label for="movieName" class="form-label">Rating</label>
                <input type="text" class="form-control" name="rating" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid rating is required.
                </div>
              </div>
              <div class="col-6">
                <label for="movieName" class="form-label">Img link</label>
                <input type="text" class="form-control" name="img_link" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid img_link is required.
                </div>
              </div>

              <hr class="my-4">
              <button class="w-100 btn btn-primary btn-lg" name="add_to_db" type="submit">Add to Database</button>
              <hr class="my-4">
              <?php 

                if (isset($_POST['add_to_db'])){
                  $name=$_POST['name'];
                  $description=$_POST['description'];
                  $lenght=$_POST['length'];
                  $genre=$_POST['genre'];
                  $rating=$_POST['rating'];
                  $img_link=$_POST['img_link'];
                
                  $sql = "INSERT INTO movie_30 (m_name,m_rating,m_len,m_genre,m_img) VALUES ('$name','$rating','$lenght','$genre','$img_link')";

                  if (mysqli_query($conn, $sql)) {
                    echo '<br>New record created successfully !';
                  } else {
                    echo '<br>Error: ' . $sql . '' . mysqli_error($conn);
                  }

                }
              ?>

          </form>
        </div>


        <div class="col">
          <h4 class="mb-3">Show details</h4>
          <form class="needs-validation" action="#" method="postt">
            <div class="row g-3">
              <div class="col-6">
                <label for="movieName" class="form-label">Movie Name</label>
                <input type="text" class="form-control" name="s_name" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid Movie name is required.
                </div>
              </div>
              <div class="col-6">
                <label for="movieName" class="form-label">Date</label>
                <input type="text" class="form-control" name="date" placeholder="YYYY-MM-DD" value="" required>
                <div class="invalid-feedback">
                  Valid Date required.
                </div>
              </div>
              <div class="col-6">
                <label for="movieName" class="form-label">Starttime</label>
                <input type="text" class="form-control" name="starttime" placeholder="hh:mm:ss" value="" required>
                <div class="invalid-feedback">
                  Valid Start time is required.
                </div>
              </div>
              <div class="col-6">
                <label for="movieName" class="form-label">Cinema Hall Name</label>
                <input type="text" class="form-control" name="cinema_hall" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid Cinema Hall name is required.
                </div>
              </div>
            

              <hr class="my-4">
              <button class="w-100 btn btn-primary btn-lg" name="add_to_db_show" type="submit">Add to Database</button>
              <hr class="my-4">
              <?php 

                if (isset($_POST['add_to_db_show'])){
                  $s_name=$_POST['s_name'];
                  $date=$_POST['date'];
                  $starttime=$_POST['starttime'];
                  $cinema_hall=$_POST['cinema_hall'];

                  $sql_get_mid = "SELECT m_id from movie_30 where m_name = '".$s_name."%'";
                  $sql_get_chid = "SELECT ch_id from cinema_hall where ch_name = '".$cinema_hall."'";
                  $mid=(int)mysqli_query($conn, $sql_get_mid);
                  $chid=(int)mysqli_query($conn, $sql_get_chid);

                  $sql_show_c = "INSERT INTO show_c (s_Date,s_startime,ch_id,m_id) VALUES ('$date','$starttime','$chid','$mid')";

                if (mysqli_query($conn, $sql_show_c)) {
                  echo '<br>New record created successfully !';
                } else {
                  echo '<br>Error: ' . $sql . '' . mysqli_error($conn);
                }

              }
              
              ?>

          </form>
        </div>

        <div class="col">
          <h4 class="mb-3">Show details</h4>
          <form class="needs-validation" action="#" method="postt">
            <div class="row g-3">
              <div class="col-6">
                <label for="movieName" class="form-label">Movie Name</label>
                <input type="text" class="form-control" id="s_name" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid Movie name is required.
                </div>
              </div>
              <div class="col-6">
                <label for="movieName" class="form-label">Date</label>
                <input type="text" class="form-control" id="date" placeholder="YYYY-MM-DD" value="" required>
                <div class="invalid-feedback">
                  Valid Date required.
                </div>
              </div>
              <div class="col-6">
                <label for="movieName" class="form-label">Starttime</label>
                <input type="text" class="form-control" id="starttime" placeholder="hh:mm:ss" value="" required>
                <div class="invalid-feedback">
                  Valid Start time is required.
                </div>
              </div>
              <div class="col-6">
                <label for="movieName" class="form-label">Cinema Hall Name</label>
                <input type="text" class="form-control" id="cinema_hall" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid Cinema Hall name is required.
                </div>
              </div>
            

              <hr class="my-4">
              <button class="w-100 btn btn-primary btn-lg" name="add_to_db" type="submit">Add to Database</button>
              <hr class="my-4">
              <?php 
                // if (isset($_POST['add_to_db'])){
                //   $name=$_POST['name'];
                //   $description=$_POST['description'];
                //   $lenght=$_POST['lenght'];
                //   $genre=$_POST['genre'];
                //   $rating=$_POST['rating'];
                //   $img_link=$_POST['img_link'];
                // }

                // echo $name;

                // // $sql = "INSERT INTO movie_30 (m_name,m_rating,m_len,m_genre,m_img) VALUES ('$name','$rating','$length','$genre','$img_link')";

                // // if (mysqli_query($conn, $sql)) {
                // //   echo '<br>New record created successfully !';
                // // } else {
                // //   echo '<br>Error: ' . $sql . '' . mysqli_error($conn);
                // // }
                // mysqli_close($conn);
              
              ?>

          </form>
        </div>
        
      </div>
      </br>
      </br>
      <hr class="featurette-divider" />
    </main>

    </br>
    </br>
    <?php
  include('../pages/footer.php');
?>
  </div>


  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

  <script src="form-validation.js"></script>
</body>

</html>