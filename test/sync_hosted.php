<?php
require __DIR__."/../vendor/autoload.php";
$test_name = basename(__FILE__, '.php');
$test_output_dir = dirname(__DIR__) . "/tmp/test_output/";

$docraptor = new DocRaptor\DocApi();
$docraptor->getConfig()->setUsername("YOUR_API_KEY_HERE");
// $docraptor->getConfig()->setDebug(true);

$doc = new DocRaptor\Doc();
$doc->setName("php-" . $test_name . ".pdf");
$doc->setTest(true);
$doc->setDocumentType("pdf");
$doc->setDocumentContent("<html><body>Hello from $test_name PHP</body></html>");

$status_response = $docraptor->createHostedDoc($doc);

$downloaded_document = file_get_contents($status_response->getDownloadUrl());

if (strpos($downloaded_document, "%PDF") != 0) {
  throw new Exception("Output was not a PDF");
}

$file = fopen($test_output_dir . $test_name . "_php_" . phpversion() . ".pdf", "wb");
$bytes_written = fwrite($file, $downloaded_document);
fclose($file);

// $file = fopen("/tmp/sync_hosted_test.pdf", "wb");
// $bytes_written = fwrite($file, $response);
// fclose($file);

if ($bytes_written < 20000) {
  throw new Exception("PDF is smaller than 20k, which often means it is blank");
}

$docraptor->expire($status_response->getDownloadId());
