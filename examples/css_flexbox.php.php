<?php

$docraptor = new DocRaptor\DocApi();
# this key works in test mode!
$docraptor->getConfig()->setUsername("YOUR_API_KEY_HERE");

$document_content = <<<DOCUMENT_CONTENT
  <div class="flex-column">
    <div class="flex-item red">1</div>
    <div class="flex-item green">2</div>
    <div class="flex-item blue">3</div>
  </div>
  <div class="flex-row">
    <div class="flex-item green">1</div>
    <div class="flex-item blue">2</div>
    <div class="flex-item red">3</div>
  </div>

  <style>
    .flex-column {
      display: flex;
      flex-direction: column;
    }

    .flex-row {
      display: flex;
      flex-direction: row;
    }

    .flex-item {
      flex: 1;
    }

    .flex-row .flex-item {
      /* simulate long content forcing a page break  */
      height: 1000px;
    }

    .red { background-color: red; }
    .green { background-color: green; }
    .blue { background-color: blue; }
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
    file_put_contents("css-flexbox.pdf", $response);
    echo "Successfully created css-flexbox.pdf!";
} catch (DocRaptor\ApiException $error) {
    echo $error . "\n";
    echo $error->getMessage() . "\n";
    echo $error->getCode() . "\n";
    echo $error->getResponseBody() . "\n";
}
