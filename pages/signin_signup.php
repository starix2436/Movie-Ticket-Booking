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
			<input type="text" placeholder="Fullname" name="name">
			<input type="email" placeholder="Email" name="email">
			<input type="password" placeholder="Password" name="pass">
			<button name="save" input type="submit">Sign Up</button>

		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#">
			<h1>Sign in</h1>
			<input type="email" placeholder="Email" name="lemail"/>
			<input type="password" placeholder="Password" name="lpass"/>
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
include_once 'C:\xampp\htdocs\db_connection.php';
$conn = OpenCon();
if (isset($_POST['save'])) {
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

session_start();
if (isset($_POST['lemail']) && isset($_POST['lpass'])) {
    if (auth($_POST['lemail'], $_POST['lpass'])) {
        // auth okay, setup session
        $_SESSION['email'] = $_POST['lemail'];
        // redirect to required page
        header("Location: C:\xampp\htdocs\index.php");
    } else {
        // didn't auth go back to loginform
        header('Location: signin_signup.php');
    }
} else {
    // username and password not given so go back to login
    header('Location: signin_signup.php');
}
?>



<script src="signup_transition.js"></script>
</body>
</html>