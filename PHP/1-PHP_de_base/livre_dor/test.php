<?php
require_once 'vendor/autoload.php';



$pdo = new PDO('sqlite:db/dbtest.db');
$query = $pdo->query('SELECT * FROM articles');

$posts = $query->fetchAll();
echo "<pre>";
print_r($posts);
echo '</pre>';

// phpinfo();

$parseDown = new Parsedown();

dump($posts);


