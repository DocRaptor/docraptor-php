# # PrinceOptions

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**baseurl** | **string** | Set the baseurl for assets. | [optional]
**no_xinclude** | **bool** | Disable XML inclusion. | [optional]
**no_network** | **bool** | Disable network access. | [optional]
**no_parallel_downloads** | **bool** | Disables parallel fetching of assets during PDF creation. Useful if your asset host has strict rate limiting. | [optional]
**http_user** | **string** | Set the user for HTTP authentication. | [optional]
**http_password** | **string** | Set the password for HTTP authentication. | [optional]
**http_proxy** | **string** | Set the HTTP proxy server. | [optional]
**http_timeout** | **int** | Set the HTTP request timeout. | [optional]
**insecure** | **bool** | Disable SSL verification. | [optional]
**media** | **string** | Specify the CSS media type. Defaults to \&quot;print\&quot; but you may want to use \&quot;screen\&quot; for web styles. | [optional] [default to 'print']
**no_author_style** | **bool** | Ignore author stylesheets. | [optional]
**no_default_style** | **bool** | Ignore default stylesheets. | [optional]
**no_embed_fonts** | **bool** | Disable font embedding in PDFs. | [optional]
**no_subset_fonts** | **bool** | Disable font subsetting in PDFs. | [optional]
**no_compress** | **bool** | Disable PDF compression. | [optional]
**encrypt** | **bool** | Encrypt PDF output. | [optional]
**key_bits** | **int** | Set encryption key size. | [optional]
**user_password** | **string** | Set the PDF user password. | [optional]
**owner_password** | **string** | Set the PDF owner password. | [optional]
**disallow_print** | **bool** | Disallow printing of this PDF. | [optional]
**disallow_copy** | **bool** | Disallow copying of this PDF. | [optional]
**disallow_annotate** | **bool** | Disallow annotation of this PDF. | [optional]
**disallow_modify** | **bool** | Disallow modification of this PDF. | [optional]
**debug** | **bool** | Enable Prince debug mode. | [optional]
**input** | **string** | Specify the input format. | [optional] [default to 'html']
**version** | **string** | Deprecated, use the appropriate &#x60;pipeline&#x60; version. Specify a specific verison of PrinceXML to use. | [optional]
**javascript** | **bool** | Enable PrinceXML JavaScript. DocRaptor JavaScript parsing is also available elsewhere. | [optional]
**css_dpi** | **int** | Set the DPI when rendering CSS. Defaults to 96 but can be set with Prince 9.0 and up. | [optional]
**profile** | **string** | In Prince 9.0 and up you can set the PDF profile. | [optional]
**pdf_title** | **string** | Specify the PDF title, part of the document&#39;s metadata. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
