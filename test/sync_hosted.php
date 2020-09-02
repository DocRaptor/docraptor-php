<?php
require __DIR__."/../vendor/autoload.php";

$docraptor = new DocRaptor\DocApi();
$docraptor->getConfig()->setUsername("YOUR_API_KEY_HERE");
// $docraptor->getConfig()->setDebug(true);

$doc = new DocRaptor\Doc();
$doc->setName("php-hosted-sync.pdf");
$doc->setTest(true);
$doc->setDocumentType("pdf");
$doc->setDocumentContent("<html><body>Hello from PHP</body></html>");

$status_response = $docraptor->createHostedDoc($doc);

$response = file_get_contents($status_response->getDownloadUrl());

if (strpos($response, "%PDF") != 0) {
  throw new Exception("Output was not a PDF");
}

$docraptor->expire($status_response->getDownloadId());
