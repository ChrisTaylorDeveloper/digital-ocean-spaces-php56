<?php

require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

$client = new S3Client([
    'version' => 'latest',
    'region'  => 'us-east-1', // Often ignored by Spaces but required by the SDK
    'endpoint' => 'https://nyc3.digitaloceanspaces.com', // Replace 'nyc3' with your region
    'credentials' => [
        'key'    => 'YOUR_ACCESS_KEY',
        'secret' => 'YOUR_SECRET_KEY',
    ],
]);

try {
    $result = $client->putObject([
        'Bucket' => 'your-bucket-name',
        'Key'    => 'uploads/my-image.jpg',
        'Body'   => fopen('./image01.jpg', 'r'),
        'ACL'    => 'public-read', // Makes the image publicly accessible
        'ContentType' => 'image/jpeg'
    ]);

    echo "Upload successful! URL: " . $result['ObjectURL'];
} catch (AwsException $e) {
    echo "Error: " . $e->getMessage();
}
