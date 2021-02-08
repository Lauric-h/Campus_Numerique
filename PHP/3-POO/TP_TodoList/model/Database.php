<?php


/**
 * Class Database
 */
class Database
{
    private static $instance = null;
    private static PDO $pdo;

    /**
     * Database constructor.
     * @param string $path
     */
    private function __construct(string $path) {
        $this->pdo = new PDO("sqlite:/$path");
    }

    /**
     * @param $path
     * @throws Exception
     */
    public static function initialize($path) {
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