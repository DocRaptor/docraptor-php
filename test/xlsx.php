<?php
require "../autoload.php";

$configuration = DocRaptor\Configuration::getDefaultConfiguration();
$configuration->setUsername("YOUR_API_KEY_HERE");
# $configuration->setDebug(true);
$docraptor = new DocRaptor\DocApi();

$doc = new DocRaptor\Doc();
$doc->setName("php-xlsx.xlsx");
$doc->setTest(true);
$doc->setDocumentType("xlsx");
$doc->setDocumentContent("<html><body><table><tr><td>Hello from PHP</td></tr></table></body></html>");
$docraptor->createDoc($doc);
