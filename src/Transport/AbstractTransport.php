<?php

namespace Scaleplan\Matrix\Transport;

use Lmc\HttpConstants\Header;
use Scaleplan\DTO\DTO;
use Scaleplan\Http\Constants\ContentTypes;
use Scaleplan\Http\Constants\Methods;
use Scaleplan\Http\Interfaces\RemoteResponseInterface;
use Scaleplan\Http\Interfaces\RequestInterface;
use Scaleplan\Http\RemoteResponse;
use function Scaleplan\DependencyInjection\get_required_container;
use function Scaleplan\Helpers\get_required_env;

/**
 * Class AbstractTransport
 *
 * @package Scaleplan\Matrix\Transport
 */
abstract class AbstractTransport
{
    /**
     * @var string
     */
    protected $serverName;

    /**
     * AbstractTransport constructor.
     *
     * @param string $serverName
     */
    public function __construct(string $serverName)
    {
        $this->serverName = $serverName;
    }

    abstract protected function getApiUrl() : string;

    /**
     * @return string
     */
    public function getServerName() : string
    {
        return $this->serverName;
    }

    /**
     * @param string $url
     * @param null $data
     * @param string|null $dtoClass
     * @param string|null $accessToken
     *
     * @return RemoteResponse
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
    public function post(
        string $url,
        $data = null,
        string $dtoClass = null,
        string $accessToken = null
    ) : RemoteResponseInterface
    {
        return $this->send(Methods::POST, $url, $data, $dtoClass, $accessToken);
    }

    /**
     * @param string $method
     * @param string $url
     * @param null $data
     * @param string|null $dtoClass
     * @param string|null $accessToken
     *
     * @return RemoteResponse
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
    protected function send(
        string $method,
        string $url,
        $data = null,
        string $dtoClass = null,
        string $accessToken = null
    ) : RemoteResponseInterface
    {
        $dataArray = $data ?? [];
        if ($data instanceof DTO) {
            $data->validate();
            $dataArray = $data->toFullSnakeArray();
        }

        /** @var RequestInterface $request */
        $request = get_required_container(
            RequestInterface::class,
            [$this->getApiUrl() . $url, $dataArray]
        );
        if ($dtoClass) {
            $request->setDtoClass($dtoClass);
            $request->setValidationEnable(true);
        }
        $request->setMethod($method);
        $request->addHeader(Header::AUTHORIZATION, $this->getAuthHeaderValue($accessToken));
        $request->addHeader(Header::CONTENT_TYPE, ContentTypes::JSON);

        return $request->send();
    }

    /**
     * @param string|null $accessToken
     *
     * @return string
     *
     * @throws \Scaleplan\Helpers\Exceptions\EnvNotFoundException
     */
    protected function getAuthHeaderValue(?string $accessToken) : string
    {
        return 'Bearer ' . $accessToken ?? get_required_env('SYNAPSE_' . $this->serverName . '_ACCESS_TOKEN');
    }

    /**
     * @param string $url
     * @param null $data
     * @param string|null $dtoClass
     * @param string|null $accessToken
     *
     * @return RemoteResponse
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
    public function put(
        string $url,
        $data = null,
        string $dtoClass = null,
        string $accessToken = null
    ) : RemoteResponseInterface
    {
        return $this->send(Methods::PUT, $url, $data, $dtoClass, $accessToken);
    }

    /**
     * @param string $url
     * @param null $data
     * @param string|null $dtoClass
     * @param string|null $accessToken
     *
     * @return RemoteResponse
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
    public function get(
        string $url,
        $data = null,
        string $dtoClass = null,
        string $accessToken = null
    ) : RemoteResponseInterface
    {
        return $this->send(Methods::GET, $url, $data, $dtoClass, $accessToken);
    }
}
