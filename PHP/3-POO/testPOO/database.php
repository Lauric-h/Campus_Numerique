<?php

function connectDb() {
    $connection = null;
    try {
        $connection = new PDO("mysql:host=localhost;dbname=perso;charset=utf8", "lauric", "lauric", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } 
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $connection;
}

?>