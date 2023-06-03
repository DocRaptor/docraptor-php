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
$doc->setDocumentUrl("https://expired.badssl.com/");

// Verify the test works as expected by confirming that this url will fail
// without prince_options[insecure]=true.
try {
  $docraptor->createDoc($doc);
} catch (DocRaptor\ApiException $ex) {
  $expected_message = "SSL Error downloading document content from supplied url.";
  if (!str_contains($ex->getMessage(), $expected_message)) {
    throw new Exception("Wrong exception, expected: " + $expected_message + ", got: " + $ex->getMessage());
  }
}


// Verify prince_options works by testing a url that will fail without
// prince_options[insecure]=true.
$doc = new DocRaptor\Doc();
$doc->setName("php-" . $test_name . ".pdf");
$doc->setTest(true);
$doc->setDocumentType("pdf");
$doc->setDocumentContent("https://expired.badssl.com/");
$prince_options = new DocRaptor\PrinceOptions();
$doc->setPrinceOptions($prince_options);
$prince_options->setInsecure(true);

$downloaded_document = $docraptor->createDoc($doc);

$file = fopen($test_output_dir . $test_name . "_php_" . phpversion() . ".pdf", "wb");
$bytes_written = fwrite($file, $downloaded_document);
fclose($file);

if (strpos($downloaded_document, "%PDF") !== 0) {
  throw new Exception("Output was not a PDF");
}

if ($bytes_written < 20000) {
  throw new Exception("PDF is smaller than 20k, which often means it is blank");
}

