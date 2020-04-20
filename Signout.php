<?php 

session_start();


if(!$_SESSION['authorise'])
{
	session_destroy();
	header('Location:GetIn.php');
}
else
{
	session_destroy();
	header('Location:GetIn.php');
}
 ?>
