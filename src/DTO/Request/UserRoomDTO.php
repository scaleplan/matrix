<?php

namespace Scaleplan\Matrix\DTO\Request;

use Scaleplan\DTO\DTO;
use Scaleplan\Matrix\Traits\DTO\RoomIdDTOTrait;
use Scaleplan\Matrix\Traits\DTO\UserIdDTOTrait;

/**
 * Class UserGroupDTO
 *
 * @package Scaleplan\Matrix\DTO\Request
 */
class UserRoomDTO extends DTO
{
    use UserIdDTOTrait, RoomIdDTOTrait;
}
