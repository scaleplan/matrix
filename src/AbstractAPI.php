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
     */
    public function __construct()
    {
        $this->api = new ClientTransport();
    }
}
