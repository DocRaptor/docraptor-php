[![Build Status](https://travis-ci.org/DocRaptor/docraptor-php.svg?branch=master)](https://travis-ci.org/DocRaptor/docraptor-php)

# DocRaptor PHP Native Client Library

This is a PHP package for using [DocRaptor API](https://docraptor.com/documentation) to convert [HTML to PDF and XLSX](https://docraptor.com).


## Installation

```bash
composer require docraptor/docraptor
```

## Basic Usage

```php
$docraptor = new DocRaptor\DocApi();
$docraptor->getConfig()->setUsername("YOUR_API_KEY_HERE");             // this key works for test documents
// $docraptor->getConfig()->setDebug(true);

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
## Next Steps

- Optionally store and get a URL for your converted document with [document hosting](https://docraptor.com/document-hosting)
- View more [code examples](examples) with error handling, asynchronous creation, file saving, and document hosting.
- Perfect your document styling with our [knowledge base](https://help.docraptor.com), [style and formatting reference](https://docraptor.com/documentation/style), and [API reference](https://docraptor.com/documentation/api). Easily add headers and footers, page breaks, page numbers, table of contents, and much more!

## More Help

Stuck? We're experts at turning HTML into PDFs so please [email us](mailto:support@docraptor.com) if you run into trouble.


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
8. Tag version: `git tag 'vX.Y.Z' && git push --tags` (GitHub packagist integration will tell packagist to release a new version)
9. Verify update on https://packagist.org/packages/docraptor/docraptor
10. Refresh documentation on docraptor.com


## Version Policy

This library follows [Semantic Versioning 2.0.0](http://semver.org).

## Contributors

* Joel Meador
* Elijah Miller
* James Paden
* Jason Gladish
* Nikola Nikolov
