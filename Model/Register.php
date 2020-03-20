<?php
/**
 * Register.
 *
 * PHP version 5
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

namespace OpenAPI\Server\Model;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class representing the Register model.
 *
 * @author  OpenAPI Generator team
 */
class Register
{
  /**
   * Indicates wether sent user should be verified or registerd.
   *
   * @var bool|null
   * @SerializedName("dry-run")
   * @Assert\Type("bool")
   * @Type("bool")
   */
  protected $dry_run;

  /**
   * EMail of the user.
   *
   * @var string|null
   * @SerializedName("email")
   * @Assert\Type("string")
   * @Type("string")
   */
  protected $email;

  /**
   * Name of the user | minLength: 3 |maxLength: 180.
   *
   * @var string|null
   * @SerializedName("username")
   * @Assert\Type("string")
   * @Type("string")
   */
  protected $username;

  /**
   * A secure password | minLength: 6 | maxLength: 4096.
   *
   * @var string|null
   * @SerializedName("password")
   * @Assert\Type("string")
   * @Type("string")
   */
  protected $password;

  /**
   * Constructor.
   *
   * @param mixed[] $data Associated array of property values initializing the model
   */
  public function __construct(array $data = null)
  {
    $this->dry_run = isset($data['dry_run']) ? $data['dry_run'] : false;
    $this->email = isset($data['email']) ? $data['email'] : null;
    $this->username = isset($data['username']) ? $data['username'] : null;
    $this->password = isset($data['password']) ? $data['password'] : null;
  }

  /**
   * Gets dry_run.
   *
   * @return bool|null
   */
  public function isDryRun()
  {
    return $this->dry_run;
  }

  /**
   * Sets dry_run.
   *
   * @param bool|null $dry_run indicates wether sent user should be verified or registerd
   *
   * @return $this
   */
  public function setDryRun(bool $dry_run = null)
  {
    $this->dry_run = $dry_run;

    return $this;
  }

  /**
   * Gets email.
   *
   * @return string|null
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Sets email.
   *
   * @param string|null $email EMail of the user
   *
   * @return $this
   */
  public function setEmail(string $email = null)
  {
    $this->email = $email;

    return $this;
  }

  /**
   * Gets username.
   *
   * @return string|null
   */
  public function getUsername()
  {
    return $this->username;
  }

  /**
   * Sets username.
   *
   * @param string|null $username Name of the user | minLength: 3 |maxLength: 180
   *
   * @return $this
   */
  public function setUsername(string $username = null)
  {
    $this->username = $username;

    return $this;
  }

  /**
   * Gets password.
   *
   * @return string|null
   */
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * Sets password.
   *
   * @param string|null $password A secure password | minLength: 6 | maxLength: 4096
   *
   * @return $this
   */
  public function setPassword(string $password = null)
  {
    $this->password = $password;

    return $this;
  }
}
