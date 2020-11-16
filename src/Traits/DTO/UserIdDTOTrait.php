<?php

namespace Scaleplan\Matrix\Traits\DTO;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class UserIdDTOTrait
 *
 * @package Scaleplan\Matrix\Traits\DTO
 */
trait UserIdDTOTrait
{
    /**
     * @var string
     *
     * @Assert\Type(type="string", groups={"type"})
     * @Assert\NotBlank()
     * @Assert\Length(min=4)
     * @Assert\Regex(pattern="/^@.+/")
     */
    private $userId;

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId($userId) : void
    {
        $this->userId = $userId;
    }
}
