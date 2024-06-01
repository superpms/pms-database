<?php

namespace pms\facade;

use pms\DbManager;
use pms\Facade;

/**
 * @see DbManager
 * @mixin DbManager
 */
class Db extends Facade
{
    protected static function getFacadeClass(): string
    {
        return DbManager::class;
    }
}