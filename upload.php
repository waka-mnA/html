<?php
  require_once 'aws.phar';
  //require("phar://".dirname(__FILE__)."aws.phar/aws-autoloader.php");
  use Aws\S3\S3Client;
  use Aws\Common\Enum\Region;
  use Aws\S3\Exception\S3Exception;
  use Guzzle\Http\EntityBody;
  use Aws\S3\Enum\CannedAcl;

  // Bucket name
  $bucket = "comsm0010-wk13290";
  // Filename to be uploaded
  $key = "sakura3.jpg";
//echo "TEST0";

$sdk = new Aws\Sdk([
  'profile' => 'default',
  'version' => 'latest',
  'region'  => 'eu-west-2'
]);
$client = $sdk->createS3();

//Get file name
$filepath = $_FILES["upfile"]["tmp_name"];
echo $filepath;
// if (!is_uploaded_file($filepath)) {
//   die('File is not uploaded');
// }

try {
  echo "TEST1";
  $result = $client->putObject([
      'Bucket' => $bucket,
      'Key' => $key,
      //'Body' => file_get_contents($filepath),
      //EntityBody::factory(fopen($filepath, 'r')),
      'ACL'    => CannedAcl::PUBLIC_READ_WRITE,
      'SourceFile'   => $filepath,
      //'ACL'          => 'public-read',
      //'ContentType' => mime_content_type($filepath)
  ]);

    echo "Uploaded Successfully!";
} catch (S3Exception $exc) {
    echo "Upload Failed.";
    echo $exc->getMessage();
}
echo "TEST2";
?>
