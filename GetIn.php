<?php

session_start();

include("header.php");
include("config.php");

if (isset($_POST['submit'])) {
	$username =  mysqli_real_escape_string($connect, $_POST['Usrnm']);
	$password =  mysqli_real_escape_string($connect, $_POST['Pswrd']);



	$check = "SELECT Username, Password FROM prjct_ln_data WHERE Username = '$username' && Password = '$password'";

	$result = mysqli_query($connect, $check);


	if (mysqli_num_rows($result) == 1) {
		$_SESSION['authorise'] = 'true';
		$_SESSION['CRN'] = $_POST['Usrnm'];
		header("location: First.php");
	} else {
		echo '<script>alert("Either your Password or your Username or maybe YOU, my mate, are wrong!");</script>';
	}
}






?>




















<html>
<link rel="stylesheet" href="GetIn.css">
<script type="text/javascript" src="GetIn.js"></script>

<head>
	<title>Yes, it's me.</title>
</head>

<body>
	<div id="title">
		<button id="namebut" ondblclick="location.href='Admin.php'" style="outline: none;">
			Prjct_ln
		</button>
		<span id="span" onclick="openSide()">&#10068</span>
	</div>

	<br>
	<div id="upper1">

		<form method="POST">



			<div class="HTML">
				<div>
					<input type="input" name="Usrnm" id="usrnm" placeholder="CRN" style="outline: none; text-align: center;">
				</div>
				<div id="usrnmHTML">

				</div>
			</div>


			<div class="HTML2">
				<div>
					<input type="Password" name="Pswrd" id="pswrd" placeholder="Password" style="outline: none; text-align: center;">
				</div>
				<div id="pswrdHTML">

				</div>
			</div>

			<div>
				<button id="sbmt" name="submit" onclick="return confirm();" style="outline: none;">Recognised?</button>
			</div>
	</div>


	</form>
	<div style="text-align: center; padding: none;">
		<button type="submit" name="reg" id="reg" style="outline: none;" onclick="location.href='index.php';  return detect();"> Not Registered?</button>
	</div>









	<div id="side" class="sidebar">
		<div class="closebtn" onclick="closeSide()">&#10068</div>
		<div class="overlay-content">
			<div style="color: red; font-size: 25px; margin-bottom: 50px;">
				<div style="font-size: 50px;">Glad that you somehow reached here. This page clarifies most of the doubts you might be having about the usage, anonimity of your responses and other confusions that might pester you while using this website.</div>
				<br>
				<br>
				<li>The purpose of this website is to present a clear picture of each student's actual character and personality based on what his or her classmates, friends, roommates et cetera have experienced during this one year of staying together, so that next year, while choosing room partners, and in general too while choosing whom to befriend, everyone shall be apparently knowing about the other person. While it is understood that the responses on this website are not the actual jugdement of someone's character, it is intended to atleast show a glimpse of what people think about a particular person.
				</li>

				<br>
				<br>

				<li>All your responses are anonymous. The person whom you are rating or sending the suggestion would not be able to view who has given what response to his profile. This has been done so that the grading process is transparent and free of bias. In such a way, you could be truthful without having to worry about your relation with a person.</li>

				<br>
				<br>

				<li>For any queries or problems that might rise regarding this website, you could click on the "Having an issue" button provided on each page and submit your problems there.
				</li>

				<br>
				<br>

				<li>This site works on the basis of User registration. The result you see are the average of all the user inputs submitted till then, thus, it is advised to keep checking the site frequently for more accurate points.</li>

				<br>
				<br>

				<li>Lastly, it is expected from each student to be true about what ratings they are giving to someone without being moved by emotions or personal attachments so that others can benefit from it. And remember, all your responses are anonymous, so you could freely do whatever you feel like.</li>
			</div>

			<br>
			<button class="buttonspan" onclick="window.location.href = 'Issue.php';">Having an issue?</button>
		</div>
	</div>











</body>

</html>