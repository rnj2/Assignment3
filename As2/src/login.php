<?php


session_start();


error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors' , 1);

include ("A2functions.php");
include ("account.php");

//Data from login.html
$name = $_GET["Name"];
$pass = sha1($_GET["Password"]);
$choice = $_GET["type"];

get_type($choice, $name, $pass);


if ($choice == 'A'){
	
	admin($name, $pass);
	
}


($dbh = mysql_connect($hostname, $username, $password))or die("Unable to connect to MySQL database");

print "Successfully connected to MySQL.<br><br><br>";
mysql_select_db( $project );

$name = mysql_real_escape_string($name);
if ($choice == 'U'){
	
	
		$l = "SELECT * from Accounts";
	$r = mysql_query($l) or die(mysql_error());
	
	
	While($j = mysql_fetch_array($r)){
		
		if ($j == NULL){
			
			redirect ("user not valid", "login.html");
		}
		
		if ($j != NULL){
			
			$_SESSION["USER"]= $name;
			$_SESSION["FN"]= $j["FullName"];
			$_SESSION["CB"]= $j["Current_Balance"];
			$_SESSION["PASS"]= $j["Password"];
			$_SESSION["ADRS"]= $j["Address"];
			$_SESSION ["logged"]=TRUE;
			$_SESSION ["state"]='user';
			
			redirect ("Hello $name", "User.php");
			
			
			
			
		}
	}
}



?>
