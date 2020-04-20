<?php

$host = "localhost"; // Host name 
$user = "root";     // Mysql user 
$pass = "may";     // password

$con = mysqli_connect("$host", "$user", "$pass") or die('Database not connected'); //connecting database without a password

$db = mysqli_select_db($con, "prjct_ln_data");
