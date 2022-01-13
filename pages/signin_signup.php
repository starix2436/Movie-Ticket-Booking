<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SingIn-SignUp</title>
    <link rel="stylesheet" href="signinup_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#" method="post">
			<h1>Create Account</h1>
			<input type="text" placeholder="Fullname" name="name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required>
			<input type="email" placeholder="Email" name="email" required>
			<input type="password" placeholder="Password" name="pass" required>
			<button name="save" input type="submit">Sign Up</button>

		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#" method="post">
			<h1>Sign in</h1>
			<input type="email" placeholder="Email" name="lemail" required>
			<input type="password" placeholder="Password" name="lpass" required>
			<button name="login" input type="submit">Sign In</button>
		</form>
	</div>
	

	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<?php
include_once '../db_connection.php';

if (isset($_POST['save'])) {
    $conn = OpenCon();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sql = "INSERT INTO user (u_name,u_email,u_pass)
	 VALUES ('$name','$email','$pass')";
    if (mysqli_query($conn, $sql)) {
        echo '<br>New record created successfully !';
    } else {
        echo '<br>Error: ' . $sql . '' . mysqli_error($conn);
    }
    mysqli_close($conn);
}

if (isset($_POST['login'])) {
    $conn = OpenCon();
    $email = $_POST['lemail'];
    $pass = $_POST['lpass'];

    //     header('Location: developers.php');

    ($result = mysqli_query(
        $conn,
        "SELECT u_email,u_pass,u_name FROM user WHERE u_email = '$email'"
    )) or die('failed to query database' . mysqli_error($conn));

    $row = mysqli_fetch_assoc($result);

    if ($row['u_email'] == $email && $row['u_pass'] == $pass) {
        // echo 'Login successfull';
        session_start();
        $_SESSION['useremail'] = "$email";
        $_SESSION['userpass'] = "$pass";
        $_SESSION['username'] = $row['u_name'];
        header('location: ../index.php');
    } else {
        echo '<br>Login failed try again..';
    }

    mysqli_close($conn);
}
?>	


<script src="signup_transition.js"></script>
</body>
</html>