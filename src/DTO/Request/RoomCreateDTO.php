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
     * @Assert\Length(min=3)
     */
    private $topic;

    /**
     * @var string
     *
     * @Assert\Type(type="string", groups={"type"})
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
     * @var bool
     *
     * @Assert\Type(type="bool", groups={"type"})
     * @Assert\NotBlank()
     */
    private $isDirect;

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
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @param string $topic
     */
    public function setTopic($topic) : void
    {
        $this->topic = $topic;
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
     * @return bool
     */
    public function isDirect()
    {
        return $this->isDirect;
    }

    /**
     * @param bool $isDirect
     */
    public function setIsDirect($isDirect) : void
    {
        $this->isDirect = $isDirect;
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
}
