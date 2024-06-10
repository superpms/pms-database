<?php

namespace pms\db;

use think\DbManager as Manager;

class Driver extends Manager
{
    protected array $connectors = [
        'mysql' => connector\Mysql::class,
        'mysql-pool' => connector\MysqlPool::class,
    ];

    protected array $builders = [
        'mysql' => builder\Mysql::class,
    ];

    protected function getConnectionConfig(string $name): array{
        $data = parent::getConnectionConfig($name);
        $type = $connectorName = $data['type'] ?? 'mysql';
        if ($this->isPool) {
            $connectorName = $type . '-pool';
        }
        $connector = $this->connectors[$connectorName] ?? $type;
        $builder = $this->builders[$type] ?? $type;
        return [
            ...$data,
            'type' => $connector,
            'builder' => $builder,
        ];
    }

    protected bool $isPool = false;

    public function isPool(bool $status): void
    {
        $this->isPool = $status;
    }
}