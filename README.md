[![Build Status](https://travis-ci.org/DocRaptor/docraptor-php.svg?branch=master)](https://travis-ci.org/DocRaptor/docraptor-php)

# DocRaptor PHP Native Client Library

This is a PHP package for using [DocRaptor API](https://docraptor.com/documentation) to convert [HTML to PDF and XLSX](https://docraptor.com).


## Composer Installation

```bash
composer require docraptor/docraptor
```

## Manual Installation

If you do not wish to use Composer, you can download the [latest
release](https://github.com/docraptor/docraptor-php/releases), unzip in your project and require `autoload.php`.


```php
require_once('/path/to/docraptor-php/autoload.php');
```


## Usage

See [examples](examples/) for runnable examples with file output, error handling, etc.

```php
$configuration = DocRaptor\Configuration::getDefaultConfiguration();
$configuration->setUsername("YOUR_API_KEY_HERE"); // this key works for test documents
// $configuration->setDebug(true);
$docraptor = new DocRaptor\DocApi();

$doc = new DocRaptor\Doc();
$doc->setTest(true);                                                   // test documents are free but watermarked
$doc->setDocumentContent("<html><body>Hello World</body></html>");     // supply content directly
// $doc->setDocumentUrl("http://docraptor.com/examples/invoice.html"); // or use a url
$doc->setName("docraptor-php.pdf");                                    // help you find a document later
$doc->setDocumentType("pdf");                                          // pdf or xls or xlsx
// $doc->setJavascript(true);                                          // enable JavaScript processing
// $prince_options = new DocRaptor\PrinceOptions();                    // pdf-specific options
// $doc->setPrinceOptions($prince_options);
// $prince_options->setMedia("screen");                                // use screen styles instead of print styles
// $prince_options->setBaseurl("http://hello.com");                    // pretend URL when using document_content

$create_response = $docraptor->createDoc($doc);
```

Docs created like this are limited to 60 seconds to render, check out the [async example](examples/async.php) which allows 10 minutes.


We have guides for doing some of the common things:

* [Headers and Footers](https://docraptor.com/documentation/style#pdf-headers-footers) including page skipping
* [CSS Media Selector](https://docraptor.com/documentation/api#api_basic_pdf) to make the page look exactly as it does in your browser
* Protect content with [HTTP authentication](https://docraptor.com/documentation/api#api_http_user) or [proxies](https://docraptor.com/documentation/api#api_http_proxy) so only DocRaptor can access them


## More Help

DocRaptor has a lot more [styling](https://docraptor.com/documentation/style) and [implementation options](https://docraptor.com/documentation/api).

Stuck? We're experts at using DocRaptor so please [email our support team](mailto:support@docraptor.com) if you run into trouble.


## Development

The majority of the code in this repo is generated using swagger-codegen on [docraptor.yaml](docraptor.yaml). You can modify this file and regenerate the client using `script/generate_language php`.


## Release Process

1. Pull latest master
2. Merge feature branch(es) into master
3. `script/test`
4. Increment version in code:
  - `swagger-config.json`
  - `lib/Configuration.php` (2 places)
5. Update [CHANGELOG.md](CHANGELOG.md)
6. Commit "Release version vX.Y.Z"
7. Push to GitHub
8. Tag version: `git tag 'vX.Y.Z' && git push --tags` (GitHub webhook will tell packagist and release a new version)
9. Verify update on https://packagist.org/packages/docraptor/docraptor
10. Refresh documentation on docraptor.com


## Version Policy

This library follows [Semantic Versioning 2.0.0](http://semver.org).
