<?php
require "../vendor/autoload.php";

$configuration = new DocRaptor\Configuration();
$configuration->setUsername("YOUR_API_KEY_HERE");
# $configuration->setDebug(true);

$docraptor = new DocRaptor\DocApi(null, $configuration);

$doc = new DocRaptor\Doc();
$doc->setName("php-xlsx.xlsx");
$doc->setTest(true);
$doc->setDocumentType("xlsx");
$doc->setDocumentContent("<html><body><table><tr><td>Hello from PHP</td></tr></table></body></html>");
$docraptor->createDoc($doc);
