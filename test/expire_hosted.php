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
$download_url = $status_response->getDownloadUrl();

$document_download = file_get_contents($download_url);

if (strpos($document_download, "%PDF") != 0) {
  throw new Exception("Output was not a PDF");
}

$docraptor->expire($status_response->getDownloadId());

$request = curl_init($download_url);
curl_setopt($request, CURLOPT_RETURNTRANSFER, true); // Prevents the error request from being returned right away.
$expired_download = curl_exec($request);
curl_close($request);

if (strpos($expired_download, "[Document Download Error] This document is no longer available.") === false) {
  throw new Exception("Hosted document request did not return the expected expiration error");
}


