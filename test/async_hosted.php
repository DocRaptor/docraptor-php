<?php
require __DIR__."/../vendor/autoload.php";

$key_path = __DIR__."/../.docraptor_key";
$api_key = getenv("DOCRAPTOR_API_KEY");

if (!$api_key && file_exists($key_path)) {
  $api_key = trim(file_get_contents($key_path));
}

if (!$api_key) {
  throw new Exception("Please put a valid (paid plan) api key in the DOCRAPTOR_API_KEY env variable or the .docraptor_key file when testing this feature.");
}

$docraptor = new DocRaptor\DocApi();
$docraptor->getConfig()->setUsername($api_key);
// $docraptor->getConfig()->setDebug(true);

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
