<?php
require __DIR__."/../vendor/autoload.php";

$docraptor = new DocRaptor\DocApi();
$docraptor->getConfig()->setUsername("YOUR_API_KEY_HERE");
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
