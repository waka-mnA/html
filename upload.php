<?php
  require_once ('aws.phar');
  //require("phar://".dirname(__FILE__)."aws.phar/aws-autoloader.php");
  use Aws\S3\S3Client;
  use Aws\Common\Enum\Region;
  use Aws\S3\Exception\S3Exception;
  use Guzzle\Http\EntityBody;
  use Aws\S3\Enum\CannedAcl;
  use Aws\Common\Aws;


  // Bucket name
  $bucket = "comsm0010-wk13290";
  // Filename to be uploaded
  $keydir = "test/";

  $key = "sakura4.jpg";
  $bucketpath='/mnt/s3/';
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

try{
  if(is_uploaded_file($_FILES['upfile']['tmp_name'])){
    echo $_FILES['upfile']['tmp_name']."\r\n";;
    echo $bucketpath.$keydir."\r\n";
    move_uploaded_file($_FILES['upfile']['tmp_name'], $bucketpath.$keydir);
    echo 'Uploaded Successfully!'."\r\n";
  }

}catch(Exception $e) {
        echo 'Error::', $e->getMessage().PHP_EOL;

}







//Get file name
$filepath = $_FILES["upfile"]["tmp_name"];
$type = $_FILES['upfile']["type"];
$filepath="sakura1.jpg";

$fileName = $_FILES['upfile']['name'];

// if (!is_uploaded_file($filepath)) {
//   die('File is not uploaded');
// }

// try {
//   echo "TEST1";
//   // S3を操作するためのオブジェクトを生成（リージョンは東京）
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
