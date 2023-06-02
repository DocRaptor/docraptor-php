# DocRaptor\DocApi

All URIs are relative to https://api.docraptor.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createAsyncDoc()**](DocApi.md#createAsyncDoc) | **POST** /async_docs | 
[**createDoc()**](DocApi.md#createDoc) | **POST** /docs | 
[**createHostedAsyncDoc()**](DocApi.md#createHostedAsyncDoc) | **POST** /hosted_async_docs | 
[**createHostedDoc()**](DocApi.md#createHostedDoc) | **POST** /hosted_docs | 
[**expire()**](DocApi.md#expire) | **PATCH** /expire/{id} | 
[**getAsyncDoc()**](DocApi.md#getAsyncDoc) | **GET** /download/{id} | 
[**getAsyncDocStatus()**](DocApi.md#getAsyncDocStatus) | **GET** /status/{id} | 


## `createAsyncDoc()`

```php
createAsyncDoc($doc): \DocRaptor\DocRaptor\AsyncDoc
```



Creates a document asynchronously. You must use a callback url or the returned status id and the status API to find out when it completes. Then use the download API to get the document.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = DocRaptor\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new DocRaptor\Api\DocApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$doc = new \DocRaptor\DocRaptor\Doc(); // \DocRaptor\DocRaptor\Doc | The document to be created.

try {
    $result = $apiInstance->createAsyncDoc($doc);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocApi->createAsyncDoc: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **doc** | [**\DocRaptor\DocRaptor\Doc**](../Model/Doc.md)| The document to be created. |

### Return type

[**\DocRaptor\DocRaptor\AsyncDoc**](../Model/AsyncDoc.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`, `application/pdf`, `application/vnd.ms-excel`, `application/vnd.openxmlformats-officedocument.spreadsheetml.sheet`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createDoc()`

```php
createDoc($doc): string
```



Creates a document synchronously.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = DocRaptor\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new DocRaptor\Api\DocApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$doc = new \DocRaptor\DocRaptor\Doc(); // \DocRaptor\DocRaptor\Doc | The document to be created.

try {
    $result = $apiInstance->createDoc($doc);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocApi->createDoc: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **doc** | [**\DocRaptor\DocRaptor\Doc**](../Model/Doc.md)| The document to be created. |

### Return type

**string**

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`, `application/pdf`, `application/vnd.ms-excel`, `application/vnd.openxmlformats-officedocument.spreadsheetml.sheet`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createHostedAsyncDoc()`

```php
createHostedAsyncDoc($doc): \DocRaptor\DocRaptor\AsyncDoc
```



Creates a hosted document asynchronously. You must use a callback url or the returned status id and the status API to find out when it completes. Then use the download API to get the document.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = DocRaptor\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new DocRaptor\Api\DocApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$doc = new \DocRaptor\DocRaptor\Doc(); // \DocRaptor\DocRaptor\Doc | The document to be created.

try {
    $result = $apiInstance->createHostedAsyncDoc($doc);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocApi->createHostedAsyncDoc: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **doc** | [**\DocRaptor\DocRaptor\Doc**](../Model/Doc.md)| The document to be created. |

### Return type

[**\DocRaptor\DocRaptor\AsyncDoc**](../Model/AsyncDoc.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`, `application/pdf`, `application/vnd.ms-excel`, `application/vnd.openxmlformats-officedocument.spreadsheetml.sheet`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createHostedDoc()`

```php
createHostedDoc($doc): \DocRaptor\DocRaptor\DocStatus
```



Creates a hosted document synchronously.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = DocRaptor\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new DocRaptor\Api\DocApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$doc = new \DocRaptor\DocRaptor\Doc(); // \DocRaptor\DocRaptor\Doc | The document to be created.

try {
    $result = $apiInstance->createHostedDoc($doc);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocApi->createHostedDoc: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **doc** | [**\DocRaptor\DocRaptor\Doc**](../Model/Doc.md)| The document to be created. |

### Return type

[**\DocRaptor\DocRaptor\DocStatus**](../Model/DocStatus.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`, `application/pdf`, `application/vnd.ms-excel`, `application/vnd.openxmlformats-officedocument.spreadsheetml.sheet`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `expire()`

```php
expire($id)
```



Expires a previously created hosted doc.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = DocRaptor\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new DocRaptor\Api\DocApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The download_id returned from status request or hosted document response.

try {
    $apiInstance->expire($id);
} catch (Exception $e) {
    echo 'Exception when calling DocApi->expire: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The download_id returned from status request or hosted document response. |

### Return type

void (empty response body)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAsyncDoc()`

```php
getAsyncDoc($id): string
```



Downloads a finished document.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = DocRaptor\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new DocRaptor\Api\DocApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The download_id returned from an async status request or callback.

try {
    $result = $apiInstance->getAsyncDoc($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocApi->getAsyncDoc: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The download_id returned from an async status request or callback. |

### Return type

**string**

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`, `application/pdf`, `application/vnd.ms-excel`, `application/vnd.openxmlformats-officedocument.spreadsheetml.sheet`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAsyncDocStatus()`

```php
getAsyncDocStatus($id): \DocRaptor\DocRaptor\DocStatus
```



Check on the status of an asynchronously created document.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = DocRaptor\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new DocRaptor\Api\DocApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The status_id returned when creating an asynchronous document.

try {
    $result = $apiInstance->getAsyncDocStatus($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocApi->getAsyncDocStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The status_id returned when creating an asynchronous document. |

### Return type

[**\DocRaptor\DocRaptor\DocStatus**](../Model/DocStatus.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`, `application/pdf`, `application/vnd.ms-excel`, `application/vnd.openxmlformats-officedocument.spreadsheetml.sheet`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
