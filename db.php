<?php /*Database Setting*/
$server = "localhost";
$user = "root";
$password = "root";
$dbname = "member_test";

/*Connect to database*/
$conn = mysql_connect($server, $user, $password);
mysql_select_db($dbname);
?>
