<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="CvSU Form Request, CvSU File Request">
    <meta name="description" content="CVSU Request Form It’s our business to know your business.">
    <meta name="author" content="Login Page designer (Pascua) - Group RedRivon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Assets/cvsulogo.png" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Login Page</title>
	<style><?php include '../Styles/login.css' ?></style>
</head>
<body>
	<div class="container">
		<div class="myform">
			<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
				<h2>Login Form</h2>
				<input type="text" placeholder="Username" name="username" required>
				<input type="password" placeholder="Password" name="password" required>
				<button type="submit" name="login">LOGIN</button>
			</form>
		</div>
		<div class="image">
			<img src="../Assets/cvsulogo.png">
		</div>
	</div>

    <?php
	session_start(); //Start the session
	include 'connection.php';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$username = $_POST['username'];
		$password = $_POST['password'];

		//Query the database for user authentication
		$result = mysqli_query($con, "SELECT * FROM admin WHERE username ='$username' AND password = '$password'");
		$row = mysqli_fetch_array($result);

		if ($row) {
			$_SESSION['username'] = $username;  //Set session variable
			header('Location: ../Classes/adminPage.php');  //Redirect to admin page
		} else {
			echo "<script>alert('Incorrect USERNAME or PASSWORD'); </script>";
		}
	}
    ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>