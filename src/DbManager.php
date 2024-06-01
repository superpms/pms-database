<?php

namespace pms;

use think\DbManager as Manager;

class DbManager extends Manager
{
    protected array $connectors = [
        'mysql' => db\connector\Mysql::class,
        'mysql-pool' => db\connector\MysqlPool::class,
    ];

    protected array $builders = [
        'mysql' => db\builder\Mysql::class,
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