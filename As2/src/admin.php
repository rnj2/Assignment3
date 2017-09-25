<?php
session_start();

include("A2functions.php");
##gatekeeper($_SESSION["state"]);

include("account.php");

($dbh = mysql_connect($hostname, $username, $password))or die("Unable to connect to MySQL database");

mysql_select_db( $project );

get_A($_SESSION["state"]);




?>