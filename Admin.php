<?php
include("header.php");
include("config.php");


if (isset($_POST['userinfo'])) {
	$lucky = $_POST['Name'];

	$query = "INSERT INTO lucky(Lucky) VALUES ('$lucky')";
}


if (isset($_POST['adminpass'])) {
	if ($_POST['adminpass'] === "") {
		header("Location: https://console.cloud.google.com/home/dashboard?project=omega-mile-274315");
	}
}



?>
<!DOCTYPE html>
<html>

<head>
	<title>Welcome, explorer!</title>


	<style type="text/css">
		body {
			background-color: black;
		}

		#mes {
			color: lightslategray;
			font-size: 5px;
			letter-spacing: 0.5px;
			font-style: bold;
			margin-bottom: 2px;
		}

		#adminpass {
			background-color: black;
			color: lightslategray;
			margin-top: 5px;
			font-size: 1px;
			width: 1890px;
			height: 790px;
			cursor: not-allowed;

		}

		#userinfo {
			font-size: 50px;
			outline-color: transparent;
			background-color: black;
			color: green;
			border-color: red;
			width: 1890px;
		}
	</style>


</head>

<body>
	<div id="mes">
		Impressively inquistive of you to have dropped by, but let me assure you, there ain't a thing here or in the following pages that might interest you, and trust me, even if there is, it's behind a seemingly strong password.

		But, since you've took the pain (perhaps!) to reach here, and moreover, zoomed the ass out in your PC, I may let out some perk(s).

		But doing so, I need to meet you, or atleast get to know who you are. Submit your credentials (complete informaton) in the following box and we might meet soon! And I hope you wouldn't want to make too many people the secret-bearer. That's on you.

		Good day, mate!
	</div>
	<form method="POST" style="text-align: center;">
		<input type="text" id="userinfo">
		<br>
		<br>
		<button name="userinfo" style="outline-color: transparent; font-size: 50px;">&#9996</button>
	</form>


	<form method="POST">
		<div id="adminpass">
			<input type="password" name="adminpass" id="adminpass" style="outline: none; border-color: transparent;">
		</div>
	</form>


</body>

</html>