<?php
	


	if (isset($_POST['submit'])) 
	{
	$username = $_POST['Username'];
	
	$from = "user_".$_POST['Username'];
	}



$connect = mysqli_connect('localhost', '', '', 'prjct_ln');
	if(!$connect)
	{
		echo "Connection error" . mysqli_connect_error();
	}
	$name = $username = $email = $password = $branch = "";











	if (isset($_POST['submit'])) 
	{

		$name = $_POST['Name'];
		$username = $_POST['Username'];
		$email = $_POST['Email'];
		$password = $_POST['Password'];
		$branch = $_POST['Branch'];




	$sequel = 'SELECT Id, Username, Password, Email FROM prjct_ln_data';

	$result = mysqli_query($connect, $sequel);

	$information = mysqli_fetch_assoc($result);

	$confirm;

		if($information['Username'] === $username || $information['Email'] === $email)
		{
			echo '<script>alert("You are already registered. Get in straightaway!");</script>';
		}	

	else
	{

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


		if (mysqli_query($connect, $query))
		{
			header("location: GetIn.php");
			exit();
		}
		else
		{
			echo "Error : " .mysqli_error($connect);
		}
	}

}
	


?>








<html>

<head>
	<title> Prjct_Ln </title>
	<link rel="stylesheet" href="login.css">
	<script type="text/javascript" src="Validation.js"></script>
	

</head>
<body>	
	<div id="title">
		<button id="namebut" ondblclick="location.href='Admin.php'" style="outline: none;">
		Prjct_ln
	</button>
	</div>

	<form id="InputForm" method="post">
	
	<div id="table">
	

	<div> 
		<label style="font-size: 30px; color: red;">Branch:</label>
	<select id="Branch" name="Branch" style="outline: none;">
		<option value="EE">EE </option>
		<option value="CE" >CE </option>
		<option value="CSE" >CSE </option>
		<option value="ECE" >ECE </option>
		<option value="IT" >IT </option>
		<option value="ME" >ME </option>
		<option value="PE" >PE </option>
	</select>
	</div>
	
	<br>

<div>
	<div id="NameHTML" style="color: dodgerblue;" >
	</div>
	<div>
	<input class = "input" type="text" id="Name" placeholder= "Full Name" name="Name">
	</div>
	<div id="FNameError">
	</div> 
</div>

	<br>
	

<div>
	<div id="UNameHTML" style="color: dodgerblue;">
	</div>
	<div> 
	<input class = "input" type="text"  id="UName" placeholder= "CRN " name="Username">
	</div>
	<div id="UNameError">
	</div>
</div>

	<br>

<div>
	<div id="PassHTML" style="color: dodgerblue;">
	</div>
	<div>
	<input class = "input" type="password" id="Pass" placeholder= "Password" name="Password">
	</div>
	<div id="PassError">
	</div>
</div>

	<br>

<div>
	<div id="ConPassHTML" style="color: dodgerblue;">
	</div>
	<div>
	<input class = "input" type="password" id="ConPass" placeholder= "Confirm Password">
	</div>
	<div id="ConPassError">
	</div>
</div>
	
	<br>

	<div>
	<div id="MailHTML" style="color: peachpuff;">
	</div>
	<div>
	<input class = "input" type="email" id="Mail" placeholder= "Email" name="Email">
	</div> 
	<div id="MailError">
	</div>

	<br>
	<br>
	
<div>
	<div>
	<button name="submit" class="button" style = "outline: none" onclick="return Validate(); return detect();">Register Me</button>
	</div>
</div>

	<br>
		<div>
		<button class="button" style = "outline: none" onclick="return detect();">Wanna do again</button>
		</div>
		<br>
		<div> 
		<button class="button" formaction="GetIn.php" style="outline: none;" onclick="return detect();"> Get Me In </button>
		</div>




</div>
</form>
</body>
</html>
