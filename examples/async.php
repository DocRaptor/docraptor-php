<?php
# This example demonstrates creating a PDF using common options and saving it
# to a place on the filesystem.
#
# It is created asynchronously, which means DocRaptor will render it for up to
# 10 minutes. This is useful when creating many documents in parallel, or very
# large documents with lots of assets.
#
# DocRaptor supports many options for output customization, the full list is
# https://docraptor.com/documentation/api#api_general
#
# You can run this example with: php async.rb

require "../autoload.php";

$configuration = DocRaptor\Configuration::getDefaultConfiguration();
$configuration->setUsername("YOUR_API_KEY_HERE"); # this key works for test documents
# $configuration->setDebug(true);
$docraptor = new DocRaptor\DocApi();

try {

  $doc = new DocRaptor\Doc();
  $doc->setTest(true);                                                   # test documents are free but watermarked
  $doc->setDocumentContent("<html><body>Hello World</body></html>");     # supply content directly
  # $doc->setDocumentUrl("http://docraptor.com/examples/invoice.html");  # or use a url
  $doc->setName("docraptor-php.pdf");                                    # help you find a document later
  $doc->setDocumentType("pdf");                                          # pdf or xls or xlsx
  # $doc->setJavascript(true);                                           # enable JavaScript processing
  # $prince_options = new DocRaptor\PrinceOptions();                     # pdf-specific options
  # $doc->setPrinceOptions($prince_options);
  # $prince_options->setMedia("screen");                                 # use screen styles instead of print styles
  # $prince_options->setBaseurl("http://hello.com");                     # pretend URL when using document_content
  $create_response = $docraptor->createAsyncDoc($doc);

  $done = false;
  while (!$done) {
    $status_response = $docraptor->getAsyncDocStatus($create_response->getStatusId());
    echo "doc status: " . $status_response->getStatus() . "\n";
    switch ($status_response->getStatus()) {
      case "completed":
        $doc_response = $docraptor->getAsyncDoc($status_response->getDownloadId());
        $file = fopen("/tmp/docraptor-php.pdf", "wb");
        fwrite($file, $doc_response);
        fclose($file);
        echo "Wrote PDF to /tmp/docraptor-php.pdf\n";
        $done = true;
        break;
      case "failed":
        echo "FALIED\n";
        echo $status_response;
        $done = true;
        break;
      default:
        sleep(1);
    }
  }

} catch (DocRaptor\ApiException $exception) {
  echo $exception . "\n";
  echo $exception->getMessage() . "\n";
  echo $exception->getCode() . "\n";
  echo $exception->getResponseBody() . "\n";
}
