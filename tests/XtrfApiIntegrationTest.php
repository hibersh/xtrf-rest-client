<?php

/**
 * @file
 * Contains \drunomics\Xtrf\Tests\XtrfApiIntegrationTest.
 */

namespace drunomics\Xtrf\Tests;

use drunomics\XtrfClient\Model\XtrfDate;
use drunomics\XtrfClient\Model\XtrfFile;
use drunomics\XtrfClient\Model\XtrfLanguage;
use drunomics\XtrfClient\Model\XtrfPerson;
use drunomics\XtrfClient\Model\XtrfProject;
use drunomics\XtrfClient\Model\XtrfQuote;
use drunomics\XtrfClient\Model\XtrfQuoteRequest;
use drunomics\XtrfClient\Model\XtrfSpecialization;
use drunomics\XtrfClient\Model\XtrfWorkflow;
use drunomics\XtrfClient\XtrfClient;
use FR3D\SwaggerAssertions\PhpUnit\Psr7AssertsTrait;
use FR3D\SwaggerAssertions\SchemaManager;

/**
 * Tests for the XTRF client.
 *
 * @covers XtrfClient
 */
class XtrfApiIntegrationTest extends \PHPUnit_Framework_TestCase {

  use Psr7AssertsTrait;

  /**
   * @var SchemaManager
   */
  protected static $schemaManager;

  /**
   * A valid XTRF person ID to use for testing.
   *
   * @var int
   */
  protected $personId = '2174';

  /**
   * The REST service configuration as needed by XtrfClient.
   *
   * @todo Make this configureable.
   *
   * @var mixed[]
   */
  protected static $config = [
    'base_uri' => '',
    'username' => '',
    'password' => '',
    // @todo Add tests for secure/insecure connection.
    'verify' => FALSE,
  ];

  /**
   * The configured xtrf client.
   *
   * @var \drunomics\XtrfClient\XtrfClient
   */
  protected static $xtrfClientCache;

  /**
   * The configured xtrf client.
   *
   * @var \drunomics\XtrfClient\XtrfClient
   */
  protected $xtrfClient;

  /**
   * {@inheritdoc}
   */
  public static function setUpBeforeClass() {
    $swagger_file = dirname(__FILE__) . '/../swagger.json';
    static::$schemaManager = new SchemaManager($swagger_file);

    static::$xtrfClientCache = XtrfClient::create(static::$config);
    // @todo: Assert request and repsonse matches via client middleware.
    // $this->assertResponseAndRequestMatch($response, $request, self::$schemaManager);
  }

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
    // Keep a shared xtrf-client instance, so it's middleware keeps a single
    // session up and we uploaded files kept in session can be re-used across
    // test methods, @see testCreateQuote().
    $this->xtrfClient = static::$xtrfClientCache;
  }

  /**
   * @covers ::getLanguages
   */
  public function testGetLanguages() {
    $languages = $this->xtrfClient->getLanguages();
    $this->assertInternalType('array', $languages);
    $this->assertInstanceOf(XtrfLanguage::class, $languages[0]);
    $this->assertInternalType('integer', $languages[0]->getId());
  }

  /**
   * @covers ::getContactPersons()
   */
  public function testContactPersons() {
    $persons = $this->xtrfClient->getContactPersons();
    $this->assertInternalType('array', $persons);
    $this->assertInstanceOf(XtrfPerson::class, $persons[0]);
    $this->assertInternalType('integer', $persons[0]->getId());
  }

  /**
   * @covers ::uploadFile()
   */
  public function testUploadFile() {
    $content = file_get_contents(dirname(__FILE__) . '/data/example.xliff');
    $files = $this->xtrfClient->uploadFile('example.xliff', $content);
    $this->assertInternalType('array', $files);
    $this->assertInstanceOf(XtrfFile::class, $files[0]);
    $this->assertInternalType('integer', $files[0]->getId());
    $this->assertEquals('example.xliff', $files[0]->getName());
    $this->assertEquals(5, $files[0]->getFileStats()->getLines());
    return $files;
  }

  /**
   * @covers ::getFiles
   * @depends testUploadFile
   */
  public function testGetFiles(array $files_created) {
    $files = $this->xtrfClient->getFiles();
    $this->assertEquals(count($files_created), count($files));
    $this->assertEquals($files_created[0]->getId(), $files[0]->getId());
  }

  /**
   * @covers ::createQuote
   * @depends testUploadFile
   */
  public function testCreateQuote(array $files) {
    // Test creation with some nested objects, but without files.
    $quote_request = (new XtrfQuoteRequest())
      ->setName('test name')
      ->setCustomerProjectNumber('test')
      ->setNotes('some notes')
      ->setAutoAccept(FALSE)
      ->setPersons([
        (new XtrfPerson())
          ->setID($this->personId),
      ])
      ->setSourceLanguage((new XtrfLanguage())
        ->setName('English')
      )
      ->setTargetLanguages([
        (new XtrfLanguage())
          ->setName('German'),
      ])
      ->setWorkflow((new XtrfWorkflow())
        ->setName('Drunomics')
      )
      ->setSpecialization((new XtrfSpecialization())
        ->setName('General')
      );
    $quote = $this->xtrfClient->createQuote($quote_request);

    $this->assertNotNull($quote);
    $this->assertInstanceOf(XtrfQuote::class, $quote);
    $this->assertInternalType('integer', $quote->getId());
    $this->assertEquals($quote_request->getName(), $quote->getName());

    // Try again but also upload some files.
    $quote_request = (new XtrfQuoteRequest())
      ->setName('test with file')
      ->setCustomerProjectNumber('test2')
      ->setPersons([
        (new XtrfPerson())
          ->setID($this->personId),
      ])
      ->setSourceLanguage((new XtrfLanguage())
        ->setSymbol('de-AT')
      )
      ->setTargetLanguages([
        (new XtrfLanguage())
          ->setSymbol('en-US'),
      ])
      ->setWorkflow((new XtrfWorkflow())
        ->setName('Drunomics')
      )
      ->setSpecialization((new XtrfSpecialization())
        ->setName('General')
      )
      ->setFiles($files);
    $quote = $this->xtrfClient->createQuote($quote_request);
    $this->assertNotNull($quote);
    $this->assertInstanceOf(XtrfQuote::class, $quote);
    $this->assertInternalType('integer', $quote->getId());
  }

  /**
   * @covers ::getQuote
   * @covers ::getQuotes
   */
  public function testGetQuotes() {
    $quotes = $this->xtrfClient->getQuotes();
    $this->assertTrue(is_array($quotes));
    $this->assertInstanceOf(XtrfQuote::class, $quotes[0]);

    // Take the first ID and retrieve a single quote again.
    $quote_id = $quotes[0]->getId();
    $quote = $this->xtrfClient->getQuote($quote_id);
    $this->assertNotNull($quote);
    $this->assertInstanceOf(XtrfQuote::class, $quote);
    $this->assertEquals($quote->getId(), $quote_id);
    // Test nested classes.
    $this->assertTrue($quote->getStartDate() !== NULL);
    $this->assertInstanceOf(XtrfDate::class, $quote->getStartDate());
    $this->assertNotEmpty($quote->getStartDate()->getFormatted());
  }

  /**
   * @covers ::getProject
   * @covers ::getProjects
   */
  public function testGetProjects() {
    $projects = $this->xtrfClient->getProjects();
    $this->assertTrue(is_array($projects));
    $this->assertInstanceOf(XtrfProject::class, $projects[0]);

    // Take the first ID and retrieve a single quote again.
    $project_id = $projects[0]->getId();
    $project = $this->xtrfClient->getProject($project_id);
    $this->assertNotNull($project);
    $this->assertInstanceOf(XtrfProject::class, $project);
    $this->assertEquals($project->getId(), $project_id);
    // Test nested classes.
    $this->assertTrue($project->getStartDate() !== NULL);
    $this->assertInstanceOf(XtrfDate::class, $project->getStartDate());
    $this->assertNotEmpty($project->getStartDate()->getFormatted());
  }

}
