<?php

function getConnection() {
    $connection = null;
    try {
        $connection = new PDO("mysql:host=localhost;dbname=guestbook;charset=utf8", "lauric", "lauric", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $connection;
}