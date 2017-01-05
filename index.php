
<?php
/* Change the file to be read depends on registration operation*/
$mode = $_POST["mode"];

/* Show Registration form */
if($_GET['pre_userid'] !="") {
  $mode = "regist_form";
}

switch($mode) {
  // Register e-mail and send pre-id
  case"email_regist":
  $module = "email_regist.php";
  break;

  //Reg form
  case"regist_form":
  $module = "regist_form.php";
  break;

  //Confirmation
  case"regist_confirm":
  $module = "regist_confirm.php";
  break;

  //User reg.
  case"user_regist":
  $module = "user_regist.php";
  break;

  default:
  $module = "email_form.php";
  break;
}
?>

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
    <?php require_once($module) ?>
  </article>

  <!-- <?php include ($_SERVER['DOCUMENT_ROOT']. '/aside.html'); ?>  -->
  <?php include ($_SERVER['DOCUMENT_ROOT']. '/footer.html');?>
  </body>
  </html>
