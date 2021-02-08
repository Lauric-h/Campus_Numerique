<?php
require "model/Database.php";
require "model/TaskRepository.php";

Database::initialize(__DIR__ . "/data.db");
$taskRepository = new TaskRepository();
$taskRepository->Initialize();;
$taskRepository->add("ceci est une tâche");
$tasks = [];

echo 'oui';

var_dump($taskRepository);

die();

?>
<html>
<head>
    <meta charset="utf-8"/>
    <title>My Todo List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-1/css/all.min.css"/>
    <link rel="stylesheet" href="view/style.css">
</head>
<body>
<?php

if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case "uncheck":
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $database->exec(<<<SQL
UPDATE $table set checked=0 WHERE id=$id;
SQL
                );
            }
            header("Location: /");
            break;
        case "check":
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $database->exec(<<<SQL
UPDATE $table set checked=1 WHERE id=$id;
SQL
                );
            }
            header("Location: /");
            break;
        case "delete":
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $database->exec(<<<SQL
DELETE FROM $table WHERE id=$id;
SQL
                );
            }
            header("Location: /");
            break;
        case "add":
            if (isset($_GET["name"])) {
                $name = $_GET["name"];
                $name = addslashes($name);
                $database->exec(<<<SQL
                INSERT INTO $table (name) values('$name')
SQL
                );
            }
            header("Location: /");
            break;
        default:
            echo "An error has occured";
            die();
    }
}


$query = $database->query(<<<SQL
    SELECT * FROM $table ORDER BY checked DESC;
SQL
);
if (!$query)
    die("Impossible to execute query.");

while ($row = $query->fetchArray(SQLITE3_ASSOC)) {
    $tasks[] = $row;
}
?>
<table>
    <tr>
        <th></th>
        <th class="taskname-column">Todo</th>
        <th></th>
    </tr>
    <?php
    foreach ($tasks as $task) {
        echo "<tr><form method='get' action=''><td>";
        echo "<input type='hidden' name='id' value='" . $task["id"] . "'>";
        if ($task["checked"]) {
            echo "<button class='btn-no-style' type='submit' name='action' value='uncheck'><i class='checked-icon fas fa-check'></i></button>";
        } else {
            echo "<button class='btn-no-style' type='submit' name='action' value='check'><i class='checked-icon-grey fas fa-check'></i></button>";
        }
        echo "</td><td class='" . ($task["checked"] ? 'checked' : '') . "'>";
        echo $task["name"];
        echo "</td><td>";

        echo "<button class='btn-no-style' type='submit' name='action' value='delete'><i class='trash-icon fas fa-trash'></i></button>";

        echo "</form>";
        echo "</td></tr>";
    }
    ?>
</table>

<form method="get" action="">
    <input type="text" name="name" autofocus="autofocus"/>
    <button type="submit" name="action" value="add">Add Item</button>
</form>

</body>
</html>
