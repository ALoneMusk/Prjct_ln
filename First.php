<?php

session_start();

if (!$_SESSION['authorise']) {
	session_destroy();
	header('Location:GetIn.php');
}


$user = $_SESSION['CRN'];

include("header.php");
include("config.php");


$qry = 'SELECT * FROM prjct_ln_data ORDER BY Username';

$res = mysqli_query($connect, $qry);


$information = mysqli_fetch_all($res, MYSQLI_ASSOC);

foreach ($information as $check) {
	if ($check['Username'] == $user) {
		$nameshow = $check['Name'];
	}
}





?>




<!DOCTYPE html>
<html>

<head>

	<title>
		Your Mistakes' List!
	</title>

	<style type="text/css">
		body {
			background-color: black;
		}

		#namebut {
			color: black;
			font-size: 150px;
			background-color: darkslategray;
			border-color: transparent;
			cursor: not-allowed;
		}

		.overlay-content {
			color: red;
			text-align: center;
		}

		.closebtn {
			color: red;
			cursor: pointer;
			font-size: 50px;
			text-align: center;
			margin-top: 8px;
			margin-bottom: 50px;
		}

		.messages {
			font-size: 50px;
		}

		.sidebar {
			height: 100%;
			width: 0;
			position: fixed;
			z-index: 1;
			top: 0;
			left: 0;
			background-color: black;
			overflow-x: hidden;
			transition: 0.5s;
		}

		#span {
			text-align: center;
			font-size: 50px;
			display: inline-block;
			vertical-align: top;
			color: red;
			margin-left: 21.4%;
			cursor: pointer;
		}

		#signout {
			margin-top: 30%;
		}

		.buttonspan {
			color: red;
			font-size: 20px;
			border-color: green;
			background-color: yellow;
			outline-color: transparent;

		}

		#title {
			background-color: darkslategray;
			width: 100%;
		}

		#username {
			font-size: 30px;
			display: inline-block;
			vertical-align: top;
			color: pink;

		}

		.button {
			color: deepskyblue;
			outline-color: transparent;
			border-color: transparent;
			border-radius: 100px;
			height: 75px;
			width: 200px;
			font-size: 50px;
			background-color: lemonchiffon;
		}

		.button:hover {
			background-color: navajowhite;
			cursor: pointer;
		}
	</style>

</head>

<body>
	<div style="width: 100%; text-align: center;">
		<table align="center" style="padding: 75px;">
			<tr class="br">

				<td id="EE" class="brd" style="padding-right: 50px; padding-left: 0;">
					<button onclick="window.location.href = 'EE.php'; return detect();" id="EEbtn" class="button">EE</button>
				</td>

				<td id="CE" class="brd" style="padding: 50px;">
					<button onclick="window.location.href = 'CE.php'; return detect();" id="CEbtn" class="button">CE</button>
				</td>


				<td id="ME" class="brd" style="padding-left: 50px; padding-right: 0;">
					<button onclick="window.location.href = 'ME.php'; return detect();" id="MEbtn" class="button">ME</button>
				</td>

			</tr>

			<tr class="br">

				<td>

				</td>
				<td id="PE" class="brd" style="padding: 50px;">
					<button onclick="window.location.href = 'PE.php'; return detect();" id="PEbtn" class="button">PE</button>
				</td>
				<td>

				</td>

			</tr>


			<tr class="br">
				<td id="ECE" class="brd" style="padding-right: 50px; padding-left: 0;">
					<button onclick="window.location.href = 'ECE.php'; return detect();" id="ECEbtn" class="button">ECE</button>
				</td>


				<td id="CSE" class="brd" style="padding: 50px;">
					<button onclick="window.location.href = 'CSE.php'; return detect();" id="CSEbtn" class="button">CSE</button>
				</td>

				<td id="IT" class="brd" style="padding-left: 50px; padding-right: 0;">
					<button onclick="window.location.href = 'IT.php'; return detect();" id="ITbtn" class="button">IT</button>
				</td>

			</tr>


		</table>
	</div>




	<div id="side" class="sidebar">
		<div class="closebtn" onclick="closeSide()">&#10068</div>
		<div class="overlay-content">
			<div style="color: red; font-size: 25px; margin-bottom: 50px;">Messages:</div>

			<?php



			$selectmsg = "SELECT Username FROM prjct_ln_data";

			$resultmsg = mysqli_query($connect, $selectmsg);

			$datamsg = mysqli_fetch_all($resultmsg, MYSQLI_ASSOC);


			foreach ($datamsg as $infomsg) {


				$tablenamemsg = 'user_' . $infomsg['Username'];



				$credentialsmsg = "SELECT User, Message FROM `$tablenamemsg`";


				$creditmsg = mysqli_query($connect, $credentialsmsg);

				$displaynamemsg = mysqli_fetch_all($creditmsg, MYSQLI_ASSOC);



				foreach ($displaynamemsg as $msg) {
					if ($infomsg['Username'] === $user) {





			?>

						<li class="messages"> <?php echo $msg['Message']; ?></li>

					<?php } ?>
				<?php } ?>
			<?php } ?>

			<button class="buttonspan" id="signout" onclick="location.href='Signout.php'">Signout</button>
			<br>
			<br>
			<button class="buttonspan" onclick="window.location.href = 'Issue.php';">Having an issue?</button>
		</div>
	</div>



	<script type="text/javascript">
		function openSide() {
			document.getElementById("side").style.width = "100%";
		}

		function closeSide() {
			document.getElementById("side").style.width = "0%";
		}

		var a = '';

		function detect() {

			if (navigator.userAgent.match(/Android/i) ||
				navigator.userAgent.match(/webOS/i) ||
				navigator.userAgent.match(/iPhone/i) ||
				navigator.userAgent.match(/iPad/i) ||
				navigator.userAgent.match(/iPod/i) ||
				navigator.userAgent.match(/BlackBerry/i) ||
				navigator.userAgent.match(/Windows Phone/i)) {
				a = 'true';
			} else {
				a = 'false';
			}

			if (a === 'true') {
				alert("You are trying to access this site using a mobie browser. For a complete experience, it is advised to use a desktop when visiting this website. Some features might not work on this version of browser.");
			}
		}
	</script>







</body>

</html>