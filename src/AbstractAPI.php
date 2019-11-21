<?php

namespace Scaleplan\Matrix;

use Scaleplan\Matrix\Transport\ClientTransport;

/**
 * Class AbstractAPI
 *
 * @package Scaleplan\RocketChat
 */
abstract class AbstractAPI
{
    /**
     * @var ClientTransport
     */
    protected $api;

    /**
     * AbstractAPI constructor.
     *
     * @param string $serverName
     */
    public function __construct(string $serverName)
    {
        $this->api = new ClientTransport($serverName);
    }
}
