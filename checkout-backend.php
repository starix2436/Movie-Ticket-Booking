<?php 

if (isset($_POST['submit'])){
  $u_name=$_POST['firstName'];
  $u_mail=$_POST['email'];
  
  // $p_amount=$_POST['cityName'];

  $sql_get_uid = "SELECT u_id from usrs where u_name= '".$u_name."' AND u_email ='".$u_mail."'";
  $uid=(int)mysqli_query($conn,$sql_get_ctid);
  $sql_booking = "INSERT INTO booking (b_noOSeats,u_id,s_id) VALUES ('$no','$u_id','$id')";

  $sql_get_bid = "SELECT b_id FROM booking ORDER BY b_id DESC LIMIT 1";
  $bid=(int)mysqli_query($conn,$sql_get_cid);
  $sql_payment = "INSERT INTO payment (p_amount,b_id) VALUES ('$no*250',$bid')";

if (mysqli_query($conn, $sql_cinema)) {
  echo '<br>New record created successfully !';
} else {
  echo '<br>Error: ' . $sql . '' . mysqli_error($conn);
}
if (mysqli_query($conn, $sql_cinema_hall)) {
  echo '<br>New record created successfully !';
} else {
  echo '<br>Error: ' . $sql . '' . mysqli_error($conn);
}

}

header('location: http://localhost/index.php');
?>