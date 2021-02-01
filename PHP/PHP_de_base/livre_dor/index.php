<?php
require_once 'database.php';
require_once 'web/header.php';
require_once 'functions.php';
require 'Class/Message.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = new Message(testInput($_POST['username']), testInput($_POST['message']));
    if ($message->isValid()) {
        // add to DB
        $bdd = getConnection();


    } else {
        $errors = $message->getErrors();
        var_dump($errors); // FOR TEST - REMOVE
    }
    var_dump($message); // FOR TEST - REMOVE

}

?>

<form method="POST" action="">
  
    <input type="text" name="username" placeholder="Nom" autocomplete="off">
    <textarea name="message" placeholder="Votre message..."></textarea>
    <button type="submit">Envoyer</button>
</form>

<div>
    <h2>Messages</h2>
   
</div>