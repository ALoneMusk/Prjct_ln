<?php

session_start();

$_SESSION['Back'] = $_SERVER['REQUEST_URI'];

$username = $_SESSION['CRN'];


if (!$_SESSION['authorise']) {
	session_destroy();
	header('Location:GetIn.php');
}

include("header.php");
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

<head>
	<title>What! Coding has Math?</title>


</head>

<body>


	<div id="title">
		<button id="namebut" ondblclick="location.href='Admin.php'" style="outline: none;">
			Prjct_ln
		</button>
		<span id="span" onclick="openSide()">&#10068</span>
		<li id="username">
			Welcome, <?php echo ($nameshow) . '!'; ?>
		</li>
	</div>









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




	<div id="own" style="	color: whitesmoke; font-size: 30px;	text-align: center;	margin-bottom: 100px;">
		<?php echo ($countrate); ?> people have rated you:
		<br>
		<table>
			<tr>
				<td class="tbl">
					<div align="center">
						Personality
					</div>
					<div align="center">
						<input type="range" name="prsnlty" id="rng" class="slider2" min="1" max="100" value="<?php echo ($personrate); ?>">
					</div>
				</td>
				<td class="tbl">
					<div align="center">
						Compatibility
					</div>
					<div align="center">
						<input type="range" name="cmptblty" id="rng" class="slider2" min="1" max="100" value="<?php echo ($compatrate); ?>">
					</div>
				</td>

				<td class="tbl">
					<div align="center">
						Cleanliness
					</div>
					<div align="center">
						<input type="range" name="clnlnss" id="rng" class="slider2" min="1" max="100" value="<?php echo ($cleanrate); ?>">
					</div>
				</td>

				<td class="tbl">
					<div align="center">
						Education
					</div>
					<div align="center">
						<input type="range" name="dctn" id="rng" class="slider2" min="1" max="100" value="<?php echo ($edurate); ?>">
					</div>
				</td>

				<td class="tbl">
					<div align="center">
						Studies
					</div>
					<div align="center">
						<input type="range" name="dctn" id="rng" class="slider2" min="1" max="100" value="<?php echo ($studrate); ?>">
					</div>
				</td>

				<td class="tbl">
					<div align="center">
						Language
					</div>
					<div align="center">
						<input type="range" name="lngg" id="rng" class="slider2" min="1" max="100" value="<?php echo ($langrate); ?>">
					</div>
				</td>

				<td class="tbl">
					<div align="center">
						Cognizance
					</div>
					<div align="center">
						<input type="range" name="cgnznc" id="rng" class="slider2" min="1" max="100" value="<?php echo ($cograte); ?>">
					</div>
				</td>

				<td class="tbl">
					<div align="center">
						Humor
					</div>
					<div align="center">
						<input type="range" name="hmr" id="rng" class="slider2" min="1" max="100" value="<?php echo ($humorrate); ?>">
					</div>
				</td>

				<td class="tbl">
					<div align="center">
						Conclusion
					</div>
					<div align="center">
						<input type="range" name="cnclsn" id="rng" class="slider2" min="1" max="100" value="<?php echo ($concrate); ?>">
					</div>
				</td>
			</tr>
		</table>







	</div>



























	<?php foreach ($information as $info) { ?>

		<?php if ($info['Branch'] == "CSE") { ?>

			<?php if ($info['Username'] == $username) {


				continue; ?>

			<?php } ?>

			<?php $id = $info['ID']; ?>


			<form method="POST" action="Post.php">

				<div>



					<div id="wrap">


						<table style="width: 100%">





							<tr>

								<td class="td" style="text-align: left;">
									<button class="rolls" style="outline: none;" onclick="return fetchuser(' <?php echo ($id); ?> ')">
										<?php echo ($info['Username']); ?>
									</button>
								</td>









								<td class="td" style="text-align: center;">
									<textarea class="msgs" name="FromMe">
	 Only the person you are sending the message to will be able to view it. Also, unless you specify your identity, he or she will not know from whom the message is.
	</textarea>
								</td>


								<td class="td" style="text-align: right;">
									<button class="names" style="outline: none;" onclick="return fetchuser(' <?php echo ($id); ?> ')">
										<?php echo ($info['Name']); ?>
									</button>
								</td>




							</tr>

						</table>

						<hr>

					</div>



					<div id=" <?php echo ($id); ?> " style="display: none;">

						<div class="contents">

							<div style="color: fuchsia; text-align: center; font-size: 40px;"> What You Think: </div>

							<br>

							<table>

								<tr>
									<td class="tbl">
										<div align="center">
											Personality
										</div>
										<div align="center">
											<input type="range" name="Personality" class="slider" min="1" max="100" value="20">
										</div>
									</td>

									<td class="tbl">
										<div align="center">
											Compatibility
										</div>
										<div align="center">
											<input type="range" name="Compatibility" class="slider" min="1" max="100" value="20">
										</div>
									</td>

									<td class="tbl">
										<div align="center">
											Cleanliness
										</div>
										<div align="center">
											<input type="range" name="Cleanliness" class="slider" min="1" max="100" value="20">
										</div>
									</td>

									<td class="tbl">
										<div align="center">
											Education
										</div>
										<div align="center">
											<input type="range" name="Education" class="slider" min="1" max="100" value="20">
										</div>
									</td>

									<td class="tbl">
										<div align="center">
											Studies
										</div>
										<div align="center">
											<input type="range" name="Studies" class="slider" min="1" max="100" value="20">
										</div>
									</td>

									<td class="tbl">
										<div align="center">
											Language
										</div>
										<div align="center">
											<input type="range" name="Language" class="slider" min="1" max="100" value="20">
										</div>
									</td>


									<td class="tbl">
										<div align="center">
											Cognizance
										</div>
										<div align="center">
											<input type="range" name="Cognizance" class="slider" min="1" max="100" value="20">
										</div>
									</td>

									<td class="tbl">
										<div align="center">
											Humorous
										</div>
										<div align="center">
											<input type="range" name="Humorous" class="slider" min="1" max="100" value="20">
										</div>
									</td>

									<td class="tbl">
										<div align="center">
											Conclusion
										</div>
										<div align="center">
											<input type="range" name="Conclusion" class="slider" min="1" max="100" value="20">
										</div>
									</td>
								</tr>

							</table>

							<input type="submit" id="rate" name="<?php echo ($id); ?>" value="Submit Response" style="outline: none;">

						</div>

			</form>

			<br>



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







			<div class="contentsact">

				<div style="color: fuchsia; text-align: center; font-size: 40px;">Others' Rating: </div>

				<br>

				<table>
					<tr>
						<td class="tbl">
							<div align="center">
								Personality
							</div>
							<div align="center">
								<input type="range" name="prsnlty" id="rng" class="slider2" min="1" max="100" value="<?php echo ($person); ?>">
							</div>
						</td>
						<td class="tbl">
							<div align="center">
								Compatibility
							</div>
							<div align="center">
								<input type="range" name="cmptblty" id="rng" class="slider2" min="1" max="100" value="<?php echo ($compat); ?>">
							</div>
						</td>

						<td class="tbl">
							<div align="center">
								Cleanliness
							</div>
							<div align="center">
								<input type="range" name="clnlnss" id="rng" class="slider2" min="1" max="100" value="<?php echo ($clean); ?>">
							</div>
						</td>

						<td class="tbl">
							<div align="center">
								Education
							</div>
							<div align="center">
								<input type="range" name="dctn" id="rng" class="slider2" min="1" max="100" value="<?php echo ($edu); ?>">
							</div>
						</td>

						<td class="tbl">
							<div align="center">
								Studies
							</div>
							<div align="center">
								<input type="range" name="dctn" id="rng" class="slider2" min="1" max="100" value="<?php echo ($stud); ?>">
							</div>
						</td>

						<td class="tbl">
							<div align="center">
								Language
							</div>
							<div align="center">
								<input type="range" name="lngg" id="rng" class="slider2" min="1" max="100" value="<?php echo ($lang); ?>">
							</div>
						</td>


						<td class="tbl">
							<div align="center">
								Cognizance
							</div>
							<div align="center">
								<input type="range" name="cgnznc" id="rng" class="slider2" min="1" max="100" value="<?php echo ($cog); ?>">
							</div>
						</td>

						<td class="tbl">
							<div align="center">
								Humor
							</div>
							<div align="center">
								<input type="range" name="hmr" id="rng" class="slider2" min="1" max="100" value="<?php echo ($humor); ?>">
							</div>
						</td>

						<td class="tbl">
							<div align="center">
								Conclusion
							</div>
							<div align="center">
								<input type="range" name="cnclsn" id="rng" class="slider2" min="1" max="100" value="<?php echo ($conc); ?>">
							</div>
						</td>
					</tr>
				</table>


			</div>

			<div style="text-align: center; font-size: 30px; color: whitesmoke; margin-top: 20px;">Based on <?php echo ($basis); ?> review(s).</div>


			</div>



			</div>

			<hr>
			<br>
			<br>
			<br>

			</div>

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





</body>

</html>