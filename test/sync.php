<?php
require __DIR__."/../vendor/autoload.php";

$docraptor = new DocRaptor\DocApi();
$docraptor->getConfig()->setUsername("YOUR_API_KEY_HERE");
// $docraptor->getConfig()->setDebug(true);

$doc = new DocRaptor\Doc();
$doc->setName("php-sync.pdf");
$doc->setTest(true);
$doc->setDocumentType("pdf");
$doc->setDocumentContent("<html><body>Hello from PHP</body></html>");
$docraptor->createDoc($doc);
