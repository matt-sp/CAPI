<?php
/**
 * InlineObject1
 *
 * PHP version 5
 *
 * @category Class
 * @package  OpenAPI\Server\Model
 * @author   OpenAPI Generator team
 * @link     https://github.com/openapitools/openapi-generator
 */

/**
 * Catroweb API
 *
 * API for the Catrobat Share Platform
 *
 * The version of the OpenAPI document: 0.0.1
 * Contact: webmaster@catrobat.org
 * Generated by: https://github.com/openapitools/openapi-generator.git
 *
 */

/**
 * NOTE: This class is auto generated by the openapi generator program.
 * https://github.com/openapitools/openapi-generator
 * Do not edit the class manually.
 */

namespace OpenAPI\Server\Model;

use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class representing the InlineObject1 model.
 *
 * @package OpenAPI\Server\Model
 * @author  OpenAPI Generator team
 */
class InlineObject1 
{
        /**
     * Upload token of the user
     *
     * @var string|null
     * @SerializedName("token")
     * @Assert\Type("string")
     * @Type("string")
     */
    protected $token;

    /**
     * Checksum of the *.catrobat file
     *
     * @var string|null
     * @SerializedName("checksum")
     * @Assert\Type("string")
     * @Type("string")
     */
    protected $checksum;

    /**
     * *.catrobat file
     *
     * @var UploadedFile|null
     * @SerializedName("file")
     * @Assert\Type("UploadedFile")
     * @Type("UploadedFile")
     */
    protected $file;

    /**
     * The flavor the uploaded program is associated with.
     *
     * @var string|null
     * @SerializedName("flavor")
     * @Assert\Type("string")
     * @Type("string")
     */
    protected $flavor;

    /**
     * Constructor
     * @param mixed[] $data Associated array of property values initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->token = isset($data['token']) ? $data['token'] : null;
        $this->checksum = isset($data['checksum']) ? $data['checksum'] : null;
        $this->file = isset($data['file']) ? $data['file'] : null;
        $this->flavor = isset($data['flavor']) ? $data['flavor'] : 'pocketcode';
    }

    /**
     * Gets token.
     *
     * @return string|null
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Sets token.
     *
     * @param string|null $token  Upload token of the user
     *
     * @return $this
     */
    public function setToken($token = null)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Gets checksum.
     *
     * @return string|null
     */
    public function getChecksum()
    {
        return $this->checksum;
    }

    /**
     * Sets checksum.
     *
     * @param string|null $checksum  Checksum of the *.catrobat file
     *
     * @return $this
     */
    public function setChecksum($checksum = null)
    {
        $this->checksum = $checksum;

        return $this;
    }

    /**
     * Gets file.
     *
     * @return UploadedFile|null
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Sets file.
     *
     * @param UploadedFile|null $file  *.catrobat file
     *
     * @return $this
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Gets flavor.
     *
     * @return string|null
     */
    public function getFlavor()
    {
        return $this->flavor;
    }

    /**
     * Sets flavor.
     *
     * @param string|null $flavor  The flavor the uploaded program is associated with.
     *
     * @return $this
     */
    public function setFlavor($flavor = null)
    {
        $this->flavor = $flavor;

        return $this;
    }
}

