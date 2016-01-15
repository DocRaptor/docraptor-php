<?php
require "../autoload.php";

use docraptor\Doc as Doc;
use docraptor\ClientApi as ClientApi;

$doc = new Doc();
$doc->setName("swagger-php.pdf");
$doc->setTest(true);
$doc->setDocumentType("pdf");
$doc->setDocumentContent("<html><body>Swagger PHP</body></html>");

$doc_api = new ClientApi();
$api_client = $doc_api->getApiClient();
$configuration = $api_client->getConfig();
$configuration->setUsername("YOUR_API_KEY_HERE");
$configuration->setDebug(true);

$doc_api->createDoc($doc);
