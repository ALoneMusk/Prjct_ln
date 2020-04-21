<?php
include("config.php");


if (isset($_POST['submit'])) {

	$issue = $_POST['Issue'];

	$query = "INSERT INTO issues(Issues) VALUES ('$issue')";

	if (mysqli_query($connect, $query)) {
		echo '<script>alert("Your issue has been saved and shall be acted upon very soon.");</script>';
	} else {
		echo "Error : " . mysqli_error($connect);
	}
}
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/gif/png" href="img/logo.png">
	<title>What happened?</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<body style="background-color: white;">
<!--    Nav Bar -->

<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
<div class="container-fluid">
	<a class="navbar-brand text-primary font-weight-bold" href="#"><img src="img/logo.png" height="70" width="180"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item active">
				<a class="nav-link" href="First.php">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="about.html">About Us</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="Issue.php">Feedback</a>
			</li>
		</ul>
	</div>
</div>	
</nav>

<!-- nav bar ends -->
	<form method="POST">
		<div style="text-align: center;">
			<input type="textarea" name="Issue" style="text-align: center; ">
			<br>
			<br>
			<input type="submit" name="submit" value="And that's where I got stuck." class = " btn btn-danger">
		</div>
	</form>
</body>
</html>