<?php

$host = "localhost"; // Host name 
$user = "root";     // Mysql user 
$pass = "may";     // password
$db   =  "prjct_ln";

$connect = mysqli_connect("$host", "$user", "$pass", "$db");
if (!$connect) {
    echo "Connection error" . mysqli_connect_error();
}
