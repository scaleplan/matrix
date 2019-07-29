<?php

namespace Scaleplan\Matrix\DTO\Request;

use Scaleplan\DTO\DTO;
use Scaleplan\Matrix\Traits\DTO\AccessTokenDTOTrait;
use Scaleplan\Matrix\Traits\DTO\UserIdDTOTrait;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class UserAvatarDTO
 *
 * @package Scaleplan\Matrix\DTO\Request
 */
class UserAvatarDTO extends DTO
{
    use UserIdDTOTrait, AccessTokenDTOTrait;

    /**
     * @var string
     *
     * @Assert\Type(type="string", groups={"type"})
     * @Assert\NotBlank()
     */
    private $avatarUrl;

    /**
     * @return string
     */
    public function getAvatarUrl()
    {
        return $this->avatarUrl;
    }

    /**
     * @param string $avatarUrl
     */
    public function setAvatarUrl($avatarUrl) : void
    {
        $this->avatarUrl = $avatarUrl;
    }
}
