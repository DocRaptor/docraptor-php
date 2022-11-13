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

$response = $docraptor->createAsyncDoc($doc);

while (true) {
  $status_response = $docraptor->getAsyncDocStatus($response->getStatusId());
  if ($status_response->getStatus() == "completed") {
    break;
  }
  sleep(1);
}

$downloaded_document = $docraptor->getAsyncDoc($status_response->getDownloadId());

$file = fopen($test_output_dir . $test_name . "_php_" . phpversion() . ".pdf", "wb");
$bytes_written = fwrite($file, $downloaded_document);
fclose($file);

if (strpos($downloaded_document, "%PDF") !== 0) {
  throw new Exception("Output was not a PDF");
}

if ($bytes_written < 20000) {
    throw new Exception("PDF is smaller than 20k, which often means it is blank");
}
