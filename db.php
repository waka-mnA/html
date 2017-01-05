<?php /*Database Setting*/
$server = "localhost";
$user = "root";
$password = "Hysks4212";
$dbname = "member_test";

/*Connect to database*/
$conn = mysql_connect($server, $user, $password);
mysql_select_db($dbname);
?>
