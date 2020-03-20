<?php

/**
 * AuthenticationController
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
use OpenAPI\Server\Api\AuthenticationApiInterface;
use OpenAPI\Server\Model\Login;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * AuthenticationController Class Doc Comment.
 *
 * @category Class
 *
 * @author   OpenAPI Generator team
 *
 * @see     https://github.com/openapitools/openapi-generator
 */
class AuthenticationController extends Controller
{
  /**
   * Operation authenticationGet.
   *
   * Check Token
   *
   * @param Request $request the Symfony request to handle
   *
   * @return Response the Symfony response
   */
  public function authenticationGetAction(Request $request)
  {
    // Handle authentication
    // Authentication 'PandaAuth' required
    // HTTP basic authentication required
    $securityPandaAuth = $request->headers->get('authorization');

    // Read out all input parameter values into variables

    // Use the default value if no value was provided

    // Validate the input values

    try
    {
      $handler = $this->getApiHandler();

      // Set authentication method 'PandaAuth'
      $handler->setPandaAuth($securityPandaAuth);

      // Make the call to the business logic
      $responseCode = 204;
      $responseHeaders = [];
      $result = $handler->authenticationGet($responseCode, $responseHeaders);

      // Find default response message
      $message = 'OK';

      // Find a more specific message, if available
      switch ($responseCode) {
                case 200:
                    $message = 'OK';
                    break;
                case 401:
                    $message = 'Invalid JWT token | JWT token not found | JWT token expired';
                    break;
            }

      return new Response(
                '',
                $responseCode,
                array_merge(
                    $responseHeaders,
                    [
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
   * Operation authenticationPost.
   *
   * Login
   *
   * @param Request $request the Symfony request to handle
   *
   * @return Response the Symfony response
   */
  public function authenticationPostAction(Request $request)
  {
    // Make sure that the client is providing something that we can consume
    $consumes = ['application/json'];
    $inputFormat = $request->headers->has('Content-Type') ? $request->headers->get('Content-Type') : $consumes[0];
    if (!in_array($inputFormat, $consumes, true))
    {
      // We can't consume the content that the client is sending us
      return new Response('', 415);
    }

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
    $login = $request->getContent();

    // Use the default value if no value was provided

    // Deserialize the input values that needs it
    try
    {
      $login = $this->deserialize($login, 'OpenAPI\Server\Model\Login', $inputFormat);
    }
    catch (SerializerRuntimeException $exception)
    {
      return $this->createBadRequestResponse($exception->getMessage());
    }

    // Validate the input values
    $asserts = [];
    $asserts[] = new Assert\NotNull();
    $asserts[] = new Assert\Type('OpenAPI\\Server\\Model\\Login');
    $asserts[] = new Assert\Valid();
    $response = $this->validate($login, $asserts);
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
      $result = $handler->authenticationPost($login, $responseCode, $responseHeaders);

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
                case 401:
                    $message = 'Invalid Credentials';
                    break;
                case 406:
                    $message = 'Not Acceptable - client must accept application/json as content type';
                    break;
                case 415:
                    $message = 'Unsupported Media Type - request must use application/json as content type';
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
   * @return AuthenticationApiInterface
   */
  public function getApiHandler()
  {
    return $this->apiServer->getApiHandler('authentication');
  }
}
