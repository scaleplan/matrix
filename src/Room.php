<?php

namespace Scaleplan\Matrix;

use Scaleplan\Http\Interfaces\RemoteResponseInterface;
use Scaleplan\Matrix\Constants\Preset;
use Scaleplan\Matrix\Constants\Visibility;
use Scaleplan\Matrix\DTO\Request\RoomCreateDTO;
use Scaleplan\Matrix\DTO\Request\UserRoomDTO;
use Scaleplan\Matrix\DTO\Response\RoomDTO;

/**
 * Class Room
 *
 * @package Scaleplan\Matrix
 */
class Room extends AbstractAPI
{
    /**
     * @param RoomCreateDTO $dto
     *
     * @return RemoteResponseInterface
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
    public function create(RoomCreateDTO $dto) : RemoteResponseInterface
    {
        $data = array_merge(
            $dto->toSnakeArray(),
            [
                'creation_content' => [
                    'm.federate' => false,
                ],
                'preset'           => $dto->getRoomAliasName() ? Preset::PUBLIC_CHAT : Preset::PRIVATE_CHAT,
                'visibility' => $dto->getRoomAliasName() ? Visibility::PUBLIC : Visibility::PRIVATE,
            ]
        );
        return $this->api->post('/createRoom', $data, RoomDTO::class);
    }

    /**
     * @param UserRoomDTO $dto
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
    public function invite(UserRoomDTO $dto) : RemoteResponseInterface
    {
        return $this->api->post("/rooms/{$dto->getRoomId()}/invite", ['user_id' => $dto->getUserId()]);
    }

    /**
     * @param UserRoomDTO $dto
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
    public function kick(UserRoomDTO $dto) : RemoteResponseInterface
    {
        return $this->api->post("/rooms/{$dto->getRoomId()}/kick", ['user_id' => $dto->getUserId()]);
    }
}
