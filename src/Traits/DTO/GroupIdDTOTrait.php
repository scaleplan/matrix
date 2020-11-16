<?php

namespace Scaleplan\Matrix\Traits\DTO;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait GroupIdDTOTrait
 *
 * @package Scaleplan\Matrix\Traits\DTO
 */
trait GroupIdDTOTrait
{
    /**
     * @var string
     *
     * @Assert\Type(type="string", groups={"type"})
     * @Assert\NotBlank()
     * @Assert\Length(min=4)
     * @Assert\Regex(pattern="/^\+.+/")
     */
    private $groupId;

    /**
     * @return string
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @param string $groupId
     */
    public function setGroupId($groupId) : void
    {
        $this->groupId = $groupId;
    }
}
