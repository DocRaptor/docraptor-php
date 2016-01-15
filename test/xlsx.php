<?php
require "../autoload.php";

use docraptor\Doc as Doc;
use docraptor\ClientApi as ClientApi;

$docraptor = new ClientApi();
$api_client = $docraptor->getApiClient();
$configuration = $api_client->getConfig();
$configuration->setUsername("YOUR_API_KEY_HERE");
// $configuration->setDebug(true);

$doc = new Doc();
$doc->setName("php-xlsx.xlsx");
$doc->setTest(true);
$doc->setDocumentType("xlsx");
$doc->setDocumentContent("<html><body><table><tr><td>Hello from PHP</td></tr></table></body></html>");
$docraptor->createDoc($doc);
