<?php
	session_start();
	//Get data from session variable.
	$loginUser = $_SESSION['loginUser'];

	if($loginUser == ""){
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PhotoShare</title>
</head>

<body>
	<?php include ($_SERVER['DOCUMENT_ROOT']. '/header.html'); ?>
  <!-- <?php include ($_SERVER['DOCUMENT_ROOT']. '/nav.html'); ?> -->

  <article>
		<h1>You have not logged in.</h1>
		Please login or register.
		<a href="login.php" class="btn btn-default">Login</a><br />
		<a href="regist/index.php" class="btn btn-default">Register</a>
  </article>

  <!-- <?php include ($_SERVER['DOCUMENT_ROOT']. '/aside.html'); ?>  -->
  <?php include ($_SERVER['DOCUMENT_ROOT']. '/footer.html');?>

</body>
</html>

<?php
}else{
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Page</title>
</head>

<body>
	<?php include ($_SERVER['DOCUMENT_ROOT']. '/header.html'); ?>
	<!-- <?php include ($_SERVER['DOCUMENT_ROOT']. '/nav.html'); ?> -->

	Hello <?php print $loginUser; ?>!

<!-- <?php include ($_SERVER['DOCUMENT_ROOT']. '/aside.html'); ?>  -->
<?php include ($_SERVER['DOCUMENT_ROOT']. '/footer.html');?>
</body>
</html>
<?php
}
?>
