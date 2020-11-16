<?php

namespace Scaleplan\Matrix\Transport;

use function Scaleplan\Helpers\get_required_env;

/**
 * Class AdminTransport
 *
 * @package Scaleplan\Matrix\Transport
 */
class AdminTransport extends AbstractTransport
{
    /**
     * @return string
     *
     * @throws \Scaleplan\Helpers\Exceptions\EnvNotFoundException
     */
    protected function getApiUrl() : string
    {
        return get_required_env('SYNAPSE_' . $this->serverName . '_ADMIN_API_URL');
    }
}
