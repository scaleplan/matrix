<?php

namespace Scaleplan\Matrix\Traits\DTO;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait RoomIdDTOTrait
 *
 * @package Scaleplan\Matrix\Traits\DTO
 */
trait RoomIdDTOTrait
{
    /**
     * @var string
     *
     * @Assert\Type(type="string", groups={"type"})
     * @Assert\NotBlank()
     * @Assert\Length(min=4)
     * @Assert\Regex(pattern="/^!.+/")
     */
    private $roomId;

    /**
     * @return string
     */
    public function getRoomId()
    {
        return $this->roomId;
    }

    /**
     * @param string $roomId
     */
    public function setRoomId($roomId) : void
    {
        $this->roomId = $roomId;
    }
}
