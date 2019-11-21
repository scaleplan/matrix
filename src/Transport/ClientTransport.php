<?php

namespace Scaleplan\Matrix\Transport;

use function Scaleplan\Helpers\get_required_env;

/**
 * Class ClientTransport
 *
 * @package Scaleplan\Matrix\Transport
 */
class ClientTransport extends AbstractTransport
{
    /**
     * @return string
     *
     * @throws \Scaleplan\Helpers\Exceptions\EnvNotFoundException
     */
    protected function getApiUrl() : string
    {
        return get_required_env('SYNAPSE_' . $this->serverName . '_API_URL');
    }
}
