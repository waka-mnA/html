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
    $keydir = "";
    $key = "sakura4.jpg";
    $bucketpath='/mnt/s3test/';

    $tmpFile = $_FILES['upfile']['tmp_name'];

    if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
      //system('chmod 777 '.$bucketpath.$keydir);exit;

      if (move_uploaded_file($tmpFile,  $bucketpath.$keydir.$key)){
        chmod($bucketpath.$keydir.$key, 0644);
        echo "Success!";
      } else {
        echo "Upload Failed.";
      }
    } else {
      echo "Please select a file.";
    }

    ?>
  </article>

  <!-- <?php include ($_SERVER['DOCUMENT_ROOT']. '/aside.html'); ?>  -->
  <?php include ($_SERVER['DOCUMENT_ROOT']. '/footer.html');?>
  </body>
  </html>


<?php
  // require_once ('aws.phar');
  // //require("phar://".dirname(__FILE__)."aws.phar/aws-autoloader.php");
  // use Aws\S3\S3Client;
  // use Aws\Common\Enum\Region;
  // use Aws\S3\Exception\S3Exception;
  // use Guzzle\Http\EntityBody;
  // use Aws\S3\Enum\CannedAcl;
  // use Aws\Common\Aws;


  // Bucket name
  // $bucket = "comsm0010-wk13290";
  // // Filename to be uploaded
  // $keydir = "test/";
  //
  // $key = "sakura4.jpg";
  // $bucketpath='/mnt/s3test/';
//echo "TEST0";

// $sdk = new Aws\Sdk([
//   'profile' => 'default',
//   'version' => 'latest',
//   'region'  => 'eu-west-2'
// ]);
// $client = $sdk->createS3();

// $s3 = S3Client::factory(array(
//     "key" => getenv("AWS_ACCESS_KEY_ID"),
//     "secret" => getenv("AWS_SECRET_ACCESS_KEY"),
//     "region" => 'eu-west-2',
//     'profile' => 'default',
//     'version' => 'latest',
// ));
// $tmpFile = $_FILES['upfile']['tmp_name'];
//$tmpFile = 'sakura1.jpg';

// try{
//    if(is_uploaded_file($_FILES['upfile']['tmp_name'])){
//     //echo $_FILES['upfile']['tmp_name']."<br />";;
//     echo $bucketpath.$keydir.$key."\r\n";
//     $result = move_uploaded_file($tmpFile, $bucketpath.$keydir.$key);
//     if ( $result === true ) {
//       echo 'Uploaded Successfully!'."<br />";
//     } else {
//       echo 'Upload Failed'."\r\n";
//     }
//    }
// }catch(Exception $e) {
//         echo 'Error::', $e->getMessage().PHP_EOL;
//
// }







//Get file name
// $filepath = $_FILES["upfile"]["tmp_name"];
// $type = $_FILES['upfile']["type"];
// $filepath="sakura1.jpg";
//
// $fileName = $_FILES['upfile']['name'];

// if (!is_uploaded_file($filepath)) {
//   die('File is not uploaded');
// }

// try {
//   echo "TEST1";
//   
//
//
// $response = $s3->putObject(array(
//   'Bucket' => $bucket,
//    'Key'    => $key,
//    'Body' => EntityBody::factory(fopen($filepath, 'r')),
//    'ContentType' => $type,
//    'ACL' => 'public-read',));
//
//
//
//
//   // $result = $client->putObject([
//   //     'Bucket'    => $bucket,
//   //     'Key'       => $key,
//   //     'Body'      => file_get_contents($filepath),
//   //     'ACL'       => 'public-read',
//   //     'ContentType' => $type,
//   // ]);
//
//   echo "Uploaded Successfully!";
// } catch (S3Exception $exc) {
//     echo "Upload Failed.";
//     echo $exc->getMessage();
// }
echo "TEST2";
?>
