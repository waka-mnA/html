<?php
require_once("aws.phar");

// use Aws\S3\S3Client;
// use Aws\Common\Enum\Region;
// use Aws\S3\Exception\S3Exception;
// use Guzzle\Http\EntityBody;
echo "TEST";
// Bucket name
$bucket = "comsm0010-wk13290";
// Filename to be uploaded
$key = "sakura.jpg";


// $client = S3Client::factory(array(
//   "key" => "AKIAJNH4SBIA7MP6SB2Q",
//   "secret" => "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",
//   "region" => Region::EU-WEST-2
// ));

// $tmpfile = $_FILES["upfile"]["tmp_name"];
//
// if (!is_uploaded_file($tmpfile)) {
//     die('File is not uploaded');
// }
//
// try {
//     $result = $client->putObject(array(
//         'Bucket' => $bucket,
//         'Key' => $key,
//         'Body' => EntityBody::factory(fopen($tmpfile, 'r')),
//     ));
//     echo "Uploaded Successfully!";
// } catch (S3Exception $exc) {
//     echo "Upload Failed.";
//     echo $exc->getMessage();
// }
?>
