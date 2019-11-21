<?php

namespace Scaleplan\Matrix;

use Scaleplan\Http\Interfaces\RemoteResponseInterface;
use Scaleplan\Matrix\DTO\Request\UserAvatarDTO;
use Scaleplan\Matrix\DTO\Request\UserDTO as RequestUserDTO;
use Scaleplan\Matrix\DTO\Request\UsernameDTO;
use Scaleplan\Matrix\DTO\Request\UserRegisterDTO;
use Scaleplan\Matrix\DTO\Response\NonceDTO;
use Scaleplan\Matrix\DTO\Response\UserDTO as ResponseUserDTO;
use Scaleplan\Matrix\Transport\AdminTransport;
use function Scaleplan\Helpers\get_required_env;

/**
 * Class User
 *
 * @package Scaleplan\Matrix
 */
class User extends AbstractAPI
{
    /**
     * @var AdminTransport
     */
    private $adminApi;

    /**
     * User constructor.
     *
     * @param string $serverName
     */
    public function __construct(string $serverName)
    {
        parent::__construct($serverName);
        $this->adminApi = new AdminTransport($serverName);
    }

    /**
     * @param UserRegisterDTO $dto
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
    public function create(UserRegisterDTO $dto) : RemoteResponseInterface
    {
        /** @var NonceDTO $nonceDTO */
        $nonceDTO = $this->adminApi->get('/register', null, NonceDTO::class)->getResult();

        $dto->setNonce($nonceDTO->getNonce());
        $dto->setMac(Helper::getHmacSha1([
            $dto->getNonce(),
            $dto->getUsername(),
            $dto->getPassword(),
            $dto->isAdmin() ? 'admin' : 'notadmin',
        ]));
        return $this->adminApi->post('/register', $dto, ResponseUserDTO::class);
    }

    /**
     * @param UserAvatarDTO $dto
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
    public function setAvatar(UserAvatarDTO $dto) : RemoteResponseInterface
    {
        return $this->api->put(
            "/profile/{$dto->getUserId()}/avatar_url",
            ['avatar_url' => $dto->getAvatarUrl()],
            null,
            $dto->getAccessToken()
        );
    }

    /**
     * @param RequestUserDTO $dto
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
    public function deactivate(RequestUserDTO $dto) : RemoteResponseInterface
    {
        return $this->adminApi->post("/deactivate/{$dto->getUserId()}", null, null, $dto->getAccessToken());
    }

    /**
     * @param UsernameDTO $dto
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
    public function isUserPresent(UsernameDTO $dto) : RemoteResponseInterface
    {
        return $this->adminApi->get('/register/available', $dto, null, $dto->getAccessToken());
    }

    /**
     * @param string $username
     *
     * @return string
     *
     * @throws \Scaleplan\Helpers\Exceptions\EnvNotFoundException
     */
    public function getUserId(string $username) : string
    {
        return "@$username:" . get_required_env('SYNAPSE_' . $this->api->getServerName() . '_ACCESS_TOKEN');
    }
}
