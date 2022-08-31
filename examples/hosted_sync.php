<?php

$docraptor = new DocRaptor\DocApi();
# this key works in test mode!
$docraptor->getConfig()->setUsername("YOUR_API_KEY_HERE");

try {
    $doc = new DocRaptor\Doc();
    $doc->setTest(true); # test documents are free but watermarked
    $doc->setDocumentType("pdf");
    $doc->setDocumentContent("<html><body>Hello World!</body></html>");
    # $doc->setDocumentUrl("http://docraptor.com/examples/invoice.html");
    # $doc->setJavascript(false);
    # $prince_options = new DocRaptor\PrinceOptions();
    # $doc->setPrinceOptions($prince_options);
    # $prince_options->setMedia("print"); # @media 'screen' or 'print' CSS
    # $prince_options->setBaseurl("https://yoursite.com"); # the base URL for any relative URLs

    # different method than the non-hosted documents
    $response = $docraptor->createHostedDoc($doc);

    echo "The PDF is hosted at " . $response->getDownloadUrl() . "\n";
} catch (DocRaptor\ApiException $error) {
    echo $error . "\n";
    echo $error->getMessage() . "\n";
    echo $error->getCode() . "\n";
    echo $error->getResponseBody() . "\n";
}
