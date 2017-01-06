<?php
  require_once ('aws.phar');
  //require("phar://".dirname(__FILE__)."aws.phar/aws-autoloader.php");
  use Aws\S3\S3Client;
  use Aws\Common\Enum\Region;
  use Aws\S3\Exception\S3Exception;
  use Guzzle\Http\EntityBody;
  use Aws\S3\Enum\CannedAcl;

  // Bucket name
  $bucket = "comsm0010-wk13290";
  // Filename to be uploaded
  $key = "test/sakura2.jpg";
//echo "TEST0";

// $sdk = new Aws\Sdk([
//   'profile' => 'default',
//   'version' => 'latest',
//   'region'  => 'eu-west-2'
// ]);
// $client = $sdk->createS3();

// $client = S3Client::factory(array(
//     "key" => getenv("AWS_ACCESS_KEY_ID"),
//     "secret" => getenv("AWS_SECRET_ACCESS_KEY"),
//     "region" => 'eu-west-2',
//     'profile' => 'default',
//     'version' => 'latest',
// ));
$s3 = new S3Client(getenv("AWS_ACCESS_KEY_ID"), getenv("AWS_SECRET_ACCESS_KEY"));


//Get file name
$filepath = $_FILES["upfile"]["tmp_name"];
$type = $_FILES['upfile']["type"];
$filepath="sakura1.jpg";

$fileName = $_FILES['upfile']['name'];

// if (!is_uploaded_file($filepath)) {
//   die('File is not uploaded');
// }

try {
  echo "TEST1";


  $s3->putBucket("comsm0010-wk13290", S3::ACL_PUBLIC_READ);

//move the file
if ($s3->putObjectFile($filepath, $bucket, $fileName, S3::ACL_PUBLIC_READ)) {
    echo "We successfully uploaded your file.";
}else{
    echo "Something went wrong while uploading your file... sorry.";
}

  // $result = $client->putObject([
  //     'Bucket'    => $bucket,
  //     'Key'       => $key,
  //     'Body'      => file_get_contents($filepath),
  //     'ACL'       => 'public-read',
  //     'ContentType' => $type,
  // ]);

  echo "Uploaded Successfully!";
} catch (S3Exception $exc) {
    echo "Upload Failed.";
    echo $exc->getMessage();
}
echo "TEST2";
?>
