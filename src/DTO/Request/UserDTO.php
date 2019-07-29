<?php

namespace Scaleplan\Matrix\DTO\Request;

use Scaleplan\DTO\DTO;
use Scaleplan\Matrix\Traits\DTO\AccessTokenDTOTrait;
use Scaleplan\Matrix\Traits\DTO\UserIdDTOTrait;

/**
 * Class UserDTO
 *
 * @package Scaleplan\Matrix\DTO\Request
 */
class UserDTO extends DTO
{
    use AccessTokenDTOTrait, UserIdDTOTrait;
}
