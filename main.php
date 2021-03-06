<?php
	session_start();
	//Get data from session variable.
	$loginUser = $_SESSION['loginUser'];

	if($loginUser == ""){
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PhotoShare.com</title>
	<!-- Bootstrap CSS Reading -->
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
		<h1>You have not logged in.</h1>
		Please login or register.<br />
		<a href="login.php" class="btn btn-default">Login</a><br />
		<a href="index.php" class="btn btn-default">Register</a>
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
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PhotoShare.com</title>
	<!-- Bootstrap CSS Reading -->
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
	<h5> You are logged in as <?php print $loginUser; ?></h5>


<h2>Gallery</h2>

	<!-- Display photos -->
	<?php
	$path = 'images/';
	$array = scandir($path,1);
	$num = count($array);

	echo "<table class='table table-responsive table-hover my-gallery'>";
	$max = 3;
	$cnt = 0;

	for ($i=0;$i<$num;$i++){
		$filename = "http://52.56.67.132/images/" . $array[$i];
		//If extension = gif/jpg/png
		//Display as original size

		if  (Eregi('gif$', $filename) OR
			 Eregi('jpg$', $filename) OR
			 Eregi('jpeg$',$filename) OR
			 Eregi('png$', $filename))
		{
			//echo"<td width=\"200\">".$filename . "</td>";
			echo "<td style='width:200px;''><a href=" .$filename . "><img class='img-responsive  center-block gallery' src = " .$filename. "></a>".$array[$i] . "</td>";


			$cnt = $cnt + 1;

			if ($cnt >= $max) {
				echo "</tr><tr>";
				$cnt = 0;
			}
		}
	}
	echo "</tr></table>";
	?>


	<h3>
		Upload your favourite photos!
	</h3>
	<form class="form-horizontal" method="post" enctype="multipart/form-data"  action="upload.php">
		<div class="form-group">
			<div class="col-lg-10">
				<input class="form-control" id="uploadFile" type="file" name="upfile">
			</div>
		</div>
    <input class="btn btn-default" type="submit" value="Upload" />
  </form>

</article>
<!-- <?php include ($_SERVER['DOCUMENT_ROOT']. '/aside.html'); ?>  -->
<?php include ($_SERVER['DOCUMENT_ROOT']. '/footer.html');?>
</body>
</html>
<?php
}
?>
