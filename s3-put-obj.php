<?php

require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

$client = new S3Client([
    'version' => 'latest',
    'region'  => 'ignored-by-spaces',
    'endpoint' => 'https://lon1.digitaloceanspaces.com',
    'credentials' => [
        'key'    => getenv('CREDS_KEY'),
        'secret' => getenv('CREDS_SECRET'),
    ],
]);

try {
    $result = $client->putObject([
        'Bucket' => getenv('BUCKET'),
        'Key'    => 'chris-test2/image01.jpg',
        'Body'   => fopen('./image01.jpg', 'r'),
        'ACL'    => 'public-read',
        'ContentType' => 'image/jpeg'
    ]);

    echo "Upload OK: " . $result['ObjectURL'];
} catch (AwsException $e) {
    echo "Error: " . $e->getMessage();
}
