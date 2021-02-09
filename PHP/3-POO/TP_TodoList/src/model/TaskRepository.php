<?php
namespace App\model;

use \PDO;
use \Exception;

class TaskRepository
{
    const TABLE = 'todos';
    public PDO $pdo;

    /**
     * Initialize DB
     * @void
     */
    public function Initialize(): void
    {
       $this->pdo = Database::getInstance();
       if (!$this->checkTable()) {
           $this->pdo->exec('create table ' . self::TABLE . '
        (
            id INTEGER
                constraint tasks_pk
                    primary key autoincrement,
            description TEXT,
            checked INTEGER default 0
        );
        INSERT INTO ' . self::TABLE . '(id, description, checked) VALUES (1, \'Task to be done\', 0);
        INSERT INTO ' . self::TABLE . '(id, description, checked) VALUES (2, \'Task done\', 1);'
        );
       }
    }

    /**
     * @return bool
     */
    private function checkTable(): bool {
        if($this->pdo->query('SELECT * FROM ' . self::TABLE) == false) {
            return false;
        }
        return true;
    }

    /**
     * Get all entries in DB
     * @return array
     */
    public function getAll(): array
    {
        $query = $this->pdo->query('SELECT * FROM ' . self::TABLE);
        return $query->fetchAll();
    }

    /**
     * @param int $id
     * @param bool $checked
     * @return bool
     */
    public function update(int $id, bool $checked = false): bool
    {
        $query = $this->pdo->prepare('UPDATE ' . self::TABLE . ' SET checked = :checked WHERE id = :id');
        $query->bindParam('id', $id, PDO::PARAM_INT);
        $query->bindParam('checked', $checked, PDO::PARAM_BOOL);
        return $query->execute();
    }

    /**
     * @param string $description
     * @return int
     */
    public function add(string $description): int
    {
        $query = $this->pdo->prepare('INSERT INTO ' . self::TABLE . '(description) VALUES(:description)');
        $query->bindParam('description', $description, PDO::PARAM_STR);
        $query->execute();
        return $this->pdo->lastInsertId() ?? 0;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $query = $this->pdo->prepare('DELETE FROM ' . self::TABLE . ' WHERE id = ?');
        return $query->execute(array($id));
    }
}