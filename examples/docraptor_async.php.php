<?php

$docraptor = new DocRaptor\DocApi();
# this key works in test mode!
$docraptor->getConfig()->setUsername("YOUR_API_KEY_HERE");

try {
    $doc = new DocRaptor\Doc();
    $doc->setTest(true); # test documents are free but watermarked
    $doc->setDocumentType("pdf");
    $doc->setDocumentContent("<html><body>Hello World!</body></html>");
    # $doc->setDocumentUrl("https://docraptor.com/examples/invoice.html");
    # $doc->setJavascript(false);
    # $prince_options = new DocRaptor\PrinceOptions();
    # $doc->setPrinceOptions($prince_options);
    # $prince_options->setMedia("print"); # @media 'screen' or 'print' CSS
    # $prince_options->setBaseurl("https://yoursite.com"); # the base URL for any relative URLs

    # different method than the synchronous documents
    $response = $docraptor->createAsyncDoc($doc);

    $done = false;
    while (!$done) {
        $status_response = $docraptor->getAsyncDocStatus($response->getStatusId());
        echo "doc status: " . $status_response->getStatus() . "\n";
        switch ($status_response->getStatus()) {
            case "completed":
                $pdf = $docraptor->getAsyncDoc($status_response->getDownloadId());
                # getAsyncDoc() returns a binary string
                file_put_contents("docraptor-async.pdf", $pdf);
                echo "Wrote PDF to docraptor-async.pdf\n";
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
