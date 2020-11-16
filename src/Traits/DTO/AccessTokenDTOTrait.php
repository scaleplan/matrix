<?php

namespace Scaleplan\Matrix\Traits\DTO;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait AccessTokenDTOTrait
 *
 * @package Scaleplan\Matrix\Traits\DTO
 */
trait AccessTokenDTOTrait
{
    /**
     * @var string
     *
     * @Assert\Type(type="string", groups={"type"})
     * @Assert\NotBlank()
     */
    private $accessToken;

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken($accessToken) : void
    {
        $this->accessToken = $accessToken;
    }
}
