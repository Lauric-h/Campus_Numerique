<?php


class TaskRepository
{
    const TABLE = 'tasks';
    public function Initialize() {
        $db = new SQLite3(self::TABLE);
        $db->exec('CREATE TABLE IF NOT EXISTS tasks (
            id INTEGER AUTO_INCREMENT PRIMARY KEY,
            description TEXT,
            checked INTEGER DEFAULT 0
        )');
        var_dump($db);
    }

    /**
     * Get all entries in DB
     * @return
     */
    public function getAll() {
        $query = Database::getInstance()->query('SELECT * FROM :table');
    }

    /**
     * @param $id
     * @param false $checked
     */
    public function update($id, $checked=false) {
        $query = Database::getInstance()->prepare('UPDATE :table SET :checked, WHERE id = :id ');
        $query->execute(array(
            ':table' => self::TABLE,
            ':checked' => $checked,
            ':id' => $id
        ));
    }

    /**
     * @param $description
     */
    public function add($description) {
        $query = Database::getInstance()->prepare('INSERT INTO :table(description) VALUES(:description)');
        var_dump($query);
        $query->bindValue(':description', $description);
        $query->execute();
    }

    /**
     * @param $id
     */
    public function delete($id) {
        $query = Database::getInstance()->prepare('DELETE FROM :table WHERE id = :id');
        $query->execute(array(':table' => self::TABLE, ':id' => $id));
    }
}