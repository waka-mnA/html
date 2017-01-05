<?php /*Database Setting*/
$server = "localhost";
$user = "root";
$password = "Hysks4212";
$dbname = "member_test";

/*Connect to database*/
$conn = mysqli_connect($server, $user, $password, $dbname);

if(mysqli_connect_errno() > 0){
  echo "MYSQLI FAILED.";
  exit;
}
?>
<!-- 2017-01-05T07:07:20.300824Z 3 [Note] Access denied for user 'UNKNOWN_MYSQL_USER'@'localhost' (using password: NO) -->
