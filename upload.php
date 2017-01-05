<?php
  require_once 'aws.phar';
  //require("phar://".dirname(__FILE__)."aws.phar/aws-autoloader.php");
  use Aws\S3\S3Client;
  use Aws\Common\Enum\Region;
  use Aws\S3\Exception\S3Exception;
  use Guzzle\Http\EntityBody;

  // Bucket name
  $bucket = "comsm0010-wk13290";
  // Filename to be uploaded
  $key = "sakura.jpg";
echo "TEST0";

  $client = S3Client::factory(array(
    'key'    => getenv('AWS_ACCESS_KEY_ID'),
    'secret' => getenv('AWS_SECRET_ACCESS_KEY'),
    "region" => Region::EU-WEST-2
  ));
echo "TEST";
  $tmpfile = $_FILES["upfile"]["tmp_name"];

  if (!is_uploaded_file($tmpfile)) {
      die('File is not uploaded');
  }
echo "TEST1";
  try {

      $result = $client->putObject(array(
          'Bucket' => $bucket,
          'Key' => $key,
          'Body' => EntityBody::factory(fopen($tmpfile, 'r')),
      ));
          echo "TEST3";
      echo "Uploaded Successfully!";
  } catch (S3Exception $exc) {
      echo "Upload Failed.";
      echo $exc->getMessage();
  }
  echo "TEST2";
?>
