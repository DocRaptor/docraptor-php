# DocRaptor PHP Native Client Library

**WARNING: This code is not production ready, you should use [this](https://docraptor.com/documentatino/php).**

This is a PHP package for using [DocRaptor API](http://docraptor.com/documentation) to convert HTML to PDF and XLSX.

## Installation

Install with composer:
```
composer require docraptor/docraptor
```

And then composer's autoload
```php
require_once('vendor/autoload.php');
```

## Usage

See [examples](examples/) for runnable examples with file output, error handling, etc.

```php
$configuration = DocRaptor\Configuration::getDefaultConfiguration();
$configuration->setUsername("YOUR_API_KEY_HERE"); # this key works for test documents
# $configuration->setDebug(true);
$docraptor = new DocRaptor\ClientApi();

$doc = new DocRaptor\Doc();
$doc->setTest(true);                                                   # test documents are free but watermarked
$doc->setDocumentContent("<html><body>Hello World</body></html>");     # supply content directly
# $doc->setDocumentUrl("http://docraptor.com/examples/invoice.html");  # or use a url
$doc->setName("docraptor-php.pdf");                                    # help you find a document later
$doc->setDocumentType("pdf");                                          # pdf or xls or xlsx
# $doc->setJavascript(true);                                           # enable JavaScript processing
# $prince_optinos = new PrinceOptions();
# $doc->setPrinceOptions($prince_options)
# $prince_options->setMedia("screen");                                 # use screen styles instead of print styles
# $prince_options->setBaseurl("http://hello.com");                     # pretend URL when using document_content

$response = $docraptor->createDoc($doc);
```

Docs created like this are limited to 60 seconds to render, check out the [async example](examples/async.php) which allows 10 minutes.


We have guides for doing some of the common things:
* [Headers and Footers](https://docraptor.com/documentation/style#pdf-headers-footers) including page skipping
* [CSS Media Selector](https://docraptor.com/documentation/api#api_basic_pdf) to make the page look exactly as it does in your browser
* [Protected Content](https://docraptor.com/documentation/api#api_advanced_pdf) to secure your URLs so only DocRaptor can access them

## More Help

DocRaptor has a lot of more [styling](https://docraptor.com/documentation/style) and [implementation options](https://docraptor.com/documentation/api).

Stuck? We're experts at using DocRaptor so please [email us](mailto:support@docraptor.com) if you run into trouble.


## Development

The majority of the code in this repo is generated using swagger-codegen on [docraptor.yaml](docraptor.yaml). You can modify this file and regenerate the client using `script/generate_language php`.

## Release Process

1. `script/test`
2. Increment version in code:
  - `swagger-config.json`
  - `composer.json`
4. Update [CHANGELOG.md](CHANGELOG.md)
3. Tag version: `git tag 'v0.0.x' && git push --tags`
5. Push to GitHub (packagist webhook will update their site)
6. Verify update on https://packagist.org/packages/docraptor/docraptor

## Version Policy

This library follows [Semantic Versioning 2.0.0](http://semver.org).
