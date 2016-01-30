<?php
require "../autoload.php";

$configuration = DocRaptor\Configuration::getDefaultConfiguration();
$configuration->setUsername("YOUR_API_KEY_HERE");
# $configuration->setDebug(true);
$docraptor = new DocRaptor\DocApi();

$doc = new DocRaptor\Doc();
$doc->setName(str_repeat("s", 201)); # limit is 200 characters
$doc->setTest(true);
$doc->setDocumentType("pdf");
$doc->setDocumentContent("<html><body>Hello from PHP</body></html>");
$response = $docraptor->createAsyncDoc($doc);

for($i=0;$i<30;$i++) {
  $status_response = $docraptor->getAsyncDocStatus($response->getStatusId());
  if ($status_response->getStatus() == "failed") {
    exit(0);
  }
  sleep(1);
}
echo("Did not receive failed validation within 30 seconds.");
exit(1);
