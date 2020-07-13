<?php
# This example demonstrates creating a PDF using minimal options and sending
# it to a browser as a download. For a more complete example see sync.php.
#
# You can run this example with: php browser_download.php

require "../vendor/autoload.php";

$configuration = new DocRaptor\Configuration();
$configuration->setUsername("YOUR_API_KEY_HERE"); # this key works for test documents
# $configuration->setDebug(true);

$docraptor = new DocRaptor\DocApi(null, $configuration);

$doc = new DocRaptor\Doc();
$doc->setTest(true);
$doc->setDocumentContent("<html><body>Hello World</body></html>");
$doc->setName("docraptor-php.pdf");
$doc->setDocumentType("pdf");
$create_response = $docraptor->createDoc($doc);

header('Content-Description: File Transfer');
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename=example.pdf');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Content-Length: ' . strlen($create_response));
ob_clean();
flush();
echo($create_response);
exit;
