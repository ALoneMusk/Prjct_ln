<?php
session_start();

$_SESSION['Back'] = $_SERVER['REQUEST_URI'];

$username = $_SESSION['CRN'];


if (!$_SESSION['authorise']) {
	session_destroy();
	header('Location:GetIn.php');
}
include("config.php");


$qry = 'SELECT * FROM prjct_ln_data ORDER BY Username';

$res = mysqli_query($connect, $qry);


$information = mysqli_fetch_all($res, MYSQLI_ASSOC);


foreach ($information as $check) {
	if ($check['Username'] == $username) {
		$nameshow = $check['Name'];
	}
}
?>
<html>
<link rel="stylesheet" type="text/css" href="StyleEE.css">
<script type="text/javascript" src="EE.js"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="card.css">
<style type="text/css">
	#card_title {
		color: grey;
	}
</style>

<head>
	<title>Yes, I love Electrical. Do I?</title>
</head>

<body>
	<?php
	$ratetable = 'user_' . $username;

	$normsrate = "SELECT AVG(Personality) AS OwnPersonality, AVG(Compatibility) AS OwnCompatibility, AVG(Cleanliness) AS OwnCleanliness, AVG(Education) AS OwnEducation, AVG(Studies) AS OwnStudies, AVG(Language) AS OwnLanguage, AVG(Cognizance) AS OwnCognizance, AVG(Humorous) AS OwnHumorous, AVG(Conclusion) AS OwnConclusion, COUNT(ID) AS OwnCounted  FROM `$ratetable`";


	$averagerate = mysqli_query($connect, $normsrate);

	$displayallrate = mysqli_fetch_assoc($averagerate);

	$personrate = $displayallrate['OwnPersonality'];
	$compatrate = $displayallrate['OwnCompatibility'];
	$cleanrate = $displayallrate['OwnCleanliness'];
	$edurate = $displayallrate['OwnEducation'];
	$studrate = $displayallrate['OwnStudies'];
	$langrate = $displayallrate['OwnLanguage'];
	$cograte = $displayallrate['OwnCognizance'];
	$humorrate = $displayallrate['OwnHumorous'];
	$concrate = $displayallrate['OwnConclusion'];
	$countrate = $displayallrate['OwnCounted'];


	?>
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
					<li class="nav-item">
						<a class="nav-link" href="signout.php">Signout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- nav bar ends -->

	<br>

	<div class="container-fluid padding">
		<div class="row padding">

			<?php foreach ($information as $info) { ?>
				<?php if ($info['Branch'] == "EE") { ?>
					<?php if ($info['Username'] == $username) {
						continue; ?>
					<?php } ?>
					<?php $id = $info['ID']; ?>

					<div class="col-md-6 col-lg-4 item">
						<div class="card card-block d-flex">

							<div class="card-body text-center ">
								&nbsp;
								<button class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal"> Rate This User </button>
								&emsp;
								<button class="btn btn-success btn-lg" onclick="return fetchuser(' <?php echo ($id); ?> ')"> Show Ratings </button>
								<h1 id="card_title" class="card-title text-grey"><br> <kbd><?php echo ($info['Name']); ?> </kbd></h1>
								<h2 id="card_title" class="card-text"><br><span class="badge badge-warning"><?php echo ($info['Username']); ?></span></h2>
								<textarea class="form-control" rows="5" id="comment" name="text" placeholder="Say something ..."></textarea>
								<br><button type="submit" name="FromMe" class="btn btn-primary">Send Private Message</button>
							</div>
						</div>
					</div>



					<div class="modal fade" id="myModal" role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content d-flex ">
								<div class="modal-header ">

									<h4 class="modal-title"><span class="badge badge-primary text-center">Rate <?php echo ($info['Name']); ?></span></h4>
								</div>
								<div class="modal-body">
									<p>Some shit</p>
								</div>
								<div class="modal-footer">
									<input type="submit" name="<?php echo ($id); ?>" value="Submit Response" class="btn btn-success">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>

						</div>
					</div>




					<?php
					$select = "SELECT Username FROM prjct_ln_data";

					$result = mysqli_query($connect, $select);

					$data = mysqli_fetch_all($result, MYSQLI_ASSOC);


					foreach ($data as $inform) {


						$table = 'user_' . $inform['Username'];



						$credentials = "SELECT User, Message FROM `$table`";


						$credit = mysqli_query($connect, $credentials);

						$displayname = mysqli_fetch_all($credit, MYSQLI_ASSOC);







						$norms = "SELECT AVG(Personality) AS Personality, AVG(Compatibility) AS Compatibility, AVG(Cleanliness) AS Cleanliness, AVG(Education) AS Education, AVG(Studies) AS Studies, AVG(Language) AS Language, AVG(Cognizance) AS Cognizance, AVG(Humorous) AS Humorous, AVG(Conclusion) AS Conclusion, COUNT(ID) AS Counted FROM `$table`";


						$average = mysqli_query($connect, $norms);

						$displayall = mysqli_fetch_array($average);

						if ($inform['Username'] === $info['Username']) {

							$person = $displayall['Personality'];
							$compat = $displayall['Compatibility'];
							$clean = $displayall['Cleanliness'];
							$edu = $displayall['Education'];
							$stud = $displayall['Studies'];
							$lang = $displayall['Language'];
							$cog = $displayall['Cognizance'];
							$humor = $displayall['Humorous'];
							$conc = $displayall['Conclusion'];
							$basis = $displayall['Counted'];
						}
					}

					?>

				<?php } ?>
			<?php } ?>

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
							if ($infomsg['Username'] === $username) {
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
		</div>

</body>

</html>