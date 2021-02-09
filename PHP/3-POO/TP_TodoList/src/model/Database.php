<?php
namespace App\model;

use \PDO;
use \Exception;

/**
 * Class Database
 */
class Database
{
    private static ?Database $instance = null;
    private PDO $pdo;

    /**
     * Database constructor.
     * @param string $path
     */
    private function __construct(string $path) {
        $this->pdo = new PDO("sqlite:$path");
    }

    /**
     * @param $path
     * @throws Exception
     * @void
     */
    public static function initialize($path): void {
        if (self::$instance !== null) {
            throw new Exception("configuration has already been initialized");
        }
        self::$instance = new self($path);
    }

    /**
     * @return PDO
     */
    public static function getInstance(): PDO {
        return self::$instance->pdo;
    }
}