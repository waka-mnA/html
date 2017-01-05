<?php /*Database Setting*/
$server = "localhost";
$user = "root";
$password = "Hysks4212";
$dbname = "member_test";
echo "TEST0";
/*Connect to database*/
$conn = mysqli_connect($server, $user, $password, $dbname);
// mysql_select_db($dbname);
echo "TEST";
if(mysqli_connect_errno() > 0){
  echo "MYSQLI FAILED.";
  exit;
}
?>
