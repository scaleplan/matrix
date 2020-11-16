<?php

namespace Scaleplan\Matrix\DTO\Request;

use Scaleplan\DTO\DTO;
use Scaleplan\Matrix\Traits\DTO\NonceDTOTrait;
use Scaleplan\Matrix\Traits\DTO\UsernameDTOTrait;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class UserRegisterDTO
 *
 * @package Scaleplan\Matrix\DTO\Request
 */
class UserRegisterDTO extends DTO
{
    use NonceDTOTrait, UsernameDTOTrait;

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
    protected $isAdmin;

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
        return $this->isAdmin;
    }

    /**
     * @param bool $isAdmin
     */
    public function setIsAdmin($isAdmin) : void
    {
        $this->isAdmin = $isAdmin;
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
