<?php

namespace pms\facade;

use pms\db\Driver;
use pms\Facade;

/**
 * @see Driver
 * @mixin Driver
 */
class Db extends Facade
{
    protected static function getFacadeClass(): string
    {
        return Driver::class;
    }
}