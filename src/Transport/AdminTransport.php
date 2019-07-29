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
     * AdminTransport constructor.
     *
     * @throws \Scaleplan\Helpers\Exceptions\EnvNotFoundException
     */
    public function __construct()
    {
        $this->apiUrl = get_required_env('SYNAPSE_ADMIN_API_URL');
    }
}
