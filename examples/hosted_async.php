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
# DocRaptor supports many CSS and API options for output customization. Visit
# https://docraptor.com/documentation/ for full details.
#
# You can run this example with: php hosted_async.php

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

    # different method than synchronous or non-hosted documents
    $response = $docraptor->createHostedAsyncDoc($doc);

    $done = false;
    while (!$done) {
        $status_response = $docraptor->getAsyncDocStatus($response->getStatusId());
        echo "doc status: " . $status_response->getStatus() . "\n";
        switch ($status_response->getStatus()) {
            case "completed":
                echo "The asynchronously-generated PDF is hosted at " . $status_response->getDownloadUrl() . "\n";
                $done = true;
                break;
            case "failed":
                echo "FAILED\n";
                echo $status_response;
                $done = true;
                break;
            default:
                sleep(1);
        }
    }
} catch (DocRaptor\ApiException $error) {
    echo $error . "\n";
    echo $error->getMessage() . "\n";
    echo $error->getCode() . "\n";
    echo $error->getResponseBody() . "\n";
}
