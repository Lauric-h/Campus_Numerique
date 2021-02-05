<?php 
require_once 'database.php';
require 'Personnage.php';
require 'PersonnagesManager.php';

$perso = new Personnage([
    'nom' => 'Chaton',
    'forcePerso' => 5,
    'degats' => 0,
    'niveau' => 1,
    'experience' => 1
]);

$db = connectDb();
$manager = new PersonnagesManager($db);
$manager->add($perso);


?>