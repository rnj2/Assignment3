<?php
session_start();

include("A2functions.php");
##gatekeeper($_SESSION["state"]);

include("account.php");

($dbh = mysql_connect($hostname, $username, $password))or die("Unable to connect to MySQL database");

mysql_select_db( $project );


$type = $_GET["type"];
$amount = $_GET["Amount"];
$member = $_SESSION["USER"];

if(!is_numeric($amount) || $amount < 0){redirect("Invalid Amount", "User.php");}

if($type == 'D'){
	
	$s = "insert into Transactions values('$member', '$type', '$amount', NOW())";
	mysql_query($s) or die (mysql_error());
	
	$s = "update Accounts set Current_Balance = Current_Balance +'$amount' where Name = '$client'";
	mysql_query($s) or die (mysql_error());
	
	get_T($member);

}

if($type == 'W'){
	
	$currentfunds=$_SESSION["CB"];
	if ($amount > $currentfunds){redirect("Overdrawn", "User.php");}
	
	$s = "insert into Transactions values('$member', '$type', '$amount', NOW())";
	mysql_query($s) or die (mysql_error());
	
	$s = "update Accounts set Current_Balance = Current_Balance -'$amount' where Name = '$client'";
	mysql_query($s) or die (mysql_error());
	
	get_T($member);

}



?>