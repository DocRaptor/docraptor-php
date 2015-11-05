<?php
require "../client/docraptor/autoload.php";
require "../client/docraptor/lib/ApiClient.php";
require "../client/docraptor/lib/ApiException.php";
require "../client/docraptor/lib/docraptor/Doc.php";
require "../client/docraptor/lib/docraptor/AsyncDoc.php";
require "../client/docraptor/lib/docraptor/AsyncDocStatus.php";
require "../client/docraptor/lib/docraptor/ClientApi.php";

use docraptor\Doc as Doc;
use docraptor\NewDoc as NewDoc;
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

try {
  $doc_api->docsPost($doc);
} catch (Swagger\Client\ApiException $exception) {
  exit(0);
}
echo "Exception expected, but not raised";
exit(1);

?>
