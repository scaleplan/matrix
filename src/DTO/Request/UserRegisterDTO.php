<?php

namespace Scaleplan\Matrix\DTO\Request;

use Scaleplan\DTO\DTO;
use Scaleplan\Matrix\Traits\DTO\NonceDTOTrait;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class UserRegisterDTO
 *
 * @package Scaleplan\Matrix\DTO\Request
 */
class UserRegisterDTO extends DTO
{
    use NonceDTOTrait;

    /**
     * @var string
     *
     * @Assert\Type(type="string", groups={"type"})
     * @Assert\NotBlank()
     * @Assert\Length(min=3)
     */
    protected $username;

    /**
     * @var string
     *
     * @Assert\Type(type="string", groups={"type"})
     * @Assert\NotBlank()
     * @Assert\Length(min=6)
     */
    protected $password;

    /**
     * @var bool
     *
     * @Assert\Type(type="bool",groups={"type"})
     * @Assert\NotNull()
     */
    protected $admin;

    /**
     * @var string
     *
     * @Assert\Type(type="string", groups={"type"})
     * @Assert\NotBlank()
     */
    protected $mac;

    /**
     * @return string
     */
    public function getNonce()
    {
        return $this->nonce;
    }

    /**
     * @param string $nonce
     */
    public function setNonce($nonce) : void
    {
        $this->nonce = $nonce;
    }

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

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password) : void
    {
        $this->password = $password;
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return $this->admin;
    }

    /**
     * @param bool $admin
     */
    public function setAdmin($admin) : void
    {
        $this->admin = $admin;
    }

    /**
     * @return string
     */
    public function getMac()
    {
        return $this->mac;
    }

    /**
     * @param string $mac
     */
    public function setMac($mac) : void
    {
        $this->mac = $mac;
    }
}
