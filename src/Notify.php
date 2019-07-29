<?php

namespace Scaleplan\Matrix;

use Scaleplan\Http\Interfaces\RemoteResponseInterface;
use Scaleplan\Matrix\DTO\Request\NotifyToRoomDTO;

/**
 * Class Notify
 *
 * @package Scaleplan\Matrix
 */
class Notify extends AbstractAPI
{
    /**
     * @param NotifyToRoomDTO $dto
     *
     * @return RemoteResponseInterface
     *
     * @throws \ReflectionException
     * @throws \Scaleplan\DTO\Exceptions\ValidationException
     * @throws \Scaleplan\DependencyInjection\Exceptions\ContainerTypeNotSupportingException
     * @throws \Scaleplan\DependencyInjection\Exceptions\DependencyInjectionException
     * @throws \Scaleplan\DependencyInjection\Exceptions\ParameterMustBeInterfaceNameOrClassNameException
     * @throws \Scaleplan\DependencyInjection\Exceptions\ReturnTypeMustImplementsInterfaceException
     * @throws \Scaleplan\Helpers\Exceptions\EnvNotFoundException
     * @throws \Scaleplan\Http\Exceptions\ClassMustBeDTOException
     * @throws \Scaleplan\Http\Exceptions\HttpException
     * @throws \Scaleplan\Http\Exceptions\RemoteServiceNotAvailableException
     */
    public function notifyToRoom(NotifyToRoomDTO $dto) : RemoteResponseInterface
    {
        $transactionId = microtime();
        $data = ['body' => $dto->getBody(), 'msgtype' => 'm.text'];

        return $this->api->put("/rooms/{$dto->getRoomId()}/send/m.room.message/$transactionId", $data);
    }
}
