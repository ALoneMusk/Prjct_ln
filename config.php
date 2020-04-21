<?php

$host = "localhost"; // Host name 
$user = "root";     // Mysql user 
$pass = "";     // password

$connect = mysqli_connect("$host", "$user", "$pass", "prjct_ln");
if (!$connect) {
    echo "Connection error" . mysqli_connect_error();
}
