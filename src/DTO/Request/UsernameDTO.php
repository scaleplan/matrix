<?php

namespace Scaleplan\Matrix\DTO\Request;

use Scaleplan\DTO\DTO;
use Scaleplan\Matrix\Traits\DTO\AccessTokenDTOTrait;
use Scaleplan\Matrix\Traits\DTO\UsernameDTOTrait;

/**
 * Class UsernameDTO
 *
 * @package Scaleplan\Matrix\DTO\Request
 */
class UsernameDTO extends DTO
{
    use UsernameDTOTrait, AccessTokenDTOTrait;
}
