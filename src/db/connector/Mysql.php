<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2023 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
namespace pms\db\connector;
use think\db\connector\Mysql as connector;
class Mysql extends connector{

    protected function createPdo($dsn, $username, $password, $params)
    {
        return parent::createPdo($dsn, $username, $password, $params);
    }

}