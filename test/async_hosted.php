<?php
require "../vendor/autoload.php";

$api_key = file_get_contents("../.docraptor_key");

if (!$api_key) {
  throw new Exception("Please put a valid (paid plan) api key in the .docraptor_key file when testing this feature.");
}

$configuration = new DocRaptor\Configuration();
$configuration->setUsername($api_key);
// $configuration->setDebug(true);

$docraptor = new DocRaptor\DocApi(null, $configuration);

$doc = new DocRaptor\Doc();
$doc->setName("php-hosted-async.pdf");
$doc->setTest(true);
$doc->setDocumentType("pdf");
$doc->setDocumentContent("<html><body>Hello from PHP</body></html>");

$response = $docraptor->createHostedAsyncDoc($doc);

while (true) {
  $status_response = $docraptor->getAsyncDocStatus($response->getStatusId());
  if ($status_response->getStatus() == "completed") {
    $hosted_document = file_get_contents($status_response->getDownloadUrl());
    if (strpos($hosted_document, "%PDF") != 0) {
      throw new Exception("Output was not a PDF");
    }
    break;
  }
  sleep(1);
}

$docraptor->expire($status_response->getDownloadId());
