<?php

namespace Scaleplan\Matrix\Traits\DTO;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait NonceDTOTrait
 *
 * @package Scaleplan\Matrix\Traits\DTO
 */
trait NonceDTOTrait
{
    /**
     * @var string
     *
     * @Assert\Type(type="string", groups={"type"})
     * @Assert\NotBlank()
     */
    protected $nonce;

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
}
