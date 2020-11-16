<?php

namespace Scaleplan\Matrix;

use function Scaleplan\Helpers\get_required_env;

/**
 * Class Helper
 *
 * @package Scaleplan\Matrix
 */
class Helper
{
    /**
     * @param array $data
     *
     * @return string
     *
     * @throws \Scaleplan\Helpers\Exceptions\EnvNotFoundException
     */
    public static function getHmacSha1(array $data) : string
    {
        $str = implode("\x00", $data);
        return hash_hmac('sha1', $str, get_required_env('SYNAPSE_SECRET'));
    }
}
