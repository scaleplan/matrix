<?php

namespace Scaleplan\Matrix;

use Scaleplan\Http\Interfaces\RemoteResponseInterface;
use Scaleplan\Matrix\DTO\Request\GroupCreateDTO;
use Scaleplan\Matrix\DTO\Request\GroupRemoveDTO;
use Scaleplan\Matrix\DTO\Request\UserGroupDTO;
use Scaleplan\Matrix\Transport\AdminTransport;

/**
 * Class Group
 *
 * @package Scaleplan\Matrix
 */
class Group extends AbstractAPI
{
    /**
     * @var AdminTransport
     */
    private $adminApi;

    /**
     * Account constructor.
     * @throws \Scaleplan\Helpers\Exceptions\EnvNotFoundException
     */
    public function __construct()
    {
        parent::__construct();
        $this->adminApi = new AdminTransport();
    }

    /**
     * @param GroupCreateDTO $dto
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
    public function create(GroupCreateDTO $dto) : RemoteResponseInterface
    {
        return $this->api->post('/create_group', $dto);
    }

    /**
     * @param GroupRemoveDTO $dto
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
    public function remove(GroupRemoveDTO $dto) : RemoteResponseInterface
    {
        return $this->adminApi->post("/delete_group{$dto->getGroupId()}");
    }

    /**
     * @param UserGroupDTO $dto
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
    public function invite(UserGroupDTO $dto) : RemoteResponseInterface
    {
        return $this->api->put("/groups/{$dto->getGroupId()}/admin/users/invite/{$dto->getUserId()}");
    }

    /**
     * @param UserGroupDTO $dto
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
    public function removeUser(UserGroupDTO $dto) : RemoteResponseInterface
    {
        return $this->api->put("/groups/{$dto->getGroupId()}/admin/users/remove/{$dto->getUserId()}");
    }
}
