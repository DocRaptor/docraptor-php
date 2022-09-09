<?php

$docraptor = new DocRaptor\DocApi();
# this key works in test mode!
$docraptor->getConfig()->setUsername("YOUR_API_KEY_HERE");

$document_content = <<<DOCUMENT_CONTENT
  <div style="page-break-after: always;">Page 1</div>
  <div style="page-break-after: always;">Page 2</div>
  <div style="page-break-after: always;">Page 3</div>
  <div id="page4" style="page-break-after: always;">Page 4, with reset page counter</div>

  <style>
    @page {
      @bottom {
        content: "Page " counter(page, upper-alpha) " of " counter(pages, decimal);
      }
    }

    #page4 {
      counter-reset: page 1
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
    file_put_contents("page-numbers.pdf", $response);
    echo "Successfully created page-numbers.pdf!";
} catch (DocRaptor\ApiException $error) {
    echo $error . "\n";
    echo $error->getMessage() . "\n";
    echo $error->getCode() . "\n";
    echo $error->getResponseBody() . "\n";
}
