<?php
require "../client/autoload.php";

use docraptor\Doc as Doc;
use docraptor\ClientApi as ClientApi;

$doc = new Doc();
$doc->setName(str_repeat("s", 201));
$doc->setTest(true);
$doc->setDocumentType("pdf");
$doc->setDocumentContent("<html><body>Swagger PHP</body></html>");

$doc_api = new ClientApi();
$api_client = $doc_api->getApiClient();
$configuration = $api_client->getConfig();
$configuration->setUsername("YOUR_API_KEY_HERE");
$configuration->setDebug(true);

$response = $doc_api->asyncDocsPost($doc);

for($i=0;$i<30;$i++) {
  $status_response = $doc_api->statusIdGet($response->getStatusId());
  if ($status_response->getStatus() == "failed") {
    exit(0);
  }
  sleep(1);
}
echo("Did not receive failed validation within 30 seconds.");
exit(1);
