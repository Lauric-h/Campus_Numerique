<?php
require __DIR__ . "/vendor/autoload.php";
use App\model\Database;
use App\model\TaskRepository;

define("DATABASE_FILE", "./test.db");
$table = 'todos';

try {
    Database::initialize(__DIR__ . '/test.db');
} catch (Exception $e) {
    var_dump($e->getMessage());
    die();
}

$taskRepository = new TaskRepository();
$taskRepository->initialize();

?>

<?php
if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case "uncheck":
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $taskRepository->update($id, false);
            }
            header("Location: /");
            break;
        case "check":
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $taskRepository->update($id, true);
            }
            header("Location: /");
            break;
        case "delete":
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $taskRepository->delete($id);
            }
            header("Location: /");
            break;
        case "add":
            if (isset($_GET["name"])) {
                $name = $_GET["name"];
                $name = addslashes($name);
                $taskRepository->add($name);
            }
            header("Location: /");
            break;
        default:
            echo "An error has occured";
            die();
    }
}

$tasks = $taskRepository->getAll();

require 'view/template.php';
?>




