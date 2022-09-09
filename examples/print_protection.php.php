<?php

$docraptor = new DocRaptor\DocApi();
# this key works in test mode!
$docraptor->getConfig()->setUsername("YOUR_API_KEY_HERE");

try {
    $doc = new DocRaptor\Doc();
    $doc->setTest(true); # test documents are free but watermarked
    $doc->setDocumentType("pdf");
    $doc->setDocumentContent("You can't print me!");
    # $doc->setDocumentUrl("https://docraptor.com/examples/invoice.html");
    # $doc->setJavascript(false);
    $prince_options = new DocRaptor\PrinceOptions();
    $doc->setPrinceOptions($prince_options);
    $prince_options->setEncrypt(true);
    $prince_options->setDisallowPrint(true);

    $response = $docraptor->createDoc($doc);

    # createDoc() returns a binary string
    file_put_contents("print-protection.pdf", $response);
    echo "Successfully created print-protection.pdf!";
} catch (DocRaptor\ApiException $error) {
    echo $error . "\n";
    echo $error->getMessage() . "\n";
    echo $error->getCode() . "\n";
    echo $error->getResponseBody() . "\n";
}
