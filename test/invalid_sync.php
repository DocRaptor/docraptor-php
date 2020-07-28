<?php
require __DIR__."/../vendor/autoload.php";

$docraptor = new DocRaptor\DocApi();
$docraptor->getConfig()->setUsername("YOUR_API_KEY_HERE");
// $docraptor->getConfig()->setDebug(true);


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
