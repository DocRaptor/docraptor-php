<?php
require "../vendor/autoload.php";

$configuration = new DocRaptor\Configuration();
$configuration->setUsername("YOUR_API_KEY_HERE");
# $configuration->setDebug(true);

$docraptor = new DocRaptor\DocApi(null, $configuration);

$doc = new DocRaptor\Doc();
$doc->setName("php-sync.pdf");
$doc->setTest(true);
$doc->setDocumentType("pdf");
$doc->setDocumentContent("<html><body>Hello from PHP</body></html>");
$docraptor->createDoc($doc);
