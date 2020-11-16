<?php

namespace Scaleplan\Matrix\Traits\DTO;

/**
 * Trait UsernameDTOTrait
 *
 * @package Scaleplan\Matrix\Traits\DTO
 */
trait UsernameDTOTrait
{
    /**
     * @var string
     *
     * @Assert\Type(type="string", groups={"type"})
     * @Assert\NotBlank()
     * @Assert\Length(min=3)
     */
    protected $username;

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username) : void
    {
        $this->username = $username;
    }
}
