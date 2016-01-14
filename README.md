# DocRaptor PHP Native Client Library

**WARNING: This code is not production ready, you should use [this](https://docraptor.com/documentatino/php).**

This is a PHP package for using [DocRaptor API](http://docraptor.com/documentation) to convert HTML to PDF and XLSX.

## Installation

TODO

## Usage

```php
require "../client/docraptor/autoload.php";

use docraptor\Doc as Doc;
use docraptor\ClientApi as ClientApi;

$docraptor = new ClientApi();
$api_client = $docraptor->getApiClient();
$configuration = $api_client->getConfig();
$configuration->setUsername("YOUR_API_KEY_HERE"); # this key works for test documents
# $configuration->setDebug(true);

$doc = new Doc();
$doc->setTest(true);                                                   # test documents are free but watermarked
$doc->setDocumentContent("<html><body>Swagger PHP</body></html>");     # supply content directly
# $doc->setDocumentUrl("http://docraptor.com/examples/invoice.html");  # or use a url
$doc->setName("swagger-php.pdf");                                      # help you find a document later
$doc->setDocumentType("pdf");                                          # pdf or xls or xlsx
# $doc->setJavascript(true);                                           # enable JavaScript processing
# $prince_optinos = new PrinceOptions();
# $doc->setPrinceOptions($prince_options)
# $prince_options->setMedia("screen");                                 # use screen styles instead of print styles
# $prince_options->setBaseurl("http://hello.com");                     # pretend URL when using document_content

$response = $docraptor->docsPost($doc);
```

If your document will take longer than 60 seconds to render to PDF you will need to use our async api which allows up to 10 minutes, check out the [example](example/async.php).


We have guides for doing some of the common things:
* [Headers and Footers](https://docraptor.com/documentation/style#pdf-headers-footers) including page skipping
* [CSS Media Selector](https://docraptor.com/documentation/api#api_basic_pdf) to make the page look exactly as it does in your browser
* [Protected Content](https://docraptor.com/documentation/api#api_advanced_pdf) to secure your URLs so only DocRaptor can access them

## More Help

DocRaptor has a lot of more [styling](https://docraptor.com/documentation/style) and [implementation options](https://docraptor.com/documentation/api).

Stuck? We're experts at using DocRaptor so please [email us](mailto:support@docraptor.com) if you run into trouble.


## Development

The majority of the code in this repo is generated using swagger-codegen on [docraptor.yaml](docraptor.yaml). You can modify this file and regenerate the client using `script/generate_language ruby`.

## Release Process

1. Merge code and run tests
2. Increment version in code
3. Update [CHANGELOG.md](CHANGELOG.md)
4. Push to GitHub
5. TODO

## Version Policy

This library follows [Semantic Versioning 2.0.0](http://semver.org).
