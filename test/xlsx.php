<?php
require "../autoload.php";

$docraptor = new DocRaptor\ClientApi();
$api_client = $docraptor->getApiClient();
$configuration = $api_client->getConfig();
$configuration->setUsername("YOUR_API_KEY_HERE");
// $configuration->setDebug(true);

$doc = new DocRaptor\Doc();
$doc->setName("php-xlsx.xlsx");
$doc->setTest(true);
$doc->setDocumentType("xlsx");
$doc->setDocumentContent("<html><body><table><tr><td>Hello from PHP</td></tr></table></body></html>");
$docraptor->createDoc($doc);
