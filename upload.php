<!DOCTYPE html>
<html lang="en">
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
    <?php

    $bucket = "comsm0010-wk13290";
    $keydir = "test/";
    //Get the original name of the file
    $key = $_FILES["upfile"]["name"];
    //Directory mounted with AWS S3
    $bucketpath='/mnt/s3test/';

    $tmpFile = $_FILES['upfile']['tmp_name'];
    echo $key.'   ';
    if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
      //system('chmod 777 '.$bucketpath.$keydir);exit;

      if (!exif_imagetype(tmpFile)){}
        echo "<h2>Please select a image file</h2>";

      if (move_uploaded_file($tmpFile,  $bucketpath.$keydir.$key)){
        //chmod($bucketpath.$keydir.$key, 0644);
        echo "<h2>Success!</h2>";
      } else {
        echo "<h2>Upload Failed.</h2>";
      }

    } else {
      echo "Please select a file.";

    }
    echo "<a href="main.php" class="btn btn-default">Back to Main</a>";
    ?>
  </article>

  <!-- <?php include ($_SERVER['DOCUMENT_ROOT']. '/aside.html'); ?>  -->
  <?php include ($_SERVER['DOCUMENT_ROOT']. '/footer.html');?>
  </body>
  </html>
