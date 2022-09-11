<?php
# This example demonstrates creating a PDF using common options and saving it
# to a place on the filesystem.
#
# It is created synchronously, which means DocRaptor will render it for up to
# 60 seconds. It is slightly simpler than making documents using the async
# interface but making many documents in parallel or very large documents with
# lots of assets will require the async api.
#
# DocRaptor supports many CSS and API options for output customization. Visit
# https://docraptor.com/documentation/ for full details.
#
# You can run this example with: php sync.php

$docraptor = new DocRaptor\DocApi();
# this key works in test mode!
$docraptor->getConfig()->setUsername("YOUR_API_KEY_HERE");

try {
    $doc = new DocRaptor\Doc();
    $doc->setTest(true); # test documents are free but watermarked
    $doc->setDocumentType("pdf");
    $doc->setDocumentContent("<html><body>Hello World!</body></html>");
    # $doc->setDocumentUrl("https://docraptor.com/examples/invoice.html");
    # $doc->setJavascript(true);
    # $prince_options = new DocRaptor\PrinceOptions();
    # $doc->setPrinceOptions($prince_options);
    # $prince_options->setMedia("print"); # @media 'screen' or 'print' CSS
    # $prince_options->setBaseurl("https://yoursite.com"); # the base URL for any relative URLs

    $response = $docraptor->createDoc($doc);

    # createDoc() returns a binary string
    file_put_contents("github-sync.pdf", $response);
    echo "Successfully created github-sync.pdf!";
} catch (DocRaptor\ApiException $error) {
    echo $error . "\n";
    echo $error->getMessage() . "\n";
    echo $error->getCode() . "\n";
    echo $error->getResponseBody() . "\n";
}
