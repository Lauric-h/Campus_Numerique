<?php 
require_once 'database.php';
require 'Personnage.php';

$db = connectDb();

$request = $db->query('SELECT nom, forcePerso, degats, niveau, experience FROM perso_list');

while ($data = $request->fetch(PDO::FETCH_ASSOC)) {
    $perso = new Personnage($data);
    
    echo "$perso->name() a $perso->strength(), de force, $perso->damage() de dégâts, $perso->experience() d'expérience et est au niveau, $perso->level()";
}

?>