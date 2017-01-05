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
//echo "TEST0";

$sdk = new Aws\Sdk([
  'profile' => 'default',
  'version' => 'latest',
  'region'  => 'EU-WEST-2'
]);
$client = $sdk->createS3();

//echo "TEST";
  $tmpfile = $_FILES["upfile"]["tmp_name"];

  if (!is_uploaded_file($tmpfile)) {
    echo "TESTdie";
    die('File is not uploaded');
  }

  try {
    echo "TEST1";
    $result = $client->putObject(array(
        'Bucket' => $bucket,
        'Key' => $key,
        'Body' => EntityBody::factory(fopen($tmpfile, 'r')),
        //'ContentType' => mime_content_type($tmpfile)
    ));

      echo "Uploaded Successfully!";
  } catch (S3Exception $exc) {
      echo "Upload Failed.";
      echo $exc->getMessage();
  }
  echo "TEST2";
?>
