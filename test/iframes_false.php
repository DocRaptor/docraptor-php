<?php
require __DIR__."/../vendor/autoload.php";
$test_name = basename(__FILE__, '.php');
$test_output_dir = dirname(__DIR__) . "/tmp/test_output/";

$docraptor = new DocRaptor\DocApi();
$docraptor->getConfig()->setUsername("YOUR_API_KEY_HERE");
// $docraptor->getConfig()->setDebug(true);

$content = <<<HTML
  <html><body>
    <p>Baseline text</p>
    <iframe src="https://docraptor-test-harness.herokuapp.com/public/index.html"></iframe>
  </body></html>
HTML;

$doc = new DocRaptor\Doc();
$doc->setName("php-" . $test_name . ".pdf");
$doc->setTest(true);
$doc->setDocumentType("pdf");
$doc->setDocumentContent($content);
$prince_options = new DocRaptor\PrinceOptions();
$doc->setPrinceOptions($prince_options);
$prince_options->setIframes(false);

$downloaded_document = $docraptor->createDoc($doc);

$filename = $test_output_dir . $test_name . "_php_" . phpversion() . ".pdf";
$file = fopen($filename, "wb");
$bytes_written = fwrite($file, $downloaded_document);
fclose($file);

if (strpos($downloaded_document, "%PDF") !== 0) {
  throw new Exception("Output was not a PDF");
}

if ($bytes_written < 20000) {
  throw new Exception("PDF is smaller than 20k, which often means it is blank");
}

$command = "pdftotext " . $filename . " -";

$output = shell_exec($command);

if(str_contains($output, "Test")) {
  throw new Exception("output should not have contained iframe content: " . $output);
}
