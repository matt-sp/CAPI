<?php

/**
 * ProjectsController
 * PHP version 5.
 *
 * @category Class
 *
 * @author   OpenAPI Generator team
 *
 * @see     https://github.com/openapitools/openapi-generator
 */

/**
 * Catroweb API.
 *
 * API for the Catrobat Share Platform
 *
 * The version of the OpenAPI document: v1.0.29
 * Contact: webmaster@catrobat.org
 * Generated by: https://github.com/openapitools/openapi-generator.git
 */

/**
 * NOTE: This class is auto generated by the openapi generator program.
 * https://github.com/openapitools/openapi-generator
 * Do not edit the class manually.
 */

namespace OpenAPI\Server\Controller;

use Exception;
use JMS\Serializer\Exception\RuntimeException as SerializerRuntimeException;
use OpenAPI\Server\Api\ProjectsApiInterface;
use OpenAPI\Server\Model\Project;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ProjectsController Class Doc Comment.
 *
 * @category Class
 *
 * @author   OpenAPI Generator team
 *
 * @see     https://github.com/openapitools/openapi-generator
 */
class ProjectsController extends Controller
{
  /**
   * Operation projectProjectIdGet.
   *
   * Get the information of a project
   *
   * @param Request $request    the Symfony request to handle
   * @param mixed   $project_id
   *
   * @return Response the Symfony response
   */
  public function projectProjectIdGetAction(Request $request, $project_id)
  {
    // Figure out what data format to return to the client
    $produces = ['application/json'];
    // Figure out what the client accepts
    $clientAccepts = $request->headers->has('Accept') ? $request->headers->get('Accept') : '*/*';
    $responseFormat = $this->getOutputFormat($clientAccepts, $produces);
    if (null === $responseFormat)
    {
      return new Response('', 406);
    }

    // Handle authentication

    // Read out all input parameter values into variables

    // Use the default value if no value was provided

    // Deserialize the input values that needs it
    try
    {
      $project_id = $this->deserialize($project_id, 'string', 'string');
    }
    catch (SerializerRuntimeException $exception)
    {
      return $this->createBadRequestResponse($exception->getMessage());
    }

    // Validate the input values
    $asserts = [];
    $asserts[] = new Assert\NotNull();
    $asserts[] = new Assert\Type('string');
    $asserts[] = new Assert\Regex('/^[a-zA-Z0-9-]+$/');
    $response = $this->validate($project_id, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }

    try
    {
      $handler = $this->getApiHandler();

      // Make the call to the business logic
      $responseCode = 200;
      $responseHeaders = [];
      $result = $handler->projectProjectIdGet($project_id, $responseCode, $responseHeaders);

      // Find default response message
      $message = 'Valid request';

      // Find a more specific message, if available
      switch ($responseCode) {
                case 200:
                    $message = 'Valid request';
                    break;
                case 400:
                    $message = 'BAD Request - invalid or missing required parameters';
                    break;
                case 404:
                    $message = 'Not Found';
                    break;
                case 406:
                    $message = 'Not Acceptable - client must accept application/json as content type';
                    break;
            }

      return new Response(
                null !== $result ? $this->serialize($result, $responseFormat) : '',
                $responseCode,
                array_merge(
                    $responseHeaders,
                    [
                      'Content-Type' => $responseFormat,
                      'X-OpenAPI-Message' => $message,
                    ]
                )
            );
    }
    catch (Exception $fallthrough)
    {
      return $this->createErrorResponse(new HttpException(500, 'An unsuspected error occurred.', $fallthrough));
    }
  }

  /**
   * Operation projectsFeaturedGet.
   *
   * Get the currently featured projects
   *
   * @param Request $request the Symfony request to handle
   *
   * @return Response the Symfony response
   */
  public function projectsFeaturedGetAction(Request $request)
  {
    // Figure out what data format to return to the client
    $produces = ['application/json'];
    // Figure out what the client accepts
    $clientAccepts = $request->headers->has('Accept') ? $request->headers->get('Accept') : '*/*';
    $responseFormat = $this->getOutputFormat($clientAccepts, $produces);
    if (null === $responseFormat)
    {
      return new Response('', 406);
    }

    // Handle authentication

    // Read out all input parameter values into variables
    $platform = $request->query->get('platform');
    $max_version = $request->query->get('max_version');
    $limit = $request->query->get('limit');
    $offset = $request->query->get('offset');
    $flavor = $request->query->get('flavor');

    // Use the default value if no value was provided

    // Deserialize the input values that needs it
    try
    {
      $platform = $this->deserialize($platform, 'string', 'string');
      $max_version = $this->deserialize($max_version, 'string', 'string');
      $limit = $this->deserialize($limit, 'int', 'string');
      $offset = $this->deserialize($offset, 'int', 'string');
      $flavor = $this->deserialize($flavor, 'string', 'string');
    }
    catch (SerializerRuntimeException $exception)
    {
      return $this->createBadRequestResponse($exception->getMessage());
    }

    // Validate the input values
    $asserts = [];
    $asserts[] = new Assert\Choice(['android', 'iOS']);
    $asserts[] = new Assert\Type('string');
    $response = $this->validate($platform, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }
    $asserts = [];
    $asserts[] = new Assert\Type('string');
    $asserts[] = new Assert\Regex('/[0-9]\\.[0-9]{3}/');
    $response = $this->validate($max_version, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }
    $asserts = [];
    $asserts[] = new Assert\Type('int');
    $asserts[] = new Assert\GreaterThanOrEqual(0);
    $response = $this->validate($limit, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }
    $asserts = [];
    $asserts[] = new Assert\Type('int');
    $asserts[] = new Assert\GreaterThanOrEqual(0);
    $response = $this->validate($offset, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }
    $asserts = [];
    $asserts[] = new Assert\Choice(['pocketcode', 'pocketalice', 'pocketgalaxy', 'pocketphiro', 'phirocode', 'luna', 'create@school', 'embroidery', 'arduino']);
    $asserts[] = new Assert\Type('string');
    $response = $this->validate($flavor, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }

    try
    {
      $handler = $this->getApiHandler();

      // Make the call to the business logic
      $responseCode = 200;
      $responseHeaders = [];
      $result = $handler->projectsFeaturedGet($platform, $max_version, $limit, $offset, $flavor, $responseCode, $responseHeaders);

      // Find default response message
      $message = 'OK';

      // Find a more specific message, if available
      switch ($responseCode) {
                case 200:
                    $message = 'OK';
                    break;
                case 400:
                    $message = 'BAD Request - invalid or missing required parameters';
                    break;
                case 406:
                    $message = 'Not Acceptable - client must accept application/json as content type';
                    break;
            }

      return new Response(
                null !== $result ? $this->serialize($result, $responseFormat) : '',
                $responseCode,
                array_merge(
                    $responseHeaders,
                    [
                      'Content-Type' => $responseFormat,
                      'X-OpenAPI-Message' => $message,
                    ]
                )
            );
    }
    catch (Exception $fallthrough)
    {
      return $this->createErrorResponse(new HttpException(500, 'An unsuspected error occurred.', $fallthrough));
    }
  }

  /**
   * Operation projectsGet.
   *
   * Get projects
   *
   * @param Request $request the Symfony request to handle
   *
   * @return Response the Symfony response
   */
  public function projectsGetAction(Request $request)
  {
    // Figure out what data format to return to the client
    $produces = ['application/json'];
    // Figure out what the client accepts
    $clientAccepts = $request->headers->has('Accept') ? $request->headers->get('Accept') : '*/*';
    $responseFormat = $this->getOutputFormat($clientAccepts, $produces);
    if (null === $responseFormat)
    {
      return new Response('', 406);
    }

    // Handle authentication

    // Read out all input parameter values into variables
    $project_type = $request->query->get('project_type');
    $max_version = $request->query->get('max_version');
    $limit = $request->query->get('limit');
    $offset = $request->query->get('offset');
    $flavor = $request->query->get('flavor');
    $accept_language = $request->headers->get('Accept-Language');

    // Use the default value if no value was provided

    // Deserialize the input values that needs it
    try
    {
      $project_type = $this->deserialize($project_type, 'string', 'string');
      $accept_language = $this->deserialize($accept_language, 'string', 'string');
      $max_version = $this->deserialize($max_version, 'string', 'string');
      $limit = $this->deserialize($limit, 'int', 'string');
      $offset = $this->deserialize($offset, 'int', 'string');
      $flavor = $this->deserialize($flavor, 'string', 'string');
    }
    catch (SerializerRuntimeException $exception)
    {
      return $this->createBadRequestResponse($exception->getMessage());
    }

    // Validate the input values
    $asserts = [];
    $asserts[] = new Assert\NotNull();
    $asserts[] = new Assert\Choice(['recent', 'random', 'mostViewed', 'mostDownloaded', 'example', 'scratch']);
    $asserts[] = new Assert\Type('string');
    $response = $this->validate($project_type, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }
    $asserts = [];
    $asserts[] = new Assert\Type('string');
    $response = $this->validate($accept_language, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }
    $asserts = [];
    $asserts[] = new Assert\Type('string');
    $asserts[] = new Assert\Regex('/[0-9]\\.[0-9]{3}/');
    $response = $this->validate($max_version, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }
    $asserts = [];
    $asserts[] = new Assert\Type('int');
    $asserts[] = new Assert\GreaterThanOrEqual(0);
    $response = $this->validate($limit, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }
    $asserts = [];
    $asserts[] = new Assert\Type('int');
    $asserts[] = new Assert\GreaterThanOrEqual(0);
    $response = $this->validate($offset, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }
    $asserts = [];
    $asserts[] = new Assert\Choice(['pocketcode', 'pocketalice', 'pocketgalaxy', 'pocketphiro', 'phirocode', 'luna', 'create@school', 'embroidery', 'arduino']);
    $asserts[] = new Assert\Type('string');
    $response = $this->validate($flavor, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }

    try
    {
      $handler = $this->getApiHandler();

      // Make the call to the business logic
      $responseCode = 200;
      $responseHeaders = [];
      $result = $handler->projectsGet($project_type, $accept_language, $max_version, $limit, $offset, $flavor, $responseCode, $responseHeaders);

      // Find default response message
      $message = 'OK';

      // Find a more specific message, if available
      switch ($responseCode) {
                case 200:
                    $message = 'OK';
                    break;
                case 400:
                    $message = 'BAD Request - invalid or missing required parameters';
                    break;
                case 406:
                    $message = 'Not Acceptable - client must accept application/json as content type';
                    break;
            }

      return new Response(
                null !== $result ? $this->serialize($result, $responseFormat) : '',
                $responseCode,
                array_merge(
                    $responseHeaders,
                    [
                      'Content-Type' => $responseFormat,
                      'X-OpenAPI-Message' => $message,
                    ]
                )
            );
    }
    catch (Exception $fallthrough)
    {
      return $this->createErrorResponse(new HttpException(500, 'An unsuspected error occurred.', $fallthrough));
    }
  }

  /**
   * Operation projectsPost.
   *
   * Upload a catrobat project
   *
   * @param Request $request the Symfony request to handle
   *
   * @return Response the Symfony response
   */
  public function projectsPostAction(Request $request)
  {
    // Figure out what data format to return to the client
    $produces = ['application/json'];
    // Figure out what the client accepts
    $clientAccepts = $request->headers->has('Accept') ? $request->headers->get('Accept') : '*/*';
    $responseFormat = $this->getOutputFormat($clientAccepts, $produces);
    if (null === $responseFormat)
    {
      return new Response('', 406);
    }

    // Handle authentication
    // Authentication 'PandaAuth' required
    // HTTP basic authentication required
    $securityPandaAuth = $request->headers->get('authorization');

    // Read out all input parameter values into variables
    $accept_language = $request->headers->get('Accept-Language');
    $checksum = $request->request->get('checksum');
    $file = $request->files->get('file');
    $flavor = $request->request->get('flavor');
    $tags = $request->request->get('tags');
    $private = $request->request->get('private');

    // Use the default value if no value was provided

    // Deserialize the input values that needs it
    try
    {
      $accept_language = $this->deserialize($accept_language, 'string', 'string');
      $checksum = $this->deserialize($checksum, 'string', 'string');
      $flavor = $this->deserialize($flavor, 'string', 'string');
      $tags = $this->deserialize($tags, 'array<csv,string>', 'string');
      $private = $this->deserialize($private, 'bool', 'string');
    }
    catch (SerializerRuntimeException $exception)
    {
      return $this->createBadRequestResponse($exception->getMessage());
    }

    // Validate the input values
    $asserts = [];
    $asserts[] = new Assert\Type('string');
    $response = $this->validate($accept_language, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }
    $asserts = [];
    $asserts[] = new Assert\Type('string');
    $response = $this->validate($checksum, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }
    $asserts = [];
    $asserts[] = new Assert\File();
    $response = $this->validate($file, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }
    $asserts = [];
    $asserts[] = new Assert\Choice(['pocketcode', 'pocketalice', 'pocketgalaxy', 'pocketphiro', 'phirocode', 'luna', 'create@school', 'embroidery', 'arduino']);
    $asserts[] = new Assert\Type('string');
    $response = $this->validate($flavor, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }
    $asserts = [];
    $asserts[] = new Assert\All([
      new Assert\Choice([]),
    ]);
    $asserts[] = new Assert\All([
      new Assert\Type('string'),
    ]);
    $response = $this->validate($tags, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }
    $asserts = [];
    $asserts[] = new Assert\Type('bool');
    $response = $this->validate($private, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }

    try
    {
      $handler = $this->getApiHandler();

      // Set authentication method 'PandaAuth'
      $handler->setPandaAuth($securityPandaAuth);

      // Make the call to the business logic
      $responseCode = 200;
      $responseHeaders = [];
      $result = $handler->projectsPost($accept_language, $checksum, $file, $flavor, $tags, $private, $responseCode, $responseHeaders);

      // Find default response message
      $message = 'Project successfully uploaded.';

      // Find a more specific message, if available
      switch ($responseCode) {
                case 201:
                    $message = 'Project successfully uploaded.';
                    break;
                case 400:
                    $message = 'BAD Request - invalid or missing required parameters';
                    break;
                case 401:
                    $message = 'Invalid JWT token | JWT token not found | JWT token expired';
                    break;
                case 422:
                    $message = 'Upload Error';
                    break;
            }

      return new Response(
                null !== $result ? $this->serialize($result, $responseFormat) : '',
                $responseCode,
                array_merge(
                    $responseHeaders,
                    [
                      'Content-Type' => $responseFormat,
                      'X-OpenAPI-Message' => $message,
                    ]
                )
            );
    }
    catch (Exception $fallthrough)
    {
      return $this->createErrorResponse(new HttpException(500, 'An unsuspected error occurred.', $fallthrough));
    }
  }

  /**
   * Operation projectsSearchGet.
   *
   * Search for projects associated with a keywords
   *
   * @param Request $request the Symfony request to handle
   *
   * @return Response the Symfony response
   */
  public function projectsSearchGetAction(Request $request)
  {
    // Figure out what data format to return to the client
    $produces = ['application/json'];
    // Figure out what the client accepts
    $clientAccepts = $request->headers->has('Accept') ? $request->headers->get('Accept') : '*/*';
    $responseFormat = $this->getOutputFormat($clientAccepts, $produces);
    if (null === $responseFormat)
    {
      return new Response('', 406);
    }

    // Handle authentication

    // Read out all input parameter values into variables
    $query_string = $request->query->get('query_string');
    $max_version = $request->query->get('max_version');
    $limit = $request->query->get('limit');
    $offset = $request->query->get('offset');
    $flavor = $request->query->get('flavor');

    // Use the default value if no value was provided

    // Deserialize the input values that needs it
    try
    {
      $query_string = $this->deserialize($query_string, 'string', 'string');
      $max_version = $this->deserialize($max_version, 'string', 'string');
      $limit = $this->deserialize($limit, 'int', 'string');
      $offset = $this->deserialize($offset, 'int', 'string');
      $flavor = $this->deserialize($flavor, 'string', 'string');
    }
    catch (SerializerRuntimeException $exception)
    {
      return $this->createBadRequestResponse($exception->getMessage());
    }

    // Validate the input values
    $asserts = [];
    $asserts[] = new Assert\NotNull();
    $asserts[] = new Assert\Type('string');
    $response = $this->validate($query_string, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }
    $asserts = [];
    $asserts[] = new Assert\Type('string');
    $asserts[] = new Assert\Regex('/[0-9]\\.[0-9]{3}/');
    $response = $this->validate($max_version, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }
    $asserts = [];
    $asserts[] = new Assert\Type('int');
    $asserts[] = new Assert\GreaterThanOrEqual(0);
    $response = $this->validate($limit, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }
    $asserts = [];
    $asserts[] = new Assert\Type('int');
    $asserts[] = new Assert\GreaterThanOrEqual(0);
    $response = $this->validate($offset, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }
    $asserts = [];
    $asserts[] = new Assert\Choice(['pocketcode', 'pocketalice', 'pocketgalaxy', 'pocketphiro', 'phirocode', 'luna', 'create@school', 'embroidery', 'arduino']);
    $asserts[] = new Assert\Type('string');
    $response = $this->validate($flavor, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }

    try
    {
      $handler = $this->getApiHandler();

      // Make the call to the business logic
      $responseCode = 200;
      $responseHeaders = [];
      $result = $handler->projectsSearchGet($query_string, $max_version, $limit, $offset, $flavor, $responseCode, $responseHeaders);

      // Find default response message
      $message = 'OK';

      // Find a more specific message, if available
      switch ($responseCode) {
                case 200:
                    $message = 'OK';
                    break;
                case 400:
                    $message = 'BAD Request - invalid or missing required parameters';
                    break;
                case 406:
                    $message = 'Not Acceptable - client must accept application/json as content type';
                    break;
            }

      return new Response(
                null !== $result ? $this->serialize($result, $responseFormat) : '',
                $responseCode,
                array_merge(
                    $responseHeaders,
                    [
                      'Content-Type' => $responseFormat,
                      'X-OpenAPI-Message' => $message,
                    ]
                )
            );
    }
    catch (Exception $fallthrough)
    {
      return $this->createErrorResponse(new HttpException(500, 'An unsuspected error occurred.', $fallthrough));
    }
  }

  /**
   * Operation projectsUserGet.
   *
   * Get the projects of the logged in user
   *
   * @param Request $request the Symfony request to handle
   *
   * @return Response the Symfony response
   */
  public function projectsUserGetAction(Request $request)
  {
    // Figure out what data format to return to the client
    $produces = ['application/json'];
    // Figure out what the client accepts
    $clientAccepts = $request->headers->has('Accept') ? $request->headers->get('Accept') : '*/*';
    $responseFormat = $this->getOutputFormat($clientAccepts, $produces);
    if (null === $responseFormat)
    {
      return new Response('', 406);
    }

    // Handle authentication
    // Authentication 'PandaAuth' required
    // HTTP basic authentication required
    $securityPandaAuth = $request->headers->get('authorization');

    // Read out all input parameter values into variables
    $max_version = $request->query->get('max_version');
    $limit = $request->query->get('limit');
    $offset = $request->query->get('offset');
    $flavor = $request->query->get('flavor');

    // Use the default value if no value was provided

    // Deserialize the input values that needs it
    try
    {
      $max_version = $this->deserialize($max_version, 'string', 'string');
      $limit = $this->deserialize($limit, 'int', 'string');
      $offset = $this->deserialize($offset, 'int', 'string');
      $flavor = $this->deserialize($flavor, 'string', 'string');
    }
    catch (SerializerRuntimeException $exception)
    {
      return $this->createBadRequestResponse($exception->getMessage());
    }

    // Validate the input values
    $asserts = [];
    $asserts[] = new Assert\Type('string');
    $asserts[] = new Assert\Regex('/[0-9]\\.[0-9]{3}/');
    $response = $this->validate($max_version, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }
    $asserts = [];
    $asserts[] = new Assert\Type('int');
    $asserts[] = new Assert\GreaterThanOrEqual(0);
    $response = $this->validate($limit, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }
    $asserts = [];
    $asserts[] = new Assert\Type('int');
    $asserts[] = new Assert\GreaterThanOrEqual(0);
    $response = $this->validate($offset, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }
    $asserts = [];
    $asserts[] = new Assert\Choice(['pocketcode', 'pocketalice', 'pocketgalaxy', 'pocketphiro', 'phirocode', 'luna', 'create@school', 'embroidery', 'arduino']);
    $asserts[] = new Assert\Type('string');
    $response = $this->validate($flavor, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }

    try
    {
      $handler = $this->getApiHandler();

      // Set authentication method 'PandaAuth'
      $handler->setPandaAuth($securityPandaAuth);

      // Make the call to the business logic
      $responseCode = 200;
      $responseHeaders = [];
      $result = $handler->projectsUserGet($max_version, $limit, $offset, $flavor, $responseCode, $responseHeaders);

      // Find default response message
      $message = 'Valid request';

      // Find a more specific message, if available
      switch ($responseCode) {
                case 200:
                    $message = 'Valid request';
                    break;
                case 400:
                    $message = 'BAD Request - invalid or missing required parameters';
                    break;
                case 401:
                    $message = 'Invalid JWT token | JWT token not found | JWT token expired';
                    break;
                case 406:
                    $message = 'Not Acceptable - client must accept application/json as content type';
                    break;
            }

      return new Response(
                null !== $result ? $this->serialize($result, $responseFormat) : '',
                $responseCode,
                array_merge(
                    $responseHeaders,
                    [
                      'Content-Type' => $responseFormat,
                      'X-OpenAPI-Message' => $message,
                    ]
                )
            );
    }
    catch (Exception $fallthrough)
    {
      return $this->createErrorResponse(new HttpException(500, 'An unsuspected error occurred.', $fallthrough));
    }
  }

  /**
   * Operation projectsUserUserIdGet.
   *
   * Get the public projects of a given user
   *
   * @param Request $request the Symfony request to handle
   * @param mixed   $user_id
   *
   * @return Response the Symfony response
   */
  public function projectsUserUserIdGetAction(Request $request, $user_id)
  {
    // Figure out what data format to return to the client
    $produces = ['application/json'];
    // Figure out what the client accepts
    $clientAccepts = $request->headers->has('Accept') ? $request->headers->get('Accept') : '*/*';
    $responseFormat = $this->getOutputFormat($clientAccepts, $produces);
    if (null === $responseFormat)
    {
      return new Response('', 406);
    }

    // Handle authentication

    // Read out all input parameter values into variables
    $max_version = $request->query->get('max_version');
    $limit = $request->query->get('limit');
    $offset = $request->query->get('offset');
    $flavor = $request->query->get('flavor');

    // Use the default value if no value was provided

    // Deserialize the input values that needs it
    try
    {
      $user_id = $this->deserialize($user_id, 'string', 'string');
      $max_version = $this->deserialize($max_version, 'string', 'string');
      $limit = $this->deserialize($limit, 'int', 'string');
      $offset = $this->deserialize($offset, 'int', 'string');
      $flavor = $this->deserialize($flavor, 'string', 'string');
    }
    catch (SerializerRuntimeException $exception)
    {
      return $this->createBadRequestResponse($exception->getMessage());
    }

    // Validate the input values
    $asserts = [];
    $asserts[] = new Assert\NotNull();
    $asserts[] = new Assert\Type('string');
    $asserts[] = new Assert\Regex('/^[a-zA-Z0-9-]+$/');
    $response = $this->validate($user_id, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }
    $asserts = [];
    $asserts[] = new Assert\Type('string');
    $asserts[] = new Assert\Regex('/[0-9]\\.[0-9]{3}/');
    $response = $this->validate($max_version, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }
    $asserts = [];
    $asserts[] = new Assert\Type('int');
    $asserts[] = new Assert\GreaterThanOrEqual(0);
    $response = $this->validate($limit, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }
    $asserts = [];
    $asserts[] = new Assert\Type('int');
    $asserts[] = new Assert\GreaterThanOrEqual(0);
    $response = $this->validate($offset, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }
    $asserts = [];
    $asserts[] = new Assert\Choice(['pocketcode', 'pocketalice', 'pocketgalaxy', 'pocketphiro', 'phirocode', 'luna', 'create@school', 'embroidery', 'arduino']);
    $asserts[] = new Assert\Type('string');
    $response = $this->validate($flavor, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }

    try
    {
      $handler = $this->getApiHandler();

      // Make the call to the business logic
      $responseCode = 200;
      $responseHeaders = [];
      $result = $handler->projectsUserUserIdGet($user_id, $max_version, $limit, $offset, $flavor, $responseCode, $responseHeaders);

      // Find default response message
      $message = 'Valid request';

      // Find a more specific message, if available
      switch ($responseCode) {
                case 200:
                    $message = 'Valid request';
                    break;
                case 400:
                    $message = 'BAD Request - invalid or missing required parameters';
                    break;
                case 404:
                    $message = 'Not Found';
                    break;
                case 406:
                    $message = 'Not Acceptable - client must accept application/json as content type';
                    break;
            }

      return new Response(
                null !== $result ? $this->serialize($result, $responseFormat) : '',
                $responseCode,
                array_merge(
                    $responseHeaders,
                    [
                      'Content-Type' => $responseFormat,
                      'X-OpenAPI-Message' => $message,
                    ]
                )
            );
    }
    catch (Exception $fallthrough)
    {
      return $this->createErrorResponse(new HttpException(500, 'An unsuspected error occurred.', $fallthrough));
    }
  }

  /**
   * Returns the handler for this API controller.
   *
   * @return ProjectsApiInterface
   */
  public function getApiHandler()
  {
    return $this->apiServer->getApiHandler('projects');
  }
}
