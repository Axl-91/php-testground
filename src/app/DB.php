<?php

namespace App;

use PDO;

/**
 * @mixin PDO
 */

class DB{
    private PDO $pdo;
    private array $default_options = [
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];


    public function __construct($config){
        try{
            $this->pdo = new PDO(
                "{$config['driver']}:host={$config['host']};dbname={$config['database']}",
                $config["user"],
                $config["pass"],
                $config["options"] ?? $this->default_options
            );
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
    }

    public function __call(string $name, array $arguments){
        return call_user_func_array([$this->pdo, $name], $arguments);
    }
}