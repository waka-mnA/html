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
