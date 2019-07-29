<?php

namespace Scaleplan\Matrix\DTO\Request;

use Scaleplan\DTO\DTO;
use Scaleplan\Matrix\Traits\DTO\RoomIdDTOTrait;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class NotifyToRoomDTO
 *
 * @package Scaleplan\Matrix\DTO\Request
 */
class NotifyToRoomDTO extends DTO
{
    use RoomIdDTOTrait;

    /**
     * @var string
     *
     * @Assert\Type(type="string", groups={"type"})
     * @Assert\NotBlank()
     * @Assert\Length(min=2)
     */
    private $body;

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody($body) : void
    {
        $this->body = $body;
    }
}
