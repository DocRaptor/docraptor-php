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

$response = $doc_api->createAsyncDoc($doc);

while (true) {
  $status_response = $doc_api->getAsyncDocStatus($response->getStatusId());
  if ($status_response->getStatus() == "completed") {
    break;
  }
  sleep(1);
}

echo $doc_api->getAsyncDoc($status_response->getDownloadId());
