
<?php
session_start();



$username = $_SESSION['CRN'];


$connect = mysqli_connect('localhost', '', '', 'prjct_ln');
	if(!$connect)
	{
		echo "Connection error" . mysqli_connect_error();
	}

		$qry = 'SELECT * FROM prjct_ln_data ORDER BY Username';

	$res = mysqli_query($connect, $qry);


	$information = mysqli_fetch_all($res, MYSQLI_ASSOC);







	foreach ($information as $info) 
	{


	$tablename = 'user_'.$info['Username'];






	$id = $info['ID'];





	if (isset($_POST[$id])) 
	{


	$duplicate = "SELECT User FROM `$tablename`";


	$get = mysqli_query($connect, $duplicate);


	$same = mysqli_fetch_all($get, MYSQLI_ASSOC);
	
	$con = 0;

foreach ($same as $samecheck)
{

	if($samecheck['User'] === $username)
		{
			$con = 1;

		}
}

	if($con === 1)
		{



		$personality = $_POST['Personality'];
		$compatibility = $_POST['Compatibility'];
		$cleanliness = $_POST['Cleanliness'];
		$education = $_POST['Education'];
		$studies = $_POST['Studies'];
		$language = $_POST['Language'];
		$cognizance = $_POST['Cognizance'];
		$humorous = $_POST['Humorous'];
		$conclusion = $_POST['Conclusion'];
		$message =  mysqli_real_escape_string($connect, $_POST['FromMe']);





		$update = "UPDATE `$tablename` SET Message = '$message', Personality =  '$personality', Compatibility = '$compatibility', Cleanliness = '$cleanliness', Education = '$education', Studies = '$studies', Language = '$language', Cognizance = '$cognizance', Humorous = '$humorous', Conclusion = '$conclusion' WHERE User = '$username'";
		if (mysqli_query($connect, $update))
		{
			echo '<script>alert("Your responses have been updated.");</script>';
			header("Location:".$_SESSION['Back']);		
		}
		else
		{
			echo "Error : " .mysqli_error($connect);
		}

		}	



	if($con <> 1)
	{

		$personality = $_POST['Personality'];
		$compatibility = $_POST['Compatibility'];
		$cleanliness = $_POST['Cleanliness'];
		$education = $_POST['Education'];
		$studies = $_POST['Studies'];
		$language = $_POST['Language'];
		$cognizance = $_POST['Cognizance'];
		$humorous = $_POST['Humorous'];
		$conclusion = $_POST['Conclusion'];
		$message =  mysqli_real_escape_string($connect, $_POST['FromMe']);




		$insert = "INSERT INTO `$tablename`(User, Message, Personality, Compatibility, Cleanliness, Education, Studies ,Language, Cognizance, Humorous, Conclusion) VALUES ('$username', '$message', '$personality', '$compatibility', '$cleanliness', '$education', '$studies', '$language','$cognizance', '$humorous', '$conclusion')";

		if (mysqli_query($connect, $insert))
		{
			echo '<script>alert("That\'ll help a lot of people. Hopefully your rating is true.");</script>';
			header("Location:".$_SESSION['Back']);
		}	
		else
		{
			echo "Error : " .mysqli_error($connect);
		}
	}	

	}

}





 ?>
