<?php 



$connect = mysqli_connect('localhost', '', '', 'prjct_ln');
	if(!$connect)
	{
		echo "Connection error" . mysqli_connect_error();
	}


if (isset($_POST['submit'])) 
	{

		$issue = $_POST['Issue'];

$query = "INSERT INTO issues(Issues) VALUES ('$issue')";

if (mysqli_query($connect, $query))
		{
			echo '<script>alert("Your issue has been saved and shall be acted upon very soon.");</script>';
		}
		else
		{
			echo "Error : " .mysqli_error($connect);
		}
	}






 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>What happened?</title>
 </head>
 <body style="background-color: black;">

<div style="color: red; text-align: center; font-size: 50px;">
	Please expain your problems in detail including your Name, Branch, CRN and valid email address via which we may contact you regarding your issue.
</div>

 	<form method="POST">
<div style="text-align: center;">
<input type="textarea" name="Issue" style="text-align: center;  height: 100px; width: 1500px; margin-top: 200px; background-color: yellow; color: green; border-color: transparent; font-size: 20px;">
<br>
<br>
<input type="submit" name="submit" value="And that's where I got stuck." style="outline-color: transparent; border-color: transparent; background-color: whitesmoke; font-size: 30px;">
</div>
 	</form>
 	<br>
 	<br>

<div style="text-align: center;">
 	<button onclick="return goBack()" style="outline-color: transparent; border-color: transparent; background-color: whitesmoke; font-size: 30px;">I'm Done.</button>
 </div>

 


<script>
function goBack() {
  window.history.back();
}
</script>




 </body>
 </html>
