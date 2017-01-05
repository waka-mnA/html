<?php
//create session
session_start();

if(!isset($_POST['login'])) {
  //Display the login form
  inputForm();
} else {
  $formUserId = $_POST['formUserid'];
  $formPassword = $_POST['formPassword'];
  //ID, PASWORD are not entered yet
  if(($formUserId == "") || ($formPassword == "")) {
    error(1);
  }
  else
  {
    echo "TEST";
    //ID,PASSWORD are entered
    require_once('db.php');
    //get data from members table.
    $query = "select * from members";
    $result = mysqli_query($conn, $query);
    //If USERIDs are matched, store password from database into variable.
    while($data = mysqli_fetch_array($result)) {
      if($data['userid'] == $formUserId) {
        $dbPassword = $data['password'];
        break;
      }
    }
    mysqli_close($conn);

    if(!isset($dbPassword)) {
      error(2);
    }
     else {
       if($dbPassword != $formPassword){
         error(3);
       } else {
        //ID,password are matched.
        //create session variable.
        //register $formUserID into session variable.
        //  $_SESSION['loginUser'] = $formUserId;
        //  header("Location:main.php");
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
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- jQuery Reading -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Bootstrap JS Reading -->
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" media="screen" href="/css/bootstrap-custom.css">
</head>

<body>
  <?php include ($_SERVER['DOCUMENT_ROOT']. '/header.html'); ?>
  <!-- <?php include ($_SERVER['DOCUMENT_ROOT']. '/nav.html'); ?> -->

  <article>
  <h1>Login</h1>
  <form action="login.php" method="post">
    <label for="userid">User ID</label>:
    <input type="text" name="formUserid" id="userid"/>
    <br />
    <label for="password">Password</label>:
    <input type="password" name="formPassword" id="password"/>
    <br />
    <input class="btn btn-default" type="submit" name="login" value="Login" />
  </form>
  </article>

  <!-- <?php include ($_SERVER['DOCUMENT_ROOT']. '/aside.html'); ?>  -->
  <?php include ($_SERVER['DOCUMENT_ROOT']. '/footer.html');?>
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

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- jQuery Reading -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Bootstrap JS Reading -->
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" media="screen" href="/css/bootstrap-custom.css">
</head>

<body>
  <?php include ($_SERVER['DOCUMENT_ROOT']. '/header.html'); ?>
  <!-- <?php include ($_SERVER['DOCUMENT_ROOT']. '/nav.html'); ?> -->

  <article>
    <h1>Error</h1>
    <?php
      print $errorMsg;
    ?>
  </article>

  <!-- <?php include ($_SERVER['DOCUMENT_ROOT']. '/aside.html'); ?>  -->
  <?php include ($_SERVER['DOCUMENT_ROOT']. '/footer.html');?>
</body>
</body>
</html>
<?php
}
?>
