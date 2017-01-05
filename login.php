<?php
//create session
session_start();

if(!isset($_POST['login'])) {
  inputForm();
} else {}
  $formUserId = $_POST['formUserid'];
  $formPassword = $_POST['formPassword'];

  //ID, PASWORD are not entered yet
  if(($formUserId == "") || ($formPassword == "")) {
    error(1);
  } else {
  //ID,PASSWORD are entered
    require_once('regist/db.php');
  //get data from members table.
  $query = "select * from members";
  $result = mysqli_query($query);

  //If USERIDs are matched, store password from database into variable.
  while($data = mysql_fetch_array($result)) {
    if($data['userid'] == $formUserId) {
      $dbPassword = $data['password'];
      break;
    }
  }

  mysql_close($conn);

  if(!isset($dbPassword)) {
    error(2);
  } else {
    if($dbPassword != $formPassword){
    error(3);
  } else {
    //ID,password are matched.
    //create session variable.
    //register $formUserID into session variable.
    $_SESSION['loginUser'] = $formUserId;
    header("Location:test.php");
    }
  }
  }
}
?>

<?php
  //input form
  function inputForm() {
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>

<body>
  <h1>Login</h1>
  <form action="login.php" method="post">
    <label for="userid">User ID</label>:
    <input type="text" name="formUserid" id="userid"/>
    <br />
    <label for="password">Password</label>:
    <input type="text" name="formPassword" id="password"/>
    <br />
    <input type="submit" name="login" value="Login" />
  </form>
</body>

</html>
<?php
}
//Error function
function error($errorType) {
  switch($errorType) {
    case 1:
    $errorMsg = "Please enter ID and password.";
    break;

    case 2:
    $errorMsg = "Wrong ID.";
    break;

    case 3:
    $errorMsg = "Wrong Password.";
    break;
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Login</title>
</head>

<body>
  <h1>Error</h1>
  <?php
    print $errorMsg;
  ?>
</body>
</html>
<?php
}
?>
