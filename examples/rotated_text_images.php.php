<?php

$docraptor = new DocRaptor\DocApi();
# this key works in test mode!
$docraptor->getConfig()->setUsername("YOUR_API_KEY_HERE");

$document_content = <<<DOCUMENT_CONTENT
  <div id="text">Rotate me!</div>
  <div id="image"><img src="https://docraptor-production-cdn.s3.amazonaws.com/tutorials/raptor.png" /></div>

  <style>
    #text {
      transform: rotate(-30deg);
    }

    #image {
      transform: rotate(30deg);
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
    # $prince_options = new DocRaptor\PrinceOptions();
    # $doc->setPrinceOptions($prince_options);
    # $prince_options->setMedia("print"); # @media 'screen' or 'print' CSS
    # $prince_options->setBaseurl("https://yoursite.com"); # the base URL for any relative URLs

    $response = $docraptor->createDoc($doc);

    # createDoc() returns a binary string
    file_put_contents("rotated-text-images.pdf", $response);
    echo "Successfully created rotated-text-images.pdf!";
} catch (DocRaptor\ApiException $error) {
    echo $error . "\n";
    echo $error->getMessage() . "\n";
    echo $error->getCode() . "\n";
    echo $error->getResponseBody() . "\n";
}
