<?php

namespace Scaleplan\Matrix\DTO\Request;

use Scaleplan\DTO\DTO;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class RoomCreateDTO
 *
 * @package Scaleplan\Matrix\DTO\Request
 */
class RoomCreateDTO extends DTO
{
    /**
     * @var string
     *
     * @Assert\Type(type="string", groups={"type"})
     * @Assert\NotBlank()
     * @Assert\Length(min=3)
     */
    private $name;

    /**
     * @var string
     *
     * @Assert\Type(type="string", groups={"type"})
     * @Assert\NotBlank()
     * @Assert\Length(min=4)
     * @Assert\Regex(pattern="/^#.+/")
     */
    private $roomAliasName;

    /**
     * @var string[]
     *
     * @Assert\Type(type="array", groups={"type"})
     * @Assert\All({
     *     @Assert\Type(type="string")
     *     @Assert\NotBlank()
     *     @Assert\Length(min=4)
     *     @Assert\Regex(pattern="/^@.+/")
     * })
     */
    private $invite;

    /**
     * @var string
     *
     * @Assert\Type(type="string", groups={"type"})
     * @Assert\Choice(choices="\Scaleplan\Matrix\Constants\Visibility")
     */
    private $visibility;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name) : void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getRoomAliasName()
    {
        return $this->roomAliasName;
    }

    /**
     * @param string $roomAliasName
     */
    public function setRoomAliasName($roomAliasName) : void
    {
        $this->roomAliasName = $roomAliasName;
    }

    /**
     * @return string[]
     */
    public function getInvite()
    {
        return $this->invite;
    }

    /**
     * @param string[] $invite
     */
    public function setInvite($invite) : void
    {
        $this->invite = $invite;
    }

    /**
     * @return string
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * @param string $visibility
     */
    public function setVisibility($visibility) : void
    {
        $this->visibility = $visibility;
    }
}
