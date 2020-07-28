<?php
# As a paid add-on, DocRaptor can provide long-term, publicly-accessible hosting for your documents.
# This allows you to provide a URL to your end users, third party tools like Zapier and Salesforce,
# or anyone else. We'll host the document on your behalf at a completely unbranded URL for as long
# as you want, or within the limits you specify.
#
# This example demonstrates creating a PDF using common options that DocRaptor will host for you.
# By default, hosted documents do not have limits on downloads or hosting time, though you may
# pass additional parameters to the document generation call to set your own limits. Learn more
# about the specific options in the hosted API documentation.
# https://docraptor.com/documentation/api#api_hosted
#
# The document is created asynchronously, which means DocRaptor will allow it to generate for up to
# 10 minutes. This is useful when creating many documents in parallel, or very large documents with
# lots of assets.
#
# DocRaptor supports many options for output customization, the full list is
# https://docraptor.com/documentation/api#api_general
#
# You can run this example with: php async.rb
require __DIR__."/../vendor/autoload.php";

$docraptor = new DocRaptor\DocApi();
$docraptor->getConfig()->setUsername("YOUR_API_KEY_HERE"); # you will need a real api key to test hosted documents
# $configuration->setDebug(true);

try {
  $doc = new DocRaptor\Doc();
  $doc->setTest(true);                                                   # test documents are free but watermarked
  $doc->setDocumentContent("<html><body>Hello World</body></html>");     # supply content directly
  # $doc->setDocumentUrl("http://docraptor.com/examples/invoice.html");  # or use a url
  $doc->setName("docraptor-hosted-php.pdf");                                    # help you find a document later
  $doc->setDocumentType("pdf");                                          # pdf or xls or xlsx
  # $doc->setJavascript(true);                                           # enable JavaScript processing
  # $prince_options = new DocRaptor\PrinceOptions();                     # pdf-specific options
  # $doc->setPrinceOptions($prince_options);
  # $prince_options->setMedia("screen");                                 # use screen styles instead of print styles
  # $prince_options->setBaseurl("http://hello.com");                     # pretend URL when using document_content
  $create_response = $docraptor->createHostedAsyncDoc($doc);

  $done = false;
  while (!$done) {
    $status_response = $docraptor->getAsyncDocStatus($create_response->getStatusId());
    echo "doc status: " . $status_response->getStatus() . "\n";
    switch ($status_response->getStatus()) {
      case "completed":
        echo "Document available for public download at: " . $status_response->getDownloadUrl() . "\n";
        $doc_response = $docraptor->getAsyncDoc($status_response->getDownloadId());
        $file = fopen("/tmp/docraptor-hosted-php.pdf", "wb");
        fwrite($file, $doc_response);
        fclose($file);
        echo "Wrote PDF to /tmp/docraptor-hosted-php.pdf\n";
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