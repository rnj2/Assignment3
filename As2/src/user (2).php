<?php
session_start(); 


?>
<form action = "Transactions.php">


<?php include("account.php");

$member = $_SESSION["FN"];
$bal = $_SESSION["CB"];

echo "Greetings $member";

($dbh = mysql_connect($hostname, $username, $password))or die("Unable to connect to MySQL database");


mysql_select_db( $project );

print "available bal: $$bal<br><br>";

?>

<input type=text autofocus = "on"	name="Amount"
	autocomplete = "off" placeholder="Amount">&nbsp;Amount<br><br>
	
<input type=radio name="type" required value = 'D'> Deposit<br>
<input type=radio name="type" reqiored value = 'W'>Withdraw<br>

<input type=submit>
</form>
