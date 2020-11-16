<?php

namespace Scaleplan\Matrix\DTO\Request;

use Scaleplan\DTO\DTO;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class GroupCreateDTO
 *
 * @package Scaleplan\Matrix\DTO\Request
 */
class GroupCreateDTO extends DTO
{
    /**
     * Account ID
     *
     * @var string
     *
     * @Assert\Type(type="string", groups={"type"})
     * @Assert\NotBlank()
     * @Assert\Length(min=3)
     */
    protected $localpart;

    /**
     * @var array
     *
     * @Assert\Type(type="array", groups={"type"})
     * @Assert\Collection(fields = {
     *     "name" = {
     *         @Assert\NotBlank(),
     *         @Assert\Type(type="string"),
     *         @Assert\Length(min=3)
     *     }
     * })
     */
    protected $profile;

    /**
     * @return string
     */
    public function getLocalpart() : string
    {
        return $this->localpart;
    }

    /**
     * @param string $localpart
     */
    public function setLocalpart(string $localpart) : void
    {
        $this->localpart = $localpart;
    }

    /**
     * @return array
     */
    public function getProfile() : array
    {
        return $this->profile;
    }

    /**
     * @param array $profile
     */
    public function setProfile(array $profile) : void
    {
        $this->profile = $profile;
    }
}
