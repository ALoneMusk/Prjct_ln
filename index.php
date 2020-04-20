<?php
include("header.php");
include("config.php");


if (isset($_POST['submit'])) {
	$username = $_POST['Username'];

	$from = "user_" . $_POST['Username'];
}

$name = $username = $email = $password = $branch = "";

if (isset($_POST['submit'])) {

	$name = $_POST['Name'];
	$username = $_POST['Username'];
	$email = $_POST['Email'];
	$password = $_POST['Password'];
	$branch = $_POST['Branch'];

	$sequel = 'SELECT Id, Username, Password, Email FROM prjct_ln_data';

	$result = mysqli_query($connect, $sequel);

	$information = mysqli_fetch_assoc($result);

	$confirm;

	if ($information['Username'] === $username || $information['Email'] === $email) {
		echo '<script>alert("You are already registered. Get in straightaway!");</script>';
	} else {

		$name = mysqli_real_escape_string($connect, $_POST['Name']);
		$username = mysqli_real_escape_string($connect, $_POST['Username']);
		$email = mysqli_real_escape_string($connect, $_POST['Email']);
		$password = mysqli_real_escape_string($connect, $_POST['Password']);
		$branch = mysqli_real_escape_string($connect, $_POST['Branch']);



		$query = "INSERT INTO prjct_ln_data(Username, Name, Email, Password, Branch) VALUES ('$username', '$name', '$email', '$password', '$branch')";


		$table = "CREATE TABLE `$from` (
	ID INT NOT NULL AUTO_INCREMENT,
	User INT,
	Message TEXT,
	Personality INT,
	Compatibility INT, 
	Cleanliness INT,
	Education INT,
	Studies INT,
	Language INT,
	Cognizance INT,
	Humorous INT,
	Conclusion INT,
	PRIMARY KEY (ID)
	)";

		mysqli_query($connect, $table);


		if (mysqli_query($connect, $query)) {
			header("location: GetIn.php");
			exit();
		} else {
			echo "Error : " . mysqli_error($connect);
		}
	}
}
?>

<html>

<head>
	<title> Prjct_Ln </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="login.css">
	<script type="text/javascript" src="Validation.js"></script>


</head>

<body>
	<form id="InputForm" method="post">

		<div id="table">


			<div>
				<label style="font-size: 30px; color: red;">Branch:</label>
				<select id="Branch" name="Branch" style="outline: none;">
					<option value="EE">EE </option>
					<option value="CE">CE </option>
					<option value="CSE">CSE </option>
					<option value="ECE">ECE </option>
					<option value="IT">IT </option>
					<option value="ME">ME </option>
					<option value="PE">PE </option>
				</select>
			</div>

			<div>
				<div id="NameHTML" style="color: dodgerblue;">
				</div>
				<div>
					<input class="input" type="text" id="Name" placeholder="Full Name" name="Name">
				</div>
				<div id="FNameError">
				</div>
			</div>


			<div>
				<div id="UNameHTML" style="color: dodgerblue;">
				</div>
				<div>
					<input class="input" type="text" id="UName" placeholder="CRN " name="Username">
				</div>
				<div id="UNameError">
				</div>
			</div>

			<div>
				<div id="PassHTML" style="color: dodgerblue;">
				</div>
				<div>
					<input class="input" type="password" id="Pass" placeholder="Password" name="Password">
				</div>
				<div id="PassError">
				</div>
			</div>

			<div>
				<div id="ConPassHTML" style="color: dodgerblue;">
				</div>
				<div>
					<input class="input" type="password" id="ConPass" placeholder="Confirm Password">
				</div>
				<div id="ConPassError">
				</div>
			</div>

			<div>
				<div id="MailHTML" style="color: peachpuff;">
				</div>
				<div>
					<input class="input" type="email" id="Mail" placeholder="Email" name="Email">
				</div>
				<div id="MailError">
				</div>
				<div>
					<div>
						<button name="submit" class="btn btn-primary" style="outline: none" onclick="return Validate(); return detect();">Register Me</button>
					</div>
				</div>

				<div>
					<button class="button" formaction="GetIn.php" style="outline: none;" onclick="return detect();"> Get Me In </button>
				</div>
			</div>
	</form>
</body>

</html>