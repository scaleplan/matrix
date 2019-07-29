<?php

namespace Scaleplan\Matrix\DTO\Request;

use Scaleplan\DTO\DTO;
use Scaleplan\Matrix\Traits\DTO\GroupIdDTOTrait;
use Scaleplan\Matrix\Traits\DTO\UserIdDTOTrait;

/**
 * Class UserGroupDTO
 *
 * @package Scaleplan\Matrix\DTO\Request
 */
class UserGroupDTO extends DTO
{
    use UserIdDTOTrait, GroupIdDTOTrait;
}
