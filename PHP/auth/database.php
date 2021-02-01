<?php

try {

    $bdd = new PDO('mysql:host=localhost;dbname=bdd_site_entreprise;charset=utf8', 'lauric', 'lauric');
}
catch(Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

?>