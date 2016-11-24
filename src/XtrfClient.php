<?php

/**
 * @file
 * Contains \drunomics\XtrfClient\XtrfClient
 */

namespace drunomics\XtrfClient;

use drunomics\XtrfClient\Model\XtrfFile;
use drunomics\XtrfClient\Model\XtrfLanguage;
use drunomics\XtrfClient\Model\XtrfOffice;
use drunomics\XtrfClient\Model\XtrfProject;
use drunomics\XtrfClient\Model\XtrfQuote;
use drunomics\XtrfClient\Model\XtrfQuoteRequest;
use drunomics\XtrfClient\Model\XtrfSpecialization;
use drunomics\XtrfClient\Model\XtrfService;
use drunomics\XtrfClient\Normalizer\SwaggerSchemaNormalizer;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * XTRF REST client class.
 */
class XtrfClient extends Client {

  /**
   * The serializer to use.
   *
   * @var \Symfony\Component\Serializer\SerializerInterface
   */
  protected $serializer;

  /**
   * An array of configuration settings.
   *
   * @todo Convert to a class.
   *
   * The following keys are required,
   *   while all Guzzle configuration options are supported:
   *   - base_uri: Base URL of the the XTRF rest service.
   *   - username: The XTRF username.
   *   - password: The XTRF password.
   *   - format: (optional) Format of the returned data, allowed values 'json',
   *     'xml'; 'json' by default.
   *
   * @var array
   */
  protected $config;

  /**
   * {@inheritdoc}
   */
  public function __call($method, $args)
  {
    try {
      return parent::__call($method, $args);
    }
    catch (\GuzzleHttp\Exception\RequestException $e) {
      // Catch Guzzle exception about insecure connection and show a proper
      // message.
      if (strpos($e->getMessage(), 'cURL error 60: SSL certificate problem: self signed certificate') !== FALSE) {
        throw new XtrfRequestSslInsecure('Insecure HTTPS connections to XTRF server. The connection is insecure as the SSL certificate is not valid.');
      }
      else {
        throw $e;
      }
    }
  }

  /**
   * Creates an XTRF client instance with pre-configured middleware.
   *
   * The pre-configured middleware takes care of authentication and logging.
   *
   * @param array $config
   *   An array of configuration settings. The following keys are required,
   *   while all Guzzle configuration options are supported:
   *   - base_uri: Base URL of the the XTRF rest service.
   *   - username: The XTRF username.
   *   - password: The XTRF password.
   *   - format: (optional) Format of the returned data, allowed values 'json',
   *     'xml'; 'json' by default.
   *
   * @return static
   */
  public static function create($config) {
    // Add in a handler stack with our middleware.
    $stack = HandlerStack::create();
    $config['handler'] = $stack;
    $client = new static($config);

    $middleware = new AuthenticationMiddleware($client);
    $stack->push($middleware);
    return $client;
  }

  /**
   * Object constructor.
   *
   * @param array $config
   *   An array of configuration settings. The following keys are required,
   *   while all Guzzle configuration options are supported:
   *   - base_uri: Base URL of the the XTRF rest service.
   *   - username: The XTRF username.
   *   - password: The XTRF password.
   *   - format: (optional) Format of the returned data, allowed values 'json',
   *     'xml'; 'json' by default.
   */
  public function __construct(array $config) {
    $this->config = $config;
    if (!empty($config['format']) && $config['format'] == 'xml') {
      $config['headers']['Accept'] = 'application/xml';
    }
    else {
      $config['headers']['Accept'] = 'application/json';
    }
    $default_options = [
      'verify' => TRUE,
    ];
    parent::__construct($config + $default_options);
  }

  /**
   * Logs in with the given credentials.
   *
   * @param string $username
   *   The user name.
   * @param string $password
   *   The user password.
   *
   * @return string
   *   The XTRF session id token.
   *
   * @throws \GuzzleHttp\Exception\RequestException
   *   Thrown on login failure.
   */
  public function login($username, $password) {
    $response = $this->request('post', "system/login", [
      'form_params' => [
        'username' => $username,
        'password' => $password,
      ],
      // Indiciate to the auth-middleware that this request does not need
      // authentication.
      'auth' => FALSE,
    ]);
    $json = $response->getBody()->getContents();
    $data = json_decode($json, TRUE);
    return $data['jsessionid'];
  }

  /**
   * Sets serializer to use.
   *
   * @param \Symfony\Component\Serializer\SerializerInterface $serializer
   *   The serializer.
   */
  public function setSerializer(SerializerInterface $serializer) {
    $this->serializer = $serializer;
  }

  /**
   * The serializer to use.
   *
   * @return \Symfony\Component\Serializer\SerializerInterface
   *   The serializer.
   */
  public function getSerializer() {
    if (!isset($this->serializer)) {
      $schema = new SwaggerSchema(dirname(__FILE__) . '/../swagger.json');
      $encoders = [new JsonEncoder()];
      $normalizers = [
        new ArrayDenormalizer(),
        (new SwaggerSchemaNormalizer())->setSwaggerSchema('drunomics\XtrfClient\Model', $schema),
        new ObjectNormalizer(),
      ];
      $this->serializer = new Serializer($normalizers, $encoders);
    }
    return $this->serializer;
  }

  /**
   * Lists quotes.
   *
   * @param array $query
   *   (optional) Query parameters to restrict the list, supported keys are:
   *   - start: The offset of the first entry.
   *   - limit: The maximum number of entries to be returned, at most 50.
   *   - search: Restricts result to quotes with at least one of properties
   *     (idNumber, refNumber, name) containing given string.
   *   - status: Restricts result to quotes with given status (REQUESTED,
   *     PENDING, SENT, ACCEPTED, ACCEPTED_BY_CUSTOMER, REJECTED or SPLITTED),
   *     multiple values allowed.
   *
   * @return \drunomics\XtrfClient\Model\XtrfQuote[]
   *   The list of quotes.
   *
   * @throws \GuzzleHttp\Exception\RequestException
   *   Thrown if un-expected request errors occurs.
   */
  public function getQuotes($query = []) {
    $query += [
      'start' => 0,
      'limit' => 10,
    ];
    $response = $this->get("quotes/", [
      'query' => $query,
    ]);
    $json = $response->getBody()->getContents();
    return $this->getSerializer()->deserialize($json, XtrfQuote::class . '[]', 'json');
  }

  /**
   * Retrieves a quote by id.
   *
   * @param int $quote_id
   *   The quote id.
   *
   * @return \drunomics\XtrfClient\Model\XtrfQuote|null
   *   The quote, or null if the quote with the given ID does not exist.
   *
   * @throws \GuzzleHttp\Exception\RequestException
   *   Thrown if un-expected request errors occurs.
   */
  public function getQuote($quote_id) {
    try {
      $query = [];
      $response = $this->get("quotes/{$quote_id}", [
        'query' => $query,
      ]);
      $json = $response->getBody()->getContents();
      return $this->getSerializer()->deserialize($json, XtrfQuote::class, 'json');
    }
    catch (ClientException $e) {
      if ($e->getResponse()->getStatusCode() == 404) {
        return NULL;
      }
      else {
        throw $e;
      }
    }
  }

  /**
   * Creates a quote by id.
   *
   * @param \drunomics\XtrfClient\Model\XtrfQuoteRequest $quote_request
   *   The request data to create a quote with.
   *
   * @return \drunomics\XtrfClient\Model\XtrfQuote
   *   The created quote.
   *
   * @throws \GuzzleHttp\Exception\RequestException
   *   Thrown if un-expected request errors occurs.
   */
  public function createQuote(XtrfQuoteRequest $quote_request) {
    $data = $this->getSerializer()->serialize($quote_request, 'json');
    $request = (new Request('post', 'quotes', [], $data))
      ->withAddedHeader('Content-Type', 'application/json');
    $response = $this->send($request);
    $json = $response->getBody()->getContents();
    return $this->getSerializer()->deserialize($json, XtrfQuote::class, 'json');
  }

  /**
   * Lists projects.
   *
   * @param array $query
   *   (optional) Query parameters to restrict the list, supported keys are:
   *   - start: The offset of the first entry.
   *   - limit: The maximum number of entries to be returned, at most 50.
   *   - search: Restricts result to quotes with at least one of properties
   *     (idNumber, refNumber, name) containing given string.
   *   - status: Restricts results to projects with given status (OPENED,
   *     CLOSED, CLAIM or CANCELLED), multiple values allowed.
   *   - customerProjectNumber: Customer's project number.
   *
   * @return \drunomics\XtrfClient\Model\XtrfQuote[]
   *   The list of quotes.
   *
   * @throws \GuzzleHttp\Exception\RequestException
   *   Thrown if un-expected request errors occurs.
   */
  public function getProjects($query = []) {
    $query += [
      'start' => 0,
      'limit' => 10,
    ];
    $response = $this->get("projects/", [
      'query' => $query,
    ]);
    $json = $response->getBody()->getContents();
    return $this->getSerializer()->deserialize($json, XtrfProject::class . '[]', 'json');
  }

  /**
   * Gets a project by id.
   *
   * @param int $project_id
   *   The project id.
   *
   * @return \drunomics\XtrfClient\Model\XtrfProject|null
   *   The project, or NULL if the project does not exist.
   *
   * @throws \GuzzleHttp\Exception\ClientException
   */
  public function getProject($project_id) {
    try {
      $response = $this->get("projects/{$project_id}", [
        'query' => [],
      ]);
      $json = $response->getBody()->getContents();
      return $this->getSerializer()->deserialize($json, XtrfProject::class, 'json');
    }
    catch (ClientException $e) {
      if ($e->getResponse()->getStatusCode() == 404) {
        return NULL;
      }
      else {
        throw $e;
      }
    }
  }

  /**
   * Gets the project output files as ZIP file.
   *
   * @param int $project_id
   *   The project id.
   *
   * @return \Psr\Http\Message\StreamInterface|null
   *   The file stream, or NULL if the project does not exist.
   *
   * @throws \GuzzleHttp\Exception\ClientException
   */
  public function getProjectOutputFilesAsZip($project_id) {
    try {
      $response = $this->get("projects/{$project_id}/files/outputFilesAsZip", [
        'query' => [],
        'headers' => [
          'Accept' => '*/*',
        ],
      ]);
      return $response->getBody();
    }
    catch (ClientException $e) {
      if ($e->getResponse()->getStatusCode() == 404) {
        return NULL;
      }
      else {
        throw $e;
      }
    }
  }

  /**
   * Uploads a file.
   *
   * @param string
   *   The file name.
   * @param string|\Psr\Http\Message\StreamInterface $content
   *   The file content to upload.
   *
   * @return \drunomics\XtrfClient\Model\XtrfFile[]
   *   The created files.
   *
   * @throws \GuzzleHttp\Exception\ClientException
   */
  public function uploadFile($filename, $content) {
    $response = $this->post('system/session/files', [
      'multipart' => [
        [
          'name'     => 'file',
          'filename' => $filename,
          'contents' => $content,
        ],
      ],
    ]);
    $json = $response->getBody()->getContents();
    return $this->getSerializer()->deserialize($json, XtrfFile::class . '[]', 'json');
  }

  /**
   * Returns list of files uploaded during current session.
   *
   * @return \drunomics\XtrfClient\Model\XtrfFile[]
   *   The created files.
   *
   * @throws \GuzzleHttp\Exception\ClientException
   */
  public function getFiles() {
    $response = $this->get("system/session/files/", []);
    $json = $response->getBody()->getContents();
    return $this->getSerializer()->deserialize($json, XtrfFile::class . '[]', 'json');
  }

  /**
   * Returns available system languages.
   *
   * @return \drunomics\XtrfClient\Model\XtrfLanguage[]
   *   The languages.
   *
   * @throws \GuzzleHttp\Exception\ClientException
   */
  public function getLanguages() {
    $response = $this->get("system/values/languages/", []);
    $json = $response->getBody()->getContents();
    return $this->getSerializer()->deserialize($json, XtrfLanguage::class . '[]', 'json');
  }

  /**
   * Gets the specializations list.
   *
   * @return \drunomics\XtrfClient\Model\XtrfSpecialization[]
   *   The specializations array.
   *
   * @throws \GuzzleHttp\Exception\ClientException
   */
  public function getSpecializations() {
    $response = $this->get("system/values/specializations/", []);
    $json = $response->getBody()->getContents();
    return $this->getSerializer()->deserialize($json, XtrfSpecialization::class . '[]', 'json');
  }

  /**
   * Returns available services.
   *
   * @return \drunomics\XtrfClient\Model\XtrfService[]
   *   The languages.
   *
   * @throws \GuzzleHttp\Exception\ClientException
   */
  public function getServices() {
    $response = $this->get("system/values/services/", []);
    $json = $response->getBody()->getContents();
    return $this->getSerializer()->deserialize($json, XtrfService::class . '[]', 'json');
  }

  /**
   * Gets the default office.
   *
   * @return \drunomics\XtrfClient\Model\XtrfOffice|null
   *   The default office, or null if no office was found.
   *
   * @throws \GuzzleHttp\Exception\ClientException
   */
  public function getDefaultOffice() {
    $response = $this->get("offices/default/", []);
    $json = $response->getBody()->getContents();
    return $this->getSerializer()->deserialize($json, XtrfOffice::class, 'json');
  }

  /**
   * Gets contact persons.
   *
   * @return \drunomics\XtrfClient\Model\XtrfPerson[]|null
   *   The contact persons of current user, or null if no person was found.
   *
   * @throws \GuzzleHttp\Exception\ClientException
   */
  public function getContactPersons() {
    $office = $this->getDefaultOffice();
    return $office->getPersons();
  }

}
