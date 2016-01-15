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
$doc->setName(str_repeat("s", 201)); # limit is 200 characters
$doc->setTest(true);
$doc->setDocumentType("pdf");
$doc->setDocumentContent("<html><body>Hello from PHP</body></html>");

try {
  $docraptor->createDoc($doc);
} catch (Swagger\Client\ApiException $exception) {
  exit(0);
}
echo "Exception expected, but not raised";
exit(1);
