<?php

namespace Scaleplan\Matrix\Constants;

/**
 * Class Visibility
 *
 * @package Scaleplan\Matrix\Constants
 */
class Visibility
{
    public const PUBLIC  = 'public';
    public const PRIVATE = 'private';

    public const ALL = [
        self::PUBLIC,
        self::PRIVATE,
    ];
}
