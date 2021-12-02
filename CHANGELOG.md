### 3.0.1 [December 2, 2021]
* Change uses of getRealPath to getPathname by request in #28

### 3.0.0 [November 30, 2021]
* Add support for Guzzle 7
* Switch from Swagger to OpenApi 5.3.0 (required for Guzzle 7)

The major version bump for this release is because of the change from
Swagger to OpenApi. There is no intended change in functionality, but
changing generators created a substantial changeset in the client
code. Please see the commit message for more technical details.

### 2.0.0 [July 31, 2020]
* add support for hosted documents
* upgrade to latest swagger 2.4.14
* composer is now used to manage dependencies
* **BREAKING CHANGE**: configuration change

### 1.3.0 [November 21, 2017]
* Upgrade to new swagger generation version (v2.2.3)
* Added support for `prince_options[pdf_title]` and `ignore_console_messages` options

### 1.1.0 [November 3, 2016]
* Added support for the pipeline API parameter

### 1.0.0 [October 18, 2016]
* No significant code changes

### 0.4.0 [September 27, 2016]
* Added support for prince_options[no_parallel_downloads]

### 0.3.0 [March 12, 2016]
* Added support for prince_options[debug]

### 0.2.1 [January 30, 2016]
* Fix release process issue causing 0.2.0 to not be seen by packagist.

### 0.2.0 [January 29, 2016]
* **BREAKING CHANGE**: Rename ClientApi to DocApi

### 0.1.0 [January 27, 2016]
* **BREAKING CHANGE**: createDoc and getAsyncDoc responses are now binary strings instead of temp files

### 0.0.2 [January 17, 2016]
* Example and documentation improvements

### 0.0.1 [January 15, 2016]
* Initial release
