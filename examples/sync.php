<?php
# This example demonstrates creating a PDF using common options and saving it
# to a place on the filesystem.
#
# It is created synchronously, which means DocRaptor will render it for up to
# 60 seconds. It is slightly simpler than making documents using the async
# interface but making many documents in parallel or very large documents with
# lots of assets will require the async api.
#
# DocRaptor supports many options for output customization, the full list is
# https://docraptor.com/documentation/api#api_general
#
# You can run this example with: php sync.rb

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
  # $prince_options = new DocRaptor\PrinceOptions();
  # $doc->setPrinceOptions($prince_options)
  # $prince_options->setMedia("screen");                                 # use screen styles instead of print styles
  # $prince_options->setBaseurl("http://hello.com");                     # pretend URL when using document_content
  $create_response = $docraptor->createDoc($doc);

  $file = fopen("/tmp/docraptor-php.pdf", "wb");
  fwrite($file, $create_response);
  fclose($file);
  echo "Wrote PDF to /tmp/docraptor-php.pdf\n";

} catch (DocRaptor\ApiException $error) {
  echo $error . "\n";
  echo $error->getMessage() . "\n";
  echo $error->getCode() . "\n";
  echo $error->getResponseBody() . "\n";
}
