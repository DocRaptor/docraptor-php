<?php
# This example demonstrates creating a PDF using common options and sending it
# directly to the browser to be downloaded.
#
# It is created synchronously, which means DocRaptor will render it for up to
# 60 seconds. It is slightly simpler than making documents using the async
# interface but making many documents in parallel or very large documents with
# lots of assets will require the async api.
#
# DocRaptor supports many CSS and API options for output customization. Visit
# https://docraptor.com/documentation/ for full details.
#
# You can run this example with: php browser_download.php

require __DIR__."/vendor/autoload.php";

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
    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename=example.pdf');
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . strlen($response));
    ob_clean();
    flush();
    echo($response);
} catch (DocRaptor\ApiException $error) {
    echo $error . "\n";
    echo $error->getMessage() . "\n";
    echo $error->getCode() . "\n";
    echo $error->getResponseBody() . "\n";
}
