<?php

$docraptor = new DocRaptor\DocApi();
# this key works in test mode!
$docraptor->getConfig()->setUsername("YOUR_API_KEY_HERE");

$document_content = <<<DOCUMENT_CONTENT
  <div id="watermark"><img src="https://docraptor-production-cdn.s3.amazonaws.com/tutorials/raptor.png" /></div>
  <div style="page-break-after: always;">Page 1</div>
  <div style="page-break-after: always;">Page 2</div>
  <div style="page-break-after: always;">Page 3</div>

  <style>
    #watermark {
      flow: static(watermarkflow);
      opacity: 0.7;
      text-align: center;
    }

    @page {
       @prince-overlay {
          content: flow(watermarkflow);
       }
    }
  </style>
DOCUMENT_CONTENT;

try {
    $doc = new DocRaptor\Doc();
    $doc->setTest(false); # test documents are free but watermarked
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
    file_put_contents("image-based-watermark.pdf", $response);
    echo "Successfully created image-based-watermark.pdf!";
} catch (DocRaptor\ApiException $error) {
    echo $error . "\n";
    echo $error->getMessage() . "\n";
    echo $error->getCode() . "\n";
    echo $error->getResponseBody() . "\n";
}
