# XTRF REST client library
REST client library based on Guzzle.

The client provides a nice API using model classes for the data structure. The models are generated based upon the Swagger REST service specification. See http://swagger.io/.

The specification (swagger.json) can be edited using Swagger's online editor: http://editor.swagger.io

Usage
-----

```
$config = [
  'base_uri' => 'http://example.com',
  'username' => 'test',
  'password' => 'test',
];
$client = \drunomics\XtrfClient\XtrfClient::create($config);
$quote = $client->getQuote($quote_id);
//...
// More examples like quote creation can be found at the tests, see https://github.com/drunomics/xtrf-rest-client/blob/master/tests/XtrfApiIntegrationTest.php#L145.
```

Notes on using swagger-UI:
--------------------------
see https://github.com/swagger-api/swagger-ui

Swagger-ui can be used to provide a good overview and curl commands for testing. The following instructions describe how to run swagger-ui easily:

- Run swagger-ui via "composer swagger-ui" command.

- Start with the authentication call. It's result needs to be copied into the
  api-key field at the top.

- The cookie authentication does not work from swagger. But the generated curl
  commands do. If you have troubles with SSL verification you can prepend the
  curl options:

  curl -3 --insecure  OTHER OPTIONS

Generate models based upon swagger spec
----------------------------------------

- Run `composer install` in the libraries directory
- Run `composer generate` - that's it.
