<?php

namespace Scaleplan\Matrix\DTO\Response;

use Scaleplan\DTO\DTO;
use Scaleplan\Matrix\Traits\DTO\AccessTokenDTOTrait;
use Scaleplan\Matrix\Traits\DTO\UserIdDTOTrait;

/**
 * Class UserDTO
 *
 * @package Scaleplan\Matrix\DTO\Response
 */
class UserDTO extends DTO
{
    use AccessTokenDTOTrait, UserIdDTOTrait;
}
