<?php
/**
 * ProjectsApiInterfaceTest
 * PHP version 5.
 *
 * @category Class
 *
 * @author   openapi-generator contributors
 *
 * @see     https://github.com/openapitools/openapi-generator
 */

/**
 * Catroweb API.
 *
 * API for the Catrobat Share Platform
 *
 * The version of the OpenAPI document: v1.0.8
 * Contact: webmaster@catrobat.org
 * Generated by: https://github.com/openapitools/openapi-generator.git
 */

/**
 * NOTE: This class is auto generated by the openapi generator program.
 * https://github.com/openapitools/openapi-generator
 * Please update the test case below to test the endpoint.
 */

namespace OpenAPI\Server\Tests\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * ProjectsApiInterfaceTest Class Doc Comment.
 *
 * @category Class
 *
 * @author   openapi-generator contributors
 *
 * @see     https://github.com/openapitools/openapi-generator
 *
 * @internal
 * @coversNothing
 */
class ProjectsApiInterfaceTest extends WebTestCase
{
  /**
   * Setup before running any test cases.
   */
  public static function setUpBeforeClass()
  {
  }

  /**
   * Clean up after running all test cases.
   */
  public static function tearDownAfterClass()
  {
  }

  /**
   * Setup before running each test case.
   */
  public function setUp()
  {
  }

  /**
   * Clean up after running each test case.
   */
  public function tearDown()
  {
  }

  /**
   * Test case for projectProjectIdGet.
   *
   * Get the information of a project.
   */
  public function testProjectProjectIdGet()
  {
    $client = static::createClient();

    $path = '/project/{project_id}';
    $pattern = '{projectId}';
    $data = $this->genTestData('[a-z0-9]+');
    $path = str_replace($pattern, $data, $path);

    $crawler = $client->request('GET', $path);
  }

  /**
   * Test case for projectsFeaturedGet.
   *
   * Get the currently featured projects.
   */
  public function testProjectsFeaturedGet()
  {
    $client = static::createClient();

    $path = '/projects/featured';

    $crawler = $client->request('GET', $path);
  }

  /**
   * Test case for projectsGet.
   *
   * Get projects.
   */
  public function testProjectsGet()
  {
    $client = static::createClient();

    $path = '/projects';

    $crawler = $client->request('GET', $path);
  }

  /**
   * Test case for projectsPost.
   *
   * Upload a catrobat program.
   */
  public function testProjectsPost()
  {
    $client = static::createClient();

    $path = '/projects';

    $crawler = $client->request('POST', $path);
  }

  /**
   * Test case for projectsSearchGet.
   *
   * Search for programs associated with a keywords.
   */
  public function testProjectsSearchGet()
  {
    $client = static::createClient();

    $path = '/projects/search';

    $crawler = $client->request('GET', $path);
  }

  /**
   * Test case for projectsUserGet.
   *
   * Get the projects of the logged in user.
   */
  public function testProjectsUserGet()
  {
    $client = static::createClient();

    $path = '/projects/user/';

    $crawler = $client->request('GET', $path);
  }

  /**
   * Test case for projectsUserUserIdGet.
   *
   * Get the public projects of a given user.
   */
  public function testProjectsUserUserIdGet()
  {
    $client = static::createClient();

    $path = '/projects/user/{userId}';
    $pattern = '{userId}';
    $data = $this->genTestData('[a-z0-9]+');
    $path = str_replace($pattern, $data, $path);

    $crawler = $client->request('GET', $path);
  }

  protected function genTestData($regexp)
  {
    $grammar = new \Hoa\File\Read('hoa://Library/Regex/Grammar.pp');
    $compiler = \Hoa\Compiler\Llk\Llk::load($grammar);
    $ast = $compiler->parse($regexp);
    $generator = new \Hoa\Regex\Visitor\Isotropic(new \Hoa\Math\Sampler\Random());

    return $generator->visit($ast);
  }
}
