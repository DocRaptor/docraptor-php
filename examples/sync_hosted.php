<?php
# As a paid add-on, DocRaptor can provide long-term, publicly-accessible hosting for your documents.
# This allows you to provide a URL to your end users, third party tools like Zapier and Salesforce,
# or anyone else. We'll host the document on your behalf at a completely unbranded URL for as long
# as you want, or within the limits you specify.
#
# This example demonstrates creating a PDF that DocRaptor will host for you using common options.
# By default, hosted documents do not have limits on downloads or hosting time, though you may
# pass additional parameters to the document generation call to set your own limits. Learn more
# about the specific options in the hosted API documentation.
# https://docraptor.com/documentation/api#api_hosted
#
# It is created synchronously, which means DocRaptor will allow it to generate for up to 60 seconds.
# Since this document will be hosted by DocRaptor the response from this request will return a JSON
# formatted object containing public URL where the document can be downloaded from.
#
# DocRaptor supports many options for output customization, the full list is
# https://docraptor.com/documentation/api#api_general
#
# You can run this example with: php sync_hosted.rb

require "../vendor/autoload.php";

$configuration = new DocRaptor\Configuration();
$configuration->setUsername("<insert api key here>"); # you will need a real api key to test hosted documents
# $configuration->setDebug(true);

$docraptor = new DocRaptor\DocApi(null, $configuration);

try {

  $doc = new DocRaptor\Doc();
  $doc->setTest(true);                                                   # test documents are free but watermarked
  $doc->setDocumentContent("<html><body>Hello World</body></html>");     # supply content directly
  # $doc->setDocumentUrl("http://docraptor.com/examples/invoice.html");  # or use a url
  $doc->setName("docraptor-hosted-php.pdf");                                    # help you find a document later
  $doc->setDocumentType("pdf");                                          # pdf or xls or xlsx
  # $doc->setJavascript(true);                                           # enable JavaScript processing
  # $prince_options = new DocRaptor\PrinceOptions();
  # $doc->setPrinceOptions($prince_options)
  # $prince_options->setMedia("screen");                                 # use screen styles instead of print styles
  # $prince_options->setBaseurl("http://hello.com");                     # pretend URL when using document_content
  $status_response = $docraptor->createHostedDoc($doc);

  echo "Document available for public download at: " . $status_response->getDownloadUrl() . "\n";

  $file = fopen("/tmp/docraptor-hosted-php.pdf", "wb");
  fwrite($file, file_get_contents($status_response->getDownloadUrl()));
  fclose($file);
  echo "Wrote PDF to /tmp/docraptor-hosted-php.pdf\n";

} catch (DocRaptor\ApiException $error) {
  echo $error . "\n";
  echo $error->getMessage() . "\n";
  echo $error->getCode() . "\n";
  echo $error->getResponseBody() . "\n";
}