<?php

$docraptor = new DocRaptor\DocApi();
# this key works in test mode!
$docraptor->getConfig()->setUsername("YOUR_API_KEY_HERE");

$document_content = <<<DOCUMENT_CONTENT
  <html><body>
    <h1>Hello World!</h1>
  </body></html>

  <style>
    h1 {
      display: none;
    }
    @media screen {
      h1 {
        display: block;
      }
    }
  </style>
DOCUMENT_CONTENT;

try {
    $doc = new DocRaptor\Doc();
    $doc->setTest(true); # test documents are free but watermarked
    $doc->setDocumentType("pdf");
    $doc->setDocumentContent($document_content);
    # $doc->setDocumentUrl("https://docraptor.com/examples/invoice.html");
    # $doc->setJavascript(false);
    $prince_options = new DocRaptor\PrinceOptions();
    $doc->setPrinceOptions($prince_options);
    $prince_options->setMedia("screen");
    $prince_options->setBaseurl("https://yoursite.com");

    $response = $docraptor->createDoc($doc);

    # createDoc() returns a binary string
    file_put_contents("prince-options-test.pdf", $response);
    echo "Successfully created prince-options-test.pdf!";
} catch (DocRaptor\ApiException $error) {
    echo $error . "\n";
    echo $error->getMessage() . "\n";
    echo $error->getCode() . "\n";
    echo $error->getResponseBody() . "\n";
}
