<?php
require __DIR__."/../vendor/autoload.php";

$docraptor = new DocRaptor\DocApi();
$docraptor->getConfig()->setUsername("YOUR_API_KEY_HERE");
// $docraptor->getConfig()->setDebug(true);

$doc = new DocRaptor\Doc();
$doc->setName("php-async.pdf");
$doc->setTest(true);
$doc->setDocumentType("pdf");
$doc->setDocumentContent("<html><body>Hello from PHP</body></html>");

$response = $docraptor->createAsyncDoc($doc);

while (true) {
  $status_response = $docraptor->getAsyncDocStatus($response->getStatusId());
  if ($status_response->getStatus() == "completed") {
    break;
  }
  sleep(1);
}

$docraptor->getAsyncDoc($status_response->getDownloadId());
