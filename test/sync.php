<?php
require "../autoload.php";

$docraptor = new DocRaptor\ClientApi();
$api_client = $docraptor->getApiClient();
$configuration = $api_client->getConfig();
$configuration->setUsername("YOUR_API_KEY_HERE");
// $configuration->setDebug(true);

$doc = new DocRaptor\Doc();
$doc->setName("php-sync.pdf");
$doc->setTest(true);
$doc->setDocumentType("pdf");
$doc->setDocumentContent("<html><body>Hello from PHP</body></html>");
$docraptor->createDoc($doc);
