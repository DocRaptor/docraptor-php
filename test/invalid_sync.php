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

try {
  $docraptor->createDoc($doc);
} catch (DocRaptor\ApiException $error) {
  exit(0);
}
echo "Exception expected, but not raised";
exit(1);
